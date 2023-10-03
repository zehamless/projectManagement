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
                        <div class="card-body">
                            <div class="row table-title">
                                <div class="col-sm-8">
                                    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

                                    <h4 class="mt-0">Data Customer</h4>
                                </div>
                                <div class="col-sm-4 text-end">
                                    <a href="{{ $createRoute }}" class="btn btn-addItems w-md waves-effect waves-light mb-3 px-3">
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
                    </div>
                </div>
            </div> <!-- container-fluid -->
        </div>
    </div>
</div>
@endsection

@section('pageScript')
<link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/r-2.5.0/sc-2.2.0/sp-2.2.0/sl-1.7.0/datatables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/r-2.5.0/sc-2.2.0/sp-2.2.0/sl-1.7.0/datatables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#dataTable').DataTable({
            autoWidth: false,
            processing: true,
            responsive: false,
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
                        console.log(full);
                        return `
                            <div class="btn-group btn-group-sm" style="float: none;">
                                <a href="{{ url('customer/show') }}/${full.id}">
                                    <button type="button" class="tabledit-edit-button btn btn-info waves-effect waves-light" title="Detail Customer" style="padding: 0.25rem 0.8rem;">
                                        <span class="mdi mdi-eye"></span>
                                    </button>
                                </a>
                            </div>
                            <div class="btn-group btn-group-sm" style="float: none;">
                                <a href="{{ url('customer/edit') }}/${full.id}">
                                    <button type="button" class="tabledit-edit-button btn btn-primary waves-effect waves-light" title="Edit Data" style="background-color: #3E8BFF;">
                                        <span class="mdi mdi-pencil"></span>
                                    </button>
                                </a>
                            </div>
                            <div class="btn-group btn-group-sm" style="float: none;">
                                <button type="button" class="tabledit-edit-button btn btn-danger waves-effect waves-light" id="sa-warning" style="padding: 0.25rem 0.8rem;" title="Hapus Customer" onclick="deleteCustomer(${full.id})">
                                    <span class="mdi mdi-trash-can-outline"></span>
                                </button>
                            </div>`;
                    }
                },
            ]
        });
    });

    function deleteCustomer(id) {
        if (confirm('Apakah Anda yakin ingin menghapus customer ini?')) {
            // Kirim permintaan penghapusan ke server
            $.ajax({
                url: `{{ route('customer.destroy', ['id' => 'full.id']) }}/${id}`,
                type: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    // Lakukan sesuatu setelah penghapusan berhasil
                    console.log(response);
                    // Misalnya, muat ulang tabel atau tindakan lainnya
                },
                error: function(error) {
                    console.error(error);
                    // Handle kesalahan, tampilkan pesan kesalahan atau lakukan tindakan lainnya
                }
            });
        }
    }
</script>
@endsection
