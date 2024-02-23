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
                        <form action="{{route('vehicleComponent.reg')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="naem" id="name" class="form-control" placeholder="Enter Your Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="education" class="form-label">Choose Your Vehicle type</label>
                                <select wire:model="vehicleType" class="form-select" required>
                                    <option value="" selected disabled>Select</option>
                                    @foreach($vehicleCCs as $type)
                                        <option value="{{$type->id}}">{{$type->label}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="cc" class="form-label">Select The CC</label>
                                <select name="cc" id="cc" class="form-select" required>
                                    <option value="" selected disabled>Select</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#vehicle_type').change(function(){
            var vehicleLabel = $(this).val();
            console.log('Selected vehicle label:', vehicleLabel); // Add this line

            if(vehicleLabel){
                $.ajax({
                    url : '/getCCs',
                    type: 'GET',
                    data: { vehicle_label: vehicleLabel},
                    success: function(response){
                        $('#cc').empty();
                        console.log('Response:', response); // Add this line

                        $.each(response ,function(key, value ){
                            $('#cc').append('<option value="' + value.id + '">' + value.cc + '</option>');
                        });
                    }
                });
            } else {
                $('#cc').empty();
            }
        });
    });
</script>

@endsection