@extends('template.index')

@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('customerContact.store') }}" method="POST"
                                    enctype="multipart/form-data" class="parsley-examples" novalidate="">
                                    @csrf
                                    <input type="hidden" name="" value="">
                                    <div class="mb-3">
                                        <label for="companyName" class="form-label">Company<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name" parsley-trigger="change" required=""
                                            placeholder="Company Name Generated dari parent id" class="form-control"
                                            id="userName">
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name" parsley-trigger="change" required=""
                                            placeholder="Enter Name" class="form-control" id="userName">
                                    </div>
                                    <div class="mb-3">
                                        <label for="companyName" class="form-label">Phone<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name" parsley-trigger="change" required=""
                                            placeholder="Enter Phone Number" class="form-control" id="userName">
                                    </div>
                                    <div class="text-end">
                                        <a href="{{ url('customer/show') }}">
                                            <button type="button" class="btn btn-secondary waves-effect">Cancel</button>
                                        </a>
                                        <button class="btn btn-save waves-effect waves-light px-4" type="submit"
                                            onclick="saveConfirmation()">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- content -->
    </div>
@endsection

{{-- script halaman create customers contact --}}
@section('pageScript')
@endsection
