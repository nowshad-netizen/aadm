<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\subscriber;

class subscribercontroller extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::latest()->get();
        return view('admin.subscriber',compact('subscribers'));
    }
    public function destroy($subscriber)
    {
        $subscriber = Subscriber::findOrFail($subscriber);
        $subscriber->delete();
        Toastr()->info(':)', 'Subscriber Email Deleted ', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
