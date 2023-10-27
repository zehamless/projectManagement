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