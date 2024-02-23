<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\cc;
use App\Models\Upload;
use App\Models\EducationOption;


class InformationController extends Controller
{
    public function create()
    {
        $educationOptions = EducationOption::all();
        return view('create', compact('educationOptions'));
    }

    public function vehicleComponent(){
        $cc = cc::all();
        return view('users.biodata', compact('cc'));
    }

    public function vehicleReg(Request $request){}
    public function toggleCreate(){
        $createVisible = session('create_visible', true);
        session(['create_visible'=>!$createVisible]);

        return redirect()->back();
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

        //file upload
        if ($request->hasFile('document')) {
            $file = $request->file('document');

            $fileName = time().'.'.$file->getClientOriginalName();
            $file->move(public_path('uploads/document/'), $fileName);
            $model->document = $fileName;   
        }else{
            $model->document = null;
        }

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



    public function update(Request $request, $uid)
    {

        $upload = Upload::where('uid', $uid)->first();

        $upload->name = $request->input('name');
        $upload->email = $request->input('email');
        $upload->status = $request->status ? true : false;
        $upload->education = $request->input('education');

        if($request->hasFile('document')){
            $file = $request->file('document');

            if($upload->document){
                unlink(public_path('uploads/document/'. $upload->document));
            }

            $file= $request->file('document');
            $fileName= time().'.'.$file->getClientOriginalName();
            $file->move(public_path('uploads/document/'), $fileName);
            $upload->document = $fileName;
            
        }

        $success = $upload->save();
        if ($success) {
            return redirect('home');
        }
    }
    public function delete($uid)
    {
        $model = Information::where('uid', $uid)->first();

        if ($model) {

            if($model->document){
                $filePath = public_path('uploads/document/' .$model->document);
                if(file_exists($filePath)){
                    unlink($filePath);
                }
            }

            $model->delete();
            return redirect()->route('home')->with('success', 'Record deleted Successfully.');
        } else {
            return redirect()->route('home')->with('error', 'Error: Record not Found.');
        }
    }

    public function download($uid)
    {
        $model = Information::findOrFail($uid);

        if($model->document){
            $fileName= $model->document;
            $filePath = public_path('uploads/document/' .$fileName);

            if(file_exists($filePath)){
                $headers=[
                'Content-Type' => 'application/pdf',
                'Content_Disposition' => 'attachment; filename ="' .$fileName .'"',
                ];

                return response()->file($filePath, $headers);

            } else{
                return redirect()->back()->with('error','File Not Found');
            }
        }else {
            return redirect()->back()->with('error','File Not Found in the Database');
        }
    }
}
