<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Information;


class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function register_view()
    {
        return view('auth.register');
    }
    public function login(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('home');
        }

        return redirect('login')->withError('Login Details are not Valid');
    }
    public function register(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed',
            'image_data' =>'required|image',
        ]);
        if($request ->hasFile('image_data') ){
            $img = $request->image_data;
            $img_name = time() .'.'. $img->getClientOriginalExtension();
            $destinationPath = 'public_path'('uploads/');
            $img->move($destinationPath, $img_name);

        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image_data' =>$img_name,
            
        ]);

        //Login
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('home');
        }

        return redirect('register')->withError('Error');
    }

    public function home()
    {
        $user_id = Auth::id();
        $data['row'] = Information::where('user_id', $user_id)->get();
        // $data = [];
        // $data['row'] = DB::table('uploads')->get();
        return view('home', compact('data'));
    }



    public function logout()
    {
        Session::flush();
        auth::logout();
        return redirect('');
    }
}
