<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth from the correct namespace

class ProfileController extends Controller
{
    public function updateProfile(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=> 'required|unique:users|email',
            'password'=>'required|min:4|'

        ]);

        $user = Auth::user(); // Use Auth from the correct namespace

        $user->name = $request->input('name');

        

        if ($request->hasFile('profile')) {
            $profileImage = $request->file('profile');
            $profileImageName = time() . '_' . $profileImage->getClientOriginalName();
            $profileImagePath = $profileImage->storeAs('profile_images', $profileImageName, 'public');

            // Update profile picture path
            $user->img = $profileImagePath;
            
        }

        // $user->save();
        return redirect()->back()->with('success','Profile Updated Successfully');

    }
}
