@extends('template.index')

@section('content')

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="dataTable" class="table table-striped dt-responsive table-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Column 1</th>
                                        <th>Column 2</th>
                                        <th>Column 3</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data rows will be added here dynamically -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div> <!-- container-fluid -->

        </div> <!-- content -->
    </div>
</div>


{{-- backup --}}
{{-- backup lama --}}
{{-- <div class="content-page">
    <div class="content">
        <div class="container-fluid">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <!-- Start Content-->
            <div class="row">
                <div class="row">
                    <div class="col-sm-7">
                        <a href="{{ url('customer/create') }}"
                            class="btn btn-create w-md waves-effect waves-light mb-3 px-4"><i class="mdi mdi-plus"></i>
                            Add
                            Customer</a>
                    </div>
                    <div class="col-sm-5">

                    </div><!-- end col-->
                </div>

                <div class="row">
                    <div class="col-xl-7">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Data Customers</h4>
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
                                        <div id="datatable_filter" class="dataTables_filter">
                                            <form class="app-search" action="{{ route('customer.index') }}">
                                                <label>Search:
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="" aria-controls="datatable" name="search"
                                                        value="{{ request('search') }}">
                                                </label>
                                            </form>
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
                                                        <th class="sorting text" tabindex="0" aria-controls="datatable"
                                                            rowspan="1" colspan="1" style="width: auto;"
                                                            aria-label="Office: activate to sort column ascending">
                                                            Customer
                                                            Name
                                                        </th>
                                                        <th class="sorting text-center" tabindex="0"
                                                            aria-controls="datatable" rowspan="1" colspan="1"
                                                            style="width: auto;"
                                                            aria-label="Salary: activate to sort column ascending">
                                                            Actions
                                                        </th>
                                                    </tr>
                                                </thead>


                                                <tbody>
                                                    @foreach($customer as $name)
                                                    <tr class="odd">
                                                        <td class="dtr-control sorting_1" tabindex="0">1</td>
                                                        <td>{{$name['companyName']}}</td>
                                                        <td class="text-center">
                                                            {{-- button --}}
                                                            {{-- <div class="btn-group btn-group-sm" style="float: none;">
                                                                <button type="button"
                                                                    class="tabledit-edit-button btn btn-primary waves-effect waves-light"
                                                                    style="background-color: #3E8BFF;"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#con-close-modal">
                                                                    <span class="mdi mdi-pencil"></span>
                                                                </button>
                                                            </div>
                                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                                <form
                                                                    action="{{ route('customer.destroy', $name->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="tabledit-edit-button btn btn-danger"
                                                                        id="sa-warning">
                                                                        <span class="mdi mdi-trash-can-outline"></span>
                                                                    </button>
                                                                </form>
                                                            </div> --}}

                                                            {{-- modals --}}
                                                            {{-- <div id="con-close-modal" class="modal fade" tabindex="-1"
                                                                role="dialog" aria-labelledby="myModalLabel"
                                                                aria-hidden="true" style="display: none;">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Edit Data Akun</h4>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="mb-3 text-start">
                                                                                        <label for="field-3"
                                                                                            class="form-label">Email</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="field-3"
                                                                                            placeholder="type your email here">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="mb-3 text-start">
                                                                                        <label for="field-1"
                                                                                            class="form-label">First
                                                                                            Name</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="field-1"
                                                                                            placeholder="First">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="mb-3 text-start">
                                                                                        <label for="field-2 "
                                                                                            class="form-label">Last
                                                                                            Name</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="field-2"
                                                                                            placeholder="Last">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="mb-3 text-start">
                                                                                        <label for="field-3"
                                                                                            class="form-label">Division
                                                                                            Date</label>
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            id="field-3"
                                                                                            placeholder="Tanggal">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="mb-3 text-start">
                                                                                        <label for="field-3"
                                                                                            class="form-label">Tanda
                                                                                            Tangan</label>
                                                                                        <input type="file"
                                                                                            class="form-control"
                                                                                            id="field-3">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary waves-effect"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="button"
                                                                                class="btn btn-editAccount waves-effect waves-light">Save
                                                                                changes</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- /.modal -->
                                                        </td>
                                                    </tr>
                                                    @endforeach
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
                                            <div class="dataTables_paginate paging_simple_numbers"
                                                id="datatable_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous disabled"
                                                        id="datatable_previous"><a href="#" aria-controls="datatable"
                                                            data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                                    </li>
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
                                                            href="#" aria-controls="datatable" data-dt-idx="7"
                                                            tabindex="0" class="page-link">Next</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5"> --}}

                        {{-- row tabel related customer contacts --}}
                        {{-- <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row table-title">
                                        <div class="col-sm-7">
                                            <h4 class="mt-0 header-title">Customer Contacts</h4>
                                        </div>
                                        <div class="col-sm-5 text-end">
                                            <a href="" class="btn btn-create w-md waves-effect waves-light mb-3 px-4"><i
                                                    class="mdi mdi-plus" title="Menambahkan milestone"></i>Add
                                                Contacts</a>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Number</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="6" align="center">Belum ada contact</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        {{-- row tabel related projects --}}
                        {{-- <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row table-title">
                                        <div class="col-sm-8">
                                            <h4 class="mt-0 header-title">Related Projects</h4>
                                        </div>
                                        <div class="col-sm-4">

                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th class="text-center">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="6" align="center">Belum ada project</td>
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



        </div> <!-- container-fluid -->

    </div> <!-- content -->
</div>  --}}
{{-- lanjutin coyy --}}

@endsection

@section('pageScript')

<script>
    // Sample data (you can replace this with your own data)
    const data = [
        { column1: 'Value 1', column2: 'Value 2', column3: 'Value 3' },
        { column1: 'Value 4', column2: 'Value 5', column3: 'Value 6' },
        { column1: 'Value 7', column2: 'Value 8', column3: 'Value 9' },
    ];

    // Function to populate the table with data
    function populateTable() {
        const tableBody = document.querySelector('#dataTable tbody');

        data.forEach(item => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${item.column1}</td>
                <td>${item.column2}</td>
                <td>${item.column3}</td>
            `;
            tableBody.appendChild(row);
        });
    }

    // Call the populateTable function to create the table
    populateTable();

    $(document).ready(function(){
        $('#dataTable').DataTable({
            responsive: true,
            autoWidth: false
        });
    });
    

</script>
@endsection