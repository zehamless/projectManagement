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
                                <form action="" method="POST" class="parsley-examples"
                                    novalidate>
                                    @csrf
                                    {{-- form input payment type --}}
                                    <div class="mb-3">
                                        <label class="form-label">Payment Type<span
                                                class="text-danger">*</span></label>
                                        <input type="hidden" name="project_id" value="">
                                        <input type="text" name="label" parsley-trigger="change" required
                                            class="form-control" >
                                        {{-- @error('label')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror --}}
                                    </div>

                                    {{-- form input progress --}}
                                    <div class="mb-3">
                                        <label class="form-label">Progress<span
                                                class="text-danger">*</span></label>
                                        <div class="flex input-group">
                                            <input type="number" name="progress" parsley-trigger="change" required
                                            placeholder="Enter amount" class="form-control">
                                            <span class="input-group-text">%</span>
                                        </div>
                                        {{-- @error('label')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror --}}
                                    </div>

                                    {{-- form input description --}}
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="description" parsley-trigger="change" required
                                            placeholder="Enter description" class="form-control">
                                        {{-- @error('description')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror --}}
                                    </div>
                                    
                                    {{-- form input status payment --}}
                                    <div class="mb-3">
                                        <label for="progress" class="form-label">Status<span
                                                class="text-danger">*</span></label>
                                        <select class="form-control" id="progress" name="progress" parsley-trigger="change" required>
                                            <option value="On Progress">On Progress</option>
                                            <option value="Done">Done</option>
                                        </select>
                                        {{-- @error('progress')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror --}}
                                    </div>

                                    {{-- form input file bukti pembayaran --}}
                                    <div class="mb-3">
                                        <label class="form-label">Bukti Pembayaran</label>
                                        <input type="file" name="file" parsley-trigger="change" data-plugins="dropify"
                                            data-height="150" class="form-control" id="bukti-pembayaran">
                                        {{-- @error('file')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror --}}
                                    </div>

                                    <div class="text-end">
                                        <a href="{{ url('projects') }}">
                                            <button type="button" class="btn btn-secondary waves-effect">Cancel</button>
                                        </a>
                                        <button class="btn btn-save waves-effect waves-light px-4" type="submit"
                                            onclick="">Save</button>
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
