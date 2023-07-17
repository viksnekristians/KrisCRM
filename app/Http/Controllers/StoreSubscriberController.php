<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use Exception;

class StoreSubscriberController extends Controller
{
    public function store(Request $request) {
        $data = $request->validate([
            'email' =>'required',
            'gender' => 'required',
            'birthday' => 'required'
        ]); 
        
        try {
            Subscriber::create([
                'email' => $data['email'],
                'gender' => $data['gender'],
                'birthday' => $data['birthday']
            ]);
            return redirect()->back()->with('success_message', 'Successfully subscribed to our site! :)');
        } catch (Exception $e) {
            return redirect()->back()->with('error_message', 'Error while saving subscriber! Maybe you have already subscribed?');
        }
    }
}
