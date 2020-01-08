<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo ;

    protected function redirectTo()
    {
        // if(auth::check() && auth::user()->role->id == 3 ){

            
        // }elseif(auth::check() && auth::user()->role->id == 1){
            
        //     return 'admin/dashboard';
            
        // }elseif(auth::check() && auth::user()->role->id == 2){
            
        //     return 'author/dashboard';
        // }
        return 'pending';
        

    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:100'],
            'bname' => ['required', 'string', 'max:255'],
            'f_name' => ['required', 'string', 'max:60 '],
            'm_name' => ['required', 'string', 'max:60 '],
            'present_address' => ['required', 'string', 'max:250 '],
            'permanent_address' => ['nullable', 'string', 'max:255 '],
            'dob' => ['required', 'string', 'max:255 ','date_format:Y-m-d'],
            'religion' => ['required', 'string', 'max:255'],
            'blood' => ['nullable', 'string', 'max:45'],
            'passed' => ['required', 'string', 'max:15'],
            'hon_session' => ['nullable', 'string', 'max:30'],
            'masters_session' => ['nullable', 'string', 'max:30'],
            'about_job' => ['nullable', 'string', 'max:255'],
            'number' => ['required', 'string','numeric','min:11'],
            'fblink' => ['nullable', 'string', 'max:255'],
            'spous_name' => ['nullable', 'string', 'max:100'],
            'occupation' => ['nullable','string', 'max:100'],
            'number_of_kids' => ['nullable', 'numeric', 'max:100'],
            'interest' => ['nullable', 'string', 'max:255'],
            'image' =>['required','image',],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $image = $data['image'];


        function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }


        $slug = make_slug($data['name']);
        $currentDate = Carbon::now()->toDateString();

        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();

            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('profile'))
            {
             Storage::disk('public')->makeDirectory('profile');
            }
//            Delete old image form profile folder
            if (Storage::disk('public')->exists('profile/'.$data['image']))
            {
                Storage::disk('public')->delete('profile/'.$data['image']);
            }
            $profile = Image::make($image)->resize(500,500)->save('my-image.jpg', 90);
            //$profile_file = $request->file('image');
            Storage::disk('public')->put('profile/'.$imageName,$profile);
        } else {
            $imageName = $data['image'];
        }
        $currentDate = Carbon::now()->toDateString();
        $name_unique = $slug.'-'.$currentDate.'-'.uniqid();

        return User::create([
            'name' => $data['name'],
            'bname' => $data['bname'],
            'username' => $name_unique,
            'f_name' => $data['f_name'],
            'm_name' => $data['m_name'],
            'present_address' =>$data['present_address'], 
            'permanent_address' =>$data['permanent_address'], 
            'dob' =>$data['dob'], 
            'religion' => $data['religion'],
            'blood' =>$data['blood'], 
            'passed' => $data['passed'],
            'hon_session' =>$data['hon_session'],
            'masters_session' =>$data['masters_session'], 
            'about_job' =>$data['about_job'], 
            'number' =>$data['number'], 
            'fblink' => $data['fblink'],
            'spous_name' => $data['spous_name'],
            'occupation' =>$data['occupation'],
            'number_of_kids' => $data['number_of_kids'],
            'interest' =>$data['interest'],
            'image' => $imageName,
            'email' => $data['email'], 
            'password' => Hash::make($data['password']),
        ]);
    }
}
