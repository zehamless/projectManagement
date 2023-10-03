@extends('template.index')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="row">
                        
                        {{-- pelengkap div calendar, kalo dihapus error soalnye hehe --}}
                        <div class="col-lg-0">
                            <div id="external-events">
                            </div>
                        </div>

                        {{-- column calendar --}}
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">

                                    {{-- calendar function --}}
                                    <div id="calendar"></div>

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div> <!-- end col -->

                    </div> <!-- end row -->


                    <!-- Add New Event MODAL -->
                    <div class="modal fade" id="event-modal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    <h5 class="modal-title" id="modal-title">Event</h5>
                                </div>
                                <div class="modal-body px-4 pb-4 pt-0">
                                    <form class="needs-validation" name="event-form" id="form-event" novalidate>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Event Name</label>
                                                    <input class="form-control" placeholder="Insert Event Name"
                                                        type="text" name="title" id="event-title" required />
                                                    <div class="invalid-feedback">Please provide a valid event name
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Category</label>
                                                    <select class="form-select" name="category" id="event-category"
                                                        required>
                                                        <option value="bg-danger" selected>Danger</option>
                                                        <option value="bg-success">Success</option>
                                                        <option value="bg-primary">Primary</option>
                                                        <option value="bg-info">Info</option>
                                                        <option value="bg-dark">Dark</option>
                                                        <option value="bg-warning">Warning</option>
                                                    </select>
                                                    <div class="invalid-feedback">Please select a valid event category
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-6 col-4">
                                                <button type="button" class="btn btn-danger"
                                                    id="btn-delete-event">Delete</button>
                                            </div>
                                            <div class="col-md-6 col-8 text-end">
                                                <button type="button" class="btn btn-light me-1"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success"
                                                    id="btn-save-event">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> <!-- end modal-content-->
                        </div> <!-- end modal dialog-->
                    </div>
                    <!-- end modal-->
                </div>
                <!-- end col-12 -->
            </div> <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->

</div>


@endsection

@section('pageScript')
{{-- plugin js calendar --}}
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/fullcalendar/main.min.js') }}"></script>

<!-- Calendar init -->
<script src="{{ asset('templateAdmin/Admin/dist/assets/js/pages/calendar.init.js') }}"></script>
@endsection