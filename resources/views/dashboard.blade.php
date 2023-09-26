@extends('template.index')

@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <div class="row gap-3">
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-4 text-center">
                                        <i class="fas fa-list-check fa-3x"></i>
                                    </div>
                                    <div class="col-8">
                                        <h4 class="fw-bold">Total Projects</h4>
                                        <h2 class="fw-bold">{{ $totalProjects }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-4 text-center">
                                        <i class="far fa-user fa-3x"></i>
                                    </div>
                                    <div class="col-8">
                                        <h4 class="fw-bold">Total Users</h4>
                                        <h2 class="fw-bold">{{ $totalUser }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tambahkan lebih banyak kolom sesuai kebutuhan -->
                </div>


                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown float-end">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                    </div>
                                </div>

                                <h4 class="header-title mt-0 mb-3">Latest Projects</h4>

                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Project Name</th>
                                                <th>Start Date</th>
                                                <th>Due Date</th>
                                                <th>Project Manager</th>
                                                <th>Sales Executive</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($projects as $project)
                                                <tr data-id="{{ $project['id'] }}" style="cursor: pointer;"
                                                    title="Klik untuk lihat detail project">
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $project['label'] }}</td>
                                                    <td>{{ $project['start_date'] }}</td>
                                                    <td>{{ $project['end_date'] }}</td>
                                                    <td>{{ $project['project_manager'] }}</td>
                                                    <td>{{ $project['sales_executive'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div> <!-- content -->
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Menambahkan event click pada setiap baris
            $("tbody tr").click(function() {
                // Mendapatkan ID proyek dari atribut data-id
                var projectId = $(this).data("id");

                // Mengarahkan pengguna ke halaman detail proyek
                window.location.href = "/projects/detail/" + projectId; // Sesuaikan dengan route yang benar
            });
        });
    </script>
    {{-- <script src="https://kit.fontawesome.com/031855bb65.js" crossorigin="anonymous"></script> --}}
@endsection
