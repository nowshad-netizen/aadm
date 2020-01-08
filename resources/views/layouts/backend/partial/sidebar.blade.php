<aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                    <img src="/storage/profile/{{Auth::user()->image}}" width="50" height="50" alt="User" />
            </div>
            <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{auth::user()->name}}</div>
            <div class="email">{{auth::user()->email}}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                        <li role="separator" class="divider"></li>

        

                        {{-- <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>

                @if (Request::is('admin*'))  
                 <li class=" {{ request::is('admin/dashboard') ? 'active' :''}} ">
                            <a href="{{ route('admin.dasboard') }}">
                                <i class="material-icons">home</i>
                                <span>Home</span>
                            </a>
                </li>
                <li class=" {{ request::is('admin/tag*') ? 'active' :''}} ">
                    <a href="{{ route('admin.tag.index') }}">
                        <i class="material-icons">label</i>
                        <span>Tags</span>
                    </a>
                </li>
                <li class=" {{ request::is('admin/catagory*') ? 'active' :''}} ">
                    <a href="{{ route('admin.category.index') }}">
                            <i class="material-icons">apps</i>
                            <span>Category</span>
                    </a>
                </li>
                <li class=" {{ request::is('admin/post*') ? 'active' :''}} ">
                    <a href="{{ route('admin.post.index') }}">
                            <i class="material-icons">library_books</i>
                            <span>post</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/subscriber') ? 'active' : '' }}">
                    <a href="{{ route('admin.subscriber.index') }}">
                        <i class="material-icons">subscriptions</i>
                        <span>Subscribers</span>
                    </a>
                </li>
                <li class=" {{ request::is('admin/slide*') ? 'active' :''}} ">
                    <a href="{{ route('admin.slider.index') }}">
                            <i class="material-icons">widgets</i>
                            <span>Slider</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
                    <a href="{{ route('admin.settings') }}">
                        <i class="material-icons">settings</i>
                        <span>Settings</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/authors') ? 'active' : '' }}">
                    <a href="{{ route('admin.author.index') }}">
                        <i class="material-icons">account_circle</i>
                        <span>Authors</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/aboutsite') ? 'active' : '' }}">
                    <a href="{{ route('admin.aboutsite.index') }}">
                        <i class="material-icons">swap_calls</i>
                        <span> About Site </span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/committeemember') ? 'active' : '' }}">
                    <a href="{{ route('admin.committeemember.index') }}">
                        <i class="material-icons">swap_calls</i>
                        <span> Committee Member </span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/reunion') ? 'active' : '' }}">
                    <a href="">
                        <i class="material-icons">account_circle</i>
                        <span> Reunion Event </span>
                    </a>
                </li>
                
                <li class="header">AADM-ADMIN NAVIGATION</li>
                @endif
                @if (Request::is('author*'))  
                <li class=" {{ request::is('admin/dashboard') ? 'active' :''}} ">
                    <a href="{{ route('author.dasboard') }}">
                        <i class="material-icons">home</i>
                        <span>Home</span>

                    </a>
                 </li>
                 <li class=" {{ request::is('author/post*') ? 'active' :''}} ">
                    <a href="{{ route('author.post.index') }}">
                            <i class="material-icons">library_books</i>
                            <span>post</span>
                    </a>
                </li>
                <li class="{{ Request::is('author/settings') ? 'active' : '' }}">
                    <a href="{{ route('author.settings') }}">
                        <i class="material-icons">settings</i>
                        <span>Settings</span>
                    </a>
                </li>

                 
                @endif

                
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
        
        </div>
        <!-- #Footer -->
    </aside>