<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login - Project Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logo_trafindo_only.png') }}">

    <!-- App css -->
    <link href="{{ asset('templateAdmin/Admin/dist/assets/css/app.min.css') }}" rel="stylesheet" type="text/css"
        id="app-style" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <!-- Add Bootstrap 5 CSS link here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- icons -->
    <link href="{{ asset('templateAdmin/Admin/dist/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .logo-trafindo {
            height: auto;
            max-width: 100%;
        }

        .background-page {

            background-image: linear-gradient(rgba(81, 81, 81, 0.233),
                    rgba(255, 0, 0, 0.45)),
                url('{{ asset('images/trafindo-workshop.png') }}');
            background-size: cover;
        }
    </style>

</head>

<body class="loading background-page">

    <div class="account-pages my-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="text-center">
                        <a href="index.html">
                            {{-- <img src="{{ asset('images/logo_trafindo_full.png') }}" alt="" height="100"
                                class="mx-auto"> --}}
                        </a>
                        <p class="text-muted mt-2 mb-4"></p>

                    </div>
                    <div class="container mt-5">
                        <div class="card">
                            <div class="card-body p-4">

                                <div class="text-center mb-4">
                                    <img src="{{ asset('images/logo_trafindo_full.png') }}" alt="logo_trafindo"
                                        class="logo-trafindo mx-auto" style="max-height: 60px;">
                                </div>
                                <form action="{{ url('/') }}" class="parsley-examples">
                                    @csrf
                                    <h4 class="text-center ">Welcome {{auth()->user()->first_name}}, Choose your Role</h4>
                                    <div class="d-flex flex-column mt-4">
{{--                                    ini buat role custom--}}
                                    @foreach($roles as $role)
                                    <div class="d-flex flex-column">
                                        <a type="button" href="{{route('setSession', ['role' => $role])}}"
                                           class="btn btn-outline-danger waves-effect mb-2 rounded-3">{{$role}}</a>
                                    </div>
                                    @endforeach

                                    <!-- end row -->
                                    </div>
                                    <!-- end row -->
                                </form>


                            </div> <!-- end card-body -->
                        </div>
                    </div>
                    <!-- end card -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    @include('template.script')
    <!-- Add Bootstrap 5 JS and Popper.js (if required) scripts here -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>
    <!-- Add jQuery script if required -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Add Popper.js script if required -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>

</body>

</html>
