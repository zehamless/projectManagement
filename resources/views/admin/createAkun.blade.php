 @extends('template.index')

@section('content')

<div class="content-page">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <form action="{{url('/admin/users')}}" class="parsley-examples" novalidate=""  method="post" enctype="multipart/form-data">
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
                                    <label for="userName" class="form-label">Division Date<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="division" parsley-trigger="change" required=""
                                        placeholder="Enter user name" class="form-control" id="userName">
                                    @error('division')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Roles<span
                                            class="text-danger">*</span></label>
                                    <select name="roles" class="form-control" multiple>
                                        @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('roles')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Tanda Tangan<span
                                            class="text-danger">*</span></label>
                                    <input type="file" name="signature" parsley-trigger="change" required=""
                                        placeholder="Enter user name" class="form-control" id="userName">
                                    @error('signature')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="pass1" class="form-label">Password<span
                                            class="text-danger">*</span></label>
                                    <input id="pass1" type="password" placeholder="Password" required="" name="password"
                                        class="form-control">
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="pass1" class="form-label">Password<span
                                            class="text-danger">*</span></label>
                                    <input id="pass1" type="password_confirmation" placeholder="Password" required=""
                                           class="form-control" name="password_confirmation">
                                    @error('password_confirmation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="text-end">
                                    <button class="btn btn-primary waves-effect waves-light"
                                        type="submit">Submit</button>
                                    <a href="{{ url('admin/olahAkun') }}">
                                        <button type="button" class="btn btn-secondary waves-effect">Cancel</button>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Plugin js-->
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/parsleyjs/parsley.min.js') }}"></script>

<!-- Validation init js-->
<script src="{{ asset('templateAdmin/Admin/dist/assets/js/pages/form-validation.init.js') }}"></script>


@endsection
