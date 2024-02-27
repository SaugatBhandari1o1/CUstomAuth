<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vehicleCC;
use App\Models\CC;

class VehicleCCController extends Controller
{
    public function index()
    {
        // $vehicleCCs = vehicleCC::all();
        // return view('users.biodata', compact('vehicleCCs'));

        $data['vehicleCCs'] = vehicleCC::get(["label","id"]);
        return view('users.biodata', $data);
    }

    public function getCCs(Request $request)
    {
        // $vehicleLabel = $request->input('label');
        // $vehicleCC = vehicleCC::where('label', $vehicleLabel)->first();
        // // $ccs = CC::where('vehicle_cc_id', $vehicleCC->id)->get();

        // if (!$vehicleCC) {
        //     return response()->json(['error', 'Vehicle type not found'], 404);
        // }
        // $ccs = $vehicleCC->ccs;

        // return response()->json($ccs);

        $data['ccs'] = CC::where("vehicle_cc_id",$request->vehicle_cc_id)->get(["cc","id"]);
        return response()->json($data);
        
    }
    public function store(Request $request)
    {
        $request->validate([
            'vehicle_type_id' => 'required',
            'cc' => 'required',
        ]);

        CC::create([
            'cc' => $request->cc,
            'vehicle_cc_id' => $request->vehicle_type_id,
        ]);

        return redirect()->back()->with('success', 'Vehicle Data has been added successfully');
    }
}
