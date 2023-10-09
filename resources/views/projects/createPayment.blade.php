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
                                <form action="{{ route('top.store') }}" method="post" enctype="multipart/form-data"
                                    class="parsley-examples" novalidate="">
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
                                        <label class="form-label">Payment Type<span class="text-danger">*</span></label>
                                        <input type="text" placeholder="Enter Payment Type" name="type"
                                            parsley-trigger="change" required class="form-control">
                                        @error('type')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- form input Progress --}}
                                    <div class="mb-3">
                                        <label class="form-label">Progress<span class="text-danger">*</span></label>
                                        <div class="flex input-group">
                                            <input type="number" name="progress" parsley-trigger="change" required
                                                placeholder="Enter percentage" class="form-control">
                                            <span class="input-group-text">%</span>
                                        </div>
                                        @error('progress')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- form input description --}}
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="description" parsley-trigger="change" required
                                            placeholder="Enter description" class="form-control">
                                        @error('description')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- form input status payment --}}
                                    <div class="mb-3">
                                        <label for="setatus" class="form-label">Status<span
                                                class="text-danger">*</span></label>
                                        <select class="form-control" id="setatus" name="status" parsley-trigger="change"
                                            required>
                                            <option value="On Progress">On Progress</option>
                                            <option value="Done">Done</option>
                                        </select>
                                    </div>

                                    {{-- form input file bukti pembayaran --}}
                                    <div class="mb-3">
                                        <label class="form-label">Bukti Pembayaran</label>
                                        <input type="file" name="file" parsley-trigger="change" data-plugins="dropify"
                                            data-height="150" class="form-control" id="bukti-pembayaran">
                                        @error('file')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="text-end">
                                        <a href="{{ route('projects.show', ['id' => $projectId]) }}"
                                            class="btn btn-secondary waves-effect">
                                            Cancel
                                        </a>
                                        <button class="btn btn-save waves-effect waves-light px-4"
                                            type="submit">Save</button>
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
