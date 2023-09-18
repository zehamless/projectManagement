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
                                    <label for="userName" class="form-label">Entry Date<span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="" parsley-trigger="change" required=""
                                        placeholder="Enter user name" class="form-control" id="userName">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Description<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="" parsley-trigger="change" required=""
                                        placeholder="Enter user name" class="form-control" id="userName">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Due Date<span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="nick" parsley-trigger="change" required=""
                                        placeholder="Enter user name" class="form-control" id="userName">
                                </div>
                                <div class="mb-3">
                                    <label for="project_manager" class="form-label">Status<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" id="project_manager" name="project_manager">
                                        <option value="">Planned</option>
                                        <option value="">On Progress</option>
                                        <option value="">Done</option>
                                    </select>
                                </div
                                <div class="text-end">
                                    <a href="{{ url('projects/detailProjects') }}">
                                        <button type="button" class="btn btn-secondary waves-effect"
                                            onclick="">Cancel</button>
                                    </a>
                                    <button class="btn btn-saveProjects waves-effect waves-light px-4" type="submit"
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