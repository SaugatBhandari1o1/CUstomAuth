<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Upload;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    public function index(){

        $users=User::all();
        $data=[
            'title'=>'Users',
            'users'=> $users,
        ];
        return view('admin.users.index',$data);
    }

    public function document(){

        $uploads= Upload::all();
        $data=[
            'title'=> 'Uploads',
            'uploads'=> $uploads
        ];


        return view('admin.users.document',$data);
    }


}
