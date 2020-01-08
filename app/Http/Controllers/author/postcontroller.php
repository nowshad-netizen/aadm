<?php

namespace App\Http\Controllers\author;

use App\Http\Controllers\Controller;
use App\post;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use App\category;
Use App\tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewAuthorPost;

use Illuminate\Support\Facades\Storage;

class postcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = auth::user()->posts()->latest()->get();
        return view('author.post.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        $tags =tag::all();
        
        return view('author.post.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|unique:posts|max:255',
            'image' => 'required|image',
            'categories' => 'required',
            'tags' => 'required',
            'body' => 'required',
        ]);
        $image = $request->file('image');

        function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }

        $slug = make_slug($request->title);
        
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('storage/post'))
            {
                Storage::disk('public')->makeDirectory('storage/post');
            }
           // $postImage = Image::make($image)->resize(1600,1066)->save();
           $image->move(public_path('storage/post'), $imageName);
            //Storage::disk('public')->put('post/'.$imageName,$image);
        } else {
            $imageName = "default.png";
        }
        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->image = $imageName;
        $post->body = $request->body;
        if(isset($request->status))
        {
            $post->status = true;
        }else {
            $post->status = false;
        }
        $post->is_approved = false;
        $post->save();
        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);

        $users = User::where('role_id','1')->get();
        Notification::send($users, new NewAuthorPost($post));

        Toastr()->info(':)', 'successfully post created', ["positionClass" => "toast-top-right"]);
        return redirect()->route('author.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        if($post->user_id != auth::id() ){
            Toastr()->error(':(', 'Wrong URL ', ["positionClass" => "toast-top-right"]);
        }
        return view('author.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        if($post->user_id != auth::id() ){
            Toastr()->error(':(', 'Wrong URL ', ["positionClass" => "toast-top-right"]);
        }
        $categories = category::all();
        $tags = tag::all();
        return view('author.post.edit',compact('post','categories','tags','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        if($post->user_id != auth::id() ){
            Toastr()->error(':(', 'Wrong URL ', ["positionClass" => "toast-top-right"]);
        }

        $this->validate($request,[
            'title' => 'required',
            'image' => 'image',
            'categories' => 'required',
            'tags' => 'required',
            'body' => 'required',
        ]);
        $image = $request->file('image');

        function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }

        $slug = make_slug($request->title);

        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('post'))
            {
                Storage::disk('public')->makeDirectory('post');
            }
//            delete old post image
            if(Storage::disk('public')->exists('post/'.$post->image))
            {
                Storage::disk('public')->delete('post/'.$post->image);
            }
            $postImage = $image;
            $image->move(public_path('storage/post'), $imageName);
           // Storage::disk('public')->put('post/'.$imageName,$postImage);
        } else {
            $imageName = $post->image;
        }
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->image = $imageName;
        $post->body = $request->body;
        if(isset($request->status))
        {
            $post->status = true;
        }else {
            $post->status = false;
        }
        $post->is_approved = false;
        $post->save();
        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);
        Toastr()->info(':)', 'Post Successfully Updated', ["positionClass" => "toast-top-right"]);
       
        return redirect()->route('author.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        if($post->user_id != auth::id() ){
            Toastr()->error(':(', 'Wrong URL ', ["positionClass" => "toast-top-right"]);
        }

        if (Storage::disk('public')->exists('post/'.$post->image))
        {
            Storage::disk('public')->delete('post/'.$post->image);
        }
        $post->categories()->detach();
        $post->tags()->detach();
        $post->delete();
        Toastr()->info(':)', 'Post Deleted Successfully ', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
