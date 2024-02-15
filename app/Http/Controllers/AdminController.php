<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Upload;

class AdminController extends Controller
{
   
    public function dashboard()
    {
        $this->month();
        $this->showUploads();

        $userCount = Session::get('userCount', 0);
        $uploadCount = Session::get('uploadCount',0);

        $data = [
            'title' => 'Dashboard',
            'userCount' => $userCount,
            'uploadCount' => $uploadCount,
        ];

        return view('admin.dashboard', $data);
    }


    public function month()
    {

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

    public function showUploads()
    {
        $uploadCount = Upload::count();

        Session::put('uploadCount', $uploadCount);

        return redirect()->route('dashboard');
        // return view('dashboard',['uploadCount' =>$uploadCount]);
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
