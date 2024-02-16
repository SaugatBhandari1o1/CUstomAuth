@extends('admin.main-layout')

@section('content-header')

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>


    <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->name}}</span>
                <img class="img-profile rounded-circle" src="{{asset('uploads/profile/' .Auth::user()->image_data)}}" alt="Profile_image">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>

@endsection

@section('body')

<form method="post" action="{{route('login.customization.update')}}">
    @csrf
    <div class="form-group">
        <label for="login_box_color">
            Login Box Color
        </label>
        <!-- <input type="text" id="login_box_color" name="login_box_color" value="{{$customization->login_box_color ?? ''}}" class="form-control" required> -->
        <select id="login_box_color" name="login_box_color" class="form_control" style="width: 400px" required>
            <option value="#4e73df" {{$customization->login_box_color == '#4e73df' ? 'selected' : ''}}>Dark Blue</option>
            <option value="#1cc88a" {{$customization->login_box_color == '#1cc88a' ? 'selected' : ''}}>Success Green</option>
            <option value="#36b9cc" {{$customization->login_box_color == '#36b9cc' ? 'selected' : ''}}>Light Blue</option>
            <option value="#f6c23e" {{$customization->login_box_color == '#f6c23e' ? 'selected' : ''}}>Yellowish</option>
            <option value="#e74a3b" {{$customization->login_box_color == '#e74a3b' ? 'selected' : ''}}>Redish</option>
            <option value="#858796" {{$customization->login_box_color == '#858796' ? 'selected' : ''}}>Grey</option>
            <option value="#f8f9fc" {{$customization->login_box_color == '#f8f9fc' ? 'selected' : ''}}>White</option>
            <option value="#5a5c69" {{$customization->login_box_color == '#5a5c69' ? 'selected' : ''}}>Dark</option>
        </select>
    </div>

    <button id="saveButton" type="submit" class="btn btn-primary">Save</button>

</form>


@endsection
