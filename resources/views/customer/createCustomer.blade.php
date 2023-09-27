@extends('template.index')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid">
                    <!-- end row -->
                </div> <!-- container-fluid -->
            </div>
            @foreach ($customer as $name)
            <td>{{$name['companyName']}}</td>
            <div class="row mt-1">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('customer.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="companyName" class="form-label">Company Name</label>
                                    <input type="text" class="form-control" id="companyName" aria-describedby="companyNameHelp">
                                </div>
                                <div class="text-end">
                                    <a href="{{ route('customer.create') }}">
                                        <button type="button" class="btn btn-secondary waves-effect">Cancel</button>
                                    </a>
                                    <button class="btn btn-save waves-effect waves-light px-4" type="submit" id="submitButton">Save</button>
                                </div>
                            </form>
                            @endforeach
                        </div>
                    </div>


                </div> <!-- content -->
            </div>
            @endsection
