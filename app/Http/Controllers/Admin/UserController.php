<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

}
