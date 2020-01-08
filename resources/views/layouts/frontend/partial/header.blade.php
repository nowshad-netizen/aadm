<header class="primary" style="position: static;">
        <div class="firstbar">
            <div class="container">
                <div class="row">
                    {{-- end --}}
                    <div class="col-md-6 col-sm-12">
                        <div class="brand">
                            <a href="{{ route('home')}}">
                                <img src="{{ asset('assets/frontend/images/logo.jpg')}}" alt=" Logo" style="width:100%;">
                            </a>
                             
                        </div>						
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <ul class="nav-icons">
                                @if (Route::has('login'))
                                <div class="top-right links">
                                    @auth
                                        {{-- <a href="{{ url('/admin/dashboard') }}">Profile</a> --}}
                                        <li><a href="{{ url('/admin/dashboard') }}"><i class="icon ion-person"></i> My Account</a></li>
                                    @else
                                        {{-- <a href="{{ route('login') }}" class="btn btn-outline-secondary">Login</a> --}}
                                        <li><a href="{{ route('login') }}"><i class="ion-person"></i><div>Login</div></a></li>
                
                                        @if (Route::has('register'))
                                            {{-- <a href="{{ route('register') }}" class="btn btn-outline-secondary" >Register</a> --}}
                                            <li><a href="{{ route('register') }}"><i class="ion-person-add"></i><div>Register</div></a></li>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                            
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start nav -->
        {{-- <nav class="menu">
            <div class="container">
                <div class="brand">
                    <a href="#">
                        <img src="{{ asset('assets/frontend/images/logo.jpg')}}" alt="Magz Logo">
                    </a>
                </div>
                <div class="mobile-toggle">
                    <a href="#" data-toggle="menu" data-target="#menu-list"><i class="ion-navicon-round"></i></a>
                </div>
               
                <div class="mobile-toggle">
                    <a href="#" data-toggle="sidebar" data-target="#sidebar" onclick="myFunction()" ><i class="ion-ios-arrow-left"></i></a>
                </div>



                
                
                <div id="menu-list">
                    <ul class="nav-list" id="myDIV">
                        <li class="for-tablet nav-title"><a>Menu</a></li>
                        <li class="for-tablet"><a href="login.html">Login</a></li>
                        <li class="for-tablet"><a href="register.html">Register</a></li>
                        <li><a href="{{ route('home')}}">Home</a></li>
                        <li class="dropdown magz-dropdown">
                            <a href="">Committee <i class="ion-ios-arrow-right"></i></a>
                            <ul class="dropdown-menu">

                                <li><a href="{{ url('committee') }}/present">Present Leaders</a></li>
                                <li><a href="{{ url('committee') }}/previous">previous leaders</a></li>
                                <li><a href="{{ url('committee') }}/Past-Leaders">past Leaders</a></li>
                                <li><a href="{{ url('committee') }}/Funding">Funding Leaders</a></li>
    
                            </ul>
                        </li>
                        <li class="dropdown magz-dropdown"><a href="{{ route('home')}}/Events">Events <i class="ion-ios-arrow-right"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('category') }}/Events"> Upcoming Events</a></li>
                                <li><a href="{{ url('category') }}/Past-Events ">Past Events </a></li>
                                <li><a href="{{ url('reunion') }}">Reunion Form </a></li>
                            </ul>
                        </li>
                        <li><a href="{{ url('category') }}/">Activity</a></li>

                        <li><a href="{{ url('category') }}/Reunion">Reunion</a></li>

                        <li><a href="{{ url('category') }}/Publication">Publication</a></li>
                        <li><a href="{{ url('category') }}/Downloads">Downloads</a></li>
                        <li><a href="{{ url('category') }}/About-Us">About Us</a></li>
                        <li><a href="{{ url('contactus') }}">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </nav> --}}
        <!-- End nav -->
    </header>
