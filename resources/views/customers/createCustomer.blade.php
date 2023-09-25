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
                                    <input type="text" class="form-control" id="companyName" aria-describedby="companyNameHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="projects" class="form-label">Related Project</label>
                                    <input type="text" class="form-control" id="projects" aria-describedby="projectsHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="customerContacts" class="form-label">Customer Contact</label>
                                    <input type="text" class="form-control" id="customerContacts" aria-describedby="customerContactsHelp">
                                </div>
                                <div class="text-end">
                                    <a href="{{ url('customers') }}">
                                        <button type="button" class="btn btn-secondary waves-effect" onclick="">Cancel</button>
                                    </a>
                                    <button class="btn btn-save waves-effect waves-light px-4" type="submit" onclick="saveConfirmation()" id="submitButton">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>


                </div> <!-- content -->
            </div>
            @endsection
