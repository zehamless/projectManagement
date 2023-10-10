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
                                <form action="{{ route('operational.store') }}" method="POST" class="parsley-examples"
                                    novalidate="">
                                    @csrf
                                    @error('vehicle_number')
                                        <p class="alert-danger alert">{{ $message }}</p>
                                    @enderror
                                    <div class="mb-3">
                                        <label for="projectId" class="form-label">Project Label<span
                                                class="text-danger">*</span></label>
                                        <select name="project_id" id="projectId" parsley-trigger="change" required=""
                                            class="form-control">
                                            @isset($projectId)
                                                <option value="{{ $projectId }}" selected>{{ $label }}</option>
                                            @else
                                                <option selected>Pilih Proyek</option>
                                            @endisset
                                        </select>
                                        @error('project_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="date" class="form-label">Service Date<span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="date" parsley-trigger="change" required=""
                                            placeholder="Enter service date" class="form-control datepicker" id="date">
                                        @error('date')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="type" class="form-label">Service Type<span
                                                class="text-danger">*</span></label>
                                        <select name="type" parsley-trigger="change" required="" id="type"
                                            class="form-control">
                                            <option>Pre-Commisioning</option>
                                            <option>Comissioning</option>
                                            <option>Maintenance</option>
                                            <option>Contract Service</option>
                                            <option>Oil Sampling</option>
                                            <option>Assesment</option>
                                            <option>Warranty</option>
                                            <option>Persiapan Project</option>
                                        </select>
                                        @error('type')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="transportation_mode" class="form-label">Transportation Mode<span
                                                class="text-danger">*</span></label>
                                        <select name="transportation_mode" id="transportation_mode" parsley-trigger="change"
                                            required="" class="form-control">
                                            <option value="pesawat">Pesawat</option>
                                            <option value="mobil">Mobil</option>
                                            <option value="kereta_api">Kereta Api</option>
                                            <option value="lain_lain">Lain-Lain</option>
                                        </select>
                                        @error('transportation_mode')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3" id="vehicle_number_container" style="display: none;">
                                        <label for="vehicle_number" class="form-label">Vehicle Number<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="vehicle_number" value="-"
                                            placeholder="Enter vehicle number" parsley-trigger="change"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="spk_code" class="form-label">SPK Code<span
                                                class="text-danger">*</span></label>
                                        <select name="spk_code" id="spk_code" parsley-trigger="change" required=""
                                            class="form-control">
                                            <option>-- Select SPK Code --</option>
                                            <option value="A">A</option>
                                            <option value="C">C</option>
                                            <option value="G">G</option>
                                            <option value="K">K</option>
                                            <option value="N">N</option>
                                            <option value="R">R</option>
                                            <option value="T">T</option>
                                            <option value="PSA">PSA</option>
                                            <option value="CT/VT">CT/VT</option>
                                        </select>
                                        @error('spk_code')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="spk_number" class="form-label">SPK Number<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="code">Code</span>
                                            <input type="text" placeholder="Enter SPK Number" name="spk_number"
                                                id="spk_number" class="form-control" style="outline: none;">
                                            @error('spk_number')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description<span
                                                class="text-danger">*</span></label>
                                        <textarea name="description" id="description" parsley-trigger="change" required="" class="form-control"></textarea>
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Created By<span
                                                class="text-danger">*</span></label>
                                        <select name="created_by" parsley-trigger="change" required=""
                                            class="form-control">
                                            <option selected
                                                value="{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}">
                                                {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}
                                            </option>
                                        </select>
                                        @error('created_by')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="text-end">
                                        @isset($projectId)
                                            <a href="{{ route('projects.show', ['id' => $projectId]) }}"
                                                class="btn btn-secondary waves-effect">
                                                Cancel
                                            </a>
                                        @else
                                            <a href="{{ route('operational.index') }}"
                                                class="btn btn-secondary waves-effect">
                                                Cancel
                                            </a>
                                        @endisset
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
    <!-- Include Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- Include Select2 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
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
    {{-- Open input vehicle number --}}
    <script>
        $(document).ready(function() {
            $("#transportation_mode").change(function() {
                var selectedOption = $(this).val();
                if (selectedOption === "mobil") {
                    $("#vehicle_number_container").show(); // Tampilkan input field jika "Mobil" dipilih
                } else {
                    $("#vehicle_number_container").hide(); // Sembunyikan input field untuk pilihan lainnya
                }
            });
        });
    </script>

    {{-- SPK CODE dan SPK NUMBER --}}
    <script>
        $(document).ready(function() {
            $("#spk_code").change(function() {
                var code = $("#spk_code").val()
                $("#code").text(code + " - ");
            })
        });
    </script>

    {{-- Get data project --}}
    <script>
        $(document).ready(function() {
            $('#projectId').select2(); // Optional, jika Anda menggunakan plugin Select2

            // Jika tidak ada parameter ID proyek, ambil daftar proyek melalui Ajax
            console.log("Yahuuu")
            @unless (isset($projectId))
                $.ajax({
                    url: "{{ route('getProjects') }}",
                    type: "GET",
                    success: function(response) {
                        if (response.projects) {
                            var options = "<option value=''>Pilih Proyek</option>";
                            $.each(response.projects, function(id, label) {
                                options += "<option value='" + id + "'>" + label + "</option>";
                            });
                            $('#projectId').html(options);
                        }
                    }
                });
            @endunless
        });
    </script>
@endsection
