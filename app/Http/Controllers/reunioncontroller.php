<?php

namespace App\Http\Controllers;
use App\reunion;

use Illuminate\Http\Request;

class reunioncontroller extends Controller
{
    public function index(){

        return view('reunion');
    }
    public function store(Request $request){
        $this->validate($request,[
            'member_type' => 'required',
            'name' => 'required',
            'session' => 'required',
            'study' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'payment_type' => 'required',
            'payment_number' => 'required',
            'txid' => 'required',
            'payment_time' => 'required',
            'payment_Fee' => 'required',
            'spouse' => 'required',
            'kids' => 'required',
        ]);
dd($request);
        $data= new reunion;

        $data->member_type = $request->member_type;
        $data->name = $request->name;
        $data->session = $request->session;
        $data->study = $request->study;
        $data->mobile = $request->mobile;
        $data->email = $request->email;
        $data->payment_type = $request->payment_type;
        $data->txid = $request->txid;
        $data->payment_time = $request->payment_time;
        $data->payment_Fee = $request->payment_Fee;
        $data->spouse = $request->spouse;
        $data->kids = $request->kids;
        
        return back();
        
    }

}
