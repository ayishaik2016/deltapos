<?php

namespace App\Http\Requests;
use App\Models\Vehicle;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VehicleRequest extends FormRequest
{
    /**
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = true;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

        $rulesArray = [
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'vehicle_type_id' => ['required'],
            'status' => ['required'],
        ];

        if ($this->isMethod('PUT')) {
            $vehicleId = $this->input('id');
            $rulesArray['id'] = ['required'];
            $rulesArray['vehicle_number'] = ['required', 'string', 'max:20', Rule::unique('vehicle')->ignore($vehicleId)];
        } else {
            $rulesArray['vehicle_number'] = ['required', 'string', 'unique:'.Vehicle::class];
        }
        
        return $rulesArray;
    }
    public function messages(): array
    {
        $responseMessages = [
            'name.required' => 'A Name should not be empty',
            'vehicle_number.required' => 'A Vehicle Number should not be empty',
            'status.required' => 'Please Select Status',
            'vehicle_type_id.required' => 'Vehcile type should not be empty',
        ];

        if ($this->isMethod('PUT')) {
            $responseMessages['id.required']    = 'ID Not found to update record';
        }

        return $responseMessages;
    }
}
