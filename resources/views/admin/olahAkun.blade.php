@extends('template.index')

@section('content')

<style>
    .btn-createAccount {
        border-radius: 10px;
        background-color: #FF3E3E;
        border: #FF3E3E;
        color: white;
    }

        .btn-editAccount {
            background-color: #FF3E3E;
            border: #FF3E3E;
            color: white;
        }

        .btn-createAccount:focus {
            color: white;
        }

        .form-label {
            text-align: start !important;
        }

    /*.modal-open .modal {*/
    /*    overflow-y: hidden !important;*/
    /*}*/
    .actionColumn{
        text-align: center !important;
    }
</style>

    <div class="content-page">
        <div class="content">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <!-- Start Content-->
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-7">
                        <a href="{{ url('admin/users/create') }}"
                            class="btn btn-createAccount w-md waves-effect waves-light mb-3 px-4"><i class="mdi mdi-plus"></i>
                            Create Account</a>
                    </div>
                    <div class="col-sm-5">

                    </div><!-- end col-->
                </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Data Akun Table</h4>
                            <p class="text-muted font-14 mb-3">
                            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable"
                                            class="table table-bordered dt-responsive table-hover table-responsive nowrap dataTable no-footer dtr-inline"
                                            aria-describedby="datatable_info">
                                            <thead>
                                                <tr>
                                                    <th class="sorting sorting_asc" tabindex="0"
                                                        aria-controls="datatable" rowspan="1" colspan="1"
                                                        style="width: auto;" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending">#
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: auto;"
                                                        aria-label="Position: activate to sort column ascending">
                                                        Email
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: auto;"
                                                        aria-label="Office: activate to sort column ascending">First
                                                        Name
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: auto;"
                                                        aria-label="Age: activate to sort column ascending">Last Name
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: auto;"
                                                        aria-label="Age: activate to sort column ascending">Role
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: auto;"
                                                        aria-label="Start date: activate to sort column ascending">
                                                        Division
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: auto;"
                                                        aria-label="Salary: activate to sort column ascending">Signature
                                                    </th>
                                                    <th class="sorting text-center" tabindex="0"
                                                        aria-controls="datatable" rowspan="1" colspan="1"
                                                        style="width: auto;"
                                                        aria-label="Salary: activate to sort column ascending">Actions
                                                    </th>
                                                </tr>
                                            </thead>
                                            {{-- modals --}}
                                            <div id="con-close-modal" class="modal fade" role="dialog"
                                                aria-labelledby="myModalLabel" aria-hidden="true"
                                                style="overflow:hidden;">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Data Akun</h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="mb-3 text-start">
                                                                        <label for="field-3"
                                                                            class="form-label">Email</label>
                                                                        <input type="text" class="form-control"
                                                                            id="email"
                                                                            placeholder="type your email here">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="mb-3 text-start">
                                                                        <label for="field-1" class="form-label">First
                                                                            Name</label>
                                                                        <input type="text" class="form-control"
                                                                            id="first_name" placeholder="First">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3 text-start">
                                                                        <label for="field-2 " class="form-label">Last
                                                                            Name</label>
                                                                        <input type="text" class="form-control"
                                                                            id="last_name" placeholder="Last">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="mb-3 text-start">
                                                                        <label for="field-3" class="form-label">Division
                                                                        </label>
                                                                        <input type="text" class="form-control"
                                                                            id="division" placeholder="Divisi">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="mb-3 text-start">
                                                                        <label for="field-3"
                                                                            class="form-label">Role</label>
                                                                        <select id="select-roles" class="form-control"
                                                                            name="roles[]"
                                                                            style="color: black;"></select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="mb-3 text-start">
                                                                        <label for="field-3" class="form-label">Tanda
                                                                            Tangan</label>
                                                                        <input type="file" class="form-control"
                                                                            data-plugins="dropify" data-height="100"
                                                                            id="signature" data-default-file="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect"
                                                                data-bs-dismiss="modal">Close
                                                            </button>
                                                            <button type="button" id="update-button"
                                                                onclick="updateUser($(this).attr('data-id'))"
                                                                class="btn btn-editAccount waves-effect waves-light">
                                                                Save
                                                                changes
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal -->

                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div> <!-- container-fluid -->

        </div> <!-- content -->
    </div>
@endsection

