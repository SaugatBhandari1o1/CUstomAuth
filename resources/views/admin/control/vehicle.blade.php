@extends('admin.main-layout')

@section('body')

<h3>Add New Vehicle Classes</h3>

@if($errors->any())

<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {{$error}}
        </li>
        @endforeach
    </ul>
</div>

@endif

<form action="{{ route('vehicle-options.store') }}" method="POST">

    @csrf
    <div class="mb-8">
        <div class="mb-2">
            <label for="vehicle" class="form-label">Enter Vehicle Type</label>
            <input type="text" class="form-control" id="vehicle_type" name="vehicle_type" placeholder="Enter Vehicle Type">
        </div>
        <div class="mb-2">
            <label for="vehicle" class="form-label">Enter Vehicle Label</label>
            <input type="text" class="form-control" id="label" name="label" placeholder="Enter Vehicle Label">
        </div>
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<hr>



@endsection