@section('headerScript')
@endsection

@extends('sistemPenawaran.template.index')

@section('content')
    <style>
        .btn-danger {
            background-color: #FF3E3E;

            .modal-dialog {
                max-width: 900px;
            }
        }
    </style>
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row mb-2">

                    <!-- Button trigger modal -->
                    <div class="col-sm-7 mb-3">
                        <button type="button" class="btn btn-danger rounded" data-toggle="modal"
                            data-target="#exampleModalLong">
                            <i class="mdi mdi-plus" title="Untuk menambahkan project "></i>Tambah Penawaran
                        </button>
                    </div>
                    <!-- Modal -->

                    <div class="col-sm-5">
                        <form class="app-search" action="#">
                            <div class="app-search-box">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search..."
                                        id="top-search">
                                    <button class="btn input-group-text" type="submit">
                                        <i class="fe-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div><!-- end col-->

                    {{-- card --}}
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card ">
                                <div class="card-body project-box">
                                    <div class="badge bg-danger float-end mx-auto font-14 ">No.SGM</div>
                                    <h4 class="mt-0"><a href="" class="text-dark">New Admin Design</a></h4>
                                    <p class="text-muted font-13 mt-1">Customers</p>

                                    <p class="text-muted font-15">Tanggal Penawaran : 01/01/2023</p>
                                    <p class="text-muted font-15">Sales : Maulana</p>
                                    <button type="button"
                                        class="btn btn-danger rounded float-end rounded-pill">Preview</button>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-4">
                            <div class="card ">
                                <div class="card-body project-box">
                                    <div class="badge bg-danger float-end mx-auto font-14 ">No.SGM</div>
                                    <h4 class="mt-0"><a href="" class="text-dark">New Admin Design</a></h4>
                                    <p class="text-muted font-13 mt-1">Customers</p>

                                    <p class="text-muted font-15">Tanggal Penawaran : 01/01/2023</p>
                                    <p class="text-muted font-15">Sales : Maulana</p>
                                    <button type="button"
                                        class="btn btn-danger rounded float-end rounded-pill">Preview</button>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-4">
                            <div class="card ">
                                <div class="card-body project-box">
                                    <div class="badge bg-danger float-end mx-auto font-14 ">No.SGM</div>
                                    <h4 class="mt-0"><a href="" class="text-dark">New Admin Design</a></h4>
                                    <p class="text-muted font-13 mt-1">Customers</p>

                                    <p class="text-muted font-15">Tanggal Penawaran : 01/01/2023</p>
                                    <p class="text-muted font-15">Sales : Maulana</p>
                                    <button type="button"
                                        class="btn btn-danger rounded float-end rounded-pill">Preview</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card ">
                                <div class="card-body project-box">
                                    <div class="badge bg-danger float-end mx-auto font-14 ">No.SGM</div>
                                    <h4 class="mt-0"><a href="" class="text-dark">New Admin Design</a></h4>
                                    <p class="text-muted font-13 mt-1">Customers</p>

                                    <p class="text-muted font-15">Tanggal Penawaran : 01/01/2023</p>
                                    <p class="text-muted font-15">Sales : Maulana</p>
                                    <button type="button"
                                        class="btn btn-danger rounded float-end rounded-pill">Preview</button>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-4">
                            <div class="card ">
                                <div class="card-body project-box">
                                    <div class="badge bg-danger float-end mx-auto font-14 ">No.SGM</div>
                                    <h4 class="mt-0"><a href="" class="text-dark">New Admin Design</a></h4>
                                    <p class="text-muted font-13 mt-1">Customers</p>

                                    <p class="text-muted font-15">Tanggal Penawaran : 01/01/2023</p>
                                    <p class="text-muted font-15">Sales : Maulana</p>
                                    <button type="button"
                                        class="btn btn-danger rounded float-end rounded-pill">Preview</button>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-4">
                            <div class="card ">
                                <div class="card-body project-box">
                                    <div class="badge bg-danger float-end mx-auto font-14 ">No.SGM</div>
                                    <h4 class="mt-0"><a href="" class="text-dark">New Admin Design</a></h4>
                                    <p class="text-muted font-13 mt-1">Customers</p>

                                    <p class="text-muted font-15">Tanggal Penawaran : 01/01/2023</p>
                                    <p class="text-muted font-15">Sales : Maulana</p>
                                    <button type="button"
                                        class="btn btn-danger rounded float-end rounded-pill">Preview</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title" id="exampleModalLongTitle">Tambah Penawaran</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-6 col-xl-4">
                                        <form action="">
                                            <div class="mb-3">
                                                <label for="customerNameLeft">Project Name </label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control"
                                                        placeholder=" Masukan NamaProject" aria-label="Username"
                                                        id="customerNameLeft">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-6 col-xl-4">
                                        <form action="">
                                            <div class="mb-3">
                                                <label for="customerNameRight">Judul Pekerjaan</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Judul Pekerjaan"
                                                        aria-label="Username" id="customerNameRight">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-6 col-xl-4">
                                        <form action="">
                                            <div class="mb-3">
                                                <label for="customerNameRight">No RFQ</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Masukan Nomor RFQ"
                                                        aria-label="Username" id="customerNameRight">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xl-6">
                                        <form action="">
                                            <div class="mb-3">
                                                <label for="customerNameLeft">Email</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Masukan Email"
                                                        aria-label="Username" id="customerNameLeft">
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-sm-6 col-xl-6">
                                        <form action="">
                                            <div class="mb-3">
                                                <label for="customerNameRight">MSG No</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Masukan No MSG"
                                                        aria-label="Username" id="customerNameRight">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xl-4">
                                        <form action="">
                                            <div class="mb-3">
                                                <label for="customerNameLeft">Customer</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="PT"
                                                        aria-label="Username" id="customerNameLeft">
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-sm-6 col-xl-4">
                                        <form action="">
                                            <div class="mb-3">
                                                <label for="customerNameRight">Cutomer Contact Name</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Masukan Nama Customer"
                                                        aria-label="Username" id="customerNameRight">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-6 col-xl-4">
                                        <form action="">
                                            <div class="mb-3">
                                                <label for="customerNameRight">No.HP</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="No.Handphone"
                                                        aria-label="Username" id="customerNameRight">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xl-4">
                                        <form action="">
                                            <div class="mb-3">
                                                <label for="customerNameLeft">Tanggal Penawaran</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="Tanggal Penawaran" aria-label="Username"
                                                        id="customerNameLeft">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-6 col-xl-4">
                                        <form action="">
                                            <div class="mb-3">
                                                <label for="inputStateLeft" class="form-label">Delivery Time </label>
                                                <select id="inputStateLeft" class="form-select">
                                                    <option selected>Choose...</option>
                                                    <option>15 Hari</option>
                                                    <option>30 Hari</option>
                                                    <option>45 Hari</option>
                                                    <option>60 Hari</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-6 col-xl-4">
                                        <form action="">
                                            <div class="mb-3">
                                                <label for="customerNameLeft">Segmentasi Pasar</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="Tanggal Penawaran" aria-label="Username"
                                                        id="customerNameLeft">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xl-6">
                                        <form action="">
                                            <div class="mb-3">
                                                <label for="customerNameLeft">Pelaksanaan Pekerjaan</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="Masukan Pelaksanaan Pekerjaan" aria-label="Username"
                                                        id="customerNameLeft">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-6 col-xl-6">
                                        <form action="">
                                            <div class="mb-3">
                                                <label for="customerNameLeft">Syarat Pembayaran</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="Masukan Syarat Pembayaran" aria-label="Username"
                                                        id="customerNameLeft">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <form action="">
                                            <div class="mb-3">
                                                <label for="inputStateLeft" class="form-label">Negara</label>
                                                <select id="inputStateLeft" class="form-select">
                                                    <option selected>Choose...</option>
                                                    <option>Indonesia</option>
                                                    <option>Amerika</option>
                                                    <option>Sunda Empire</option>
                                                    <option>Bekasi</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-4">
                                        <form action="">
                                            <div class="mb-3">
                                                <label for="inputStateCenter" class="form-label">Provinsi</label>
                                                <select id="inputStateCenter" class="form-select">
                                                    <option selected>Choose...</option>
                                                    <option>Sumatera Utama</option>
                                                    <option>Sumatera Selatan</option>
                                                    <option>Sumatera Barat</option>
                                                    <option>Riau</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-4">
                                        <form action="">
                                            <div class="mb-3">
                                                <label for="inputStateRight" class="form-label">Kota</label>
                                                <select id="inputStateRight" class="form-select">
                                                    <option selected>Choose...</option>
                                                    <option>Surya</option>
                                                    <option>Zahir</option>
                                                    <option>Beruntu</option>
                                                    <option>Ashari</option>
                                                    <option>Tambunan</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xl-12">
                                        <form action="">
                                            <div class="mb-3">
                                                <label for="customerNameLeft">Alamat</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Alamat "
                                                        aria-label="Username" id="customerNameLeft">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger">Save changes</button>
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
