@extends('template.index')

@section('content')
    <style>
        .btn-createProjects {
            border-radius: 10px;
            background-color: #FF3E3E;
            border: #FF3E3E;
            color: white;

        }

        .btn-createProjects:focus {
            color: white;
        }

        .project-detail {
            float: right;
            margin-left: auto;
            margin-right: 0;
        }

        .btn-detail {
            border-radius: 10px;
        }

        .operational-cost {
            float: right;
            margin-left: auto;
            margin-right: 0;
        }

        .project-title {
            font-weight: 900;
            font-size: 1.125rem;
        }

        .bg-so {
            background-color: #dc3545;
            /* Warna default, misalnya merah */
        }

        /* CSS untuk mengubah latar belakang menjadi warning ketika "so" kosong atau "Perlu diisi" */
        .bg-so:empty,
        /* Ketika kosong */
        .bg-so:contains("Nomor SO Belum diisi") {
            /* Ketika isinya "Perlu diisi" */
            background-color: #ffc107;
            /* Warna warning, misalnya kuning */
        }
    </style>

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <div class="row mb-2">
                    <div class="col-sm-7">
                        <a href="{{ route('projects.createProjects') }}"
                            class="btn btn-createProjects w-md waves-effect waves-light mb-3 px-4"
                            title="Untuk menambahkan project"><i class="mdi mdi-plus" title="Untuk menambahkan project"></i>
                            Create Project</a>
                    </div>
                    <div class="col-sm-5">
                        <form class="app-search" action="{{ route('projects.index') }}">
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
                </div>
                <!-- end row -->

                {{-- Start row --}}
                <div class="row">

                    @foreach ($projects as $project)
                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body project-box">
                                    <div
                                        class="badge {{ $project['so'] == '' || $project['so'] == 'Nomor SO Belum diisi' ? 'bg-warning' : 'bg-danger' }} float-end font-14">
                                        {{ $project['so'] }}
                                    </div>
                                    <div class="mt-0 project-title">{{ $project['label'] }}</div>
                                    <p class="font-13">{{ $project['customer']['companyName'] }}</p>
                                    <p class="text-muted font-15">Project Manager : {{ $project['project_manager'] }}</p>
                                    <p class="text-muted font-15">Sales Executive : {{ $project['sales_executive'] }}</p>

                                    <ul class="list-inline">
                                        <li class="list-inline-item me-4">
                                            <h4 class="mb-0">{{ $project['preliminary_cost'] }}</h4>
                                            <p class="text-muted">Preliminary Cost</p>
                                        </li>
                                        <li class="list-inline-item operational-cost">
                                            <h4 class="mb-0">{{ $project['expense_budget'] }}</h4>
                                            <p class="text-muted">Operational Cost</p>
                                        </li>
                                    </ul>

                                    <div class="project-detail">
                                        <a href="{{ route('projects.show', ['id' => $project->id]) }}">
                                            <button type="button"
                                                class="btn btn-danger btn-detail rounded-pill px-3 waves-effect waves-light"
                                                title="Melihat detail project">Details</button>
                                        </a>
                                    </div>

                                </div>
                            </div>

                        </div><!-- end col-->
                    @endforeach

                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->

        </div> <!-- content -->
    </div>
@endsection
