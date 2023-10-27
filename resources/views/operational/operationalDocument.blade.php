<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @page {
            size: auto;
            margin: 0mm;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .tables table,
        .tables th,
        .tables td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        #table-order-information td,
        #table-order-information th {
            padding: 0.4em;
            font-size: 14px;
            padding-left: 7px;
        }

        #table-assigned-to td,
        #table-assigned-to th,
        #table-todo td,
        #table-todo th,
        #table-footer td,
        #table-footer th {
            padding: 0.4em;
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>

<body>
{{--@dd($operational)--}}
<div id="page-content">

    {{-- first header --}}
    <div id="first-header" align="center" style="margin-top: 80px;">
        <div style="width:900px">
            <table style="width: 750px">
                <tbody>
                <tr>
                    <td align="left">
                        <img
                            src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('images/logo_trafindo_full.png')))}}"
                            height="50" alt="logo"/>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <h2>
                            <b><u>WORK ORDER</u></b>
                        </h2>
                        <p>
                            JNo: SPDL/N-23009/7/2023
                        </p>
                        <p style="text-align: left;">
                            Based on Work Order No. N-23009, the following information is provided for review:
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- table order information --}}
    <div id="table-order-information" class="tables" align="center">
        <div style="width:900px">
            <table style="width: 750px">
                <tbody>

                {{-- row work date --}}
                <tr>
                    <td width="30%">
                        <b>Work Date</b>
                    </td>
                    <td align="">
                        {{$operational->date}}
                    </td>
                </tr>

                {{-- row project --}}
                <tr>
                    <td width="30%">
                        <b>Project</b>
                    </td>
                    <td align="">
                        {{$operational->project->label}}
                    </td>
                </tr>

                {{-- row customer --}}
                <tr>
                    <td width="30%">
                        <b>Customer</b>
                    </td>
                    <td>
                        {{$customerId->companyName}}
                    </td>
                </tr>

                {{-- row type of work --}}
                <tr>
                    <td width="30%">
                        <b>Type Of Work</b>
                    </td>
                    <td align="">
                        {{$operational->type}}
                    </td>
                </tr>

                {{-- row transportation --}}
                <tr>
                    <td width="30%">
                        <b>Transportation</b>
                    </td>
                    <td align="">
                        {{$operational->transportation_mode}}
                    </td>
                </tr>

                {{-- row vehicle identity number --}}
                <tr>
                    <td width="30%">
                        <b>VIN</b>
                    </td>
                    <td>
                        {{$operational->vehicle_number ?? 'Tidak Ada'}}
                    </td>
                </tr>

                {{-- row description --}}
                <tr>
                    <td width="30%">
                        <b>Description</b>
                    </td>
                    <td>
                        {{$operational->description}}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- second header --}}
    <div id="second-header" align="center" style="margin-top: 10px;">
        <div style="width:900px">
            <table style="width: 750px">
                <tbody>
                <tr>
                    <td align="left">
                        <h3>
                            <b>Assigned To:</b>
                        </h3>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- table assigned to --}}
    <div id="table-assigned-to" class="tables" align="center">
        <div style="width:900px">
            <table style="width: 750px">
                <thead>
                <tr>
                    <th width="50%">
                        <b>Name</b>
                    </th>
                    <th>
                        <b>Division</b>
                    </th>

                </tr>
                </thead>
                <tbody>

                @foreach($operational->team as $team)
                    <tr>
                        <td>{{$team->first_name}}</td>
                        <td>{{$team->division}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- third header --}}
    <div id="second-header" align="center" style="margin-top: 10px;">
        <div style="width:900px">
            <table style="width: 750px">
                <tbody>
                <tr>
                    <td align="left">
                        <h3>
                            <b>To Do List:</b>
                        </h3>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- table to do list --}}
    <div id="table-todo" class="tables" align="center">
        <div style="width:900px">
            <table style="width: 750px">
                <thead>
                <tr>
                    <th width="30%">
                        <b>Due Date</b>
                    </th>
                    <th>
                        <b>Description</b>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($operational->agendas as $agenda)
                    <tr>
                        <td>{{$agenda->due_date}}</td>
                        <td>{{$agenda->description}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- table footer --}}
    <div id="table-footer" class="tables" align="center" style="margin-top: 40px">
        <div style="width:900px">
            <table style="width: 750px">
                <tbody>

                {{-- row tanggal --}}
                <tr>
                    <td width="50%">
                        Tangerang, {{$currentDate}}
                    </td>
                    <td width="50%">

                    </td>
                </tr>

                {{-- row created by dan acknowledged by --}}
                <tr>
                    <td>
                        Created By
                    </td>
                    <td>
                        Acknowledged by
                    </td>
                </tr>

                {{-- row signature --}}
                <tr>
                    <td>
                        <img
                            src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('storage/'. $operational->creator->signature)))}}"
                            width="60%" alt="">
                    </td>
                    <td>
                        <img
                            src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('storage/'. $currentUser->signature)))}}"
                            width="60%" alt="">
                    </td>
                </tr>

                {{-- row nama supervisor dan manager --}}
                <tr>
                    <td>
                        {{$operational->creator->first_name . ' ' . $operational->creator->last_name}}
                    </td>
                    <td>
                        {{$currentUser->first_name . ' ' . $currentUser->last_name}}
                    </td>
                </tr>

                {{-- row role sistem --}}
                <tr>
                    <td>
                        {{$operational->creator->division}}
                    </td>
                    <td>
                        {{$currentUser->division}}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>

</html>
