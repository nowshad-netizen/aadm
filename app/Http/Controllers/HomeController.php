<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slider;
use App\category;
use App\post;
use App\aboutsite;
use App\Tag;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $category = category::latest()->get()->take(3);
        $tag = tag::latest()->get()->take(3);
    
        $slider = slider::all();
        $about_card = aboutsite::where('type', '=', 'about_home')->latest()->get();
        $about_bm = aboutsite::where('type', '=', 'about_bm')->first();
        $president = aboutsite::where('type', '=', 'about_admin')->first();

        $post = post::where('is_approved', '=', 1)->latest()->get();
        
        return view('welcome',compact(['slider','category','post','about_card','about_bm','president','tag']));
       
    }
   public function contactus(){
    $about_card = aboutsite::where('type', '=', 'about_home')->latest()->take(1)->get();
    
       return view('contractus',compact('about_card'));
   } 

}
