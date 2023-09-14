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
                            <form action="#" class="parsley-examples" novalidate="">
                                @csrf
                                <div class="mb-3">
                                    <label for="emailAddress" class="form-label">Email address<span
                                            class="text-danger">*</span></label>
                                    <input type="email" name="email" parsley-trigger="change" required=""
                                        placeholder="Enter email" class="form-control" id="emailAddress">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">First Name<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nick" parsley-trigger="change" required=""
                                        placeholder="Enter user name" class="form-control" id="userName">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Last Name<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nick" parsley-trigger="change" required=""
                                        placeholder="Enter user name" class="form-control" id="userName">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Division Date<span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="nick" parsley-trigger="change" required=""
                                        placeholder="Enter user name" class="form-control" id="userName">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Tanda Tangan<span
                                            class="text-danger">*</span></label>
                                    <input type="file" name="nick" parsley-trigger="change" required=""
                                        placeholder="Enter user name" class="form-control" id="userName">
                                </div>

                                <div class="text-end">
                                    <button class="btn btn-primary waves-effect waves-light"
                                        type="submit">Submit</button>
                                    <a href="{{ url('admin/olahAkun') }}">
                                        <button type="button" class="btn btn-secondary waves-effect">Cancel</button>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Plugin js-->
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/parsleyjs/parsley.min.js') }}"></script>

<!-- Validation init js-->
<script src="{{ asset('templateAdmin/Admin/dist/assets/js/pages/form-validation.init.js') }}"></script>


@endsection