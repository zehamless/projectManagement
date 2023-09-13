@extends('template.index')

@section('content')

<style>
    .btn-createAccount {
        border-radius: 10px;
        background-color: #FF3E3E;
        border: #FF3E3E;
        color: white;

    }

    .btn-createAccount:focus {
        color: white;
    }
</style>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-7">
                    <a href="#" class="btn btn-createAccount w-md waves-effect waves-light mb-3 px-4"><i
                            class="mdi mdi-plus"></i> Create Account</a>
                </div>
                <div class="col-sm-5">
                    <form class="app-search">
                        <div class="app-search-box">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search..." id="top-search">
                                <button class="btn input-group-text" type="submit">
                                    <i class="fe-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div><!-- end col-->
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Customers Table</h4>
                            <p class="text-muted font-14 mb-3">
                            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="datatable_length"><label
                                                class="form-label">Show <select name="datatable_length"
                                                    aria-controls="datatable" class="form-select form-select-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> entries</label></div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="datatable_filter" class="dataTables_filter"><label>Search:<input
                                                    type="search" class="form-control form-control-sm" placeholder=""
                                                    aria-controls="datatable"></label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable"
                                            class="table table-bordered dt-responsive table-responsive nowrap dataTable no-footer dtr-inline"
                                            aria-describedby="datatable_info">
                                            <thead>
                                                <tr>
                                                    <th class="sorting sorting_asc" tabindex="0"
                                                        aria-controls="datatable" rowspan="1" colspan="1"
                                                        style="width: auto;" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending">#</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: auto;"
                                                        aria-label="Position: activate to sort column ascending">
                                                        Email</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: auto;"
                                                        aria-label="Office: activate to sort column ascending">First
                                                        Name
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: auto;"
                                                        aria-label="Age: activate to sort column ascending">Last Name
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: auto;"
                                                        aria-label="Start date: activate to sort column ascending">
                                                        Division
                                                        date</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: auto;"
                                                        aria-label="Salary: activate to sort column ascending">TTD
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: auto;"
                                                        aria-label="Salary: activate to sort column ascending">Actions
                                                    </th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <tr class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">1</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                    <td>33</td>
                                                    <td>2008/11/28</td>
                                                    <td>$162,700</td>
                                                    <td class="text-center">
                                                        <div class="btn-group btn-group-sm" style="float: none;">
                                                            <button type="button"
                                                                class="tabledit-edit-button btn btn-primary waves-effect waves-light"
                                                                style="background-color: #3E8BFF;">
                                                                <span class="mdi mdi-pencil"></span>
                                                            </button>
                                                        </div>
                                                        <div class="btn-group btn-group-sm" style="float: none;">
                                                            <button type="button" class="tabledit-edit-button btn btn-danger">
                                                                <span class="mdi mdi-trash-can-outline"></span>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="sorting_1 dtr-control">2</td>
                                                    <td>Chief Executive Officer (CEO)</td>
                                                    <td>London</td>
                                                    <td>47</td>
                                                    <td>2009/10/09</td>
                                                    <td>$1,200,000</td>
                                                    <td class="text-center">
                                                        <div class="btn-group btn-group-sm" style="float: none;">
                                                            <button type="button"
                                                                class="tabledit-edit-button btn btn-primary waves-effect waves-light"
                                                                style="background-color: #3E8BFF;">
                                                                <span class="mdi mdi-pencil"></span>
                                                            </button>
                                                        </div>
                                                        <div class="btn-group btn-group-sm" style="float: none;">
                                                            <button type="button" class="tabledit-edit-button btn btn-danger">
                                                                <span class="mdi mdi-trash-can-outline"></span>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">3</td>
                                                    <td>Junior Technical Author</td>
                                                    <td>San Francisco</td>
                                                    <td>66</td>
                                                    <td>2009/01/12</td>
                                                    <td>$86,000</td>
                                                    <td class="text-center">
                                                        <div class="btn-group btn-group-sm" style="float: none;">
                                                            <button type="button"
                                                                class="tabledit-edit-button btn btn-primary waves-effect waves-light"
                                                                style="background-color: #3E8BFF;">
                                                                <span class="mdi mdi-pencil"></span>
                                                            </button>
                                                        </div>
                                                        <div class="btn-group btn-group-sm" style="float: none;">
                                                            <button type="button" class="tabledit-edit-button btn btn-danger">
                                                                <span class="mdi mdi-trash-can-outline"></span>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="sorting_1 dtr-control">4</td>
                                                    <td>Software Engineer</td>
                                                    <td>London</td>
                                                    <td>41</td>
                                                    <td>2012/10/13</td>
                                                    <td>$132,000</td>
                                                    <td class="text-center">
                                                        <div class="btn-group btn-group-sm" style="float: none;">
                                                            <button type="button"
                                                                class="tabledit-edit-button btn btn-primary waves-effect waves-light"
                                                                style="background-color: #3E8BFF;">
                                                                <span class="mdi mdi-pencil"></span>
                                                            </button>
                                                        </div>
                                                        <div class="btn-group btn-group-sm" style="float: none;">
                                                            <button type="button" class="tabledit-edit-button btn btn-danger">
                                                                <span class="mdi mdi-trash-can-outline"></span>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td class="sorting_1 dtr-control">5</td>
                                                    <td>Software Engineer</td>
                                                    <td>San Francisco</td>
                                                    <td>28</td>
                                                    <td>2011/06/07</td>
                                                    <td>$206,850</td>
                                                    <td class="text-center">
                                                        <div class="btn-group btn-group-sm" style="float: none;">
                                                            <button type="button"
                                                                class="tabledit-edit-button btn btn-primary waves-effect waves-light"
                                                                style="background-color: #3E8BFF;">
                                                                <span class="mdi mdi-pencil"></span>
                                                            </button>
                                                        </div>
                                                        <div class="btn-group btn-group-sm" style="float: none;">
                                                            <button type="button" class="tabledit-edit-button btn btn-danger">
                                                                <span class="mdi mdi-trash-can-outline"></span>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">

                                        <div class="dataTables_info" id="datatable_info" role="status"
                                            aria-live="polite">Showing 1 to 10 of 57 customers</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled"
                                                    id="datatable_previous"><a href="#" aria-controls="datatable"
                                                        data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                <li class="paginate_button page-item active"><a href="#"
                                                        aria-controls="datatable" data-dt-idx="1" tabindex="0"
                                                        class="page-link">1</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="datatable" data-dt-idx="2" tabindex="0"
                                                        class="page-link">2</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="datatable" data-dt-idx="3" tabindex="0"
                                                        class="page-link">3</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="datatable" data-dt-idx="4" tabindex="0"
                                                        class="page-link">4</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="datatable" data-dt-idx="5" tabindex="0"
                                                        class="page-link">5</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="datatable" data-dt-idx="6" tabindex="0"
                                                        class="page-link">6</a></li>
                                                <li class="paginate_button page-item next" id="datatable_next"><a
                                                        href="#" aria-controls="datatable" data-dt-idx="7" tabindex="0"
                                                        class="page-link">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div> <!-- container-fluid -->

    </div> <!-- content -->


    {{-- script load library js --}}
    <script src="{{ asset('templateAdmin/Admin/dist/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}">
    </script>
    <script
        src="{{ asset('templateAdmin/Admin/dist/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}">
    </script>
    <script
        src="{{ asset('templateAdmin/Admin/dist/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}">
    </script>
    <script
        src="{{ asset('templateAdmin/Admin/dist/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}">
    </script>
    <script
        src="{{ asset('templateAdmin/Admin/dist/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}">
    </script>
    <script
        src="{{ asset('templateAdmin/Admin/dist/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}">
    </script>
    <script src="{{ asset('templateAdmin/Admin/dist/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}">
    </script>
    <script src="{{ asset('templateAdmin/Admin/dist/assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}">
    </script>
    <script src="{{ asset('templateAdmin/Admin/dist/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}">
    </script>
    <script
        src="{{ asset('templateAdmin/Admin/dist/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}">
    </script>
    <script src="{{ asset('templateAdmin/Admin/dist/assets/libs/datatables.net-select/js/dataTables.select.min.js') }}">
    </script>
    <script src="{{ asset('templateAdmin/Admin/dist/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('templateAdmin/Admin/dist/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    @endsection