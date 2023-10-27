<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Clinic;
use App\User;
use App\Mail\Notification;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendContactEmail(Request $request){
        //
    }

    public function sendClinicContactEmail(Request $request){
        //
    }
}
