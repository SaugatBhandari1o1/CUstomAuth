<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth from the correct namespace

class ProfileController extends Controller
{
    public function updateProfile(Request $request){
        $request->validate([
            'name'=> 'required|string|max:255',
            'password'=>'required|string|min:4',
            'n_password'=>'nullable|string|min:4',
            'profile'=>'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $user = Auth::user(); // Use Auth from the correct namespace

        $user->name = $request->input('name');

        if($request->filled('n_password')){
            $user->password = bcrypt($request->input('n_password'));
        }

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
