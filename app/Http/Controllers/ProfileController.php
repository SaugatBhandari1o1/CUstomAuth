<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use UpdateProfileRequest; 

class ProfileController extends Controller
{
    public function update(Request $request){
        // dd($request->all());

        $request->validate([
            'name' => 'required',
            'old_password' => $request->filled('password') ? 'required|string' : '',
            'password' => 'nullable|string|min:4|different:old_password',
            'image_data' => 'required|image',
        ]);

        $user=Auth::user();
        
        if ($request->filled('old_password') && !Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('error', 'Incorrect Old Password');
        }
    
        $userData = ['name'=>$request->name];

        if($request->hasFile('image_data')){
            $profile=$request->file('image_data');
            $profileName = time().'.'.$profile->getClientOriginalExtension();
            $profile->move(public_path('uploads/'),$profileName);
            $userData['image_data'] = $profileName;
        }
        /** @var \App\Models\User $user */

        $user->update($userData);
    
        return redirect()->back()->with('success','profile');
    
        
    }
    
}