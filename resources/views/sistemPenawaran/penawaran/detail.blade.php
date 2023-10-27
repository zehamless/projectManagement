@extends('sistemPenawaran.template.index')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 col-md-6 order-md-1 order-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="project-box d-flex justify-content-between">
                                    <div>
                                        <h4 class="ms-0">Trafo</h4>
                                    </div>
                                    <div class="ml-auto">
                                        <button type="button" style="width: 145px; height: 35px"
                                            class="btn btn-danger rounded mt-2 ms-2" data-toggle="modal"
                                            data-target="#exampleModalLong">
                                            <i class="mdi mdi-plus" title="Untuk menambahkan project"></i>Add Syarat
                                        </button>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-centered mb-0" id="inline-editable">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>Merk</th>
                                                <th>Capacity</th>
                                                <th>No.Seri</th>
                                                <th>Tahun</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td>1</td>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>61</td>
                                                <td>
                                                    <div class="d-flex gap-1 justify-content-center">
                                                        <button type="button"
                                                            class="btn btn-primary btn-xs waves-effect waves-light rounded-pill">Update</button>
                                                        <button type="button"
                                                            class="btn btn-danger btn-xs waves-effect waves-light rounded-pill">Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> <!-- end .table-responsive-->
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div> <!-- end col -->
                    <div class="col-xl-4 col-md-6 order-md-2 order-1">
                        <div class="card">
                            <div class="card-body">
                                <div class="project-box d-flex justify-content-between">
                                    <div>
                                        <h4 class="mt-0"><a href="" class="text-dark">Project1</a></h4>
                                        <p class="text-muted font-13 mt-1">Customers</p>
                                    </div>
                                    <div class="ml-auto">
                                        <button type="button" class="btn btn-warning btn-xs waves-effect waves-light">Btn
                                            Xs</button>
                                        <button type"button" class="btn btn-warning btn-xs waves-effect waves-light">Btn
                                            Xs</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="project-box d-flex justify-content-between">
                                    <div>
                                        <h4 class="ms-0">Layanan</h4>
                                    </div>
                                    <div class="ml-auto">
                                        <button type="button" style="width: 145px; height:35px"
                                            class="btn btn-danger rounded mt- ms-2" data-toggle="modal"
                                            data-target="#exampleModalLong">
                                            <i class="mdi mdi-plus" title="Untuk menambahkan project "></i>Add Layanan
                                        </button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-centered mb-0" id="inline-editable">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>Trafo</th>
                                                <th>Nama</th>
                                                <th>Sub layanan </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td>1</td>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>
                                                    <div>
                                                        <form action="">
                                                            <div>
                                                                <select id="inputStateLeft" class="form-select">
                                                                    <option selected>Sub Layanan 1</option>
                                                                    <option>BDV Test</option>
                                                                    <option>Turn Test Ratio</option>
                                                                    <option>Proteksi Check</option>
                                                                    <option>Torsi Check</option>
                                                                </select>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-1 justify-content-center">
                                                        <button type="button"
                                                            class="btn btn-primary btn-xs waves-effect waves-light rounded-pill">Update</button>
                                                        <button type="button"
                                                            class="btn btn-danger btn-xs waves-effect waves-light rounded-pill">Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> <!-- end .table-responsive-->
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="project-box d-flex justify-content-between">
                                    <div>
                                        <h4 class="ms-0">Syarat Ketentuan</h4>
                                    </div>
                                    <div class="ml-auto">
                                        <button type="button" style="width: 145px; height:35px"
                                            class="btn btn-danger rounded mt- ms-2" data-toggle="modal"
                                            data-target="#exampleModalLong">
                                            <i class="mdi mdi-plus" title="Untuk menambahkan project "></i>Add Syarat
                                        </button>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-centered mb-0" id="inline-editable">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td>1</td>
                                                <td>Tiger Nixon</td>
                                                <td>
                                                    <div class="d-flex gap-1 justify-content-center">
                                                        <button type="button"
                                                            class="btn btn-danger btn-xs waves-effect waves-light rounded-pill">Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> <!-- end .table-responsive-->
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="project-box d-flex justify-content-between">
                                    <div>
                                        <h4 class="ms-0">Trem Of Payment</h4>
                                    </div>
                                    <div class="ml-auto">
                                        <button type="button" style="width: 145px; height:35px"
                                            class="btn btn-danger rounded mt- ms-2" data-toggle="modal"
                                            data-target="#exampleModalLong">
                                            <i class="mdi mdi-plus" title="Untuk menambahkan project "></i>Add Payment
                                        </button>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-centered mb-0" id="inline-editable">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>Payment type</th>
                                                <th>Progress</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td>1</td>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>61</td>
                                                <td>
                                                    <div class="d-flex gap-1 justify-content-center">
                                                        <button type="button"
                                                            class="btn btn-primary btn-xs waves-effect waves-light rounded-pill">Update</button>
                                                        <button type="button"
                                                            class="btn btn-danger btn-xs waves-effect waves-light rounded-pill">Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> <!-- end .table-responsive-->
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('pageScript')
@endsection
