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
                                    <h4 class="mt-0">Data Customer</h4>
                                </div>
                                <div class="col-sm-4 text-end">
                                    <a href="{{ url('customer/create') }}"
                                        class="btn btn-addItems w-md waves-effect waves-light mb-3 px-3"><i class="mdi mdi-plus"
                                            title="Menambahkan Customer"></i>Add Customer</a>
                                </div>
                            </div>
                            <table id="dataTable" class="table table-striped dt-responsive table-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th width="50">#</th>
                                        <th>Customer Name</th>
                                        <th width="140" class="text-center">Actions</th>
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
        </div>
    </div>
</div>
@endsection

@section('pageScript')

<script>
    // Data Table Customer ditambahkan disini
    const data = [
        //column1 nomor, column2 customer name, column3 button actions
        { column1: '1', column2: 'Customer 1', column3: `   <div class="btn-group btn-group-sm" style="float: none;">
                                                                <a href="{{ url('customer/show') }}">
                                                                    <button type="button" class="tabledit-edit-button btn btn-info waves-effect waves-light"
                                                                    data-bs-toggle="modal" data-bs-target="#con-close-modal" title="Detail Customer"
                                                                    style="padding: 0.25rem 0.8rem;">
                                                                    <span class="mdi mdi-eye"></span>
                                                                </button>
                                                                </a>
                                                            </div>
                                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                                <button type="button" class="tabledit-edit-button btn btn-primary waves-effect waves-light" title="Edit Data"
                                                                    style="background-color: #3E8BFF;" data-bs-toggle="modal" data-bs-target="#con-close-modal">
                                                                    <span class="mdi mdi-pencil"></span>
                                                                </button>
                                                            </div>
                                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                                <form action="" method="POST" >
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="tabledit-edit-button btn btn-danger waves-effect waves-light" 
                                                                    id="sa-warning" style="padding: 0.25rem 0.8rem;" title="Hapus Customer">
                                                                        <span class="mdi mdi-trash-can-outline"></span>
                                                                    </button>
                                                                </form>
                                                            </div>` },
        { column1: '2', column2: 'Customer 2', column3: `   <div class="btn-group btn-group-sm" style="float: none;">
                                                                <a href="{{ url('customer/show') }}">
                                                                    <button type="button" class="tabledit-edit-button btn btn-info waves-effect waves-light"
                                                                    data-bs-toggle="modal" data-bs-target="#con-close-modal" title="Detail Customer"
                                                                    style="padding: 0.25rem 0.8rem;">
                                                                    <span class="mdi mdi-eye"></span>
                                                                </button>
                                                                </a>
                                                            </div>
                                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                                <button type="button" class="tabledit-edit-button btn btn-primary waves-effect waves-light" title="Edit Data"
                                                                    style="background-color: #3E8BFF;" data-bs-toggle="modal" data-bs-target="#con-close-modal">
                                                                    <span class="mdi mdi-pencil"></span>
                                                                </button>
                                                            </div>
                                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                                <form action="" method="POST" >
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="tabledit-edit-button btn btn-danger waves-effect waves-light" 
                                                                    id="sa-warning" style="padding: 0.25rem 0.8rem;" title="Hapus Customer">
                                                                        <span class="mdi mdi-trash-can-outline"></span>
                                                                    </button>
                                                                </form>
                                                            </div>` },
        { column1: '3', column2: 'Customer 3', column3: `   <div class="btn-group btn-group-sm" style="float: none;">
                                                                <a href="{{ url('customer/show') }}">
                                                                    <button type="button" class="tabledit-edit-button btn btn-info waves-effect waves-light"
                                                                    data-bs-toggle="modal" data-bs-target="#con-close-modal" title="Detail Customer"
                                                                    style="padding: 0.25rem 0.8rem;">
                                                                    <span class="mdi mdi-eye"></span>
                                                                </button>
                                                                </a>
                                                            </div>
                                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                                <button type="button" class="tabledit-edit-button btn btn-primary waves-effect waves-light" title="Edit Data"
                                                                    style="background-color: #3E8BFF;" data-bs-toggle="modal" data-bs-target="#con-close-modal">
                                                                    <span class="mdi mdi-pencil"></span>
                                                                </button>
                                                            </div>
                                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                                <form action="" method="POST" >
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="tabledit-edit-button btn btn-danger waves-effect waves-light" 
                                                                    id="sa-warning" style="padding: 0.25rem 0.8rem;" title="Hapus Customer">
                                                                        <span class="mdi mdi-trash-can-outline"></span>
                                                                    </button>
                                                                </form>
                                                            </div>` },
        
    ];

    // Fungsi untuk memasukkan data ke table
    function populateTable() {
        const tableBody = document.querySelector('#dataTable tbody');

        data.forEach(item => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${item.column1}</td>
                <td>${item.column2}</td>
                <td class="text-center">${item.column3}</td>
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