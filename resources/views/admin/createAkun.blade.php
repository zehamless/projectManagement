@extends('template.index')

@section('content')
    <div class="content-page">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <form action="{{url('/admin/users')}}" class="parsley-examples" novalidate="" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="emailAddress" class="form-label">Email address<span
                                        class="text-danger">*</span></label>
                                <input type="email" name="email" parsley-trigger="change" required=""
                                    placeholder="Enter email" class="form-control" id="emailAddress">
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="userName" class="form-label">First Name<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="first_name" parsley-trigger="change" required=""
                                    placeholder="Enter user name" class="form-control" id="userName">
                                @error('first_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="userName" class="form-label">Last Name<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="last_name" parsley-trigger="change" required=""
                                    placeholder="Enter user name" class="form-control" id="userName">
                                @error('last_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="userName" class="form-label">Division<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="division" parsley-trigger="change" required=""
                                    placeholder="Enter user name" class="form-control" id="userName">
                                @error('division')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="userName" class="form-label">Roles<span class="text-danger">*</span></label>
                                <select id="select-roles" class="form-control select2-multiple" name="roles[]"
                                    style="color: black; width: 100%">
                                    @foreach($roles as $role)
                                    <option value=" {{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('roles')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="userName" class="form-label">Tanda Tangan<span
                                        class="text-danger">*</span></label>
                                <input type="file" name="signature" parsley-trigger="change" required=""
                                    class="form-control" data-plugins="dropify" data-height="150">
                                @error('signature')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="pass1" class="form-label">Password<span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge">
                                    <input id="pass1" type="password" placeholder="Password" required="" name="password"
                                        class="form-control">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="pass1" class="form-label">Password Confirmation<span
                                        class="text-danger">*</span></label>
                                <div class="input-group input-group-merge">
                                    <input id="pass1" type="password_confirmation"
                                        placeholder="Type your password again" required="" class="form-control"
                                        name="password_confirmation">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                                @error('password_confirmation')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-end">
                                <a href="{{ url('admin/olahAkun') }}">
                                    <button type="button" class="btn btn-secondary waves-effect">Cancel</button>
                                </a>
                                <button class="btn btn-save waves-effect waves-light" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pageScript')
    <!-- Include jQuery (Select2 requires it) -->
{{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}

    <!-- Include Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- Include Select2 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#select-roles').select2({
                // placeholder: 'role',
                width: 'resolve',
                allowClear: true, // Option to clear selection
                // theme: 'classic', // Use a different theme (change CSS classes)
                multiple: true,
            });
        });
    </script>
@endsection
