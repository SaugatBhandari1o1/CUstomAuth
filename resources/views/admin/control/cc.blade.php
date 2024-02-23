@extends('admin.main-layout')

@section('body')


<form action="{{ route('vehicle-options.create') }}" method="POST">
    @csrf
    <div class="mb-8">
        <label for="vehicle_cc" class="form-label">Choose Vehicle</label>
        <select class="form-select form-control" id="vehicle_type_select" name="vehicle_type_select" required>
            <option value="" selected disabled>Select Vehicle Type</option>
            @foreach($existingVehicleTypes as $type)
            <option value="{{$type->id}}">{{$type->label}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="cc" class="form-label">CC</label>
        <input type="text" class="form-control" id="cc" name="cc" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection