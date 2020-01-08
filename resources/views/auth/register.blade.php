@extends('layouts.frontend.app')
@section('title')
   
@endsection


@section('containt')
<section class="login first grey">
    <div class="container">
        <div class="">				
            <div class="box box-border">
                <div class="box-body">
                    <h4 class="text-center">Register</h4>
                    <strong>
                        @foreach ($errors->all() as $error)
                        <ul>
                            <li>{{ $error }}</li>
                        </ul>    
                        @endforeach

                    </strong>
                     <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Type Your Full Name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                


                        <div class="form-group row">
                            <label for="bname" class="col-md-4 col-form-label text-md-right">Bangla Name</label>

                            <div class="col-md-6">
                                <input id="bname" type="text" class="form-control @error('bname') is-invalid @enderror" name="bname" value="{{ old('bname') }}" required autocomplete="bname" autofocus placeholder="Typr Your Full Name In Bangla">

                                @error('bname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Something is wrong with this field!</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="f_name" class="col-md-4 col-form-label text-md-right">Father's Name</label>

                            <div class="col-md-6">
                                <input id="f_name" type="text" class="form-control @error('f_name') is-invalid @enderror" name="f_name" value="{{ old('f_name') }}" required autocomplete="f_name" autofocus placeholder="Your Father Name">

                                @error('f_name')
                                    <span class="invalid-feedback" role="alert">
                                        Something is wrong with this field!
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="m_name" class="col-md-4 col-form-label text-md-right">Mother's Name</label>

                            <div class="col-md-6">
                                <input id="m_name" type="text" class="form-control @error('m_name') is-invalid @enderror" name="m_name" value="{{ old('m_name') }}" required autocomplete="m_name" autofocus placeholder="Type Your Mother Name">

                                @error('m_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong> Something is wrong with this field!</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="present_address" class="col-md-4 col-form-label text-md-right">Present Address</label>

                            <div class="col-md-6">
                                <input id="present_address" type="text" class="form-control @error('present_address') is-invalid @enderror" name="present_address" value="{{ old('present_address') }}" required autocomplete="present_address" autofocus placeholder="Your present Address">

                                @error('present_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong> Something is wrong with this field!</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Parmanent Address</label>

                            <div class="col-md-6">
                                <input id="permanent_address" type="text" class="form-control @error('permanent_address') is-invalid @enderror" name="permanent_address" value="{{ old('permanent_address') }}" required autocomplete="permanent_address" autofocus placeholder="Your Permanent Address">

                                @error('permanent_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">Date of Birth</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus placeholder="DD/MM/YYYY">

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong> Something is wrong with this field!</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="religion" class="col-md-4 col-form-label text-md-right">Religion</label>

                            <div class="col-md-6">
                                <input id="religion" type="text" class="form-control @error('religion') is-invalid @enderror" name="religion" value="{{ old('religion') }}" required autocomplete="religion" autofocus placeholder="Religion">

                                @error('religion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong> Something is wrong with this field!</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="blood" class="col-md-4 col-form-label text-md-right">Blood Group</label>

                            <div class="col-md-6">
                                    <select name="blood" type="text">
                                            <option value="Unknown ">Unknown</option>
                                            <option value="A Positive">A Positive</option>
                                            <option value="A Negative ">A Negative</option>
                                            <option value="A Unknown">A Unknown</option>
                                            <option value="B Positive ">B Positive</option>
                                            <option value="B Negative ">B Negative</option>
                                            <option value="B Unknown ">B Unknown</option>
                                            <option value="AB Positive ">AB Positive</option>
                                            <option value="AB Negative ">AB Negative</option>
                                            <option value="AB Unknown ">AB Unknown</option>
                                            <option value="O Positive ">O Positive</option>
                                            <option value="O Negative ">O Negative</option>
                                            <option value="O Unknown ">O Unknown</option>
                                    </select>
                                {{-- <input id="blood" type="text" class="form-control @error('blood') is-invalid @enderror" name="blood" value="{{ old('blood') }}" required autocomplete="name" autofocus placeholder="Your Blood Group"> --}}
                                @error('blood')
                                    <span class="invalid-feedback" role="alert">
                                        <strong> Something is wrong with this field!</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="passed" class="col-md-4 col-form-label text-md-right">Passed out Year</label>

                            <div class="col-md-6">
                                <input id="passed" type="text" class="form-control @error('passed') is-invalid @enderror" name="passed" value="{{ old('passed') }}" autocomplete="passed" autofocus placeholder="Passed out Year">

                                @error('passed')
                                    <span class="invalid-feedback" role="alert">
                                            <strong> Something is wrong with this field!</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hon_session" class="col-md-4 col-form-label text-md-right">Hons: Seesion</label>

                            <div class="col-md-6">
                                <input id="hon_session" type="text" class="form-control @error('hon_session') is-invalid @enderror" name="hon_session" value="{{ old('hon_session') }}" autocomplete="hon_session" autofocus placeholder="Honours Session ">

                                @error('hon_session')
                                    <span class="invalid-feedback" role="alert">
                                            <strong> Something is wrong with this field!</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="masters_session" class="col-md-4 col-form-label text-md-right">Masters : seesion</label>

                            <div class="col-md-6">
                                <input id="masters_session" type="text" placeholder="masters session" class="form-control @error('masters_session') is-invalid @enderror" name="masters_session" value="{{ old('masters_session') }}" autocomplete="masters_session" autofocus placeholder="Masters Session ">

                                @error('masters_session')
                                    <span class="invalid-feedback" role="alert">
                                            <strong> Something is wrong with this field!</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="about_job" class="col-md-4 col-form-label text-md-right">Job Description</label>

                            <div class="col-md-6">
                                <input id="about_job" type="text" placeholder="Job Description" class="form-control @error('about_job') is-invalid @enderror" name="about_job" value="{{ old('about_job') }}" autocomplete="about_job" autofocus>

                                @error('about_job')
                                    <span class="invalid-feedback" role="alert">
                                            <strong> Something is wrong with this field!</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">Contract Number</label>

                            <div class="col-md-6">
                                <input id="number" type="tel" placeholder="Number" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" required autocomplete="number" autofocus placeholder="Your Contact Number">

                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fblink" class="col-md-4 col-form-label text-md-right">Facebook ID</label>

                            <div class="col-md-6">
                                <input id="fblink" type="text" placeholder="Facebook Account url" class="form-control @error('fblink') is-invalid @enderror" name="fblink" value="{{ old('fblink') }}" autocomplete="fblink" autofocus>

                                @error('fblink')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="spous_name" class="col-md-4 col-form-label text-md-right">Spouse Name</label>

                            <div class="col-md-6">
                                <input id="spous_name" type="text" placeholder="Spouse Name" class="form-control @error('spous_name') is-invalid @enderror" name="spous_name" value="{{ old('spous_name') }}" autocomplete="spous_name">

                                @error('spous_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="occupation" class="col-md-4 col-form-label text-md-right">Occupation</label>

                            <div class="col-md-6">
                                <input id="occupation" type="text" placeholder="Occupation" class="form-control @error('occupation') is-invalid @enderror" name="occupation" value="{{ old('occupation') }}">

                                @error('occupation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="number_of_kids" class="col-md-4 col-form-label text-md-right">Number of kids</label>

                            <div class="col-md-6">
                                <input id="number_of_kids" type="number" placeholder="Number Of kids" class="form-control" name="number_of_kids" >

                                @error('number_of_kids')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="interest" class="col-md-4 col-form-label text-md-right">Special Interst</label>

                            <div class="col-md-6">
                                <input id="interest" type="text" placeholder="Special Interst" class="form-control" value="{{ old('interest') }}" autocomplete="interest" name="interest">

                                @error('interest')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Profile Image  </label>

                            <div class="col-md-6">
                                <input id="image" type="file" name="image"  required >

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Your Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection