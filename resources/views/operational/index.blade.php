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

        .tables-card {
            margin-bottom: 0 !important;
        }

        .details-text {
            margin-bottom: 10px;
            font-weight: 800;
        }

        .title-text {
            margin-bottom: unset;
        }

        .card-nbm {
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
                                        <h4 class="header-title mb-2">Sales Order Number</h4>

                                        <select class="form-select" id="sales-order"
                                                onchange="getOperationals(this.value)">
                                            <option selected value="">Pilih Sales Order Number</option>
                                            @foreach ($salesOrder as $item)
                                                <option value="{{ $item->id }}">{{ $item->so }}</option>
                                            @endforeach
                                        </select>

                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                            </div> <!-- end card-body-->
                        </div> <!-- end card -->
                    </div> <!-- end col -->
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card card-nbm">
                            <div class="card-body card-nbm">
                                <div class="row">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="header-title mb-2">Operational</h4>
                                            <select id="select-operational" class="form-select mb-2"
                                                    onchange="detailOperational(this.value, false)">
                                                <option selected value="">Silahkan Pilih SO</option>

                                            </select>
                                        </div> <!-- end col -->
                                    </div>

                                    <div class="row px-3">
                                        <div class="col-md-6">
                                            <th scope="row">
                                                <p class="title-text">SPK Number :</p>
                                                <p class="details-text" id="spk_number">-</p>
                                            </th>
                                            <th scope="row">
                                                <p class="title-text">Service Date :</p>
                                                <p class="details-text" id="date">-</p>
                                            </th>
                                            <th scope="row">
                                                <p class="title-text">Project Label :</p>
                                                <p class="details-text" id="label">-</p>
                                            </th>
                                            <th scope="row">
                                                <p class="title-text">Service Type :</p>
                                                <p class="details-text" id="type">-</p>
                                            </th>
                                            <th scope="row">
                                                <p class="title-text">File</p>
                                                <p class="details-text" id="file">-</p>
                                            </th>
                                        </div>
                                        <div class="col-md-6">
                                            <th scope="row">
                                                <p class="title-text">Description</p>
                                                <p class="details-text" id="description">-</p>
                                            </th>
                                            <th scope="row">
                                                <p class="title-text">Approved by</p>
                                                <p class="details-text" id="approved">-</p>
                                            </th>
                                            <th scope="row">
                                                <p class="title-text">Transportation Mode</p>
                                                <p class="details-text" id="transport">-</p>
                                            </th>
                                            <th scope="row">
                                                <p class="title-text">Vehicle Number</p>
                                                <p class="details-text" id="vehicle">-</p>
                                            </th>
                                            <th scope="row">
                                                <p class="title-text">Created by</p>
                                                <p class="details-text" id="created">-</p>
                                            </th>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-nbm text-center">
                                                <div class="card-header bg-transparent border-bottom">
                                                    <ul class="nav nav-tabs card-header-tabs" role="tablist">
                                                        <li class="nav-item">
                                                            <button type="button" class="nav-link active show"
                                                                    href="#work"
                                                                    role="tab" data-toggle="tab">Work Plan
                                                            </button>
                                                        </li>
                                                        <li class="nav-item">
                                                            <button type="button" class="nav-link" role="tab"
                                                                    href="#expenses" data-toggle="tab">Operational
                                                                Expenses
                                                            </button>
                                                        </li>
                                                        <li class="nav-item">
                                                            <button type="button" class="nav-link" role="tab"
                                                                    href="#material" data-toggle="tab">Material
                                                                Utilized
                                                            </button>
                                                        </li>
                                                        <li class="nav-item">
                                                            <button type="button" class="nav-link" role="tab"
                                                                    href="#technician" data-toggle="tab"
                                                                    id="technician_list">Technician
                                                                List
                                                            </button>
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
                                                                            <table class="table table-striped table-hover mb-0">
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
                                                                                    <td><span
                                                                                            class="badge bg-info">Planned</span>
                                                                                    </td>
                                                                                </tr>
                                                                                <th scope="row">2</th>
                                                                                <td>N-23009</td>
                                                                                <td>Dummy Work Plans</td>
                                                                                <td>11/09/2023</td>
                                                                                <td><span class="badge bg-warning">On
                                                                                        Progress</span></td>
                                                                                </tr>
                                                                                <th scope="row">3</th>
                                                                                <td>N-23009</td>
                                                                                <td>Dummy Work Plans</td>
                                                                                <td>11/09/2023</td>
                                                                                <td><span
                                                                                        class="badge bg-success">Completed</span>
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
                                                    <div role="tabpanel" class="tab-pane fade" id="expenses">
                                                        <div class="row text-start">
                                                            <div class="col-lg-12">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div class="table-responsive">
                                                                            <table class="table table table-striped table-hover mb-0">
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
                                                                            <table class="table table table-striped table-hover mb-0">
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
                                                                            <table class="table table table-striped table-hover mb-0"
                                                                                   id="table-technician">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>#</th>
                                                                                    <th>Name</th>
                                                                                    <th>Division</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
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
@section('pageScript')
    <script type="text/javascript">
        function getOperationals(salesOrder) {
            if (salesOrder !== "" && salesOrder != null) {
                $.ajax({
                    url: "{{ route('operational.get-operational', '') }}" + "/" + salesOrder,
                    type: "GET",
                    success: function (data) {
                        console.log(data);
                        $(`#select-operational`).empty();
                        $(`#select-operational`).append(`<option selected value="">Pilih Operational</option>`);
                        $.each(data, function (key, value) {
                            var option = new Option(value.spk_number, value.id, false, false);
                            $("#select-operational").append(option)
                        });
                    }
                });
            }
        }
    </script>
    <script type="text/javascript">
        function detailOperational(operational) {
            if (operational !== "" && operational != null) {
                console.log(operational);

                $.ajax({
                    url: "{{ route('operational.show', '') }}" + "/" + operational,
                    type: "GET",
                    success: function (data) {
                        console.log(data);

                        // Get the first operational in the array.
                        const operational = data[0];

                        // Get the project label.
                        const projectLabel = operational.project.label;

                        $('#spk_number').text(operational.spk_number);
                        $('#date').text(operational.date);
                        $('#label').text(projectLabel);
                        $('#type').text(operational.type);
                        $('#file').text(operational.file);
                        $('#description').text(operational.description);
                        $('#transport').text(operational.transportation_mode);
                        $('#vehicle').text(operational.vehicle_number);
                        $('#created').text(operational.created_by);
                        if (operational.approved == null) {
                            $('#approved').text('Belum di Approve');
                            //text become red button
                            $('#approved').addClass('btn btn-danger disabled');
                        } else {
                            $('#approved').text(operational.approved);
                        }
                            var i = 1;
                        //check if team is empty
                        if (operational.team.length == 0) {
                            $('#table-technician tbody').append(`
                            <tr>
                                <td colspan="3" align="center">Belum ada Technician</td>
                            </tr>
                          `);
                        } else {
                            //looping team
                        for (const member of operational.team) {
                            console.log(member.first_name);
                            $('#table-technician tbody').append(`
                            <tr>
                                <th scope="row">${i}</th>
                                <td>${(member.first_name + member.last_name)}</td>
                                <td>${member.division}</td>
                            </tr>
                          `);
                            i++
                        }
                    }
                }
            });

            } else {
                // Cancel the AJAX call.
                event.preventDefault();
            }
        }

    </script>
    {{--    <script type="text/javascript">--}}
    {{--        function technicianList(operational){--}}
    {{--            if (operational !== "" && operational != null)--}}
    {{--            {--}}
    {{--                $.ajax({--}}
    {{--                    url: "{{ route('operational.get-team', '') }}" + "/" + operational,--}}
    {{--                    type: "GET",--}}
    {{--                    success: function (data){--}}
    {{--                        console.log(data);--}}
    {{--                    }--}}
    {{--                })--}}
    {{--            }--}}
    {{--        }--}}
    {{--    </script>--}}
@endsection
