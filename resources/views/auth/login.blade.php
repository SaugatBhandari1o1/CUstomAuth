<!-- LOGIN -->
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card form-holder">
                <h1> <i class="fa-solid fa-user"></i>Login</h1>
                @if (Session::has('error'))
                <p class="text-danger">{{ Session::get('error') }}</p>
                @endif

                @if (Session::has('success'))
                <p class="text-success">{{ Session::get('success') }}</p>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <label class="login-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Email" />
                        @if ($errors->has('email'))
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="login-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" />
                        @if ($errors->has('password'))
                        <p class="text-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-8 text-left">
                            <a href="#" class="btn btn-link">Forgot Password</a>
                        </div>
                        <div class="col-4 text-right">
                            <input type="submit" class="btn btn-primary" style="background-color: #1cc88a; border-color: black" value="Login" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection