@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-12">
            <h3>Welcome: {{Auth::user()->name}}</h3>
            <form action="{{route('updateProfile')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mt-2 mb-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" placeholder="Change Your Name?" class="form-control">
                </div>
                <div class="mt-2 mb-2">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" id="password" placeholder="Enter Current Password" class="form-control">
                </div>

                <div class="mt-2 mb-2">
                    <label for="password" class="form-label">New Password:</label>
                    <input type="password" name="n_password" id="n_password" placeholder="Enter New Password" class="form-control">
                </div>
                <div class="mt-2 mb-2">
                    <label for="profile" class="form-label">Change Profile Picture</label>
                    <input type="file" name="profile" id="profile" accept="image/png, image/jpg ,image/jpeg"/>
                </div>
                <hr>
                <div class="mt-2 mb-2">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection