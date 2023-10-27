<?php

namespace App\Http\Controllers;

use App\Enquiry;
use Illuminate\Http\Request;
use App\Message;
use App\Mail\EnquiryNotification;
use App\Mail\EnquiryClinicNotification;
use Illuminate\Support\Facades\Mail;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function show(Enquiry $enquiry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function edit(Enquiry $enquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enquiry $enquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enquiry $enquiry)
    {
        //
    }

    public function saveClinicEnquiry(Request $request)
    {
        $enquiry = Enquiry::create($request->all());
        $request->session()->flash('status', 'Your message has been sent successfully.');

        Message::create([
            'text' => "A new <strong>Clinic</strong> enquiry has been submitted.",
            'user_id' => 1,
            'read' => 0
        ]);

        Mail::to('info@cosmeticfinancegroup.co.uk')
            ->send(new EnquiryClinicNotification($request));

        return redirect('/contact');
    }

    public function saveGeneralEnquiry(Request $request)
    {
        $enquiry = Enquiry::create($request->all());
        $request->session()->flash('status', 'Your message has been sent successfully.');

        Message::create([
            'text' => "A new <strong>General</strong> enquiry has been submitted.",
            'user_id' => 1,
            'read' => 0
        ]);



        Mail::to('info@cosmeticfinancegroup.co.uk')
            ->send(new EnquiryNotification($request));

        return redirect('/contact');
    }
}
