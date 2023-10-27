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

    .pagination-nav nav{
        width: 100%;
        justify-content: space-around; 
    }

    /* .pagination-nav .pagination .active  {
    } */
    .page-item.active .page-link {
        background-color: #FF3E3E;
        border: #FF3E3E;
    }

    .pagination ul li{
        height: 100%;
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


                    {{-- card term of payment --}}
                    <div class="card">
                        <div class="card-body">
                            <div class="row table-title">
                                <div class="col-sm-8">
                                    <h4 class="mt-0 header-title">Term Of Payment</h4>
                                </div>
                                <div class="col-sm-4">
                                    <a href="{{ route('top.create', ['id' => $projectData->id]) }}"
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
                                        @if ($tops->isEmpty())
                                        <tr>
                                            <td colspan="6" align="center">Belum ada payment</td>
                                        </tr>
                                        @else
                                        @php($index = 1)
                                        @foreach ($tops as $top)
                                        <tr>
                                            <th scope="row">{{ $index++ }}</th>
                                            <td>{{ $top['type'] }}</td>
                                            <td class="persentasiAngka">{{ $top['progress'] }}%</td>
                                            <td>{{ $top['description'] }}</td>
                                            <td class="text-center">
                                                <span
                                                    class="badge {{ $top['status'] === 'Done' ? 'bg-success' : 'bg-warning' }}">
                                                    {{ $top['status'] }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group btn-group-sm" style="float: none;">
                                                    <button title="unduh file" type="button"
                                                        class="tabledit-edit-button btn btn-success waves-effect waves-light">
                                                        <span class="mdi mdi-file-download-outline"></span>
                                                    </button>
                                                </div>
                                                <div class="btn-group btn-group-sm" style="float: none;">
                                                    <button title="edit data" type="button" data-bs-toggle="modal"
                                                        value="{{ $top['id'] }}" data-bs-target="#edit-payment-modal"
                                                        title="Edit Payment"
                                                        class="tabledit-edit-button paymentEdit btn btn-primary waves-effect waves-light"
                                                        style="background-color: #3E8BFF;">
                                                        <span class="mdi mdi-pencil"></span>
                                                    </button>
                                                </div>
                                                <div class="btn-group btn-group-sm" style="float: none;">
                                                    <button title="hapus data" type="button" value="{{ $top['id'] }}"
                                                        class="tabledit-edit-button hapusPayment btn btn-danger">
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
                                                        value="{{ $cost['id'] }}" style="background-color: #3E8BFF;">
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
                                        @foreach ($milestones as $key => $milestone)
                                        <tr>
                                            <th scope="row">{{ $key + $milestones->firstItem() }}</th>
                                            <td class="formatTanggal">{{ $milestone['submitted_date'] }}</td>
                                            <td>{{ $milestone['description'] }}</td>
                                            <td class="formatTanggal">{{ $milestone['due_date'] }}</td>
                                            <td class="text-center">
                                                <span class="badge
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
                                                        data-bs-toggle="modal" data-bs-target="#edit-milestone-modal"
                                                        value="{{ $milestone['id'] }}"
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
                                <div class="pagination-nav mt-2 d-flex justify-content-around">
                                    {{ $milestones->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- card table record document --}}
                    <div class="card">
                        <div class="card-body">
                            <div class="row table-title">
                                <div class="col-sm-8">
                                    <h4 class="mt-0 header-title">Record Document</h4>
                                </div>
                                <div class="col-sm-4">
                                    <a href="{{ url('projects/createRecord') }}"
                                        class="btn btn-createItems w-md waves-effect waves-light mb-3"><i
                                            class="mdi mdi-plus" title="Menambahkan milestone"></i>Add Record</a>
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
                                        {{-- @if ($milestones->isEmpty())
                                        <tr>
                                            <td colspan="6" align="center">Belum ada milestone</td>
                                        </tr>
                                        @else
                                        @php($index = 1)
                                        @foreach ($milestones as $milestone) --}}
                                        <tr>
                                            <th scope="row">1</th>
                                            <td class="formatTanggal"></td>
                                            <td>dummy desc</td>
                                            <td class="formatTanggal"></td>
                                            <td class="text-center">
                                                <span class="badge bg-success
                                                                {{-- @if ($milestone['progress'] == 'Done') bg-success
                                                                @elseif($milestone['progress'] == 'Planned')
                                                                bg-primary
                                                                @elseif($milestone['progress'] == 'On Progress')
                                                                bg-warning @endif --}}
                                                            ">done</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group btn-group-sm" style="float: none;">
                                                    <a href="" title="Download File Record" type="button"
                                                        class="tabledit-edit-button btn btn-success waves-effect waves-light"
                                                        download>
                                                        <span class="mdi mdi-file-download-outline"></span>
                                                    </a>
                                                </div>
                                                <div class="btn-group btn-group-sm" style="float: none;">
                                                    <button title="Edit Record" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#edit-record-modal"
                                                        class="tabledit-edit-button btn btn-primary waves-effect waves-light"
                                                        style="background-color: #3E8BFF;">
                                                        <span class="mdi mdi-pencil"></span>
                                                    </button>
                                                </div>
                                                <div class="btn-group btn-group-sm" style="float: none;">
                                                    <button id="deleteButton" title="Hapus Record" type="button"
                                                        value="" class="tabledit-edit-button btn btn-danger">
                                                        <span class="mdi mdi-trash-can-outline"></span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        {{-- @endforeach
                                        @endif --}}
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
                                    <a href="{{ route('operational.create', ['id' => $projectData->id]) }}"
                                        class="btn btn-createItems w-md waves-effect waves-light mb-3"><i
                                            class="mdi mdi-plus"></i>Add Operational</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Description</th>
                                            <th>Service Date</th>
                                            <th>Service Type</th>
                                            <th>SPK Code</th>
                                            <th class="text-center">Amount</th>
                                            <th class="text-center" width="140">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($operationals->isEmpty())
                                        <tr>
                                            <td colspan="7" align="center">Belum ada operational service</td>
                                        </tr>
                                        @else
                                        @php($index = 1)
                                        @foreach ($operationals as $operational)
                                        <tr>
                                            <th scope="row">{{ $index++ }}</th>
                                            <td>{{ $operational['spk_code'] }}
                                            </td>
                                            <td class="formatTanggal">{{ $operational['date'] }}</td>
                                            <td>{{ $operational['type'] }}</td>
                                            <td>{{ $operational['spk_number'] }}</td>
                                            <td class="text-center rupiah">{{ $operational['amount'] }}</td>
                                            <td class="text-center truncate-text">
                                                <a href="{{ route('operational.showById', ['id' => $operational->id]) }}"
                                                    class="tabledit-edit-button btn btn-info waves-effect waves-light"
                                                    title="Detail operational" style="padding: 0.25rem 0.8rem;">
                                                    <span class="mdi mdi-eye"></span>
                                                    </button>
                                                </a>
                                                <div class="btn-group btn-group-sm" style="float: none;">
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#edit-service-modal"
                                                        title="Edit Field Service Log" value="{{ $operational->id }}"
                                                        class="tabledit-edit-button editOperational btn btn-primary waves-effect waves-light"
                                                        style="background-color: #3E8BFF;">
                                                        <span class="mdi mdi-pencil"></span>
                                                    </button>
                                                </div>
                                                <div class="btn-group btn-group-sm" style="float: none;">
                                                    <button title="hapus data operational" type="button"
                                                        value="{{ $operational->id }}"
                                                        class="tabledit-edit-button hapusOperational btn btn-danger">
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
                                        <a href="{{ route('projects.editProjects', ['id' => $project->id]) }}">
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
                                                            <canvas id="donut-chart" class="py-1" width="200"></canvas>
                                                            {{--
                                                        </div> --}}
                                                    </div>
                                                    <div class="col-md-6 px-4">
                                                        {{-- <div style="width: fit-content; height: fit-content;"> --}}
                                                            <p class="title-text">Progress Payment</p>
                                                            <canvas id="donut-chart2" class="py-1" width="200"></canvas>
                                                            {{--
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                </p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td scope="row" style="font-size: 20px;"
                                                class="{{ $realCost > $projectData->preliminary_cost ? 'text-danger' : 'text-success' }} rupiah">
                                                <p class="title-text">Real Production Cost</p>
                                                <div style="display: flex; align-items: start;">
                                                    <p class="rupiah" style="font-weight: bold;">
                                                        {{ $realCost }}
                                                    </p>
                                                    <p class="text-light"
                                                        style="font-size: 15px; border-radius: 10px; margin-left: 5px; padding: 2px 4px; background-color: {{ $realCost <= $projectData->preliminary_cost ? 'green' : 'red' }}">
                                                        {{ $realCost <= $projectData->preliminary_cost ? '+' : '-' }}
                                                            <span class="rupiah">
                                                                {{ abs($realCost - $projectData->preliminary_cost)
                                                                }}</span>
                                                    </p>

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row" style="font-size: 20px;"
                                                class="{{ $realService > $projectData->expense_budget ? 'text-danger' : 'text-success' }} rupiah">
                                                <p class="title-text">Real Service Cost</p>
                                                <div style="display: flex; align-items: start;">
                                                    <p class="rupiah" style="font-weight: bold;">
                                                        {{ $realService }}
                                                    </p>
                                                    <p class="text-light"
                                                        style="font-size: 15px; border-radius: 10px; margin-left: 5px; padding: 2px 4px; background-color: {{ $realService <= $projectData->expense_budget ? 'green' : 'red' }}">
                                                        {{ $realService <= $projectData->expense_budget ? '+' : '-' }}
                                                            <span class="rupiah">
                                                                {{ abs($realService - $projectData->expense_budget)
                                                                }}</span>
                                                    </p>

                                                </div>
                                            </td>
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
                                                <p class="details-text">{{ $project->projectManager->first_name }}
                                                    {{ $project->projectManager->last_name }}</p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <p class="title-text">Sales Executive</p>
                                                <p class="details-text">{{ $project->salesExecutive->first_name }}
                                                    {{ $project->salesExecutive->last_name }}</p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <p class="title-text">Start Date</p>
                                                <p class="details-text formatTanggal">{{ $projectData['start_date'] }}
                                                </p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <p class="title-text">End Date</p>
                                                <p class="details-text formatTanggal">{{ $projectData['end_date'] }}
                                                </p>
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
                                                <p class="title-text">Service Budget</p>
                                                <p class="details-text rupiah">{{ $projectData['expense_budget'] }}
                                                </p>
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
            plugins: [{
                id: 'text',
                beforeDraw: function(chart, a, b) {
                    var width = chart.width,
                        height = chart.height,
                        ctx = chart.ctx;

                    ctx.restore();
                    var fontSize = (height / 100).toFixed(2);
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
        var progress = {{ $topProgress }};
        var notProgress = 100 - progress;


        var ctx = document.getElementById("donut-chart2").getContext("2d");

        var donutChart = new Chart(ctx, {
            type: "doughnut", // Specifies the chart type as a donut chart
            data: {
                labels: labels,
                datasets: [{
                    data: [progress, notProgress],
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
                    var fontSize = (height / 100).toFixed(2);
                    ctx.font = fontSize + "em sans-serif";
                    ctx.textBaseline = "middle";

                    var text = Math.round(progress) + "%";
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
                    cancelButtonText: 'Cancel',
                    backrop: 'static',
                    allowOutsideClick: false
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
                    cancelButtonText: 'Cancel',
                    backrop: 'static',
                    allowOutsideClick: false
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
                    cancelButtonText: 'Cancel',
                    backrop: 'static',
                    allowOutsideClick: false
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

{{-- Hapus Payment Pop Up --}}
<script type="text/javascript">
    $(document).ready(function() {
            $(document).on('click', '.hapusPayment', function() {
                var id = $(this).val();

                // Display a confirmation dialog
                Swal.fire({
                    title: "Anda yakin?",
                    text: "Data tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#f34e4e',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel',
                    backrop: 'static',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Silahkan isi logika nya sendiri xixixi
                        $.ajax({
                            url: "{{ route('top.destroy', '') }}" + '/' + id,
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

{{-- Hapus Operational Pop Up --}}
<script type="text/javascript">
    $(document).ready(function() {
            $(document).on('click', '.hapusOperational', function() {
                var id = $(this).val();

                // Display a confirmation dialog
                Swal.fire({
                    title: "Anda yakin?",
                    text: "Beberapa data yang terkait mungkin akan terhapus",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#f34e4e',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel',
                    backrop: 'static',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Silahkan isi logika nya sendiri xixixi
                        $.ajax({
                            url: "{{ route('operational.destroy', '') }}" + '/' + id,
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

{{-- Payment edit --}}
<script>
    $(document).ready(function() {
            $(document).on('click', '.paymentEdit', function() {
                var id = $(this).val(); // Menggunakan data-id yang baru
                $.ajax({
                    type: "GET",
                    url: "/top/get-payment-data/" + id,
                    dataType: "json",
                    success: function(response) {
                        $("#id_payment").val(response.id);
                        $("#type_payment").val(response.type);
                        $("#progress_payment").val(response.progress);
                        $("#description_payment").val(response.description);
                        $("#status_payment").val(response.status);
                    },
                    error: function(response) {
                        alert("Error: " + response.statusText);
                    }
                });
            });
        });
</script>

{{-- Operational edit --}}
<script>
    $(document).ready(function() {
            $(document).on('click', '.editOperational', function() {
                var id = $(this).val(); // Menggunakan data-id yang baru
                $.ajax({
                    type: "GET",
                    url: "/operational/get-operational-data/" + id,
                    dataType: "json",
                    success: function(response) {
                        $("#type_operational option[value='" + response.type + "']").prop(
                            'selected', true);
                        $("#transportation_mode_operational option[value='" + response
                            .transportation_mode + "']").prop('selected', true);
                        $("#spk_code_operational option[value='" + response.spk_code + "']")
                            .prop('selected', true);
                        $("#id_operational").val(response.id);
                        $("#vehicle_number_operational").val(response.vehicle_number);
                        $("#description_operational").val(response.description);
                        $("#created_by_operational").val(response.created_by);
                        $("#spk_number_operational").val(response.spk_number.split('-')[1]);
                        $("#date_operational").val(response.date);
                        $("#code-Spk").text(
                            response.spk_code + " - ");
                        var initialMode = $("#transportation_mode_operational")
                            .val(); // Mendapatkan nilai awal
                        if (initialMode === 'mobil') {
                            $("#vehicle_number_container").show();
                        } else {
                            $("#vehicle_number_container").hide();
                        }
                    },
                    error: function(response) {
                        alert("Error: " + response.statusText);
                    }
                });
            });

            // etting Modal edit operational
            $("#spk_code_operational").on("change", function() {
                var selectedCode = $(this).val(); // Mendapatkan nilai yang dipilih dalam dropdown
                $("#code-Spk").text(
                    selectedCode + " - "
                ); // Mengubah teks pada elemen #code-Spk sesuai dengan nilai yang dipilih
            });

            $("#transportation_mode_operational").on("change", function() {
                var selectedMode = $(this).val(); // Mendapatkan nilai yang dipilih dalam dropdown

                // Cek apakah mode yang dipilih adalah 'mobil'
                if (selectedMode === 'mobil') {
                    // Jika 'mobil' dipilih, tampilkan elemen #vehicle_number_container
                    $("#vehicle_number_container").show();
                } else {
                    // Jika bukan 'mobil', sembunyikan elemen #vehicle_number_container
                    $("#vehicle_number_container").hide();
                }
            });


        });
</script>
@endsection