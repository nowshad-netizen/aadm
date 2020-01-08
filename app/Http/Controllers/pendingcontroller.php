<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use Illuminate\Http\Request;

class pendingcontroller extends Controller
{
    public function index(){
   
       $data = auth::user();

        return view('home',compact('data'));
      
    }
    public function store(Request $request){
        
        $request->validate([
            'fee_type' => 'required',
            'bank_number' => 'required',
            'bank_trxid' => 'required',
            
        ]);
         
        $user = User::findOrFail(Auth::id());
        $fee_number = $request->bank_number.'-'.$request->bank_trxid;
        $currentDate = Carbon::now()->toDateString();

        ///fee_number
        $user->bank_name = $request->fee_type;
        $user->fee_number = $fee_number;
        $user->payment_date = $currentDate;
        $user ->save();
        
        return redirect()->back();          

        
    }
}
