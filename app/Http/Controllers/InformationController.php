<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{
    public function create(){
        return view("create");
    }
    public function store(Request $request){

        $user_id = Auth::id();


        $model = new Information();

        $model->user_id = $user_id;
        $model->name = $request->name;
        $model->email = $request->email;
        $model->status = $request->status? true: false;
        $model->education = $request->education;

        $success = $model->save();
        if($success){
            return redirect('home');
        }
    }
}
