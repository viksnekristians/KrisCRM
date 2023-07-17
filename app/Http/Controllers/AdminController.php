<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Exception;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    protected $redirectTo = '/admin/login';

    public function index() {
        $subscribers = Subscriber::latest()->get();
        if ($subscribers)
        $totalAge=0;
        $now = new \DateTime();
                /*$dob =  new \DateTime($request->input('birthday'));
        $now = new \DateTime();
        $diff = $now->diff($dob);
        var_dump($diff->y);*/
        foreach ($subscribers as $subscriber) {
            $dob = new \DateTime($subscriber->birthday);
            $diff = $now->diff($dob);
            $totalAge += $diff->y;
        }
        if ($subscribers->count() > 0) {
            $avgAge = round($totalAge / $subscribers->count());
        } else {
            $avgAge = 0;
        }
        return view('admin/index', compact('subscribers', 'avgAge'));
    }

    //return view with list of all subscribers and options to manage them
    public function manage() {
        $subscribers = Subscriber::latest()->paginate(2);
        return view('admin/manage', compact('subscribers'));
    }

    //return view with option to add another admin user
    public function create() {
        return view('admin/create');
    }

    //create enw admin user
    public function store(Request $request) {


       $data = $request->validate([
            'name' =>['required'],
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required'
        ]);
        if ($data['password'] === $data['password_confirmation']) {
            try {
                User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                ]);
                return redirect()->back()->with('success_message', 'New admin saved!');
            } catch (Exception $e) {
                return redirect()->back()->with('error_message', 'Error while saving user to database.');
            }

        } else {
            return redirect()->back()->with('error_message', 'Password incorrect');
        }
    }
}
