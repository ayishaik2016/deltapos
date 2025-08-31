@php
    $itemDispatchPermission = config('constants.item_dispatch_permission');
@endphp

<select class="form-select single-select-clear-field" id="{{ $dropdownName }}" name="{{ $dropdownName }}" data-placeholder="Select vehicle">
    @if(!in_array(auth()->user()->role_id, $itemDispatchPermission)) 
        <option></option>
    @endif
    @foreach ($vehicles as $vehicle)
        <option value="{{ $vehicle->id }}" {{ $selected == $vehicle->id ? 'selected' : '' }}>
            {{ $vehicle->name }}({{ $vehicle->vehicle_number }})
        </option>
    @endforeach
</select>
