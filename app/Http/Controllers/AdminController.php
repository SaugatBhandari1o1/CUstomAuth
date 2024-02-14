<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;


class AdminController extends Controller
{
    // public function index(){
    //     $users = User::all();
    //     return view('admin.users.index', compact('users'));
    // }

    // public function dashboard(){
    //     $userCount = Session::get('userCount', 0);

    //     $data=[
    //         'title'=>'dashboard',
    //         'userCount'=>$userCount
    //     ];
    //     return view('admin.dashboard',$data);
    // }
    public function dashboard()
    {
        $this->month();
        // Retrieve the user count from the session
        $userCount = Session::get('userCount', 0);

        // Prepare data to pass to the view
        $data = [
            'title' => 'Dashboard',
            'userCount' => $userCount,
        ];

        // Return the dashboard view with the user count
        return view('admin.dashboard', $data);
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

    public function a_logout()
    {
        auth()->logout();
        return redirect('/admin')->with('success', 'You Have been Logged Out');
    }

    public function a_loginView()
    {
        return view("/admin/a_login");
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials) && auth()->user()->is_admin) {
            return redirect()->route('dashboard')->with('success', 'Login Successful');
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }
}
