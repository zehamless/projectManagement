@extends('template.index')

@section('content')

<style>
    .btn-createAccount {
        border-radius: 10px;
        background-color: #FF3E3E;
        border: #FF3E3E;
        color: white;

    }

    .btn-editAccount {
        background-color: #FF3E3E;
        border: #FF3E3E;
        color: white;
    }

    .btn-createAccount:focus {
        color: white;
    }

    .form-label {
        text-align: start !important;
    }
</style>

<div class="content-page">
    <div class="content">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-7">
                    <a href="{{ url('admin/users/create') }}"
                        class="btn btn-createAccount w-md waves-effect waves-light mb-3 px-4"><i
                            class="mdi mdi-plus"></i> Create Account</a>
                </div>
                <div class="col-sm-5">

                </div><!-- end col-->
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Data Akun Table</h4>
                            <p class="text-muted font-14 mb-3">
                            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable"
                                            class="table table-bordered dt-responsive table-hover table-responsive nowrap dataTable no-footer dtr-inline"
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
                                                        aria-label="Age: activate to sort column ascending">Role
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: auto;"
                                                        aria-label="Start date: activate to sort column ascending">
                                                        Division
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: auto;"
                                                        aria-label="Salary: activate to sort column ascending">Signature
                                                    </th>
                                                    <th class="sorting text-center" tabindex="0"
                                                        aria-controls="datatable" rowspan="1" colspan="1"
                                                        style="width: auto;"
                                                        aria-label="Salary: activate to sort column ascending">Actions
                                                    </th>
                                                </tr>
                                            </thead>


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
</div>
@endsection

@section('pageScript')
<!-- Sweet Alerts js -->
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function (){
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            columns: [
                //add dt row
                {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false},
                {data: 'email', name: 'email'},
                {data: 'first_name', name: 'first_name'},
                {data: 'last_name', name: 'last_name'},
                {data: 'roles', name: 'roles.name'},
                {data: 'division', name: 'division'},
                {
                    data: 'signature',
                    name: 'signature',
                    orderable: false,
                    searchable: false,
                    render: function (data, type, full, meta) {
                        // Concatenate the image URL with the asset function
                        return '<img src="{{ asset("' + data + '") }}" alt="Signature" width="100" height="auto">';
                    }
                },
                {
                    data: 'id',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    render: function (data, type, full, meta) {
                        return `
                        <td class="text-center">
                            <div class="btn-group btn-group-sm" style="float: none;">
                                <button type="button"
                                    class="tabledit-edit-button btn btn-primary waves-effect waves-light"
                                    style="background-color: #3E8BFF;"
                                    data-bs-toggle="modal"
                                    data-bs-target="#con-close-modal">
                                    <span class="mdi mdi-pencil"></span>
                                </button>
                            </div>
            <div class="btn-group btn-group-sm" style="float: none;">
                <button type="button"
                    class="tabledit-edit-button btn btn-danger"
                    data-method="delete"
                    data-url="{{ route('users.delete', 'data') }}"
                    data-csrf="{{ csrf_token() }}"
                    onclick="deleteUser('${data}')">
                    <span class="mdi mdi-trash-can-outline"></span>
                </button>
            </div>
                                           {{-- modals --}}
                        <div id="con-close-modal" class="modal fade" tabindex="-1"
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
                                                        id="field-2" placeholder="Last">
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
</td>`;
                    }
                },

            ]
        });
    });
</script>
<script type="text/javascript">
    function deleteUser(userId) {
        // Display a confirmation dialog
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this user!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Send an AJAX request to delete the user
                $.ajax({
                    url: "{{ route('users.delete', '') }}" + '/' + userId,
                    type: 'DELETE',
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                });
                location.reload();
            }
        });
    }
</script>

{{--
<script>
    function deleteConfirmation() {
            Swal.fire({
                title: "Are you sure to delete this account?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#28bb4b",
                cancelButtonColor: "#f34e4e",
                confirmButtonText: "Yes, delete it!",
            }).then(function (e) {
                e.value &&
                    Swal.fire(
                        "Deleted!",
                        "Your file has been deleted.",
                        "success"
                    );
            });
        }
</script> --}}
@endsection