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
                                    <label for="userName" class="form-label">Service Date<span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="nick" parsley-trigger="change" required=""
                                        placeholder="Enter user name" class="form-control" id="userName">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Project Label<span
                                            class="text-danger">*</span></label>
                                    <select name="" parsley-trigger="change" required="" class="form-control">
                                        <option>PT ABC</option>
                                        <option>PT XYZ</option>
                                        <option>PT DEF</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Service Type<span
                                            class="text-danger">*</span></label>
                                    <select name="" parsley-trigger="change" required="" class="form-control">
                                        <option>Pre-Commisioning</option>
                                        <option>Comissioning</option>
                                        <option>Maintenance</option>
                                        <option>Contract Service</option>
                                        <option>Oil Sampling</option>
                                        <option>Assesment</option>
                                        <option>Warranty</option>
                                        <option>Persiapan Project</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Transportation Mode<span
                                            class="text-danger">*</span></label>
                                    <select name="" parsley-trigger="change" required="" class="form-control">
                                        <option>Pesawat</option>
                                        <option>Mobil</option>
                                        <option>Kereta Api</option>
                                        <option>Lain-Lain</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Vehicle Number<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="" parsley-trigger="change" required=""
                                        placeholder="Masukkan Vehicle Number" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">SPK Code<span
                                            class="text-danger">*</span></label>
                                    <select name="" parsley-trigger="change" required="" class="form-control">
                                        <option>A</option>
                                        <option>C</option>
                                        <option>G</option>
                                        <option>K</option>
                                        <option>N</option>
                                        <option>R</option>
                                        <option>T</option>
                                        <option>PSA</option>
                                        <option>CT/VT</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">SPK Number<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="" parsley-trigger="change" required=""
                                        placeholder="Masukkan SPK Number" class="form-control" id="userName">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Description<span
                                            class="text-danger">*</span></label>
                                    <textarea name="" parsley-trigger="change" required=""
                                        class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Created By<span
                                            class="text-danger">*</span></label>
                                    <select name="" parsley-trigger="change" required="" class="form-control">
                                        <option>User 1</option>
                                        <option>User 2</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Technician<span class="text-danger">*</span></label>
                                    <select id="select-technician" class="form-control" name="" style="color: black;">
                                        <option value="">Technician 1</option>
                                        <option value="">Technician 2</option>
                                        <option value="">Technician 3</option>
                                        <option value="">Technician 4</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Material<span class="text-danger">*</span></label>
                                    <select id="select-material" class="form-control" name="" style="color: black;">
                                        <option value="">Material 1</option>
                                        <option value="">Material 2</option>
                                        <option value="">Material 3</option>
                                        <option value="">Material 4</option>
                                    </select>
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
<script>
    $(document).ready(function() {
        $('#select-technician').select2({
            // placeholder: 'role',
            allowClear: true, // Option to clear selection
            theme: 'classic', // Use a different theme (change CSS classes)
            multiple: true
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#select-material').select2({
            // placeholder: 'role',
            allowClear: true, // Option to clear selection
            theme: 'classic', // Use a different theme (change CSS classes)
            multiple: true
        });
    });
</script>
@endsection