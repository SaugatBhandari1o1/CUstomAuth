<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view("/admin/admin");
    }

    public function dashboard(){
        $data=[
            'title'=>'dashboard'
        ];
        return view('admin.dashboard',$data);
    }

    public function a_logout(){
        auth()->logout();
        return redirect('admin/a_login')->with('success','You Have been Logged Out');
    }

    public function a_loginView(){
        return view("/admin/a_login");
    }

    public function postLogin(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=> 'required',
        ]);

        $credentials= $request->only('email','password');

        if(auth()->attempt($credentials)&&auth()->user()->is_admin){
            return redirect()->route('dashboard')->with('success','Login Successful');
        }else{
            return redirect()->back()->with('error','Invalid Credentials');
        }

        // $validated = auth()->attempt([
        //     'email'=> $request->email,
        //     'password'=> $request->password,
        //     'is_admin'=> 1,
        // ], $request->password);

        // if($validated){
        //     return redirect()->route('dashboard')->with('success','Login Successful');
        // }else{
        //     return redirect()->back()->with('error','Invalid Credentials');
        // }
    }

    public function login(Request $request){

        $credentials = $request->validate([]);
    }


}
