<?php

namespace App\Http\Controllers;

use App\Qualification;
use Illuminate\Http\Request;
use App\Clinic;
use App\Message;

class QualificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qualifications = Qualification::all();

        return view('clinics.qualifications', compact($qualifications));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $description = $request->get('description');
        $path = $request->get('path');
        $clinic_id = $request->get('clinic_id');

        $qualification = Qualification::create([
            "name" => $name,
            "description" => $description,
            "path" => '',
            "clinic_id" => $clinic_id
        ]);

        // If image is present, save it and update it in the database table
        if ($request->file('path')) {
            $file = $request->file('path');
            $fileExtension = $file->getClientOriginalExtension();
            $filePath = '/img/qualifications/' . $clinic_id . "/" . $qualification->id . "." . $fileExtension;

            // Save Image
            $file->move(
                base_path() . '/public/img/qualifications/' . $clinic_id . "/", $qualification->id . "." . $fileExtension
            );

            // Update database table
            // Update database table
            $qualification->path = $filePath;
            $qualification->save();
        }

        $clinic = Clinic::where('id', $clinic_id)->first();

        Message::create([
            'text' => $clinic->name . " has added a new qualification.",
            'user_id' => 1,
            'read' => 0
        ]);

        return redirect('/clinics/' . $clinic_id . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function show(Qualification $qualification)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function edit(Qualification $qualification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Qualification $qualification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $qualification = Qualification::Find($id);

        $clinic = Clinic::where('id', $qualification->clinic_id)->first();

        $qualification->delete();


        Message::create([
            'text' => $clinic->name . " has deleted a qualification.",
            'user_id' => 1,
            'read' => 0
        ]);

        return redirect()->back();
    }

    public function getClinicQualifications($clinic_id){
        $qualifications = Qualification::where('clinic_id', $clinic_id)->get();

        $data = [
            "qualifications" => $qualifications,
            "clinic_id" => $clinic_id
        ];

        return view('clinics.qualifications')->with($data);
    }
}
