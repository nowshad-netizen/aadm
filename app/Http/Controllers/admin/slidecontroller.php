<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\slider;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class slidecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide = slider::all();
        return view('admin.slider.index',compact('slide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            'title' => 'max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',

        ]);
        //|dimensions:max_width=1300,max_height=300
        function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }

        $slug = make_slug($request->title);
    

        if (request()->hasFile('image'))
        {
            $destinationPath = 'storage/slider';
            $ext = request()->file('image')->getClientOriginalExtension();
            $file_name = uniqid().".".$ext;
            $image = $request->file('image');

            $resize = Image::make($image)->resize(1200,400)->save('my-image.jpg', 90);

            Storage::disk('public')->put('slider/'.$file_name,$resize);

            // $resize->move($destinationPath, $file_name);
        }

        $post = new slider();
      
        $post->title = $request->title;
     
        $post->image = $file_name;

        $post->save();
        Toastr()->info(':)', 'Slide photo Successfully   ', ["positionClass" => "toast-top-right"]);
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

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = slider::find($id);
        return view('admin.slider.edit',compact('slider'));
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
        $request->validate([
            'title' => 'max:255',
            'image'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:max_width=1600,max_height=600'
        ]);
        $slider = slider::find($id);
         

        $currentDate = Carbon::now()->toDateString();

        $image =$request->image;

        
        if($request->hasFile('image')) {

           if (Storage::disk('public')->exists('slider/'.$slider->image))
             {
                    Storage::disk('public')->delete('slider/'.$slider->image);
                
            }
            $old_img  = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image = $request->file('image');
            $filename = $old_img;
            $image->move(public_path('storage/slider'), $filename);
            $slider->image = $old_img;
            //$request->file('image')->getClientOriginalName()
        }
        $slider->title = $request->title;
        $slider->update();


        Toastr()->info(':)', 'successfully slider Updated', ["positionClass" => "toast-top-right"]);

        return redirect()->route('admin.slider.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {
        $slider = slider::find($id);
        if (Storage::disk('public')->exists('slider/'.$slider->image))
        {
            Storage::disk('public')->delete('slider/'.$slider->image);
        }
        $slider->delete();
        Toastr()->info(':)', 'slide Deleted Successfully ', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
