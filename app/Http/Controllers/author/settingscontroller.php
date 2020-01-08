<?php

namespace App\Http\Controllers\author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;



class settingscontroller extends Controller
{
    public function index(){
        return view('author.settings');
    }
    public function updateProfile(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'required|image',
        ]);
        
        $image = $request->file('image');

        function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }

        $slug = make_slug($request->name);

        $user = User::findOrFail(Auth::id());

        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();

            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('profile'))
            {
             Storage::disk('public')->makeDirectory('profile');
            }
//            Delete old image form profile folder
            if (Storage::disk('public')->exists('profile/'.$user->image))
            {
                Storage::disk('public')->delete('profile/'.$user->image);
            }
            $profile = Image::make($image)->resize(500,500)->save('my-image.jpg', 90);
            //$profile_file = $request->file('image');
            Storage::disk('public')->put('profile/'.$imageName,$profile);
        } else {
            $imageName = $user->image;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = $imageName;
        $user->about_job = $request->about;
        $user->save();
        Toastr()->info(':)', 'Profile Successfully Updated', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
    public function updatePassword(Request $request)
    {
        $this->validate($request,[
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password,$hashedPassword))
        {
            if (!Hash::check($request->password,$hashedPassword))
            {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Toastr()->info(':)', 'password Successfully Updated', ["positionClass" => "toast-top-right"]);
                Auth::logout();
                return redirect()->back();
            } else {
                Toastr()->Error(':)', 'New password cannot be the same as old password.', ["positionClass" => "toast-top-right"]);

                return redirect()->back();
            }
        } else {
            Toastr()->Error(':)', 'Current password not match.', ["positionClass" => "toast-top-right"]);
            
            return redirect()->back();
        }
    }
}
