@extends('template.index')

@section('content')

    <style>
        .btn-approval {
            background-color: #FF3E3E;
            color: white;
            font-size: 10px;
        }

        .btn-success {
            font-size: 10px;
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
                                <div class="row table-title mb-3">
                                    <div class="col-sm-8">

                                        <h4 class="mt-0">Data Operational</h4>
                                    </div>
                                </div>
                                <table id="dataTable" class="table table-striped dt-responsive table-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th width="50">No</th>
                                        <th>SPK Number</th>
                                        <th>Project Label</th>
                                        <th>Created By</th>
                                        <th>Service Date</th>
                                        <th class="text-center">action</th>
                                        {{--                                        <th class="text-center">Preview</th>--}}
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
    <script>
        {{--// Sample data (you can replace this with your own data)--}}
        {{--const data = [--}}
        {{--    { column1: '1', column2: 'SPK-1-2', column3: 'Maintenance', column4: 'admin', --}}
        {{--        column5: 'Value 2', column6: '<button type="button" class="btn btn-approval btn-sm">Approve</button>', --}}
        {{--        column7: '<a href="{{ url('operational/preview') }}" type="button" class="btn btn-success btn-sm">Preview</a>' },--}}

        {{--    { column1: '2', column2: 'SPK-2-3', column3: 'Oil Replacement', column4: 'admin', --}}
        {{--        column5: 'Value 2', column6: '<button type="button" class="btn btn-approval btn-sm">Approve</button>', --}}
        {{--        column7: '<a href="{{ url('operational/preview') }}" type="button" class="btn btn-success btn-sm">Preview</a>' },--}}
        {{--        --}}
        {{--    { column1: '3', column2: 'SPK-4-5', column3: 'Electric Parts', column4: 'admin', --}}
        {{--        column5: 'Value 2', column6: '<button type="button" class="btn btn-approval btn-sm">Approve</button>', --}}
        {{--        column7: '<a href="{{ url('operational/preview') }}" type="button" class="btn btn-success btn-sm">Preview</a>' },--}}
        {{--];--}}

        {{--// Function to populate the table with data--}}
        {{--function populateTable() {--}}
        {{--    const tableBody = document.querySelector('#dataTable tbody');--}}

        {{--    data.forEach(item => {--}}
        {{--        const row = document.createElement('tr');--}}
        {{--        row.innerHTML = `--}}
        {{--            <td>${item.column1}</td>--}}
        {{--            <td>${item.column2}</td>--}}
        {{--            <td>${item.column3}</td>--}}
        {{--            <td>${item.column4}</td>--}}
        {{--            <td>${item.column5}</td>--}}
        {{--            <td class="text-center">${item.column6}</td>--}}
        {{--            <td class="text-center">${item.column7}</td>--}}
        {{--        `;--}}
        {{--        tableBody.appendChild(row);--}}
        {{--    });--}}
        {{--}--}}

        {{--// Call the populateTable function to create the table--}}
        {{--populateTable();--}}

        $(document).ready(function () {
            $('#dataTable').DataTable({
                responsive: true,
                autoWidth: false,
                serverSide: true,
                processing: true,
                scrollX: true,
                ajax: "{{ route('operational.approval') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'spk_number', name: 'spk_number'},
                    {data: 'project.label', name: 'label'},
                    {data: 'created_by', name: 'created_by'},
                    {data: 'date', name: 'date'},
                    {data: 'action', name: 'action'},
                ]
            });
        });


    </script>
@endsection
