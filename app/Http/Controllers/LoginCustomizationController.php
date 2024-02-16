<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoginCustomization;


class LoginCustomizationController extends Controller
{
    // public function 

    public function loginCustomization()
    {
        $customization = LoginCustomization::first();
        // dd($customization);
        return view('admin.editable.login_customization_form', compact('customization'));
    }

    public function loginCustomUpdate(Request $request)
    {
        $customization = LoginCustomization::first();
        $customization->login_box_color = $request->input('login_box_color');
        $customization->save();

        return redirect()->back()->with('success','Login Box Color Changed Successfully.');
    }

}
