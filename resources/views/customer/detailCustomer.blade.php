@extends('template.index')

@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8">

                        {{-- card table milestones --}}
                        <div class="card">
                            <div class="card-body">
                                <div class="row table-title">
                                    <div class="col-sm-8">
                                        <h4 class="mt-0 header-title">Customer Contacts</h4>
                                    </div>
                                    <div class="col-sm-4 text-end">
                                        <a href="{{ url('customerContact/create') }}"
                                            class="btn btn-addItems w-md waves-effect waves-light mb-3"><i
                                                class="mdi mdi-plus" title="Menambahkan Customer Contact"></i>Add Customer
                                            Contact</a>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table id="dataTable" class="table mb-0" data-id="{{ $id }}">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Number</th>
                                                <th class="text-center" width="100">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="4" align="center">Belum ada data customer contact</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        {{-- card table production cost --}}
                        <div class="card">
                            <div class="card-body">
                                <div class="row table-title">
                                    <div class="col-12">
                                        <h4 class="mt-0 header-title">Related Projects</h4>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>SO Number</th>
                                                <th>Project Name</th>
                                                <th>Location</th>
                                                <th class="text-center" width="100">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="5" align="center">Belum ada project</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div><!-- end col-->

                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="mt-0 header-title"></h4>
                                    </div>
                                </div>


                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <h4 class="mb-3">{{ $customer['companyName'] }}</h4>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">
                                                    <p class="title-text">Customer Contacts Total</p>
                                                    <p class="details-text">23</p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <p class="title-text">Related Projects Total</p>
                                                    <p class="details-text">10</p>
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

@section('pageScript')
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/r-2.5.0/sc-2.2.0/sp-2.2.0/sl-1.7.0/datatables.min.css"
        rel="stylesheet">
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/r-2.5.0/sc-2.2.0/sp-2.2.0/sl-1.7.0/datatables.min.js">
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            let id = $('#dataTable').data("id");
            console.log(id);
            var table = $('#dataTable').DataTable({
                autoWidth: false,
                processing: true,
                responsive: true,
                serverSide: true,
                scrollX: true,
                ajax: "{{ route('customerContact.index', '') }}" + '/' + id,
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
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
                                <button type="button" class="tabledit-edit-button editCustomerContact btn btn-primary waves-effect waves-light"
                                value="${full.id}"
                                data-bs-toggle="modal" data-bs-target="#edit-customer-modal"
                                title="Edit Customer Contact" style="padding: 0.25rem 0.8rem;">
                                    <span class="mdi mdi-pencil"></span>
                            </div>
                            <div class="btn-group btn-group-sm" style="float: none;">
                                <button type="button" value="${full.id}" class="tabledit-edit-button deleteCustomerContact btn btn-danger waves-effect waves-light" id="sa-warning" style="padding: 0.25rem 0.8rem;" title="Hapus Customer Contact"')">
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
            $(document).on('click', '.deleteCustomerContact', function() {
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
                            url: "{{ route('customerContact.destroy', '') }}/" + id,
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
            $(document).on('click', '.editCustomerContact', function() {
                var id = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "/customer/get-customer-contacts/" + id,
                    dataType: "json",
                    success: function(response) {
                        $("#customer_id").val(id);
                        $("#name").val(response.name)
                        $("#phone").val(response.phone);
                    },
                    error: function(response) {
                        alert("Error: " + response.statusText);
                    }
                });
            });
        });
    </script>
@endsection
