<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view("admin.a_login");
    }

    public function admin(){
        return view("/admin/admin");
    }

    public function login(Request $request){

        $credentials = $request->validate([]);
    }


}
