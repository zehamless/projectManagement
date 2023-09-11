@extends('template.index')

@section('content')

<style>
.headerr{
    display:flex;
    margin-top: 20px;
    align-items: center;
    font-family: poppins;
    font-size: 25px;

}
.header2{
    margin-bottom: 10px;
    margin-top: -123px;
    font-family: poppins;
    font-size: 25px;
    margin-left:55px;


}
.iconn{
    padding-right: 15px;

}
.nomor{
    margin:0;
    margin-top: -39px;
    display: inline-block;

}
.nomor2{
    margin:0;
    margin-top: -21px;
    display: inline-block;
    margin-left:55px;

}

.card{
    border-radius: 10px;
    margin-top: 14px;

}
.card2{
    margin-left: 10px;
    margin-top: 85px;
}



</style>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <i class="fa-solid fa-list-check rounded-pill float-start mt-4 fa-3x iconn"></i>


                            <div class="widget-chart-1 card " >
                                <div class="widget-detail-1 text-end ">
                                    <h4 class="header-title mt-0 mb-3 headerr">Total Project</h4>
                                    <h2 class="fw-normal pt-3 mb-2 float-start  nomor"> 256 </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body mt-2">

                            <i class="fa-solid fa-users  rounded-pill float-start mt-4 fa-3x"></i>

                            <div class="widget-chart-1 card2">
                                <div class="widget-chart-box-1 float-start mb-0" dir="ltr">

                                <div class="widget-detail-1 text-end mt-4 ">
                                    <h4 class="header-title pt-3 header2" style="height:50px">Total Customer</h4>
                                    <h2 class="fw-normal pt-3 mb-2 float-start nomor2"> 256 </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
            </div>

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
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
                                        <th>Status</th>
                                        <th>Assign</th>
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
    <script src="https://kit.fontawesome.com/031855bb65.js" crossorigin="anonymous"></script>
@endsection
