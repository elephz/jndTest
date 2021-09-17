<header class="header navbar fixed-top navbar-expand-sm">
<a href="javascript:void(0);" class="sidebarCollapse d-none d-lg-block" data-placement="bottom"><i
            class="flaticon-menu-line-2"></i></a>

    <ul class="navbar-nav flex-row mr-lg-auto ml-lg-0  ml-auto crumbs breadcrumbs-style-2">
        <ul class="breadcrumb m-0 ml-3">
        <li class="mb-2"><a href="javscript:void(0);"><i class="flaticon-home-fill"></i></a></li>
                                                        
            @yield('pageIndex')
            <!-- <li><a href="javscript:void(0);">UI Kit</a></li>
            <li><a href="javscript:void(0);">Miscellaneous</a></li>
            <li class="active"><a href="javscript:void(0);">Sub Category</a></li> -->
        </ul>
    </ul>



    <ul class="navbar-nav flex-row ml-lg-auto">
        <li class="nav-item dropdown cs-toggle order-lg-0 order-3">
            <a class="dropdown-item" href="#" onclick="logOut(); return false;" >
                <i class="mr-1 flaticon-power-button"></i>
            </a>
        </li>
    </ul>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</header>