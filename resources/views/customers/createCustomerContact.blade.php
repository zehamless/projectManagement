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
                                <form action="" method="post" enctype="multipart/form-data"
                                    class="parsley-examples" novalidate="">
                                    @csrf
                                    <input type="hidden" name="project_id" value="">
                                    <div class="mb-3">
                                        <label for="submitted_date" class="form-label">Submitted Date<span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="submitted_date" parsley-trigger="change" required=""
                                            placeholder="Masukkan tanggal" class="form-control datepicker"
                                            id="submitted_date">
                                    </div>
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Description<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="description" parsley-trigger="change" required=""
                                            placeholder="Tambahkan deskripsi" class="form-control" id="userName">
                                    </div>
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Due Date<span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="due_date" parsley-trigger="change" required=""
                                            placeholder="Masukkan tanggal" class="form-control datepicker" id="userName">
                                    </div>
                                    <div class="mb-3">
                                        <label for="progress" class="form-label">Progress<span
                                                class="text-danger">*</span></label>
                                        <select class="form-control" id="progress" name="progress">
                                            <option value="Planned">Planned</option>
                                            <option value="On Progress">On Progress</option>
                                            <option value="Done">Done</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">File Attachment<span
                                                class="text-danger">*</span></label>
                                        <input type="file" name="file" parsley-trigger="change" required=""
                                            data-plugins="dropify" data-height="150" class="form-control"
                                            id="fileAttachment">
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

{{-- script halaman create customers contact --}}
@section('pageScript')
@endsection
