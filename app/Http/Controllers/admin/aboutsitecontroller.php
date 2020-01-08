<?php

namespace App\Http\Controllers\admin;
use App\aboutsite;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;

class aboutsitecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = aboutsite::all();
        return view('admin.aboutsite.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aboutsite.create');
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
            'title' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000|image',
            'type' => 'required',
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
                if (!Storage::disk('public')->exists('storage/aboutsite'))
                {
                Storage::disk('public')->makeDirectory('storage/aboutsite');
                }
            //    
                $profile = Image::make($image)->resize(600,400)->save('my-image.jpg', 90);
                //$profile_file = $request->file('image');
                
                Storage::disk('public')->put('aboutsite/'.$imageName,$profile);
            } 
            
        
        else {
            $imageName = "default.png";
        }
        $post = new aboutsite();
        $post->title = $request->title;
        $post->type = $request->type;
        $post->image = $imageName;
        $post->body = $request->body;
        $post->save();


        Toastr()->info(':)', 'successfully post created', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = aboutsite::find($id);
        return view('admin.aboutsite.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = aboutsite::find($id);
        return view('admin.aboutsite.edit',compact('post'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000|image',
            'type' => 'required',
            'body' => 'required',
        ]);
        $image = $request->file('image');
        $post = aboutsite::find($id);
        function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }

        $slug = make_slug($request->title);
        
            if (isset($image))
            {
            
            
            if(Storage::disk('public')->exists('storage/'.$post->image))
            {
                Storage::disk('public')->delete('storage/'.$post->image);
            }

                $currentDate = Carbon::now()->toDateString();

                $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                if (!Storage::disk('public')->exists('storage/aboutsite'))
                {
                Storage::disk('public')->makeDirectory('storage/aboutsite');
                }

            

                $profile = Image::make($image)->resize(600,400)->save('my-image.jpg', 90);
                //$profile_file = $request->file('image');
                
                Storage::disk('public')->put('aboutsite/'.$imageName,$profile);
            } 
            
        
        else {
            $imageName = "default.png";
        }
        
        $post->title = $request->title;
        $post->type = $request->type;
        $post->image = $imageName;
        $post->body = $request->body;
        $post->save();


        Toastr()->info(':)', 'successfully post Update', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = aboutsite::find($id);
        if (Storage::disk('public')->exists('post/'.$post->image))
        {
            Storage::disk('public')->delete('post/'.$post->image);
        }
        $post->delete();
        Toastr()->info(':)', 'Post Deleted Successfully ', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
