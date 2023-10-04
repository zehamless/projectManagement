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
                                    <a href="{{ url('customerContact/create') }}" class="btn btn-addItems w-md waves-effect waves-light mb-3"><i class="mdi mdi-plus" title="Menambahkan Customer Contact"></i>Add Customer
                                        Contact</a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="dataTable" class="table mb-0">
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
                                    <h4 class="mt-0 header-title">{{ $customer->companyName }}</h4>
                                </div>
                            </div>


                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <p class="title-text">Customer Contacts Total</p>
                                                <p class="details-text">{{ count($customerContacts) }}</p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <!-- <p class="title-text">Related Projects Total</p>
                                                <p class="details-text">{{ count($relatedProjects) }}</p> -->
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
<link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/r-2.5.0/sc-2.2.0/sp-2.2.0/sl-1.7.0/datatables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/r-2.5.0/sc-2.2.0/sp-2.2.0/sl-1.7.0/datatables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#dataTable').DataTable({
            autoWidth: false,
            processing: true,
            responsive: true,
            serverSide: true,
            scrollX: true,
            ajax: "{{ route('customer.show', ['id' => $customer->id]) }}",
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
                                <a href="{{ url('customer/edit') }}/${full.id}">
                                    <button type="button" class="tabledit-edit-button btn btn-primary waves-effect waves-light" title="Edit Data" style="padding: 0.25rem 0.8rem;">
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
            $.ajax({
                url: "{{ route('customer.destroy', '') }}" + "/" + id,
                type: 'DELETE',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }
    }
</script>
@endsection
