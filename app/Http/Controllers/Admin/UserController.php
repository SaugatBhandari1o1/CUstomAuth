<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
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

    public function month()
    {

        // return redirect()->route('dashboard',['userCount' => session('userCount')]);
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $userCount = User::whereYear('created_at', $currentYear)
                         ->whereMonth('created_at', $currentMonth)
                         ->whereDate('created_at', '>=', Carbon::now()->startOfMonth())
                         ->whereDate('created_at', '<=', Carbon::now()->endOfMonth())
                         ->count();

        Session::put('userCount', $userCount);

        return redirect()->route('dashboard');
        }


}
