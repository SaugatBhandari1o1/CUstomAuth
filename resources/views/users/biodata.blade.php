@extends('layouts.app')

@section('content')
<div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header bg-dark text-center">
                        <h3 class="card-title text-light fw-bold">Biodata</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="naem" id="name" class="form-control" placeholder="Enter Your Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="education" class="form-label">Choose Your Vehicle type</label>
                                <select wire:model="vehicleType" class="form-select" required>
                                    <option value="" selected disabled>Select</option>
                                    <option value="bike" id="bike">Bike</option>
                                    <option value="car" id="car">Car</option>
                                    <option value="jeep" id="jeep">Jeep</option>
                                    <option value="heavy" id="heavy">Heavy</option>
                                    <option value="bus" id="bus">Bus</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="cc" class="form-label">Select The CC</label>
                                <select name="cc" id="cc" class="form-select" required>
                                    <option value="" selected disabled>Select</option>
                                    <option value="125" id="125">125CC</option>
                                    <option value="150" id="150">150CC</option>
                                    <option value="250" id="250">250CC</option>
                                    <option value="350" id="350">350CC</option>
                                    <option value="450" id="450">450CC</option>


                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection