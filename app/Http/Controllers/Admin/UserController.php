<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Upload;
use App\Http\Controllers\Controller;
use App\Models\Information;
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

    public function document(){

        $uploads= Upload::all();
        $data=[
            'title'=> 'Uploads',
            'uploads'=> $uploads
        ];


        return view('admin.users.document',$data);
    }

    public function viewAllDocuments(){
       $documents = Upload::wherenotNull('document')->with('user')->with('item')->get();

       return view('admin.users.document', compact('documents'));
    }

    public function viewDocument($document){

        // dd($document);
        // $upload = Upload::findOrFail($document);
        $upload = Upload::where('document', $document)->first();

        if($upload->document){
            $fileName = $upload->document;
            $filePath = public_path('uploads/document/' .$fileName);

            if(file_exists($filePath)){
                $headers=[
                    'Content-Type' => 'application/pdf',
                    'Content_Disposition' => 'attachment; filename ="' .$fileName .'"',
                ];
                return response()->file($filePath, $headers);
            }else{
                return redirect()->back()->with('error','Document Not Found');
            }
        }else {
            return redirect()->back()->with('error','File does not exist in Database');
        }

       
    }

}
