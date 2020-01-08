<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\subscriber;
use Illuminate\Support\Facades\Storage;


class subscribercontroller extends Controller
{
    public function store(request $request){
        $request->validate([
            'name' => 'max:255',
            'email'=> 'email|unique:subscribers'
        ]);
        $sub = new subscriber;
        $sub->name = $request->name;
        $sub->email = $request->email;
        $sub->save();

        return 'you are subscribed our emalil list';

    }
}
