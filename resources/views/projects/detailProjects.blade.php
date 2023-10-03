@extends('template.index')

@section('content')
    <style>
        tr {
            vertical-align: middle;
        }

        .btn-createItems {
            border-radius: 10px;
            background-color: #FF3E3E;
            border: #FF3E3E;
            color: white;
            margin-right: 0;
            float: right;
            margin-left: auto;
            width: 150px;
        }

        .btn-createItems:focus {
            color: white;
        }

        @media screen and (max-width: 768px) {
            .container-fluid {
                flex-direction: column;
            }

            .detailProjects-col {
                order: 1;
                /* Change the order of the first div */
            }

            .tables-col {
                order: 2;
                /* Change the order of the second div */
            }
        }
    </style>


    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 tables-col">

                        @if (session('success'))
                            <div id="success-alert"></div>
                        @endif

                        {{-- card table milestones --}}
                        <div class="card">
                            <div class="card-body">
                                <div class="row table-title">
                                    <div class="col-sm-8">
                                        <h4 class="mt-0 header-title">Milestone</h4>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="{{ route('milestone.create', ['id' => $projectData->id]) }}"
                                            class="btn btn-createItems w-md waves-effect waves-light mb-3"><i
                                                class="mdi mdi-plus" title="Menambahkan milestone"></i>Add Milestone</a>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Entry Date</th>
                                                <th>Description</th>
                                                <th>Due Date</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center" width="160">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($milestones->isEmpty())
                                                <tr>
                                                    <td colspan="6" align="center">Belum ada milestone</td>
                                                </tr>
                                            @else
                                                @php($index = 1)
                                                @foreach ($milestones as $milestone)
                                                    <tr>
                                                        <th scope="row">{{ $index++ }}</th>
                                                        <td title="Submit date">{{ $milestone['submitted_date'] }}</td>
                                                        <td>{{ $milestone['description'] }}</td>
                                                        <td>{{ $milestone['due_date'] }}</td>
                                                        <td class="text-center">
                                                            <span
                                                                class="badge
                                                                @if ($milestone['progress'] == 'Done') bg-success
                                                                @elseif($milestone['progress'] == 'Planned')
                                                                bg-primary
                                                                @elseif($milestone['progress'] == 'On Progress')
                                                                bg-warning @endif
                                                            ">{{ $milestone['progress'] }}</span>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                                <a href="{{ asset('images/milestone_files/' . $milestone->file) }}"
                                                                    title="Download Gambar Milestone" type="button"
                                                                    class="tabledit-edit-button btn btn-success waves-effect waves-light"
                                                                    download>
                                                                    <span class="mdi mdi-file-download-outline"></span>
                                                                </a>
                                                            </div>
                                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                                <button title="Untuk mengedit milestone" type="button"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#edit-milestone-modal"
                                                                    value="{{ $milestone['id'] }}"
                                                                    title="Edit Field Service Log"
                                                                    class="tabledit-edit-button milestoneEdit btn btn-primary waves-effect waves-light"
                                                                    style="background-color: #3E8BFF;">
                                                                    <span class="mdi mdi-pencil"></span>
                                                                </button>
                                                            </div>
                                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                                <button id="deleteButton" title="Untuk menghapus milestone"
                                                                    type="button" value="{{ $milestone['id'] }}"
                                                                    class="tabledit-edit-button hapusMilestone btn btn-danger">
                                                                    <span class="mdi mdi-trash-can-outline"></span>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        {{-- card table production cost --}}
                        <div class="card">
                            <div class="card-body">
                                <div class="row table-title">
                                    <div class="col-sm-8">
                                        <h4 class="mt-0 header-title">Production Cost</h4>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="{{ url('projects/createProductionCost', ['id' => $projectData->id]) }}"
                                            class="btn btn-createItems w-md waves-effect waves-light mb-3"><i
                                                class="mdi mdi-plus"></i>Add Cost</a>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Description</th>
                                                <th>Amount</th>
                                                <th class="text-center" width="140">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($productionCost->isEmpty())
                                                <tr>
                                                    <td colspan="4" align="center">Belum ada production cost</td>
                                                </tr>
                                            @else
                                                @php($index = 1)
                                                @foreach ($productionCost as $cost)
                                                    <tr>
                                                        <th scope="row">{{ $index++ }}</th>
                                                        <td>{{ $cost['description'] }}</td>
                                                        <td class="rupiah">{{ $cost['amount'] }}</td>
                                                        <td class="text-center">
                                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                                <button title="Edit Production Cost" type="button"
                                                                    data-bs-toggle="modal" data-bs-target="#edit-cost-modal"
                                                                    class="tabledit-edit-button costEdit btn btn-primary waves-effect waves-light"
                                                                    value="{{ $cost['id'] }}"
                                                                    style="background-color: #3E8BFF;">
                                                                    <span class="mdi mdi-pencil"></span>
                                                                </button>
                                                            </div>
                                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                                <button title="Hapus Operational Cost" type="button"
                                                                    value="{{ $cost->id }}"
                                                                    class="tabledit-edit-button hapusPCost btn btn-danger">
                                                                    <span class="mdi mdi-trash-can-outline"></span>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        {{-- card table operational form --}}
                        <div class="card">
                            <div class="card-body">
                                <div class="row table-title">
                                    <div class="col-sm-8">
                                        <h4 class="mt-0 header-title">Field Service Log</h4>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="{{ url('projects/createOperational') }}"
                                            class="btn btn-createItems w-md waves-effect waves-light mb-3"><i
                                                class="mdi mdi-plus"></i>Add Operational</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>SPK Number</th>
                                                <th>Service Date</th>
                                                <th>Project Label</th>
                                                <th>Service Type</th>
                                                <th>SPK Code</th>
                                                <th class="text-center" width="140">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>SPK Number</td>
                                                <td>Service Date</td>
                                                <td>Project Label</td>
                                                <td>Service Type</td>
                                                <td>SPK Code</td>
                                                <td class="text-center">
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                        <button title="edit data" type="button" data-bs-toggle="modal"
                                                            data-bs-target="#edit-service-modal"
                                                            title="Edit Field Service Log"
                                                            class="tabledit-edit-button btn btn-primary waves-effect waves-light"
                                                            style="background-color: #3E8BFF;">
                                                            <span class="mdi mdi-pencil"></span>
                                                        </button>
                                                    </div>
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                        <button title="hapus data" type="button"
                                                            class="tabledit-edit-button btn btn-danger">
                                                            <span class="mdi mdi-trash-can-outline"></span>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>SPK Number</td>
                                                <td>Service Date</td>
                                                <td>Project Label</td>
                                                <td>Service Type</td>
                                                <td>SPK Code</td>
                                                <td class="text-center">
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                        <button title="edit data" type="button" data-bs-toggle="modal"
                                                            data-bs-target="#add-service-modal"
                                                            title="Edit Field Service Log"
                                                            class="tabledit-edit-button btn btn-primary waves-effect waves-light"
                                                            style="background-color: #3E8BFF;">
                                                            <span class="mdi mdi-pencil"></span>
                                                        </button>
                                                    </div>
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                        <button title="hapus data" type="button"
                                                            class="tabledit-edit-button btn btn-danger">
                                                            <span class="mdi mdi-trash-can-outline"></span>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>SPK Number</td>
                                                <td>Service Date</td>
                                                <td>Project Label</td>
                                                <td>Service Type</td>
                                                <td>SPK Code</td>
                                                <td class="text-center">
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                        <button title="edit data" type="button" data-bs-toggle="modal"
                                                            data-bs-target="#add-service-modal"
                                                            title="Edit Field Service Log"
                                                            class="tabledit-edit-button btn btn-primary waves-effect waves-light"
                                                            style="background-color: #3E8BFF;">
                                                            <span class="mdi mdi-pencil"></span>
                                                        </button>
                                                    </div>
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                        <button title="hapus data" type="button"
                                                            class="tabledit-edit-button btn btn-danger">
                                                            <span class="mdi mdi-trash-can-outline"></span>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        {{-- card term of payment --}}
                        <div class="card">
                            <div class="card-body">
                                <div class="row table-title">
                                    <div class="col-sm-8">
                                        <h4 class="mt-0 header-title">Term Of Payment</h4>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="{{ url('projects/createPayment') }}"
                                            class="btn btn-createItems w-md waves-effect waves-light mb-3"><i
                                                class="mdi mdi-plus"></i>Add Payment</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Payment Type</th>
                                                <th>Progress</th>
                                                <th>Description</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center" width="160">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>DP</td>
                                                <td>30%</td>
                                                <td>Tanda jadi pembayaran trafo</td>
                                                <td class="text-center"><span class="badge bg-success">Done</span></td>
                                                <td class="text-center">
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                        <button title="unduh file" type="button"
                                                            class="tabledit-edit-button btn btn-success waves-effect waves-light">
                                                            <span class="mdi mdi-file-download-outline"></span>
                                                        </button>
                                                    </div>
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                        <button title="edit data" type="button"
                                                            class="tabledit-edit-button btn btn-primary waves-effect waves-light"
                                                            style="background-color: #3E8BFF;">
                                                            <span class="mdi mdi-pencil"></span>
                                                        </button>
                                                    </div>
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                        <button title="hapus data" type="button"
                                                            class="tabledit-edit-button btn btn-danger">
                                                            <span class="mdi mdi-trash-can-outline"></span>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Tahap 1</td>
                                                <td>50%</td>
                                                <td>Bayar sisa pembayaran tahap 1</td>
                                                <td class="text-center"><span class="badge bg-success">Done</span></td>
                                                <td class="text-center">
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                        <button title="unduh file" type="button"
                                                            class="tabledit-edit-button btn btn-success waves-effect waves-light">
                                                            <span class="mdi mdi-file-download-outline"></span>
                                                        </button>
                                                    </div>
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                        <button title="edit data" type="button"
                                                            class="tabledit-edit-button btn btn-primary waves-effect waves-light"
                                                            style="background-color: #3E8BFF;">
                                                            <span class="mdi mdi-pencil"></span>
                                                        </button>
                                                    </div>
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                        <button title="hapus data" type="button"
                                                            class="tabledit-edit-button btn btn-danger">
                                                            <span class="mdi mdi-trash-can-outline"></span>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Tahap 2 - Pelunasan</td>
                                                <td>20%</td>
                                                <td>Melunasi sisa pembayaran</td>
                                                <td class="text-center"><span class="badge bg-warning">Progress</span>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                        <button title="untuk mengunduh file" type="button"
                                                            class="tabledit-edit-button btn btn-success waves-effect waves-light">
                                                            <span class="mdi mdi-file-download-outline"></span>
                                                        </button>
                                                    </div>
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                        <button type="button"
                                                            class="tabledit-edit-button btn btn-primary waves-effect waves-light"
                                                            style="background-color: #3E8BFF;">
                                                            <span class="mdi mdi-pencil"></span>
                                                        </button>
                                                    </div>
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                        <button type="button"
                                                            class="tabledit-edit-button btn btn-danger">
                                                            <span class="mdi mdi-trash-can-outline"></span>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        @include('projects.listModals')

                    </div><!-- end col-->

                    <div class="col-xl-4 detailProjects-col">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h4 class="mt-0 header-title">{{ $projectData['label'] }}</h4>
                                        <p class="text-muted font-14 mb-3">
                                            {{ $projectData['companyName'] }}
                                        </p>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="btn-group btn-group-sm" style="float: none;">
                                            <a href="{{ route('projects.createProjects') }}">
                                                <button title="edit data" type="button"
                                                    class="tabledit-edit-button btn btn-primary waves-effect waves-light"
                                                    style="background-color: #3E8BFF; padding: 0.28rem 0.8rem;">
                                                    <span class="mdi mdi-pencil"></span>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="btn-group btn-group-sm" style="float: none;">
                                            <button title="hapus data" type="button"
                                                class="tabledit-edit-button hapusProject btn btn-danger"
                                                value="{{ $projectData->id }}">
                                                <span class="mdi mdi-trash-can-outline"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row" class="pb-1">
                                                    <div class="row text-center">
                                                        <div class="col-md-6 px-4">
                                                            {{-- <div style="width: fit-content; height: fit-content;"> --}}
                                                            <p class="title-text">Progress Milestone</p>
                                                            <canvas id="donut-chart" class="py-1"
                                                                width="200"></canvas>
                                                            {{--
                                                        </div> --}}
                                                        </div>
                                                        <div class="col-md-6 px-4">
                                                            {{-- <div style="width: fit-content; height: fit-content;"> --}}
                                                            <p class="title-text">Progress Payment</p>
                                                            <canvas id="donut-chart2" class="py-1"
                                                                width="200"></canvas>
                                                            {{--
                                                        </div> --}}
                                                        </div>
                                                    </div>
                                                    </p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <p class="title-text">Purchase Order Number</p>
                                                    <p class="details-text">{{ $projectData['po'] }}</p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <p class="title-text">Sales Order Number</p>
                                                    <p class="details-text">{{ $projectData['so'] }}</p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <p class="title-text">Customer Contact Name</p>
                                                    <p class="details-text">{{ $projectData['contactName'] }}</p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <p class="title-text">Project Manager</p>
                                                    <p class="details-text">{{ $projectData['project_manager'] }}</p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <p class="title-text">Sales Executive</p>
                                                    <p class="details-text">{{ $projectData['sales_executive'] }}</p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <p class="title-text">Start Date</p>
                                                    <p class="details-text">{{ $projectData['start_date'] }}</p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <p class="title-text">End Date</p>
                                                    <p class="details-text">{{ $projectData['end_date'] }}</p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <p class="title-text">Purchase Order Amount</p>
                                                    <p class="details-text rupiah">{{ $projectData['po_amount'] }}</p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <p class="title-text">Preliminary Cost</p>
                                                    <p class="details-text rupiah">{{ $projectData['preliminary_cost'] }}
                                                    </p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <p class="title-text">Real Service Cost</p>
                                                    {{-- Rumus : Real Service Cost = Budget Service - Service Cost --}}
                                                    <p class="details-text rupiah"></p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <p class="title-text">Production Cost</p>
                                                    <p class="details-text rupiah">{{ $projectData['expense_budget'] }}
                                                    </p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td scope="row"
                                                    class="{{ $realCost > $projectData->expense_budget ? 'text-danger' : 'text-success' }} rupiah">
                                                    <p class="title-text">Real Production Cost</p>
                                                    <div style="display: flex; align-items: start;">
                                                        <p class="rupiah" style="font-weight: bold;">
                                                            {{ $realCost }}</p>
                                                        @if ($realCost > $projectData->expense_budget)
                                                            <p class="text-light"
                                                                style="font-size: 10px; border-radius: 10px; margin-left: 5px; padding:2px 4px; background-color: red;">
                                                                + <span {{-- rumus = real production cost = prelim cost - production cost --}}
                                                                    class="rupiah">{{ $realCost - $projectData->expense_budget }}</span>
                                                            </p>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div><!-- end col-->
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->

        </div> <!-- content -->
    </div>
