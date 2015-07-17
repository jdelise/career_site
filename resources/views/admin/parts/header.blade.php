<header class="main-header">
    <!-- Logo -->
    <a href="{{url('/')}}" class="logo">CENTURY 21 Scheetz</a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @include('admin.parts.user_notifications')
                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="http://www.gravatar.com/avatar/{{md5($user->email)}}" class="user-image" alt="User Image"/>
                        <span class="hidden-xs">{{$user->first_name}} {{$user->last_name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="http://www.gravatar.com/avatar/{{md5($user->email)}}" class="img-circle" alt="User Image" />
                            <p>
                                {{$user->first_name}} {{$user->last_name}}
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{url('admin/users/my-profile')}}/{{$user->id}}" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{url('auth/logout')}}" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>