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

        .btn-login {
            background-color: #FF3E3E;
            border: #FF3E3E;
            border-radius: 5px;
            color: white;
            padding: 10px;
            font-weight: 800;
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
                    <div class="card">
                        <div class="card-body p-4">

                            <div class="text-center mb-4">
                                <img src="{{ asset('images/logo_trafindo_full.png') }}" alt="logo_trafindo"
                                    class="logo-trafindo mx-auto" style="max-height: 60px;">
                            </div>

                            <form action="{{ route('login') }}" class="parsley-examples" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email address<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" id="emailaddress"
                                        required="" parsley-trigger="change" placeholder="Enter your email">
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="password" required="" name="password"
                                        id="password" parsley-trigger="change" placeholder="Enter your password">
                                </div>

                                <div class="mb-3 d-grid text-center">
                                    <button class="btn btn-login round-20" type="submit"> Log In </button>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12 text-center">
                                        <p> <a href="#" class="text-muted ms-1"><i
                                                    class="fa fa-lock me-1"></i>Forgot your password?</a></p>
                                        <p class="text-muted">Don't have an account? <a
                                                href="https://wa.me/628111260360" class="text-dark ms-1"
                                                target="_blank"><b>Contact Admin</b></a></p>
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row -->
                            </form>

                        </div> <!-- end card-body -->
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

</body>

</html>
