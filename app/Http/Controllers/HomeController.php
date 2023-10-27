<?php

namespace App\Http\Controllers;

use App\Mail\Notification;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function testMail(Request $request)
    {
        if (!empty($request->email)) {
            try {
                //       Mail::to($request->email)->send("test email");

                $to = "$request->email";
                $subject = "This is subject";

                $message = "<b>This is HTML message.</b>";
                $message .= "<h1>This is headline.</h1>";

                $header = "From:no-reply@cometicfinancegroup.co.uk \r\n";
                $header .= "MIME-Version: 1.0\r\n";
                $header .= "Content-type: text/html\r\n";

                $retval = mail($to, $subject, $message, $header);



                var_dump("send", $request->email, $to, $subject, $message, $header);
            } catch (Exception $e) {
                //Email sent failed.
                var_dump("not send");
            }
        }
    }
}
