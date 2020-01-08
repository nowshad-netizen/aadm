<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\post;
use Illuminate\Http\Request;
Use App\category;
Use App\tag;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use App\Notifications\authorpostnotification;
use Intervention\Image\Facades\Image;

use App\Notifications\newpostnotify;

use App\subscriber;
class postcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = post::latest()->get();
        return view('admin.post.index',compact('post'));
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
        return view('admin.post.create',compact('categories','tags'));
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
            'image' => 'required',
            'categories' => 'required',
            'tags' => 'required',
            'body' => 'required',
        ]);
        $image = $request->file('image');

        function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }

        $slug = make_slug($request->title);
        
            if (isset($image))
            {
                $currentDate = Carbon::now()->toDateString();

                $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                if (!Storage::disk('public')->exists('storage/post'))
                {
                Storage::disk('public')->makeDirectory('storage/post');
                }
            //            Delete old image form profile folder
                if (Storage::disk('public')->exists('post/'))
                {
                    Storage::disk('public')->delete('post/');
                }
                $profile = Image::make($image)->resize(600,400)->save('my-image.jpg', 90);
                //$profile_file = $request->file('image');
                
                Storage::disk('public')->put('post/'.$imageName,$profile);
            } 
            
        
        else {
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
        $post->is_approved = true;
        $post->save();
        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);

        $subscribers = Subscriber::all();

        foreach ($subscribers as $subscriber)
        {
            Notification::route('mail',$subscriber->email)
                ->notify(new newpostnotify($post));
        }

        Toastr()->info(':)', 'successfully post created', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
    
        return view('admin.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        $categories = category::all();
        $tags = tag::all();
        return view('admin.post.edit',compact('post','categories','tags','post'));
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
        $post->is_approved = true;
        $post->save();
        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);
        Toastr()->info(':)', 'Post Successfully Updated', ["positionClass" => "toast-top-right"]);
       
        return redirect()->route('admin.post.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
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
    public function pending()
    {
        
        $post = Post::where('is_approved',false)->get();
        
        return view('admin.post.pending',compact('post'));
    }
    public function approval($id)
    {
        $post = Post::find($id);
        if ($post->is_approved == false)
        {
            $post->is_approved = true;
            $post->save();
            
            $post->user->notify(new authorpostnotification($post));

            $subscribers = Subscriber::all();
            foreach ($subscribers as $subscriber)
            {
                Notification::route('mail',$subscriber->email)
                    ->notify(new NewPostNotify($post));
            }
           
        } else {
            Toastr()->info(':)', 'This Post is already approved ', ["positionClass" => "toast-top-right"]);
         
        }
        return redirect()->back();
    }
}
