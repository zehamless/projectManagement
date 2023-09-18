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
                            <form action="projects.store" method="post" class="parsley-examples" novalidate="">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="userName" class="form-label">Purchase Oder Number<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="nick" parsley-trigger="change" required=""
                                                placeholder="256" class="form-control" id="userName">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="userName" class="form-label"><span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="nick" parsley-trigger="change" required=""
                                                placeholder="Code Purchase" class="form-control" id="userName">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <div>
                                            <label for="userName" class="form-label">Memo Number</label>
                                            <input type="text" name="nick" parsley-trigger="change" required=""
                                                placeholder="S1" class="form-control" id="userName">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div>
                                            <label for="userName" class="form-label">&nbsp;</label>
                                            <input type="text" name="nick" parsley-trigger="change" required=""
                                                placeholder="23" class="form-control" id="userName">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div>
                                            <label for="userName" class="form-label">&nbsp;</label>
                                            <input type="text" name="nick" parsley-trigger="change" required=""
                                                placeholder="Sales Order Code" class="form-control" id="userName">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div>
                                            <label for="userName" class="form-label">&nbsp;</label>
                                            <input type="text" name="nick" parsley-trigger="change" required=""
                                                placeholder="Sales Order Code" class="form-control" id="userName">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div>
                                            <label for="userName" class="form-label">&nbsp;</label>
                                            <input type="text" name="nick" parsley-trigger="change" required=""
                                                placeholder="Sales Order Code" class="form-control" id="userName">
                                        </div>
                                    </div>
                                    <span class="help-block"><small>(Optional Jika PO Number Sudah Diisi)</small></span>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="userName" class="form-label">Sales Oder Number</label>
                                            <input type="text" name="nick" parsley-trigger="change" required=""
                                                placeholder="S1" class="form-control" id="userName">
                                            <span class="help-block"><small>(Optional)</small></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="userName" class="form-label">&nbsp;</label>
                                            <input type="text" name="nick" parsley-trigger="change" required=""
                                                placeholder="23" class="form-control" id="userName">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="userName" class="form-label">&nbsp;</label>
                                            <input type="text" name="nick" parsley-trigger="change" required=""
                                                placeholder="Sales Order Code" class="form-control" id="userName">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="emailAddress" class="form-label">Project Name<span
                                            class="text-danger">*</span></label>
                                    <input type="email" name="email" parsley-trigger="change" required=""
                                        placeholder="Masukkan Project Name" class="form-control" id="emailAddress">
                                    @error('label')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Customers<span
                                            class="text-danger">*</span></label>
                                    <select id="customers" class="form-control" name="customers[]"
                                        style="color: black;">
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Customers Contact Name<span
                                            class="text-danger">*</span></label>
                                    <select id="customers-name" class="form-control" name="customers-name[]"
                                        style="color: black;">
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="project_manager" class="form-label">Project Manager<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" id="project_manager" name="project_manager">
                                        @if (isset($usersByRole['Project Manager']))
                                        <option>--Pilih Project Manager--</option>
                                        @foreach ($usersByRole['Project Manager'] as $pm)
                                        <option value="{{ $pm['id'] }}">{{ $pm['name'] }}</option>
                                        @endforeach
                                        @else
                                        <option value="">Tidak ada Project Manager</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="sales_executive" class="form-label">Sales Executive<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" id="sales_executive" name="sales_executive">
                                        @if (isset($usersByRole['Sales Executive']))
                                        <option>--Pilih Sales Executive--</option>
                                        @foreach ($usersByRole['Sales Executive'] as $pm)
                                        <option value="{{ $pm['id'] }}">{{ $pm['name'] }}</option>
                                        @endforeach
                                        @else
                                        <option value="">Tidak ada Sales Executive</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Location<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="" parsley-trigger="change" required=""
                                        placeholder="Enter user name" class="form-control" id="userName">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Start Date<span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="nick" parsley-trigger="change" required=""
                                        placeholder="Enter user name" class="form-control" id="userName">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">End Date<span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="nick" parsley-trigger="change" required=""
                                        placeholder="Enter user name" class="form-control" id="userName">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Preliminary Cost<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nick" parsley-trigger="change" required=""
                                        placeholder="Enter user name" class="form-control" id="userName">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Purchase Order Amount<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nick" parsley-trigger="change" required=""
                                        placeholder="Enter user name" class="form-control" id="userName">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Expense Budget<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nick" parsley-trigger="change" required=""
                                        placeholder="Enter user name" class="form-control" id="userName">
                                </div>
                                <div class="text-end">
                                    <a href="{{ url('projects') }}">
                                        <button type="button" class="btn btn-secondary waves-effect"
                                            onclick="">Cancel</button>
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
    </div>
</div>
@endsection


@section('pageScript')
{{-- masih belum kelar --}}
<script>
    function saveConfirmation() {
            Swal.fire({
                title: "Good job!",
                text: "You clicked the button!",
                icon: "success",
            });
    }
</script>

<script>
    $(document).ready(function() {
        $('#customers').select2({
            allowClear: true,
            tags: true,
            theme: 'classic',
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#customers-name').select2({
            allowClear: true,
            tags: true,
            theme: 'classic',
        });
    });
</script>
@endsection