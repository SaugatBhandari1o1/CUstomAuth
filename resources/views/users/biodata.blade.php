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
                        <!-- <form action="{{route('vehicleComponent.reg')}}" method="POST" enctype="multipart/form-data"> -->
                        <form>
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="naem" id="name" class="form-control" placeholder="Enter Your Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="education" class="form-label">Choose Your Vehicle type</label>
                                <select id="vehicle_type" wire:model="vehicleType" class="form-select" required>
                                    <option value="" selected disabled>Select</option>
                                    @foreach($vehicleCCs as $data)
                                    <option value="{{$data->id}}">{{$data->label}}</option>
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


<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- <script>
    $(document).ready(function() {
        $('#vehicle_type').change(function(){
            // var vehicleLabel = $(this).val();
            var idVehicle = this.value; //new
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
</script> -->

<script>
    $(document).ready(function() {
        $('#vehicle_type').on('change', function() {
            var idVehicle = this.value;
            $("#cc").html('');
            $.ajax({
                url: "{{url('/getCCs')}}",
                type: "POST",
                data: {
                    vehicle_cc_id:idVehicle,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result){
                    $('#cc').html('<option value="">--Select CC--</option>');
                    $.each(result.ccs, function(key, value){
                        $("#cc").append('<option value="'+value.id+'">' +value.cc+'</option>');
                    });
                    
                }
            });
        });
        $.ajax({});
    });
</script>

@endsection