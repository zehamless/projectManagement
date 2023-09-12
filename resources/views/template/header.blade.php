<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>Project Management</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('images/logo_trafindo_only.png') }}">

        <!-- App css -->

        <link href="{{ asset('templateAdmin/Admin/dist/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

        <!-- icons -->
        <link href="{{ asset('templateAdmin/Admin/dist/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <style>
            
        </style>
    </head>

    <!-- body start -->
    <body class="loading" data-layout-color="light"  data-layout-mode="default" data-layout-size="fluid" data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='true'>

        <!-- Begin page -->
        <div id="wrapper">


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
                                <a href="apps-chat.html">
                                    <i class="mdi mdi-account-supervisor-outline"></i>
                                    <span> Customers </span>
                                </a>
                            </li>

                            <li>
                                <a href="apps-chat.html">
                                    <i class="mdi mdi-account-cog-outline"></i>
                                    <span> Staff </span>
                                </a>
                            </li>
                        </ul>

                    </div>

                    <!-- User box -->
                    {{-- <div class="user-box text-center">

                        <img src="{{ asset('templateAdmin/Admin/dist/assets/images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme" class="roungit ad-circle img-thumbnail avatar-md">
                            <div class="dropdown">
                                <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"  aria-expanded="false">Nowak Helme</a>
                                <div class="dropdown-menu user-pro-dropdown">

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-user me-1"></i>
                                        <span>My Account</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-settings me-1"></i>
                                        <span>Settings</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-lock me-1"></i>
                                        <span>Lock Screen</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-log-out me-1"></i>
                                        <span>Logout</span>
                                    </a>

                                </div>
                            </div>

                        <p class="text-muted left-user-info">Admin Head</p>

                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#" class="text-muted left-user-info">
                                    <i class="mdi mdi-cog"></i>
                                </a>
                            </li>

                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="mdi mdi-power"></i>
                                </a>
                            </li>
                        </ul>
                    </div> --}}
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->
