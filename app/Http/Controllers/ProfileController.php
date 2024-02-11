<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'old_password' => $request->filled('new_password') ? 'required|string' : '',
            'password' => 'nullable|string|min:4|different:old_password',
            'image_data' => 'nullable|image',
        ]);

        $user = Auth::user();


        if ($request->filled('old_password') && !Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('error', 'Incorrect Old Password');
        }

        // Update the user's name if it's provided
        if ($request->filled('name')) {
            $user->name = $request->name;
        }


        //Update password
        if ($request->filled('new_password')) {
            $user->password = Hash::make($request->new_password);
        }

        if ($user->image_data && $request->hasFile('image_data')) {
            $oldImageData = public_path('uploads/profile/') . $user->image_data;
            if (file_exists($oldImageData)) {
                unlink($oldImageData);
            }
            //update image
            if ($request->hasFile('image_data')) {
                $image = $request->file('image_data');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/profile/'), $imageName);
                $user->image_data = $imageName;
            }
        }

        // dd($user->name);


        /** @var \App\Models\User $user  */
        $user->save();

        return redirect()->back()->with('success', 'Profile updated');
    }
}
