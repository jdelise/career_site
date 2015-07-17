<div class="page-sidebar navbar-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->
    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <ul class="page-sidebar-menu page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
        <li class="start {{setActive('dashboard')}} ">
            <a href="{{url('admin')}}">
                <i class="icon-home"></i>
                <span class="title">Dashboard</span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="{{setActive('recruiting')}}">
            <a href="javascript:;">
                <i class="fa fa-users"></i>
                <span class="title">Recruiting</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="{{url('admin/recruiting/dashboard')}}">
                        <i class="icon-home"></i>
                        My Dashboard</a>
                </li>
            </ul>
        </li>
        <li class="last ">
            <a href="javascript:;">
                <i class="icon-pointer"></i>
                <span class="title">Maps</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="maps_google.html">
                        Google Maps</a>
                </li>
                <li>
                    <a href="maps_vector.html">
                        Vector Maps</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- END SIDEBAR MENU -->
</div>
