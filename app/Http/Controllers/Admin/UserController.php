<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUsers()
{
    $users = User::all();
    return view('admin.email', compact('users'));
    
}

}
