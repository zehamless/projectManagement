@extends('template.index')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">



            <div class="row gap-1">

                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <i class="col-3 fa-solid fa-list-check text-center fa-3x"></i>
                                <div class="col-9">
                                    <h4 class=" fw-bold">Total Project</h4>
                                    <h2 class="fw-bold"> 256 </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <i class="col-3 fa-regular fa-user text-center fa-3x"></i>
                                <div class="col-9">
                                    <h4 class="fw-bold">Total Project</h4>
                                    <h2 class="fw-bold"> 256 </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                        <tr>
                                            <td>1</td>
                                            <td>Adminto Admin v1</td>
                                            <td>01/01/2017</td>
                                            <td>26/04/2017</td>
                                            <td><span class="badge bg-danger">Released</span></td>
                                            <td>Coderthemes</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Adminto Frontend v1</td>
                                            <td>01/01/2017</td>
                                            <td>26/04/2017</td>
                                            <td><span class="badge bg-success">Released</span></td>
                                            <td>Adminto admin</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Adminto Admin v1.1</td>
                                            <td>01/05/2017</td>
                                            <td>10/05/2017</td>
                                            <td><span class="badge bg-pink">Pending</span></td>
                                            <td>Coderthemes</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Adminto Frontend v1.1</td>
                                            <td>01/01/2017</td>
                                            <td>31/05/2017</td>
                                            <td><span class="badge bg-purple">Work in Progress</span>
                                            </td>
                                            <td>Adminto admin</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Adminto Admin v1.3</td>
                                            <td>01/01/2017</td>
                                            <td>31/05/2017</td>
                                            <td><span class="badge bg-warning">Coming soon</span></td>
                                            <td>Coderthemes</td>
                                        </tr>

                                        <tr>
                                            <td>6</td>
                                            <td>Adminto Admin v1.3</td>
                                            <td>01/01/2017</td>
                                            <td>31/05/2017</td>
                                            <td><span class="badge bg-primary">Coming soon</span></td>
                                            <td>Adminto admin</td>
                                        </tr>

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
{{-- <script src="https://kit.fontawesome.com/031855bb65.js" crossorigin="anonymous"></script> --}}
@endsection