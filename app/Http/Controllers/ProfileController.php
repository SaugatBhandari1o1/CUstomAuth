<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ProfileController extends Controller
{
    public function updateProfile(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . Auth::id(),
            'old_password' => $request->filled('password') ? 'required|string' : '',
            'password' => 'nullable|string|min:4|different:old_password',
            'n_password' => 'required_with:password|same:password',
            'profile' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        // $user = Auth::user();
        $user = Auth::user();
        $user->name = $request->name;
    
        if ($request->filled('old_password') && !Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('error', 'Incorrect Old Password');
        }
    
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
    
        if ($request->hasFile('profile')) {
            {
                $file = $request->file('profile');
                $image = time().'.'.$file->getClientOriginalExtension();
                $destinationPath = 'public_path'('uploads/');
                $file->getClientOriginalName();
            }
            $user->img = $image;
    /** @var \App\Models\User $user **/
            $success = $user->save();
            if($success){
                return redirect()->route('profile');
            }


            // $profilePath = $request->file('profile')->store('profiles', 'public');
            // $user->img = $profilePath;
        }
        dd($user);
    /** @var \App\Models\User $user **/
        $user->save();
        return redirect()->back()->with('success', 'Profile Updated Successfully');
    }
    
}