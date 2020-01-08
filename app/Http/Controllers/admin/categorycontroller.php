<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\category;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class categorycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cata  = category::latest()->get();
        return view('admin.category.index',compact('cata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000|image'
        ]);
            $image = $request->file('image');

           // $slug = Str::slug($request->name);
            function make_slug($string) {
                return preg_replace('/\s+/u', '-', trim($string));
            }
    
            $slug = make_slug($request->name);

        
            if(isset($image)){
                $time = Carbon::now();

                $slider=category::find($request->id);
                
                
            
                        $destinationPath = 'storage/images';
                        $ext = request()->file('image')->getClientOriginalExtension();
                        $file_name = uniqid().".".$ext;
                        request()->file('image')->move($destinationPath, $file_name);
                    
                $category = new category();
                $category->name = $request->name;
                $category->slug = $slug;
                $category->image = $file_name;
                $category->save();
                Toastr()->info(':)', 'successfully tag Updated', ["positionClass" => "toast-top-right"]);
                return redirect()->route('admin.category.index');
            }  
            $category = new category();
            $category->name = $request->name;
            $category->slug = $slug;
            $category->image = $slug;
            $category->save();
            Toastr()->info(':)', 'successfully tag Updated', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $category = category::find($id);
        
        return view('admin.category.edit',compact('category'));
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
            'name' => 'required',
            'image'=> 'image'
        ]);
        $category = category::find($id);
        $old_img =$category->image;
    
        if($request->hasFile('image')) {
           
           Storage::disk('public')->delete('storage/images'.$old_img);
            $image = $request->file('image');
            $filename = $old_img;
            
            $image->move(public_path('storage/images'), $filename);
            $category->image = $old_img;
            //$request->file('image')->getClientOriginalName()
        }
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->update();


        Toastr()->info(':)', 'successfully tag Updated', ["positionClass" => "toast-top-right"]);

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = category::find($id);
        

        if (Storage::disk('public')->exists('storage/images'.$cat))
        {
            Storage::disk('public')->delete('storage/images'.$cat);
            
            $cat->delete();
        return redirect()->route('admin.tag.index');
        }else{
            $cat->delete();
            Toastr()->info(':)', 'successfully deleted', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.category.index');
        }
    }
}
