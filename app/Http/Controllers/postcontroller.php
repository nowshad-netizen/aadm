<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class postcontroller extends Controller
{
    public function index()
    { 
        $category = Category::all();
        $post = Post::latest()->approved()->published()->paginate(6);
        return view('posts',compact('post','category'));
    }
    public function details($slug)
    {
        $post = Post::where('slug',$slug)->orwhere('is_approved', 0)->first();

        $randomposts = Post::latest()->take(3)->inRandomOrder()->get();
        return view('post',compact('post','randomposts'));
    }
    public function postByCategory($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $posts = Category::where('slug',$slug)->first()->posts;
        
        // $posts = $category->posts()->approved()->published()->paginate(6);
        
        return view('category',compact('category','posts'));
    }
    public function postByTag($slug)
    {
        $tag = Tag::where('slug',$slug)->first();

        $posts = $tag->posts()->approved()->published()->get();
        
        return view('tag',compact('tag','posts'));
    }
    public function PostController(){
        $category = Category::where('slug',$slug)->first();
        $posts = $category->posts()->approved()->published()->get();
        return view('category',compact('category','posts'));
    }
}
