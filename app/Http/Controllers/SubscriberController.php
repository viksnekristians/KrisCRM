<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use Exception;

class SubscriberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(\App\Models\Subscriber $subscriber) {
        return view('/subscriber/show', compact('subscriber'));
    }

    public function delete(\App\Models\Subscriber $subscriber) {
        $subscriber->delete();
        return redirect('/admin/manage');
    }

    public function massDelete() {
        $string_ids = request()->input('delete-checkbox');
        if (isset($string_ids)) {
            $ids = array_map('intval', $string_ids);
            try {
                Subscriber::whereIn('id', $ids)->delete();
                return redirect()->back()->with('success_message', "Subscribers deleted successfully");
            } catch (Exception $e) {
                return redirect()->back()->with('error_message', "Error while deleting subscribers");
            }
        }
        return redirect()->back()->with('error_message', "No subscribers selected!");
    }


}
