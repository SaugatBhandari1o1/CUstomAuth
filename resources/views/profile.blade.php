@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-dark text-center">
                    <h3 class="card-title text-light fw-bold">Welcome: {{ Auth::user()->name }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-2 mb-2">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="form-control" />
                        </div>
                        <div class="mt-2 mb-2">
                            <label for="password" class="form-label">Old Password</label>
                            <input type="password" name="old_password" id="old_password" placeholder="" class="form-control" />
                        </div>
                        <div class="mt-2 mb-2">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" name="new_password" id="new_password" placeholder="" class="form-control" />
                        </div>
                        <div class="mt-2 mb-2">
                            <label for="image_data" class="form-label">Change Profile Picture</label>
                            <input type="file" name="image_data" id="image_data" accept="image/png, image/jpg, image/jpeg" />
                        </div>
                        <hr>
                        <div class="mt-2 mb-2">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection