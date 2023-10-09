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
                                <form action="{{ route('production-cost.store') }}" method="POST" class="parsley-examples"
                                    novalidate>
                                    @csrf
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Projects<span
                                                class="text-danger">*</span></label>
                                        <input type="hidden" name="project_id" value="{{ $projectId }}">
                                        <input type="text" name="label" parsley-trigger="change" required
                                            class="form-control" readonly value="{{ $label }}">
                                        @error('label')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="description" parsley-trigger="change" required
                                            placeholder="Enter description" class="form-control">
                                        @error('description')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Amount<span
                                                class="text-danger">*</span></label>
                                        <div class="flex input-group">
                                            <span class="input-group-text">Rp.</span>
                                            <input type="text" name="amount" parsley-trigger="change" required
                                                placeholder="Enter amount" class="form-control">
                                        </div>
                                        @error('amount')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="text-end">
                                        <a href="{{ route('projects.show', ['id' => $projectId]) }}"
                                            class="btn btn-secondary waves-effect">
                                            Cancel
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
