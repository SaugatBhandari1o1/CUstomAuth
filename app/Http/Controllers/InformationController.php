<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Upload;

class InformationController extends Controller
{
    public function create()
    {
        return view("create");
    }
    public function profile()
    {
        return view("profile");
    }



    public function store(Request $request)
    {

        $user_id = Auth::id();


        $model = new Information();

        $model->user_id = $user_id;
        $model->name = $request->name;
        $model->email = $request->email;
        $model->status = $request->status ? true : false;
        $model->education = $request->education;

        $success = $model->save();
        if ($success) {
            return redirect('home');
        }
    }



    public function edit($uid)
    {
        // $data = Information::where('uid',$uid)->first();

        $upload = Upload::where('uid', $uid)->first();
        // dd($upload);
        return view('edit', compact('upload'));
    }



    public function update(Request $request, $uid){

        $upload = Upload::where('uid', $uid )->first();

        $upload->name = $request->input('name');
        $upload->email = $request->input('email');
        $upload->status = $request->status ? true : false;
        $upload->education = $request->input('education');

        $success = $upload->save();
        if ($success) {
            return redirect('home');
        }
    }
    public function delete($uid)
    {
        $model = Information::where('uid', $uid)->first();

        if ($model) {
            $model->delete();
            return redirect()->route('home')->with('success', 'Record deleted Successfully.');
        } else {
            return redirect()->route('home')->with('error', 'Error: Record not Found.');
        }
    }
}
