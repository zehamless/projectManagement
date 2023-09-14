@extends('template.index')

@section('content')

<style>
    .btn-saveProjects {
        background-color: #FF3E3E;
        border: #FF3E3E;
        color: white;
    }
</style>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="#" class="parsley-examples" novalidate="">
                                @csrf
                                <div class="mb-3">
                                    <label for="emailAddress" class="form-label">Project Name<span
                                            class="text-danger">*</span></label>
                                    <input type="email" name="email" parsley-trigger="change" required=""
                                        placeholder="Enter email" class="form-control" id="emailAddress">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Customers<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nick" parsley-trigger="change" required=""
                                        placeholder="Enter user name" class="form-control" id="userName">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Customers Contact Name<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nick" parsley-trigger="change" required=""
                                        placeholder="Enter user name" class="form-control" id="userName">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="userName" class="form-label">Purchase Oder Number<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="nick" parsley-trigger="change" required=""
                                                placeholder="256" class="form-control" id="userName">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="userName" class="form-label"><span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="nick" parsley-trigger="change" required=""
                                                placeholder="Code Purchase" class="form-control" id="userName">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="userName" class="form-label">Sales Oder Number(Optional)</label>
                                            <input type="text" name="nick" parsley-trigger="change" required=""
                                                placeholder="S1" class="form-control" id="userName">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="userName" class="form-label">&nbsp;</label>
                                            <input type="text" name="nick" parsley-trigger="change" required=""
                                                placeholder="23" class="form-control" id="userName">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="userName" class="form-label">&nbsp;</label>
                                            <input type="text" name="nick" parsley-trigger="change" required=""
                                                placeholder="Sales Order Code" class="form-control" id="userName">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="userName" class="form-label">Memo Number</label>
                                            <input type="text" name="nick" parsley-trigger="change" required=""
                                                placeholder="S1" class="form-control" id="userName">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="userName" class="form-label">&nbsp;</label>
                                            <input type="text" name="nick" parsley-trigger="change" required=""
                                                placeholder="23" class="form-control" id="userName">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="userName" class="form-label">&nbsp;</label>
                                            <input type="text" name="nick" parsley-trigger="change" required=""
                                                placeholder="Sales Order Code" class="form-control" id="userName">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Customers Contact Name<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nick" parsley-trigger="change" required=""
                                        placeholder="Enter user name" class="form-control" id="userName">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Project Manager<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nick" parsley-trigger="change" required=""
                                        placeholder="Enter user name" class="form-control" id="userName">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Sales Executive<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nick" parsley-trigger="change" required=""
                                        placeholder="Enter user name" class="form-control" id="userName">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Start Date<span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="nick" parsley-trigger="change" required=""
                                        placeholder="Enter user name" class="form-control" id="userName">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">End Date<span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="nick" parsley-trigger="change" required=""
                                        placeholder="Enter user name" class="form-control" id="userName">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Preliminary Cost<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nick" parsley-trigger="change" required=""
                                        placeholder="Enter user name" class="form-control" id="userName">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Purchase Order Amount<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nick" parsley-trigger="change" required=""
                                        placeholder="Enter user name" class="form-control" id="userName">
                                </div>
                                <div class="text-end">
                                    <a href="{{ url('projects') }}">
                                        <button type="button" class="btn btn-secondary waves-effect">Cancel</button>
                                    </a>
                                    <button class="btn btn-saveProjects waves-effect waves-light px-4"
                                        type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('pageScript')

@endsection