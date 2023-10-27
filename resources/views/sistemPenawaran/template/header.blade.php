<meta charset="utf-8" />
<title>Project Management</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
<meta content="Coderthemes" name="author" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- App favicon -->
<link rel="shortcut icon" href="{{ asset('images/logo_trafindo_only.png') }}">

<!-- App css -->
<link href="{{ asset('templateAdmin/Admin/dist/assets/css/app.min.css') }}" rel="stylesheet" type="text/css"
    id="app-style" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!-- Plugins css -->
<link href="{{ asset('templateAdmin/Admin/dist/assets/libs/mohithg-switchery/switchery.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('templateAdmin/Admin/dist/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}"
     rel="stylesheet" type="text/css" />
<link href="{{ asset('templateAdmin/Admin/dist/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />


@yield('headerScript')


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>


<!-- icons -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/flot.tooltip/0.9.0/jquery.flot.tooltip.min.js"
    integrity="sha512-oQJB9y5mlxC4Qp62hdJi/J1NzqiGlpprSfkxVNeosn23mVn5JA4Yn+6f26wWOWCDbV9CxgJzFfVv9DNLPmhxQg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<style>
    /* navbar styling */
    li.menuitem-active {
        background-color: red;
    }

    li.menuitem-active>a>i {
        color: white;
    }

    li.menuitem-active>a>span {
        font-weight: 800;
        color: white;
    }

    #sidebar-menu>ul>li>a:hover {
        background-color: red;
        color: white;
    }

    #sidebar-menu>ul>li>a:active {
        color: red;
    }
    /* end navbar styling */


    /* Style for the loader container */
    .loader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.7);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .loader-child {
        background-image: url("{{ asset('images/loading-page.gif') }}");
        width: 200px;
        height: 200px;
        animation: infinite;
    }
    /* end loader container styling */

    .table-title {
        vertical-align: middle !important;
    }

    .details-text {
        margin-bottom: unset;
    }



    /* styling profile secrtion */
    @media screen and (max-width: 768px) {
        .profile-section {
            margin-top: 20px;
            position: unset;
            bottom: unset;
        }
    }
    @media screen and (max-height: 650px) {
        .profile-section {
            margin-top: 20px;
            position: unset;
            bottom: unset;
        }
    }
    /* end profile section styling */
</style>
