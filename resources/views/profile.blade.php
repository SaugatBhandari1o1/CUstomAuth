@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-12">
            <h3>Welcome: {{Auth::user()->name}}</h3>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mt-2 mb-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" placeholder="Change Your Name?" class="form-control">
                </div>
                <div class="mt-2 mb-2">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" id="password" placeholder="Change Your Password?" class="form-control">
                </div>
                <div class="mt-2 mb-2">
                    <label for="profile" class="form-label">Change Profile Picture</label>
                    <input type="file" name="profile" id="profile" accept="image/png, image/jpg ,image/jpeg"/>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection