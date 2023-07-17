<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Newsletter;
use App\Models\Subscriber;

class SendEmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function send(\App\Models\Subscriber $subscriber) 
    {
        return view('email/send', ['subscriber' => $subscriber]);
    }

    public function sendOne(\App\Models\Subscriber $subscriber) 
    {
        $email = $subscriber->email;
        $requestData = request()->validate([
            'subject' => 'required',
            'body'=> 'required'
        ]);

        Mail::to($email)->send(new Newsletter($email, $requestData['subject'], $requestData['body'] ));
        return redirect('/admin');
    }

    public function sendAllView() 
    {
        return view('email/send-all');
    }

    public function sendAll(Request $request) 
    {
        $requestData = request()->validate([
            'subject' => 'required',
            'body'=> 'required'
        ]);
        $emails = Subscriber::pluck('email');
        foreach ($emails as $email) {
            Mail::to($email)->send(new Newsletter($email, $requestData['subject'], $requestData['body'] ));
        }
        return redirect('/admin');
    }
}
