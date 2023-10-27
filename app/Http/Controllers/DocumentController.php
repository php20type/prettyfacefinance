<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use App\Clinic;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Documents = Document::all();

        return view('clinics.documents', compact($Documents));
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
        $description = $request->get('description');
        $path = $request->get('path');
        $clinic_id = $request->get('clinic_id');
        $type = $request->get('type');
        $expiry_date = $request->get('expiry_date');

        $Document = Document::create([
            "description" => $description,
            "path" => '',
            "clinic_id" => $clinic_id,
            "expiry_date" => date('Y-m-d', strtotime($expiry_date)),
            'type' => $type
        ]);

        // If image is present, save it and update it in the database table
        if ($request->file('path')) {
            $file = $request->file('path');
            $fileExtension = $file->getClientOriginalExtension();
            $filePath = '/img/Documents/' . $clinic_id . "/" . $Document->id . "." . $fileExtension;

            // Save Image
            $file->move(
                base_path() . '/public/img/Documents/' . $clinic_id . "/",
                $Document->id . "." . $fileExtension
            );

            // Update database table
            // Update database table
            $Document->path = $filePath;
            $Document->save();
        }



        return redirect('clinics/' . $clinic_id . '/documents');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Document  $Document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $Document)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document  $Document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $Document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Document  $Document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $Document = Document::find($request->id);
        $request['expiry_date'] = $request->expiry_date ? date('Y-m-d', strtotime($request->expiry_date)) : null;
        $Document->update($request->except('id', '_token', '_method', 'id'));

        $request->session()->flash('alert-success', 'Document has been successfully edited.');
        return redirect('clinics/' . $Document->clinic_id . '/documents');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $Document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $Document)
    {
        //
    }

    public function getClinicDocuments($clinic_id)
    {
        $Documents = Document::where('clinic_id', $clinic_id)->get();

        $data = [
            "Documents" => $Documents,
            "clinic_id" => $clinic_id
        ];

        return view('clinics.documents')->with($data);
    }
}
