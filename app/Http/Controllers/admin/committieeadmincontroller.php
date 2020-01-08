<?php

namespace App\Http\Controllers\admin;

use App\committee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;

class committieeadmincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = committee::all();
        return view('admin.committee.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.committee.create');
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
            'name'=> 'required',
            'title' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000|image',
            'type' => 'required',
            'about' => 'required',
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
                if (!Storage::disk('public')->exists('storage/member'))
                {
                Storage::disk('public')->makeDirectory('storage/member');
                }
            //    
                $profile = Image::make($image)->resize(600,400)->save('my-image.jpg', 90);
                //$profile_file = $request->file('image');
                
                Storage::disk('public')->put('member/'.$imageName,$profile);
            } 
            
        
        else {
            $imageName = "default.png";
        }
        $post = new committee();
        $post->name = $request->name;
        $post->title = $request->title;
        $post->type = $request->type;
        $post->image = $imageName;
        $post->about = $request->about;
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
        $user = committee::find($id);
        return view('admin.committee.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = committee::find($id);
        return view('admin.committee.edit',compact('user'));
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
            'name'=> 'required',
            'title' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000|image',
            'type' => 'required',
            'about' => 'required',
        ]);
        $image = $request->file('image');
        $post = committee::find($id);
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
        $post->name = $request->name;
        $post->title = $request->title;
        $post->type = $request->type;
        $post->image = $imageName;
        $post->about = $request->about;
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
        $post = committee::find($id);
        if (Storage::disk('public')->exists('post/'.$post->image))
        {
            Storage::disk('public')->delete('post/'.$post->image);
        }
        $post->delete();
        Toastr()->info(':)', 'Post Deleted Successfully ', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
