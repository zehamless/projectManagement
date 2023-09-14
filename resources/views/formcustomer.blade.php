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
                <div class="row mt-1">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="companyName" class="form-label">Company Name</label>
                                        <input type="text" class="form-control" id="companyName"
                                            aria-describedby="companyNameHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="customerContact" class="form-label">Customer Contact</label>
                                        <input type="text" class="form-control" id="customerContact"
                                            aria-describedby="customerContactHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="numberOfProject" class="form-label">Number of Project</label>
                                        <input type="text" class="form-control" id="numberOfProject"
                                            aria-describedby="numberOfProjectHelp">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>


                    </div> <!-- content -->
                </div>
            @endsection
