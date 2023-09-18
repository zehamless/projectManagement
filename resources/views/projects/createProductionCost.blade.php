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
                                    <label for="userName" class="form-label">Projects<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="" parsley-trigger="change" required=""
                                        value="Project name di generate dari parent" class="form-control" readonly>
                                </div>
                                @csrf
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Description<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="" parsley-trigger="change" required=""
                                        placeholder="Enter description" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Amount<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="" parsley-trigger="change" required=""
                                        placeholder="Enter amount" class="form-control">
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