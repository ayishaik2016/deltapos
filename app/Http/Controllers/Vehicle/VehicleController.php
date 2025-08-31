<?php

namespace App\Http\Controllers\Vehicle;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Http\Requests\VehicleRequest;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;

use App\Models\Vehicle;
use App\Models\VehicleType;

class VehicleController extends Controller
{
    /**
     * Create a new vehicle.
     *
     * @return \Illuminate\View\View
     */
    public function create() : View {
        return view('vehicle.create');
    }

    /**
     * Edit a vehicle.
     *
     * @param int $id The ID of the vehicle to edit.
     * @return \Illuminate\View\View
     */
    public function edit($id) : View {

        $vehicle = Vehicle::find($id);

        return view('vehicle.edit', compact('vehicle'));
    }
    /**
     * Return JsonResponse
     * */
    public function store(VehicleRequest $request)  {

        $filename = null;

        // Get the validated data from the VehicleRequest
        $validatedData = $request->validated();

        // Create a new vehicle record using Eloquent and save it
        $newVehicle = Vehicle::create($validatedData);

        return response()->json([
            'status' => true,
            'message' => __('app.record_saved_successfully'),
            'data'  => [
                'id' => $newVehicle->id,
                'name' => $newVehicle->name
            ]
        ]);
    }

    /**
     * Return JsonResponse
     * */
    public function update(VehicleRequest $request) : JsonResponse {
        $validatedData = $request->validated();

        // Save the vehicle details
        $settings = Vehicle::find($validatedData['id']);
        $settings->name = $validatedData['name'];
        $settings->vehicle_number = $validatedData['vehicle_number'];
        $settings->vehicle_type_id = $validatedData['vehicle_type_id'];
        $settings->description = $validatedData['description'];
        $settings->status = $validatedData['status'];
     
        $settings->save();

        return response()->json([
            'message' => __('app.record_updated_successfully'),
        ]);
    }

    public function list() : View {
        return view('vehicle.list');
    }

    public function datatableList(Request $request){
        $data = Vehicle::query();

        return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('created_at', function ($row) {
                        return $row->created_at->format(app('company')['date_format']);
                    })
                    ->addColumn('username', function ($row) {
                        return $row->user->username??'';
                    })
                    ->addColumn('vehicle_type', function ($row) {
                        return $row->vehicleType->name??'';
                    })
                    ->addColumn('action', function($row){
                            $id = $row->id;

                            $editUrl = route('vehicle.edit', ['id' => $id]);
                            $deleteUrl = route('vehicle.delete', ['id' => $id]);


                            $actionBtn = '<div class="dropdown ms-auto">
                            <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded font-22 text-option"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="' . $editUrl . '"><i class="bi bi-trash"></i><i class="bx bx-edit"></i> '.__('app.edit').'</a>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item text-danger deleteRequest" data-delete-id='.$id.'><i class="bx bx-trash"></i> '.__('app.delete').'</button>
                                </li>
                            </ul>
                        </div>';
                            return $actionBtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }

    public function delete(Request $request) : JsonResponse{

        $selectedRecordIds = $request->input('record_ids');

        // Perform validation for each selected record ID
        foreach ($selectedRecordIds as $recordId) {
            $record = Vehicle::find($recordId);
            if (!$record) {
                // Invalid record ID, handle the error (e.g., show a message, log, etc.)
                return response()->json([
                    'status'    => false,
                    'message' => __('app.invalid_record_id',['record_id' => $recordId]),
                ]);

            }
            // You can perform additional validation checks here if needed before deletion
        }

        /**
         * All selected record IDs are valid, proceed with the deletion
         * Delete all records with the selected IDs in one query
         * */
        try{
            Vehicle::whereIn('id', $selectedRecordIds)->delete();
        }catch (QueryException $e){
            return response()->json(['message' => __('app.cannot_delete_records')], 409);
        }

        return response()->json([
            'status'    => true,
            'message' => __('app.record_deleted_successfully'),
        ]);
    }
}