@section('pageScript')
    <!-- Include Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- Include Select2 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#datatable').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                ajax: "{{ route('users.index') }}",
                columns: [
                    //add dt row
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'first_name',
                        name: 'first_name'
                    },
                    {
                        data: 'last_name',
                        name: 'last_name'
                    },
                    {
                        data: 'roles',
                        name: 'roles.name'
                    },
                    {
                        data: 'division',
                        name: 'division'
                    },
                    {
                        data: 'signature',
                        name: 'signature',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, full, meta) {
                            // Concatenate the image URL with the asset function
                            return '<a class="view" href="' + '{{ asset("storage/") }}' + '/' + data + '"><img src="' + '{{ asset("storage/") }}' + '/' + data + '" alt="Signature" id= "view" width="100" height="auto"></a>';

                        }
                    },
                    {
                        data: 'id',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, full, meta) {
                            return `
                        <td class="text-center">
                            <div class="btn-group btn-group-sm" style="float: none;">
                                <button type="button"
                                id="edit-button-${data}"
                                    class="tabledit-edit-button btn btn-primary waves-effect waves-light"
                                    style="background-color: #3E8BFF;"
                                    data-bs-toggle="modal"
                                    data-id="${data}"
                                    data-bs-target="#con-close-modal"
                                    onclick="editUser('${data}')">
                                    <span class="mdi mdi-pencil"></span>
                                </button>
                            </div>
                            <div class="btn-group btn-group-sm" style="float: none;">
                                <button type="button"
                                    class="tabledit-edit-button btn btn-danger"
                                    onclick="deleteUser('${data}')">
                                    <span class="mdi mdi-trash-can-outline"></span>
                                </button>
                            </div>
                        </td>`;
                        }
                    },

                ]
            });
        });
    </script>
    <script type="text/javascript">
        function deleteUser(userId) {
            // Display a confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this user!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#f34e4e',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Send an AJAX request to delete the user
                    $.ajax({
                        url: "{{ route('users.delete', '') }}" + '/' + userId,
                        type: 'DELETE',
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                    });
                    location.reload();
                }
            });
        }
    </script>
    <script type="text/javascript">
        function editUser(userId) {
            var modal = $("#con-close-modal");
            // Make an Ajax request to get the data.
            $.ajax({
                url: "{{ route('users.show', '') }}" + "/" + userId,
                method: "GET",
                success: function(data) {
                    try {
                        var userData = data[0];
                        if (userData && userData.hasroles) {
                            // Clear existing options in the select element
                            $("#select-roles").empty();
                            showRoles(userData);

                            modal.find("#email").val(userData.email);
                            modal.find("#first_name").val(userData.first_name);
                            modal.find("#last_name").val(userData.last_name);
                            modal.find("#division").val(userData.division);

                            // Open the modal.
                            modal.modal("show");
                            //add attribute data-id in update button
                            modal.find("#update-button").attr("data-id", userData.id);
                        } else {
                            console.error("Data not found");
                        }
                    } catch (error) {
                        console.error("Error parsing JSON: " + error);
                    }
                },
                error: function() {
                    console.error("Failed to fetch data");
                }
            });
        }
    </script>
    <script type="text/javascript">
        function showRoles(userData) {
            // get all roles
            $.ajax({
                url: "{{ route('roles.index') }}",
                method: "GET",
                success: function(data) {
                    try {
                        var roles = data;
                        if (roles) {
                            // Clear existing options in the select element
                            $("#select-roles").empty();

                            // Add new options based on userData.hasroles
                            for (let i = 0; i < roles.length; i++) {
                                var roleName = roles[i].name;
                                var roleId = roles[i].id;

                                var selected = false;
                                for (let j = 0; j < userData.hasroles.length; j++) {
                                    if (userData.hasroles[j].id === roleId) {
                                        selected = true;
                                        break;
                                    }
                                }

                                var option = new Option(roleName, roleId, selected, selected);
                                $("#select-roles").append(option);
                            }

                            // Trigger the change event to update the Select2 dropdown menu.
                            $("#select-roles").trigger('change');
                        } else {
                            console.error("Data not found");
                        }
                    } catch (error) {
                        console.error("Error parsing JSON: " + error);
                    }
                },
                error: function() {
                    console.error("Failed to fetch data");
                }
            });
        }
    </script>
    <script type="text/javascript">
        function updateUser(userId) {
            // console.log(userId);
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this user!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, update it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    //Modal
                    var modal = $("#con-close-modal");
                    var email = modal.find("#email").val();
                    var first_name = modal.find("#first_name").val();
                    var last_name = modal.find("#last_name").val();
                    var division = modal.find("#division").val();
                    var roles = modal.find("#select-roles").val();
                    var signature = modal.find("#signature").val();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        }
                    });
                    // Send an AJAX request to update the user
                    $.ajax({
                        url: "/admin/users/" + userId, // Correct URL for PATCH request
                        type: 'PATCH', // Use PATCH for this request
                        data: {
                            _token: "{{ csrf_token() }}",
                            email: email,
                            first_name: first_name,
                            last_name: last_name,
                            division: division,
                            roles: roles,
                            signature: signature,
                        },
                        success: function() {
                            // Reload the page
                            location.reload();
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            console.error(xhr.responseText);
                            // Handle errors here if needed.
                        }
                    });

                }
            })
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#select-roles').select2({
                // placeholder: 'role',
                dropdownParent: $('#con-close-modal'),
                allowClear: true, // Option to clear selection
                theme: 'classic', // Use a different theme (change CSS classes)
                multiple: true,
                dropdownAutoWidth: true,
                width: '100%',
            });
        });
    </script>
    {{-- <script>
    $(document).ready(function() {
            // Initialize Magnific Popup for image links
            $('.image-popup').magnificPopup({
                type: 'image', // Type of content (image)
                gallery: {
                    enabled: true // Enable gallery mode for multiple images
                }
            });
        });
</script> --}}
    <script>
        $(document).ready(function() {

            $('#view').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                mainClass: 'mfp-img-mobile',
                image: {
                    verticalFit: true
                }

            });
        });
    </script>

    <!-- isotope filter plugin -->
    <script src="{{ asset('templateAdmin/Admin/dist/assets/libs/isotope-layout/isotope.pkgd.min.js') }}"></script>

    <!-- Magnific Popup-->
    <script src="{{ asset('templateAdmin/Admin/dist/assets/libs/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

    <!-- Gallery Init-->
    <script src="{{ asset('templateAdmin/Admin/dist/assets/js/pages/gallery.init.js') }}"></script>
@endsection
