<?php

namespace App\Http\Controllers\admin;

use App\User;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class authorcontroller extends Controller
{
    public function index()
    {
       $authors = User::authors()
           ->withCount('posts')
           ->withCount('favorite_posts')
           ->get();
       return view('admin.authors.index',compact('authors'));
    }
    public function show($id){
        $user = user::find($id);
        return view('admin.authors.show',compact('user'));
    }
    public function destroy($id)
    {
        $author = User::findOrFail($id)->delete();
        Toastr::success('Author Successfully Deleted','Success');
        return redirect()->back();
    }
    public function pending()
    {
        $authors = User::where('role_id',3)->get();
      return view('admin.authors.pending',compact('authors'));
    }
    public function active($id){

        $author = User::findOrFail($id);
         return view('admin.authors.edit',compact('author'));
    }
    public function update(Request $request, $id){

        $request->validate([
            'fee_type' => 'required',
            'role_id' => 'required',
            'bank_number' => 'required',
            'bank_trxid' => 'required',
            'authname' => 'required'
        ]);
        $user = User::findOrFail($id);
        
        $fee_number = $request->bank_number.'-'.$request->bank_trxid;

        if( $user->bank_name == $request->fee_type && $user->fee_number == $fee_number ) {

            $user->role_id = $request->role_id;

            $user->approve_by = $request->authname;

            Toastr()->info(':)', 'successfully Member active', ["positionClass" => "toast-top-right"]);
            $user ->save();
            return redirect()->back(); 
        }else{
            
            Toastr()->info(':)', 'fild are not match', ["positionClass" => "toast-top-right"]);
            return redirect()->back();     
        }



    }
}
