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
    </style>

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-7">
                        <a href="{{ url('createProjects') }}"
                            class="btn btn-createProjects w-md waves-effect waves-light mb-3 px-4"><i
                                class="mdi mdi-plus"></i> Create Project</a>
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
                                <div class="dropdown-menu dropdown-lg" id="search-dropdown">
                                    <!-- item-->
                                    <div class="dropdown-header noti-title">
                                        <h5 class="text-overflow mb-2">Found 22 results</h5>
                                    </div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-home me-1"></i>
                                        <span>Analytics Report</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-aperture me-1"></i>
                                        <span>How can I help you?</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-settings me-1"></i>
                                        <span>User profile settings</span>
                                    </a>

                                    <!-- item-->
                                    <div class="dropdown-header noti-title">
                                        <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                                    </div>

                                    <div class="notification-list">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="d-flex align-items-start">
                                                <img class="d-flex me-2 rounded-circle"
                                                    src="http://127.0.0.1:8000/templateAdmin/Admin/dist/assets/images/users/user-2.jpg"
                                                    alt="Generic placeholder image" height="32">
                                                <div class="w-100">
                                                    <h5 class="m-0 font-14">Erwin E. Brown</h5>
                                                    <span class="font-12 mb-0">UI Designer</span>
                                                </div>
                                            </div>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="d-flex align-items-start">
                                                <img class="d-flex me-2 rounded-circle"
                                                    src="http://127.0.0.1:8000/templateAdmin/Admin/dist/assets/images/users/user-5.jpg"
                                                    alt="Generic placeholder image" height="32">
                                                <div class="w-100">
                                                    <h5 class="m-0 font-14">Jacob Deo</h5>
                                                    <span class="font-12 mb-0">Developer</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

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
                                    <div class="badge bg-danger float-end font-14">{{ $project['so'] }}</div>
                                    <div class="mt-0 project-title">{{ $project['label'] }}</div>
                                    <p class="font-13">{{ $project['companyName'] }}</p>
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
                                                class="btn btn-danger btn-detail rounded-pill px-3 waves-effect waves-light">Details</button>
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
    @endsection
