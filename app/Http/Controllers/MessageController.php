<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Clinic;
use App\User;
use App\Mail\Notification;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Message::where('user_id', '1')->where('read', 0)->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.notifications',compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach($request->get('user_id') as $recipient){
            $message = Message::create([
                'read' => 0,
                'text' => $request->get('text'),
                'user_id' => $recipient
            ]);

            $user = Clinic::where('id', $recipient)->first();

            Mail::to($user->email)->send(new Notification());
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sendToUser(Request $request){
        dd($request->all());
    }

    public function read(Request $request){
        $message = Message::where('id', $request->get('message_id'))->first();
        $message->read = 1;
        $message->save();

        return redirect('/admin/notifications');
    }

    public function allRead(Request $request){
        $messages = Message::where('user_id', 1)->update(['read' => 1]);

        return redirect('/admin/notifications');
    }
}
