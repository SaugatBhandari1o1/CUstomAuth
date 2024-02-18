<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EducationOption;
use Illuminate\Support\Facades\Redirect;
class EducationOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educationOptions = EducationOption::all();
        return view('admin.education-options.index', compact('educationOptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.education-options.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'value' => 'required|unique:education-options',
            'label'=> 'required',
            'hidden' =>'boolean',
        ]);

        $educationOption = EducationOption::create($validatedData);

        toastr()->success('Education Option Added Successfully.');
        return Redirect::route('education-options.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $educationOption = EducationOption::findOrFail($id);

        //Toggle Hidden options

        $educationOption->hidden = !$educationOption->hidden;
        $educationOption->save();

        $message = $educationOption->hidden ? 'Education Options Hidden.' : 'Education Options Visible.';

        flash()->addSuccess($message);
        return Redirect::route('education-options.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $educationOption = EducationOption::findOrFail($id);

        $educationOption->delete();

        flash()->addWarning('Education Option deleted successfully.');

        return Redirect::route('education-options.index');
    }
}
