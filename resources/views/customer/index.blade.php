@extends('template.index')

@section('content')
    <style>
        .btn-create {
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

    {{-- halaman baru --}}
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            {{-- table card --}}
                            <div class="card-body">
                                <div class="row table-title">
                                    <div class="col-sm-8">
                                        <h4 class="mt-0">Data Customer</h4>
                                    </div>
                                    <div class="col-sm-4 text-end">
                                        <a href="{{ $createRoute }}"
                                            class="btn btn-addItems w-md waves-effect waves-light mb-3 px-3">
                                            <i class="mdi mdi-plus" title="Menambahkan Customer"></i>Add Customer
                                        </a>
                                    </div>
                                </div>
                                <table id="dataTable" class="table table-striped dt-responsive table-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th width="50">No</th>
                                            <th>Customer Name</th>
                                            <th width="140" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>

                            {{-- modal edit customer --}}
                            <form action="{{ route('customer.update') }}" class="parsley-examples" novalidate=""
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div id="edit-customer-modal" class="modal fade" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">
                                                    Edit Customer</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-md-12">

                                                        {{-- form input customer name --}}
                                                        <div class="mb-3">

                                                            <label for="companyName" class="form-label">Company
                                                                Name<span class="text-danger"></span></label>
                                                            <input type="hidden" id="customer_id" name="id">
                                                            <input type="text" class="form-control" name="companyName"
                                                                id="customer_companyName" parsley-trigger="change"
                                                                required="">
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect"
                                                        data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="submit" class="btn btn-save waves-effect waves-light">
                                                        Save
                                                        changes
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- container-fluid -->

            </div>
        </div>
    </div>
@endsection

@section('pageScript')
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/r-2.5.0/sc-2.2.0/sp-2.2.0/sl-1.7.0/datatables.min.css"
        rel="stylesheet">
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/r-2.5.0/sc-2.2.0/sp-2.2.0/sl-1.7.0/datatables.min.js">
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#dataTable').DataTable({
                autoWidth: false,
                processing: true,
                responsive: true,
                serverSide: true,
                scrollX: true,
                ajax: "{{ route('customer.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'companyName',
                        name: 'companyName'
                    },
                    {
                        data: 'id',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, full, meta) {
                            return `
                            <div class="btn-group btn-group-sm" style="float: none;">
                                    <a href="{{ url('customer/detail/${data}') }}" type="button" class="tabledit-edit-button btn btn-info waves-effect waves-light"
                                    value="${full.id}" title="Detail Customer" style="padding: 0.25rem 0.8rem;">
                                        <span class="mdi mdi-eye"></span>
                                    </a>
                            </div>
                            <div class="btn-group btn-group-sm" style="float: none;">
                                <button type="button" class="tabledit-edit-button editCustomer btn btn-primary waves-effect waves-light"
                                value="${full.id}"
                                data-bs-toggle="modal" data-bs-target="#edit-customer-modal"
                                title="Edit Customer" style="padding: 0.25rem 0.8rem;">
                                    <span class="mdi mdi-pencil"></span>
                            </div>
                            <div class="btn-group btn-group-sm" style="float: none;">
                                <button type="button" value="${full.id}" class="tabledit-edit-button deleteCustomer btn btn-danger waves-effect waves-light" id="sa-warning" style="padding: 0.25rem 0.8rem;" title="Hapus Customer"')">
                                    <span class="mdi mdi-trash-can-outline"></span>
                                </button>
                            </div>`;
                        }
                    },
                ]
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.deleteCustomer', function() {
                var id = $(this).val();

                Swal.fire({
                    title: "Anda yakin ingin menghapus?",
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
                        // Silahkan isi logika nya
                        $.ajax({
                            url: "{{ route('customer.destroy', '') }}/" + id,
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
                                            confirmButtonText: 'OK',
                                            backrop: 'static',
                                            allowOutsideClick: false
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

    <script>
        $(document).ready(function() {
            $(document).on('click', '.editCustomer', function() {
                var id = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "/customer/get-customer-data/" + id,
                    dataType: "json",
                    success: function(response) {
                        $("#customer_id").val(id);
                        $("#customer_companyName").val(response.companyName);
                    },
                    error: function(response) {
                        alert("Error: " + response.statusText);
                    }
                });
            });
        });
    </script>
@endsection
