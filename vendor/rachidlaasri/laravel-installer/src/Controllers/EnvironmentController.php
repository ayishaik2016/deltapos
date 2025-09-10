<?php

namespace RachidLaasri\LaravelInstaller\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use RachidLaasri\LaravelInstaller\Events\EnvironmentSaved;
use RachidLaasri\LaravelInstaller\Helpers\EnvironmentManager;
use Validator;

use function PHPSTORM_META\elementType;

class EnvironmentController extends Controller
{
    /**
     * @var EnvironmentManager
     */
    protected $EnvironmentManager;

    /**
     * @param  EnvironmentManager  $environmentManager
     */
    public function __construct(EnvironmentManager $environmentManager)
    {
        $this->EnvironmentManager = $environmentManager;
    }

    /**
     * Display the Environment menu page.
     *
     * @return \Illuminate\View\View
     */
    public function environmentMenu()
    {
        return view('vendor.installer.environment');
    }

    /**
     * Display the Environment page.
     *
     * @return \Illuminate\View\View
     */
    public function environmentWizard()
    {
        $envConfig = $this->EnvironmentManager->getEnvContent();

        return view('vendor.installer.environment-wizard', compact('envConfig'));
    }

    /**
     * Display the Environment page.
     *
     * @return \Illuminate\View\View
     */
    public function environmentClassic()
    {
        $envConfig = $this->EnvironmentManager->getEnvContent();

        return view('vendor.installer.environment-classic', compact('envConfig'));
    }

    /**
     * Processes the newly saved environment configuration (Classic).
     *
     * @param  Request  $input
     * @param  Redirector  $redirect
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveClassic(Request $input, Redirector $redirect)
    {
        $message = $this->EnvironmentManager->saveFileClassic($input);

        event(new EnvironmentSaved($input));

        return $redirect->route('LaravelInstaller::environmentClassic')
                        ->with(['message' => $message]);
    }

    /**
     * Processes the newly saved environment configuration (Form Wizard).
     *
     * @param  Request  $request
     * @param  Redirector  $redirect
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveWizard(Request $request, Redirector $redirect)
    {

        $rules = config('installer.environment.form.rules');
        $messages = [
            'environment_custom.required_if' => trans('installer_messages.environment.wizard.form.name_required'),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return $redirect->route('LaravelInstaller::environmentWizard')->withInput()->withErrors($validator->errors());
        }

        if (! $this->checkDatabaseConnection($request)) {
            return $redirect->route('LaravelInstaller::environmentWizard')->withInput()->withErrors([
                'database_connection' => trans('installer_messages.environment.wizard.form.db_connection_failed'),
            ]);
        }


        //Validate the envato purchase code by sending api request to the server
        $envatoPurchaseCode = $request->envato_purchase_code;
        $envatoUsername = $request->envato_username;
        $userEmail = $request->user_email;


        //how to call the api and send data in get format, there is no bearer token in the api
        $params = [
            'app_version' => env('APP_VERSION'),
            'purchase_code' => $envatoPurchaseCode,
            'appinfo' => null,
            'domain' => $_SERVER['HTTP_HOST'],
            'email' => $userEmail,
            'system_name' => null,
            'envato_username' => $envatoUsername,
            'token' => config('installer.app_token'),
            'actual_link' => (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
            'extenstions' => [
                'psr'   => ini_get('psr') ? 'enabled' : 'disabled',
                'nd_pdo_mysql' => extension_loaded('pdo_mysql') ? 'enabled' : 'disabled',
                'pdo_mysql' => extension_loaded('pdo_mysql') ? 'enabled' : 'disabled',
                'memory_limit' => ini_get('memory_limit'),
            ],
         ];

        $url = "https://envato.creatantech.com/api/deltaapi/?" . http_build_query($params);

        $response = Http::get($url);

        $data = $response->json();

        if($data['status'] == 'success'){
            $request->request->add(['status' => $data['status'], 'unique_code' => $data['unique_code']]);

            $results = $this->EnvironmentManager->saveFileWizard($request);

            event(new EnvironmentSaved($request));

            return $redirect->route('LaravelInstaller::database')
                        ->with(['results' => $results]);
        }
        else{
            return $redirect->route('LaravelInstaller::environmentWizard')->withInput()->withErrors([
                'purchase_code' => $data['message'],
            ]);
        }

    }

    /**
     * TODO: We can remove this code if PR will be merged: https://github.com/RachidLaasri/LaravelInstaller/pull/162
     * Validate database connection with user credentials (Form Wizard).
     *
     * @param  Request  $request
     * @return bool
     */
    private function checkDatabaseConnection(Request $request)
    {
        $connection = $request->input('database_connection');

        $settings = config("database.connections.$connection");

        config([
            'database' => [
                'default' => $connection,
                'connections' => [
                    $connection => array_merge($settings, [
                        'driver' => $connection,
                        'host' => $request->input('database_hostname'),
                        'port' => $request->input('database_port'),
                        'database' => $request->input('database_name'),
                        'username' => $request->input('database_username'),
                        'password' => $request->input('database_password'),
                    ]),
                ],
            ],
        ]);

        DB::purge();

        try {
            DB::connection()->getPdo();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
