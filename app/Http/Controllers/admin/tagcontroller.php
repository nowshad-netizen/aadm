<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\tag;
use Illuminate\Support\Str;
use Brian2694\Toastr\ToastrServiceProvider;
class tagcontroller extends Controller
{
    public function index(){
        $tag = tag::latest()->get();
        return view('admin.tag.index',compact('tag'));
    }
    public function create(){
        return view('admin.tag.create');
    }
    public function store( Request $request){
    
        $validatedData = $request->validate([
            'name' => 'required|unique:tags|max:255',
        ]);
        function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }

        $slug = make_slug($request->name);


        $tag = new tag();
        $tag->name = $request->name;
        $tag->slug = $slug;
        $tag->save();
        Toastr()->info('successfully save tag', 'successfully save tag', ["positionClass" => "toast-top-right"]);

        return redirect()->route('admin.tag.index');
    }
    public function edit($id){

        $tag = tag::find($id);
        
        return view('admin.tag.edit',compact('tag'));

    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $tag = tag::find($id);

        function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }

        $slug = make_slug($request->name);

        $tag->name = $request->name;
        $tag->slug = $slug;
        $tag->update();

        Toastr()->info(':)', 'successfully tag Updated', ["positionClass" => "toast-top-right"]);

        return redirect()->route('admin.tag.index');

    }
    public function destroy($id){
        $tag = tag::find($id);
        $tag->delete();
        Toastr()->info(':)', 'successfully deleted', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.tag.index');
    }
}
