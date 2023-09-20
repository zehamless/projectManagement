@extends('template.index')

@section('content')

    <style>
        .input-code {
            font-size: 1rem;
            margin: 0 0.25rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s;
        }

        .input-code:focus {
            border-color: #007bff;
            outline: none;
        }
    </style>

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('projects.store') }}" method="post" class="parsley-examples"
                                    novalidate="">
                                    @csrf

                                    <div class="row">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="userName" class="form-label">Purchase Oder Number<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" onfocus="highlightInput(this)"
                                                    oninput="moveToNext(this, 'po-2')" onblur="resetInput(this)"
                                                    name="po-1" parsley-trigger="change" required="" placeholder="256"
                                                    class="form-control input-code" id="userName">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="userName" class="form-label"><span
                                                        class="text-danger">*</span></label>
                                                <input type="text" onfocus="highlightInput(this)"
                                                    onblur="resetInput(this)" name="po-2"
                                                    oninput="moveToNext(this, '', 'po-1')" parsley-trigger="change"
                                                    required="" placeholder="Code Purchase"
                                                    class="form-control input-code" id="userName">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <div>
                                                <label for="userName" class="form-label">Memo Number</label>
                                                <input type="text" maxlength="3" onfocus="highlightInput(this)"
                                                    onblur="resetInput(this)" name="memo-1" id="memo-1"
                                                    parsley-trigger="change" placeholder="S1"
                                                    class="form-control input-code"
                                                    oninput="moveToNext(this, 'memo-2', '')">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div>
                                                <label for="userName" class="form-label">&nbsp;</label>
                                                <input type="text" maxlength="3" onfocus="highlightInput(this)"
                                                    onblur="resetInput(this)" name="memo-2" id="memo-2"
                                                    parsley-trigger="change" placeholder="23"
                                                    class="form-control input-code"
                                                    oninput="moveToNext(this, 'memo-3', 'memo-1')">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div>
                                                <label for="userName" class="form-label">&nbsp;</label>
                                                <input type="text" maxlength="3" onfocus="highlightInput(this)"
                                                    onblur="resetInput(this)" name="memo-3" id="memo-3"
                                                    parsley-trigger="change" placeholder="Sales Order Code"
                                                    class="form-control input-code"
                                                    oninput="moveToNext(this, 'memo-4', 'memo-2')">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div>
                                                <label for="userName" class="form-label">&nbsp;</label>
                                                <input type="text" maxlength="3" onfocus="highlightInput(this)"
                                                    onblur="resetInput(this)" name="memo-4" id="memo-4"
                                                    parsley-trigger="change" placeholder="Sales Order Code"
                                                    class="form-control input-code"
                                                    oninput="moveToNext(this, 'memo-5', 'memo-3')">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div>
                                                <label for="userName" class="form-label">&nbsp;</label>
                                                <input type="text" maxlength="3" onfocus="highlightInput(this)"
                                                    oninput="moveToNext(this, '', 'memo-4')" onblur="resetInput(this)"
                                                    name="memo-5" id="memo-5" parsley-trigger="change"
                                                    placeholder="Sales Order Code" class="form-control input-code">
                                            </div>
                                        </div>
                                        <span class="help-block"><small>(Optional Jika SO Number Sudah
                                                Diisi)</small></span>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="userName" class="form-label">Sales Oder Number</label>
                                                <input type="text" maxlength="2" onfocus="highlightInput(this)"
                                                    onblur="resetInput(this)" name="so-1" id="so-1"
                                                    oninput="moveToNext(this, 'so-2', 'so-1')" parsley-trigger="change"
                                                    placeholder="S1" class="form-control input-code" id="userName">
                                                <span class="help-block"><small>(Optional)</small></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="userName" class="form-label">&nbsp;</label>
                                                <input type="text" maxlength="2" onfocus="highlightInput(this)"
                                                    onblur="resetInput(this)" name="so-2" id="so-2"
                                                    oninput="moveToNext(this, 'so-3', 'so-2')" parsley-trigger="change"
                                                    placeholder="23" class="form-control input-code" id="userName">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="userName" class="form-label">&nbsp;</label>
                                                <input type="text" onfocus="highlightInput(this)"
                                                    onblur="resetInput(this)" name="so-3" id="so-3"
                                                    parsley-trigger="change" placeholder="Sales Order Code"
                                                    class="form-control input-code" id="userName">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="emailAddress" class="form-label">Project Name<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="label" parsley-trigger="change" required=""
                                            placeholder="Masukkan Project Name" class="form-control" id="emailAddress">
                                        @error('label')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Customers<span
                                                class="text-danger">*</span></label>
                                        <select id="customers" class="form-control" name="customers"
                                            style="color: black;">
                                            <option>--Pilih Customer--</option>
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer['companyName'] }}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Customers Contact Name<span
                                                class="text-danger">*</span></label>
                                        <select id="customers-name" class="form-control" name="customers-name"
                                            style="color: black;">
                                            <option></option>
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
                                                @foreach ($usersByRole['Sales Executive'] as $se)
                                                    <option value="{{ $se['id'] }}">{{ $se['name'] }}</option>
                                                @endforeach
                                            @else
                                                <option value="">Tidak ada Sales Executive</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Location<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="location" parsley-trigger="change" required=""
                                            placeholder="Enter user name" class="form-control" id="userName">
                                    </div>
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Start Date<span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="start_date" parsley-trigger="change" required=""
                                            placeholder="Enter user name" class="form-control" id="userName">
                                    </div>
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">End Date<span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="end_date" parsley-trigger="change" required=""
                                            placeholder="Enter user name" class="form-control" id="userName">
                                    </div>
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Preliminary Cost<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="preliminary_cost" parsley-trigger="change"
                                            required="" placeholder="Enter user name" class="form-control"
                                            id="userName">
                                    </div>
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Purchase Order Amount<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="po_amount" parsley-trigger="change" required=""
                                            placeholder="Enter user name" class="form-control" id="userName">
                                    </div>
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Expense Budget<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="expense_budget" parsley-trigger="change"
                                            required="" placeholder="Enter user name" class="form-control"
                                            id="userName">
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
        // function saveConfirmation() {
        //         Swal.fire({
        //             title: 'Saved!',
        //             text: "Project berhasil dibuat",
        //             icon: "success",
        //         });
        // }
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

    <script>
        function moveToNext(input, nextFieldId) {
            if (input.value.length === input.maxLength) {
                document.getElementById(nextFieldId).focus();
            } else if (input.value.length === 0 && prevFieldId) {
                document.getElementById(prevFieldId).focus();
            }
        }

        function highlightInput(input) {
            input.style.borderColor = "#007bff"; /* Ganti warna border saat fokus */
        }

        function resetInput(input) {
            input.style.borderColor = "#ccc"; /* Kembalikan warna border ke warna asal saat tidak dalam fokus */
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#customers').on('change', function() {
                var customer_id = $(this).val();
                var $customerContact = $('#customers-name');


                if (customer_id) {
                    $customerContact.prop('disabled', false);
                    $.ajax({
                        url: '/customerContact/get-customer-contacts/' + customer_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#customers-name').empty();
                            $('#customers-name').append(
                                '<option value="">Pilih Customer Contact</option>');

                            $.each(data, function(key, value) {
                                $('#customers-name').append('<option value="' + value
                                    .id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $customerContact.prop('disabled', true);
                }
            });
        });
    </script>
@endsection
