@extends('sistemPenawaran.template.index')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    </div>
                </div>
                <div class="row">
                    {{-- Kolom kanan (di atas untuk layar kecil) --}}
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
                                        <button type="button" class="btn btn-warning btn-xs waves-effect waves-light">Btn
                                            Xs</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Kolom kiri (di bawah untuk layar kecil) --}}
                    <div class="col-xl-8 col-md-6 order-md-1 order-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="project-box d-flex justify-content-between">
                                    <div>
                                        <h3 class="ms-3 ">Trafo</h3>
                                    </div>
                                    <div class="ml-auto">
                                        <button type="button" style="width: 146px; height:35px"
                                            class="btn btn-danger rounded mt- ms-2" data-toggle="modal"
                                            data-target="#exampleModalLong">
                                            <i class="mdi mdi-plus" title="Untuk menambahkan project "></i>Add Penawaran
                                        </button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr class="text-center">
                                                <th scope="col">#</th>
                                                <th scope="col">merk</th>
                                                <th scope="col">capacity</th>
                                                <th scope="col">No.seri</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8 col-md-6 order-md-1 order-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="project-box d-flex justify-content-between">
                                    <div>
                                        <h3 class="ms-3 ">Layanan</h3>
                                    </div>
                                    <div class="ml-auto">
                                        <button type="button" style="width: 146px; height:35px"
                                            class="btn btn-danger rounded mt- ms-2" data-toggle="modal"
                                            data-target="#exampleModalLong">
                                            <i class="mdi mdi-plus" title="Untuk menambahkan project "></i>Add Layanan
                                        </button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr class="text-center">
                                                <th scope="col">#</th>
                                                <th scope="col">Trafo</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Sub Layanan</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8 col-md-6 order-md-1 order-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="project-box d-flex justify-content-between">
                                    <div>
                                        <h3 class="ms-3 ">Syarat Ketentuan</h3>
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
                                    <table class="table">
                                        <thead>
                                            <tr class="text-center">
                                                <th scope="col">#</th>
                                                <th scope="col">merk</th>
                                                <th scope="col">capacity</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>
                                                    <div class="d-flex gap-1 justify-content-center">
                                                        <button type="button"
                                                            class="btn btn-danger btn-xs waves-effect waves-light rounded-pill">Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8 col-md-6 order-md-1 order-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="project-box d-flex justify-content-between">
                                    <div>
                                        <h3 class="ms-3 ">Term Of Payment</h3>
                                    </div>
                                    <div class="ml-auto">
                                        <button type="button" style="width: 146px; height:35px"
                                            class="btn btn-danger rounded mt- ms-2" data-toggle="modal"
                                            data-target="#exampleModalLong">
                                            <i class="mdi mdi-plus" title="Untuk menambahkan project "></i>Add Payment
                                        </button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr class="text-center">
                                                <th scope="col">#</th>
                                                <th scope="col">Payment Type</th>
                                                <th scope="col">Progress</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>ok</td>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('pageScript')
@endsection
