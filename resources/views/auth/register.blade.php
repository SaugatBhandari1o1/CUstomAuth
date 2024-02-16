<!-- register -->
@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-4 offset-md-4 ">
            <div class="card form-holder">
                <h1>Register</h1>
                @if($errors->any())
                <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
                </div>
                @endif

                <form action="{{route('register') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <label class="login-label">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name" />
                        @if($errors->has('name'))
                        <p class="text-danger">{{ $errors->first('name')}}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="login-label">Email</label>
                        <input type="email" name="email" placeholder="Email" class="form-control" />
                        @if($errors->has('email'))
                        <p class="text-danger">{{$errors->first('email')}}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="login-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" />
                        @if($errors->has('password'))
                        <p class="text-danger">{{$errors->first('password')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="login-label">Confirm Password</label>
                        <input type="text" name="password_confirmation" class="form-control" placeholder="Password Confirmation" />
                    </div>
                    <div class="form-group">
                        <label class="login-label">Profile Picture</label>
                        <input type="file" id="image_data" name="image_data" accept=".jpg, .png, .jpeg">
                    </div>
                    <hr>
                    <div class="row">
                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-primary " style="background-color: #1cc88a;" value="Register" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection