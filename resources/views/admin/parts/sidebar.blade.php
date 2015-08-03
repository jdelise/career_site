<section class="sidebar">
    <!-- search form -->
    <form action="{{url('admin/search')}}" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
        </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        @if(Auth::user()->can('can_view_dashboard'))
            <li class="">
                <a href="{{url('admin/admin-dashboard')}}">
                    <i class="fa fa-dashboard"></i> <span>Admin Dashboard</span>
                </a>
            </li>
        @endif
        @if(Auth::user()->can('can_access_recruiting'))
            <li class="{{setActive('recruiting')}} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Recruiting</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/recruiting/dashboard')}}">My Dashboard</a></li>
                    <li><a href="{{url('admin/recruiting/all_recruits')}}">All Recruits</a></li>
                    <li><a href="{{url('admin/recruiting/create_recruit')}}">Add Recruit</a></li>
                    <li><a href="{{url('admin/mibor_sync/agent-search')}}">Mibor Agent Search</a></li>
                </ul>
            </li>
            @endif
        @if(Auth::user()->can(['can_access_leadrouter']))
            <li class="{{setActive('create_text_message')}}">
                <a href="{{url('admin/create_text_message')}}">
                    <i class="fa fa-th"></i> <span>Text System</span>
                </a>
            </li>
        @endif
        @if(Auth::user()->can(['can_manage_users']))
            <li class="{{setActive('users')}}">
                <a href="{{url('admin/users')}}">
                    <i class="fa fa-users"></i> <span>User Managment</span>
                </a>
            </li>
            @endif

    </ul>
</section>