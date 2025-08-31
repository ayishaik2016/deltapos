<select class="form-select single-select-clear-field" id="{{ $dropdownName }}" name="{{ $dropdownName }}" data-placeholder="Select vehicle type">
    <option></option>
    @foreach ($vehicleType as $type)
        <option value="{{ $type->id }}" {{ $selected == $type->id ? 'selected' : '' }}>
            {{ $type->name }}
        </option>
    @endforeach
</select>