@endsection

{{-- script js halaman detail project --}}
@section('pageScript')
    {{-- donut chart --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.pie.js"></script>

    {{-- js flot chart --}}


    <script>
        // Sample data
        var percentageDone = {{ $percentageDone }};
        var percentageNotDone = 100 - percentageDone;
        var labels = ["Done", "Not Done"]; // Label untuk setiap segmen

        var ctx = document.getElementById("donut-chart").getContext("2d");

        var donutChart = new Chart(ctx, {
            type: "doughnut",
            data: {
                labels: labels,
                datasets: [{
                    data: [percentageDone, percentageNotDone],
                    backgroundColor: ["#17D72A", "#F3F2F2"],
                }],
            },
            options: {
                cutout: "70%",
                elements: {
                    arc: {
                        borderWidth: 0,
                        borderRadius: 30,
                    },
                },
                plugins: {
                    legend: {
                        display: false, // Hide legend
                    },
                },
            },
            plugins: [{
                id: 'text',
                beforeDraw: function(chart, a, b) {
                    var width = chart.width,
                        height = chart.height,
                        ctx = chart.ctx;

                    ctx.restore();
                    var fontSize = (height / 120).toFixed(2);
                    ctx.font = fontSize + "em sans-serif";
                    ctx.textBaseline = "middle";

                    var percentageDone = {{ $percentageDone }};
                    var text = Math.round(percentageDone) + "%";
                    textX = Math.round((width - ctx.measureText(text).width) / 2),
                        textY = height / 2;

                    ctx.fillText(text, textX, textY);
                    ctx.save();
                }
            }],
        });


        // Function to format the labels
        function labelFormatter(label, series) {
            const formattedPercent = Math.round(series.percent).toFixed(0);
            return `<div style="font-size:8pt; text-align:center; padding:2px; color:white;">${label}<br/>${formattedPercent}%</div>`;
        }
    </script>

    <script>
        // Sample data
        var data = [70, 20];
        var labels = ["Paid", "Not Paid"];


        var ctx = document.getElementById("donut-chart2").getContext("2d");

        var donutChart = new Chart(ctx, {
            type: "doughnut", // Specifies the chart type as a donut chart
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: ["#FE3E3E", "#F3F2F2"], // Customize segment colors
                }, ],
            },
            options: {
                cutout: "70%", // Control the size of the hole in the middle (percentage)
                elements: {
                    arc: {
                        borderWidth: 0, // Remove border
                        borderRadius: 30, // Set border radius to round the edges
                    },
                },
                plugins: {
                    legend: {
                        display: false, // Hide legend
                    },
                },
            },
            plugins: [{
                id: 'text',
                beforeDraw: function(chart, a, b) {
                    var width = chart.width,
                        height = chart.height,
                        ctx = chart.ctx;

                    ctx.restore();
                    var fontSize = (height / 120).toFixed(2);
                    ctx.font = fontSize + "em sans-serif";
                    ctx.textBaseline = "middle";

                    var text = "75%",
                        textX = Math.round((width - ctx.measureText(text).width) / 2),
                        textY = height / 2;

                    ctx.fillText(text, textX, textY);
                    ctx.save();
                }
            }],
        });
    </script>

    {{-- Hapus Project Pop Up --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.hapusProject', function() {
                var id = $(this).val();

                // Display a confirmation dialog
                Swal.fire({
                    title: "Anda yakin?",
                    text: "Beberapa data mungkin akan ikut terhapus",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#f34e4e',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Silahkan isi logika nya sendiri xixixi
                        $.ajax({
                            url: "{{ route('projects.destroy', '') }}" + '/' + id,
                            type: 'DELETE',
                            data: {
                                _token: "{{ csrf_token() }}",
                            },
                            success: function(response) {
                                try {
                                    if (response.message) {
                                        Swal.fire({
                                            title: "Sukses!",
                                            text: response.message,
                                            icon: 'success',
                                            confirmButtonText: 'OK'
                                        }).then((hasil) => {
                                            if (hasil.isConfirmed) {
                                                window.location.href =
                                                    "{{ route('projects.index') }}";
                                            }
                                        });
                                    } else {
                                        console.error('Terjadi kesalahan: ' + response
                                            .error
                                        ); // Tampilkan pesan kesalahan jika ada
                                    }
                                } catch (error) {
                                    console.error(
                                        'Terjadi kesalahan saat mengolah respons: ' +
                                        error);
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error(
                                    'Terjadi kesalahan saat menghapus data: ' +
                                    error);
                            }
                        });

                    }
                });
            });
        });
    </script>
    {{-- Hapus Milestone Pop Up --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.hapusMilestone', function() {
                var id = $(this).val();

                // Display a confirmation dialog
                Swal.fire({
                    title: "Anda yakin?",
                    text: "Data tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#f34e4e',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Silahkan isi logika nya sendiri xixixi
                        $.ajax({
                            url: "{{ route('milestone.destroy', '') }}" + '/' + id,
                            type: 'DELETE',
                            data: {
                                _token: "{{ csrf_token() }}",
                            },
                            success: function(response) {
                                try {
                                    if (response.message) {
                                        Swal.fire({
                                            title: "Sukses!",
                                            text: response.message,
                                            icon: 'success',
                                            confirmButtonText: 'OK'
                                        }).then((hasil) => {
                                            if (hasil.isConfirmed) {
                                                window.location.reload();
                                            }
                                        });
                                    } else {
                                        console.error('Terjadi kesalahan: ' + response
                                            .error
                                        ); // Tampilkan pesan kesalahan jika ada
                                    }
                                } catch (error) {
                                    console.error(
                                        'Terjadi kesalahan saat mengolah respons: ' +
                                        error);
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error(
                                    'Terjadi kesalahan saat menghapus data: ' +
                                    error);
                            }
                        });

                    }
                });
            });
        });
    </script>

    {{-- Hapus Production Cost Pop Up --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.hapusPCost', function() {
                var id = $(this).val();

                // Display a confirmation dialog
                Swal.fire({
                    title: "Anda yakin?",
                    text: "Data tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#f34e4e',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Silahkan isi logika nya sendiri xixixi
                        $.ajax({
                            url: "{{ route('production-cost.destroy', '') }}" + '/' + id,
                            type: 'DELETE',
                            data: {
                                _token: "{{ csrf_token() }}",
                            },
                            success: function(response) {
                                try {
                                    if (response.message) {
                                        Swal.fire({
                                            title: "Sukses!",
                                            text: response.message,
                                            icon: 'success',
                                            confirmButtonText: 'OK'
                                        }).then((hasil) => {
                                            if (hasil.isConfirmed) {
                                                window.location.reload();
                                            }
                                        });
                                    } else {
                                        console.error('Terjadi kesalahan: ' + response
                                            .error
                                        ); // Tampilkan pesan kesalahan jika ada
                                    }
                                } catch (error) {
                                    console.error(
                                        'Terjadi kesalahan saat mengolah respons: ' +
                                        error);
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error(
                                    'Terjadi kesalahan saat menghapus data: ' +
                                    error);
                            }
                        });

                    }
                });
            });
        });
    </script>

    {{-- Milestone edit --}}
    <script>
        $(document).ready(function() {
            $(document).on('click', '.milestoneEdit', function() {
                var id = $(this).val(); // Menggunakan data-id yang baru
                $.ajax({
                    type: "GET",
                    url: "/get-milestone-data/" + id,
                    dataType: "json",
                    success: function(response) {
                        $("#milestone_id").val(response.id);
                        $("#submitted_date").val(response.submitted_date);
                        $("#description").val(response.description);
                        $("#due_date").val(response.due_date);
                        $("#progress").val(response.progress);
                    },
                    error: function(response) {
                        alert("Error: " + response.statusText);
                    }
                });
            });
        });
    </script>

    {{-- Production Cost edit --}}
    <script>
        $(document).ready(function() {
            $(document).on('click', '.costEdit', function() {
                var id = $(this).val(); // Menggunakan data-id yang baru
                $.ajax({
                    type: "GET",
                    url: "/get-cost-data/" + id,
                    dataType: "json",
                    success: function(response) {
                        $("#cost_id").val(response.id);
                        $("#description_cost").val(response.description);
                        $("#amount_cost").val(parseInt(response
                            .amount)); // Menggunakan parseInt() untuk menghapus angka desimal
                    },
                    error: function(response) {
                        alert("Error: " + response.statusText);
                    }
                });
            });
        });
    </script>
@endsection
