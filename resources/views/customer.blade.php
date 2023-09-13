@extends('template.index')

@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row ">
                            <div class="col-sm-7">
                                <a href="#" class="btn btn-createProjects btn-danger w-md waves-effect waves-light mb-2 px-4 "><i class="mdi mdi-plus rounded-15"></i> Add Customer</a>
                            </div>
                            <div class="col-sm-5">
                                <form class="app-search" action="">
                                    <div class="app-search-box">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="search" placeholder="Search..." id="top-search">
                                            <button class="btn input-group-text" type="submit">
                                                <i class="fe-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- end col-->
                        </div>
                        <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
                <div class="row mt-1">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown float-end">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                    </div>
                                </div>


                                <h4 class="header-title mt-0 mb-3">Latest Projects</h4>

                                <div class="table-responsive">
                                    {{-- <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Project Name</th>
                                                <th>Start Date</th>
                                                <th>Due Date</th>
                                                <th>Project Manager</th>
                                                <th>Sales Executive</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Adminto Admin v1</td>
                                                <td>01/01/2017</td>
                                                <td>26/04/2017</td>
                                                <td><span class="badge bg-danger">Released</span></td>
                                                <td>Coderthemes</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Adminto Frontend v1</td>
                                                <td>01/01/2017</td>
                                                <td>26/04/2017</td>
                                                <td><span class="badge bg-success">Released</span></td>
                                                <td>Adminto admin</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Adminto Admin v1.1</td>
                                                <td>01/05/2017</td>
                                                <td>10/05/2017</td>
                                                <td><span class="badge bg-pink">Pending</span></td>
                                                <td>Coderthemes</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Adminto Frontend v1.1</td>
                                                <td>01/01/2017</td>
                                                <td>31/05/2017</td>
                                                <td><span class="badge bg-purple">Work in Progress</span>
                                                </td>
                                                <td>Adminto admin</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Adminto Admin v1.3</td>
                                                <td>01/01/2017</td>
                                                <td>31/05/2017</td>
                                                <td><span class="badge bg-warning">Coming soon</span></td>
                                                <td>Coderthemes</td>
                                            </tr>

                                            <tr>
                                                <td>6</td>
                                                <td>Adminto Admin v1.3</td>
                                                <td>01/01/2017</td>
                                                <td>31/05/2017</td>
                                                <td><span class="badge bg-primary">Coming soon</span></td>
                                                <td>Adminto admin</td>
                                            </tr>

                                        </tbody>
                                    </table> --}}

                                </div>

                                <div id="wrapper">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="mt-0 header-title">Default Example</h4>
                                                    <table id="datatable"
                                                        class="table table-bordered dt-responsive table-responsive nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Position</th>
                                                                <th>Office</th>
                                                                <th>Age</th>
                                                                <th>Start date</th>
                                                                <th>Salary</th>
                                                            </tr>
                                                        </thead>


                                                        <tbody>
                                                            <tr>
                                                                <td>Tiger Nixon</td>
                                                                <td>System Architect</td>
                                                                <td>Edinburgh</td>
                                                                <td>61</td>
                                                                <td>2011/04/25</td>
                                                                <td>$320,800</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>63</td>
                                                                <td>2011/07/25</td>
                                                                <td>$170,750</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ashton Cox</td>
                                                                <td>Junior Technical Author</td>
                                                                <td>San Francisco</td>
                                                                <td>66</td>
                                                                <td>2009/01/12</td>
                                                                <td>$86,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Cedric Kelly</td>
                                                                <td>Senior Javascript Developer</td>
                                                                <td>Edinburgh</td>
                                                                <td>22</td>
                                                                <td>2012/03/29</td>
                                                                <td>$433,060</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Airi Satou</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>33</td>
                                                                <td>2008/11/28</td>
                                                                <td>$162,700</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Brielle Williamson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>New York</td>
                                                                <td>61</td>
                                                                <td>2012/12/02</td>
                                                                <td>$372,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Herrod Chandler</td>
                                                                <td>Sales Assistant</td>
                                                                <td>San Francisco</td>
                                                                <td>59</td>
                                                                <td>2012/08/06</td>
                                                                <td>$137,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Rhona Davidson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>Tokyo</td>
                                                                <td>55</td>
                                                                <td>2010/10/14</td>
                                                                <td>$327,900</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Colleen Hurst</td>
                                                                <td>Javascript Developer</td>
                                                                <td>San Francisco</td>
                                                                <td>39</td>
                                                                <td>2009/09/15</td>
                                                                <td>$205,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sonya Frost</td>
                                                                <td>Software Engineer</td>
                                                                <td>Edinburgh</td>
                                                                <td>23</td>
                                                                <td>2008/12/13</td>
                                                                <td>$103,600</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-md-6">
                                                            <div class="dataTables_info" id="key-table_info" role="status"
                                                                aria-live="polite">
                                                                Showing 1 to 10 of 57 entries
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <nav aria-label="Page navigation example">
                                                                <ul class="pagination justify-content-end">
                                                                    <li class="page-item disabled">
                                                                        <a class="page-link" href="#"
                                                                            tabindex="-1">Previous</a>
                                                                    </li>
                                                                    <li class="page-item"><a class="page-link"
                                                                            href="#">1</a></li>
                                                                    <li class="page-item"><a class="page-link"
                                                                            href="#">2</a></li>
                                                                    <li class="page-item"><a class="page-link"
                                                                            href="#">3</a></li>
                                                                    <li class="page-item"><a class="page-link"
                                                                            href="#">4</a></li>
                                                                    <li class="page-item"><a class="page-link"
                                                                            href="#">5</a></li>
                                                                    <li class="page-item">
                                                                        <a class="page-link" href="#">Next</a>
                                                                    </li>
                                                                </ul>
                                                            </nav>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                        </div>

                    </div>
                </div>


            </div> <!-- content -->
        </div>
    @endsection
