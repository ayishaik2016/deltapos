<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Vehicle;
use App\Models\ItemDispatch;

class DropdownVehicle extends Component
{

    /**
     * vehicles option
     *
     * @var string
     */
    public $vehicles;

    /**
     * Selected option
     *
     * @var string
     */
    public $selected;

    /**
     * Dropdown name or id attribute
     *
     * @var String
     */
    public $dropdownName;
    
    /**
     * Create a new component instance.
     */
    public function __construct($dropdownName, $selected = null)
    {
        $vehicles = array();
        $roles = config('constants.roles');
        $itemDispatchPermission = config('constants.item_dispatch_permission');

        if(auth()->user()->role_id == $roles['SALESMAN']) {
            $itemDispatchDetail = ItemDispatch::where('salesman_id', auth()->user()->id)->orderBy('id', 'desc')->first();

            if($itemDispatchDetail) {
                $vehicles = Vehicle::select('id', 'name', 'vehicle_number')->where('id', $itemDispatchDetail->vehicle_id)->where('status', 1)->get();
            }
        } else if(auth()->user()->role_id == $roles['DRIVER']) {
            $itemDispatchDetail = ItemDispatch::where('driver_id', auth()->user()->id)->orderBy('id', 'desc')->first();

            if($itemDispatchDetail) {
                $vehicles = Vehicle::select('id', 'name', 'vehicle_number')->where('id', $itemDispatchDetail->vehicle_id)->where('status', 1)->get();
            }
        } else {
            $vehicles = Vehicle::select('id', 'name', 'vehicle_number')->where('status', 1)->get();
        }

        
        $this->vehicles = $vehicles;
        $this->selected = $selected;
        $this->dropdownName = $dropdownName;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dropdown-vehicle');
    }
}
