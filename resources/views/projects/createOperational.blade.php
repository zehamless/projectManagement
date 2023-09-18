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
                            <form action="" method="post" class="parsley-examples" novalidate="">
                                @csrf
                                <div class="mb-3">
                                    <label for="userName" class="form-label">SPK Number<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="" parsley-trigger="change" required=""
                                        placeholder="Masukkan SPK Number" class="form-control" id="userName">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Service Date<span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="nick" parsley-trigger="change" required=""
                                        placeholder="Enter user name" class="form-control" id="userName">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Project Label<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="" parsley-trigger="change" required=""
                                        placeholder="Masukkan Project Label" class="form-control" id="userName">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Service Type<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="" parsley-trigger="change" required=""
                                        placeholder="Masukkan Service Type" class="form-control" id="userName">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">SPK Code<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="" parsley-trigger="change" required=""
                                        placeholder="Masukkan SPK Code" class="form-control" id="userName">
                                </div>
                                <div class="text-end">
                                    <a href="{{ url('projects') }}">
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

{{-- script js halaman detail project --}}
@section('pageScript')
@endsection