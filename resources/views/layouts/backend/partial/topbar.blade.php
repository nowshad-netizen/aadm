    <!-- Top Bar -->
    <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                    <a href="javascript:void(0);" class="bars"></a>
                    
                    <a class="navbar-brand" href="">
                            @if (Request::is('admin*'))  
                            AADM-ADMIN NAVIGATION
                           @endif
                           @if (Request::is('author*'))  
                           AADM-AUTHOR
                           @endif


                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Call Search -->
                        <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>

                        <!-- #END# Call Search -->
                        <!-- Notifications -->

                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        </li>            
                    </ul>
                </div>
            </div>
        </nav>
        <!-- #Top Bar -->