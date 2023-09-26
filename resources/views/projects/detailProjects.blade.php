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
        }

        .btn-createItems:focus {
            color: white;
        }

        .table-title {
            vertical-align: middle !important;
        }

        .details-text {
            margin-bottom: unset;
        }

        .title-text {
            margin-bottom: unset;
            font-weight: 100;
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
                        <div class="card">
                            <div class="card-body">
                                <div class="row table-title">
                                    <div class="col-sm-8">
                                        <h4 class="mt-0 header-title">Milestone</h4>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="{{ route('milestone.create', ['id' => $projectData->id]) }}"
                                            class="btn btn-createItems w-md waves-effect waves-light mb-3 px-4"><i
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
                                                <th class="text-center">Actions</th>
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
                                                                <a href="{{ asset('images/milestone_file/' . $milestone->file) }}"
                                                                    title="Download Gambar Milestone" type="button"
                                                                    class="tabledit-edit-button btn btn-success waves-effect waves-light"
                                                                    download>
                                                                    <span class="mdi mdi-file-download-outline"></span>
                                                                </a>
                                                            </div>
                                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                                <button title="Untuk mengedit milestone" type="button"
                                                                    class="tabledit-edit-button btn btn-primary waves-effect waves-light"
                                                                    style="background-color: #3E8BFF;">
                                                                    <span class="mdi mdi-pencil"></span>
                                                                </button>
                                                            </div>
                                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                                <button title="Untuk menghapus milestone" type="button"
                                                                    class="tabledit-edit-button btn btn-danger">
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
                                            class="btn btn-createItems w-md waves-effect waves-light mb-3 px-4"><i
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
                                                <th class="text-center">Actions</th>
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
                                                        <td>{{ $cost['amount'] }}</td>
                                                        <td class="text-center">
                                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                                <button title="Untuk mengedit production cost"
                                                                    type="button"
                                                                    class="tabledit-edit-button btn btn-primary waves-effect waves-light"
                                                                    style="background-color: #3E8BFF;">
                                                                    <span class="mdi mdi-pencil"></span>
                                                                </button>
                                                            </div>
                                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                                <button title="Untuk menghapus operational cost"
                                                                    type="button"
                                                                    class="tabledit-edit-button btn btn-danger">
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
                                            class="btn btn-createItems w-md waves-effect waves-light mb-3 px-4"><i
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
                                                <th class="text-center">Actions</th>
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
                                                <td>SPK Number</td>
                                                <td>Service Date</td>
                                                <td>Project Label</td>
                                                <td>Service Type</td>
                                                <td>SPK Code</td>
                                                <td class="text-center">
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
                                                <td>SPK Number</td>
                                                <td>Service Date</td>
                                                <td>Project Label</td>
                                                <td>Service Type</td>
                                                <td>SPK Code</td>
                                                <td class="text-center">
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
                                            class="btn btn-createItems w-md waves-effect waves-light mb-3 px-4"><i
                                                class="mdi mdi-plus"></i>Add Payment</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Payment Date</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Description</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Payment Date</td>
                                                <td>Amount</td>
                                                <td>Status</td>
                                                <td>Description</td>
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
                                                <td>SPK Number</td>
                                                <td>Service Date</td>
                                                <td>Project Label</td>
                                                <td>Service Type</td>
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
                                                <td>SPK Number</td>
                                                <td>Service Date</td>
                                                <td>Project Label</td>
                                                <td>Service Type</td>
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

                    </div><!-- end col-->

                    <div class="col-xl-4 detailProjects-col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">{{ $projectData['label'] }}</h4>
                                <p class="text-muted font-14 mb-3">
                                    {{ $projectData['companyName'] }}
                                </p>
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">
                                                    <div class="row text-center">
                                                        <div class="col-md-6 px-4">
                                                            {{-- <div style="width: fit-content; height: fit-content;"> --}}
                                                            <p class="title-text">Progress Milestone</p>
                                                            <canvas id="donut-chart"></canvas>
                                                            {{--
                                                        </div> --}}
                                                        </div>
                                                        <div class="col-md-6 px-4">
                                                            {{-- <div style="width: fit-content; height: fit-content;"> --}}
                                                            <p class="title-text">Progress Payment</p>
                                                            <canvas id="donut-chart2" width="200"></canvas>
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
                                                    <p class="title-text">Preliminary Cost</p>
                                                    <p class="details-text">{{ $projectData['preliminary_cost'] }}</p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <p class="title-text">Purchase Order Amount</p>
                                                    <p class="details-text">{{ $projectData['po_amount'] }}</p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <p class="title-text">Real Cost</p>
                                                    <p class="details-text">{{ $projectData['expense_budget'] }}</p>
                                                </th>
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
        // var labels = ["Total"];


        var ctx = document.getElementById("donut-chart2").getContext("2d");

        var donutChart = new Chart(ctx, {
            type: "doughnut", // Specifies the chart type as a donut chart
            data: {
                // labels: labels,
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
            },
        });
    </script>
@endsection
