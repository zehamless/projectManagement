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
<link href="{{ asset('templateAdmin/Admin/dist/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}"
    rel="stylesheet" type="text/css" />
<link
    href="{{ asset('templateAdmin/Admin/dist/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}"
    rel="stylesheet" type="text/css" />
<link
    href="{{ asset('templateAdmin/Admin/dist/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}"
    rel="stylesheet" type="text/css" />
<link href="{{ asset('templateAdmin/Admin/dist/assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css') }}"
    rel="stylesheet" type="text/css" />

<!-- Plugins css -->
<link href="{{ asset('templateAdmin/Admin/dist/assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('templateAdmin/Admin/dist/assets/libs/dropify/css/dropify.min.css') }}" rel="stylesheet"
    type="text/css" />

<!-- Sweet Alert-->
<link href="{{ asset('templateAdmin/Admin/dist/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet"
    type="text/css" />


<!-- magnific css -->
<link href="{{ asset('templateAdmin/Admin/dist/assets/libs/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css" />


{{-- chart js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
<link href="{{ asset('templateAdmin/Admin/dist/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
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

    /* navbar styling end */

    #sidebar-menu>ul>li>a:hover {
        color: red;
    }

    #sidebar-menu>ul>li>a:active {
        color: red;
    }

    /* navbar styling end */

    .btn-save {
        background-color: #FF3E3E;
        color: white;
    }
</style>