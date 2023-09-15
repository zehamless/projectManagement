<!-- Topbar Start -->
<div class="navbar-custom">

    <!-- LOGO -->
    <div class="logo-box">
        <a href="index.html" class="logo logo-light text-center">
            <span class="logo-sm">
                <img src="{{ asset('images/logo_trafindo_only.png') }}" alt="" height="30">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('images/logo_trafindo_full.png') }}" alt="" height="40">
            </span>
        </a>
        <a href="index.html" class="logo logo-dark text-center">
            <span class="logo-sm">
                <img src="{{ asset('images/logo_trafindo_only.png') }}" alt="" height="30">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('images/logo_trafindo_full.png') }}" alt="" height="40">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
        <li>
            <button class="button-menu-mobile disable-btn waves-effect">
                <i class="fe-menu"></i>
            </button>
        </li>

        <li>
            <h4 class="page-title-main">Dashboard</h4>
        </li>

    </ul>

    <div class="clearfix"></div>

</div>
<!-- end Topbar -->

<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{ url('/') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Apps</li>

                <li>
                    <a href="{{ url('projects') }}">
                        <i class="mdi mdi-briefcase-variant-outline"></i>
                        <span> Projects </span>
                    </a>
                </li>

                <li>
                    <a href="apps-calendar.html">
                        <i class="mdi mdi-calendar-blank-outline"></i>
                        <span> Calendar </span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('customer') }}">
                        <i class="mdi mdi-account-supervisor-outline"></i>
                        <span> Customers </span>
                    </a>
                </li>

                {{-- <li>
                    <a href="{{ url('staff') }}">
                        <i class="mdi mdi-account-cog-outline"></i>
                        <span> Staff </span>
                    </a>
                </li> --}}

                <li class="menu-title mt-2">Account Management</li>

                <li>
                    <a href="{{ url('admin/users') }}">
                        <i class="mdi mdi-account-group-outline"></i>
                        <span> Data Akun </span>
                    </a>
                </li>
            </ul>
        </div>


        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->