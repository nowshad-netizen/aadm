<?php

namespace App\Http\Controllers\author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class authorDeshboardController extends Controller
{
    public function index(){
        return view('author.deshboard');
    }
}
