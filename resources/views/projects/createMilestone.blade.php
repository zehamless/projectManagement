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
                                <form action="{{ route('milestone.store') }}" method="post" class="parsley-examples"
                                    novalidate="">
                                    @csrf
                                    <input type="hidden" name="project_id" value="{{ $project }}">
                                    <div class="mb-3">
                                        <label for="submitted_date" class="form-label">Submitted Date<span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="submitted_date" parsley-trigger="change" required=""
                                            placeholder="Enter user name" class="form-control" id="submitted_date">
                                        @error('submitted_date')
                                            <p>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Description<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="description" parsley-trigger="change" required=""
                                            placeholder="Enter user name" class="form-control" id="userName">
                                        @error('description')
                                            <p>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Due Date<span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="due_date" parsley-trigger="change" required=""
                                            placeholder="Enter user name" class="form-control" id="userName">
                                        @error('due_date')
                                            <p>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="progress" class="form-label">Progress<span
                                                class="text-danger">*</span></label>
                                        <select class="form-control" id="progress" name="progress">
                                            <option value="Planned">Planned</option>
                                            <option value="On Progress">On Progress</option>
                                            <option value="Done">Done</option>
                                        </select>
                                        @error('progress')
                                            <p>{{ $message }}</p>
                                        @enderror
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
