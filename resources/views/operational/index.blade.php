@extends('template.index')

@section('content')

<style>
    .nav-link {
        color: black;
    }

    .nav-link:hover {
        color: red;
    }

    .nav-link.active {
        color: red !important;
        font-weight: 800;
    }

    .tables-card{
        margin-bottom: 0 !important;
    }
</style>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="header-title">Sales Order Number</h4>

                                    <select class="form-select">
                                        <option selected="">Pilih Sales Order Number</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>

                                </div> <!-- end col -->
                            </div> <!-- end row -->

                        </div> <!-- end card-body-->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card" id="tables-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="header-title">Operational</h4>

                                    <select class="form-select">
                                        <option selected="">Pilih Operational</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>

                                </div> <!-- end col -->

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="card text-center">
                                            <div class="card-header bg-transparent border-bottom">
                                                <ul class="nav nav-tabs card-header-tabs" role="tablist">
                                                    <li class="nav-item">
                                                        <button type="button" class="nav-link active show" href="#work"
                                                            role="tab" data-toggle="tab">Work Plan</button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button type="button" class="nav-link" role="tab"
                                                            href="#expenses" data-toggle="tab">Operational
                                                            Expenses</button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button type="button" class="nav-link" role="tab"
                                                            href="#material" data-toggle="tab">Material
                                                            Utilized</button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button type="button" class="nav-link" role="tab"
                                                            href="#technician" data-toggle="tab">Technician
                                                            List</button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-body tab-content">
                                                <div role="tabpanel" class="tab-pane fade active show" id="work">
                                                    <div class="row text-start">
                                                        <div class="col-lg-12">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table mb-0">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>#</th>
                                                                                    <th>Operational</th>
                                                                                    <th>Description</th>
                                                                                    <th>Due Date</th>
                                                                                    <th>Status</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th scope="row">1</th>
                                                                                    <td>N-23009</td>
                                                                                    <td>Dummy Work Plans</td>
                                                                                    <td>11/09/2023</td>
                                                                                    <td><span class="badge bg-info">Planned</span></td>
                                                                                </tr>
                                                                                    <th scope="row">2</th>
                                                                                    <td>N-23009</td>
                                                                                    <td>Dummy Work Plans</td>
                                                                                    <td>11/09/2023</td>
                                                                                    <td><span class="badge bg-warning">On Progress</span></td>
                                                                                </tr>
                                                                                    <th scope="row">3</th>
                                                                                    <td>N-23009</td>
                                                                                    <td>Dummy Work Plans</td>
                                                                                    <td>11/09/2023</td>
                                                                                    <td><span class="badge bg-success">Completed</span></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="expenses">
                                                    <div class="row text-start">
                                                        <div class="col-lg-12">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table mb-0">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>#</th>
                                                                                    <th>Expense Date</th>
                                                                                    <th>Expense Item</th>
                                                                                    <th>Amount</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th scope="row">1</th>
                                                                                    <td>11/09/2023</td>
                                                                                    <td>Transport</td>
                                                                                    <td>200.000</td>
                                                                                </tr>
                                                                                    <th scope="row">2</th>
                                                                                    <td>11/09/2023</td>
                                                                                    <td>Makan</td>
                                                                                    <td>200.000</td>
                                                                                </tr>
                                                                                    <th scope="row">3</th>
                                                                                    <td>11/09/2023</td>
                                                                                    <td>Emergency</td>
                                                                                    <td>200.000</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="material">
                                                    <div class="row text-start">
                                                        <div class="col-lg-12">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table mb-0">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>#</th>
                                                                                    <th>Operational</th>
                                                                                    <th>Memo Number</th>
                                                                                    <th>Delivery Order Number</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th scope="row">1</th>
                                                                                    <td>N-23009</td>
                                                                                    <td>M223</td>
                                                                                    <td>DO-886</td>
                                                                                </tr>
                                                                                    <th scope="row">2</th>
                                                                                    <td>N-23009</td>
                                                                                    <td>M223</td>
                                                                                    <td>DO-886</td>
                                                                                </tr>
                                                                                    <th scope="row">3</th>
                                                                                    <td>N-23009</td>
                                                                                    <td>M223</td>
                                                                                    <td>DO-886</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="technician">
                                                    <div class="row text-start">
                                                        <div class="col-lg-12">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table mb-0">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>#</th>
                                                                                    <th>Operational</th>
                                                                                    <th>Technician</th>
                                                                                    <th>Division</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th scope="row">1</th>
                                                                                    <td>C-23009</td>
                                                                                    <td>Partogi</td>
                                                                                    <td>Electrical</td>
                                                                                </tr>
                                                                                    <th scope="row">2</th>
                                                                                    <td>C-23009</td>
                                                                                    <td>Partogi</td>
                                                                                    <td>Electrical</td>
                                                                                </tr>
                                                                                    <th scope="row">3</th>
                                                                                    <td>C-23009</td>
                                                                                    <td>Partogi</td>
                                                                                    <td>Electrical</td>
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
                                    </div>
                                </div>

                            </div> <!-- end row -->

                        </div> <!-- end card-body-->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div>
        </div> <!-- content -->
    </div>
</div>
{{-- <script src="https://kit.fontawesome.com/031855bb65.js" crossorigin="anonymous"></script> --}}
@endsection