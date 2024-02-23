<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\vehicleCC;
use App\Models\cc;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;

class VehicleController extends Controller
{
    public function index()
    {
        $existingVehicleTypes = VehicleCC::pluck('vehicle_type')->toArray();
        $vehicleCC = VehicleCC::all();
        return view('admin.control.vehicle', compact('existingVehicleTypes', 'vehicleCC'));
    }

    public function cc(){
        // $existingVehicleTypes = VehicleCC::pluck('vehicle_type')->toArray();
        // $vehicleCC = VehicleCC::all();
        // return view('admin.control.cc', compact('existingVehicleTypes','vehicleCC'));

        $existingVehicleTypes = VehicleCC::all();
        return view('admin.control.cc',compact('existingVehicleTypes'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'vehicle_type' => 'required|unique:vehicle_cc,vehicle_type',
            'label' => 'required|unique:vehicle_cc,label',
        ]);

        VehicleCC::create([
            'vehicle_type' => $request->vehicle_type,
            'label' => $request->label,
        ]);

        return redirect()->route('vehicle-options.index')->with('success', 'Vehicle Type added successfully');
    }

    public function create(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'vehicle_type_select' => 'required',
            'cc' => 'required|unique:cc,cc',
        ]);

        $vehicle_type_id = $request->vehicle_type_select;

        $vehicleType = vehicleCC::findOrFail($vehicle_type_id);

        CC::create([
            'cc' => $request->cc,
            'vehicle_cc_id' => $vehicleType->id,
        ]);


        // return redirect()->route('vehicle-options.index')->with('success','CC data has been added');
        return redirect()->route('vehicle-options.cc')->with('success', 'CC data has been added');
    }
}
