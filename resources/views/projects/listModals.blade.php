<div class="listModals">

    {{-- modals edit milestone --}}
    <form action="" class="parsley-examples" novalidate="" method="post" enctype="multipart/form-data">
        @csrf
        <div id="edit-milestone-modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" style="overflow:hidden;">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Edit Milestone</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            {{-- form input hidden project id --}}
                            <input type="hidden" name="project_id" value="" id="id-to-remove">

                            {{-- form input submitted date --}}
                            <div class="mb-3">
                                <label for="submitted_date" class="form-label">Submitted Date<span
                                        class="text-danger">*</span></label>
                                <input type="date" name="submitted_date" parsley-trigger="change" required=""
                                    placeholder="Masukkan tanggal" class="form-control datepicker" id="submitted_date" value="{{ $milestone['submitted_date'] }}">
                            </div>

                            {{-- form input description --}}
                            <div class="mb-3">
                                <label for="userName" class="form-label">Description<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="description" parsley-trigger="change" required=""
                                    placeholder="Tambahkan deskripsi" class="form-control" value="{{ $milestone['description'] }}">
                            </div>

                            {{-- form input due date --}}
                            <div class="mb-3">
                                <label for="userName" class="form-label">Due Date<span
                                        class="text-danger">*</span></label>
                                <input type="date" name="due_date" parsley-trigger="change" required=""
                                    placeholder="Masukkan tanggal" class="form-control datepicker" id="userName">
                            </div>

                            {{-- form input progress --}}
                            <div class="mb-3">
                                <label for="progress" class="form-label">Progress<span
                                        class="text-danger">*</span></label>
                                <select class="form-control" id="progress" name="progress">
                                    <option value="Planned">Planned</option>
                                    <option value="On Progress">On Progress</option>
                                    <option value="Done">Done</option>
                                </select>
                            </div>

                            {{-- form input file attachment --}}
                            <div class="mb-3">
                                <label for="userName" class="form-label">File Attachment<span
                                        class="text-danger">*</span></label>
                                <input type="file" name="file" parsley-trigger="change" required=""
                                    data-plugins="dropify" data-height="150" class="form-control" id="fileAttachment">
                            </div>
                        </div>
                        <div class="modal-footer">
                            {{-- button cancel --}}
                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">
                                Close
                            </button>
                            
                            {{-- button save --}}
                            <button type="submit" class="btn btn-save waves-effect waves-light">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal -->
        </div>
    </form>

    {{-- modals edit production cost--}}
    <form action="" class="parsley-examples" novalidate="" method="post" enctype="multipart/form-data">
        @csrf
        <div id="edit-cost-modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
            style="overflow:hidden;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Edit Field Service Log</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            {{-- form generate read only project name --}}
                            <div class="mb-3">
                                <label for="userName" class="form-label">Projects<span
                                        class="text-danger">*</span></label>
                                <input type="hidden" name="project_id" value="">
                                <input type="text" name="label" parsley-trigger="change" required
                                    class="form-control" readonly value="">
                            </div>

                            {{-- form input description --}}
                            <div class="mb-3">
                                <label for="description" class="form-label">Description<span
                                        class="text-danger">*</span></label>
                                <textarea type="text" name="description" parsley-trigger="change" required
                                    placeholder="Enter description" class="form-control"> </textarea>
                            </div>

                            {{-- form input amount --}}
                            <div class="mb-3">
                                <label for="amount" class="form-label">Amount<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="amount" parsley-trigger="change" required
                                    placeholder="Enter amount" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-save waves-effect waves-light">
                                Save
                                changes
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal -->
        </div>
    </form>

    {{-- modals edit fields service log--}}
    <form action="" class="parsley-examples" novalidate="" method="post" enctype="multipart/form-data">
        @csrf
        <div id="edit-service-modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
            style="overflow:hidden;">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Edit Field Service Log</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-6">
                                {{-- form input service date --}}
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Service Date<span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="nick" parsley-trigger="change" required=""
                                        placeholder="Enter service date" class="form-control datepicker" id="userName">
                                </div>

                                {{-- form input project label --}}
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Project Label<span
                                            class="text-danger">*</span></label>
                                    <select name="" parsley-trigger="change" required="" class="form-control">
                                        <option>PT ABC</option>
                                        <option>PT XYZ</option>
                                        <option>PT DEF</option>
                                    </select>
                                </div>

                                {{-- form input service type --}}
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

                                {{-- form input vehicle number --}}
                                <div class="mb-3" id="vehicle_number_container" style="display: none;">
                                    <label for="userName" class="form-label">Vehicle Number<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="vehicle_number" placeholder="Enter vehicle number"
                                        parsley-trigger="change" required="" class="form-control">
                                </div>

                                {{-- form input SPK Code --}}
                                <div class="mb-3">
                                    <label for="spkCode" class="form-label">SPK Code<span
                                            class="text-danger">*</span></label>
                                    <select name="spkCode" id="spkCode" parsley-trigger="change" required=""
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
                                </div>

                                {{-- form input SPK Number --}}
                                <div class="mb-3">
                                    <label for="spkNumber" class="form-label">SPK Number<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="code">Code</span>
                                        <input type="text" placeholder="Enter SPK Number" name="spk_number"
                                            id="spk_number" class="form-control" style="outline: none;">
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                {{-- form input transportation mode --}}
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Transportation Mode<span
                                            class="text-danger">*</span></label>
                                    <select name="transportation_mode" id="transportation_mode" parsley-trigger="change"
                                        required="" class="form-control">
                                        <option value="pesawat">Pesawat</option>
                                        <option value="mobil">Mobil</option>
                                        <option value="kereta_api">Kereta Api</option>
                                        <option value="lain_lain">Lain-Lain</option>
                                    </select>
                                </div>

                                {{-- form input genereate created by user --}}
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Created By<span
                                            class="text-danger">*</span></label>
                                    <select name="" parsley-trigger="change" required="" class="form-control">
                                        <option>User 1</option>
                                        <option>User 2</option>
                                    </select>
                                </div>

                                {{-- form input generate technician --}}
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Technician<span
                                            class="text-danger">*</span></label>
                                    <select id="select-technician" class="form-control" name="" style="color: black;">
                                        <option value="">Technician 1</option>
                                        <option value="">Technician 2</option>
                                        <option value="">Technician 3</option>
                                        <option value="">Technician 4</option>
                                    </select>
                                </div>

                                {{-- form input material --}}
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Material<span
                                            class="text-danger">*</span></label>
                                    <select id="select-material" class="form-control" name="" style="color: black;">
                                        <option value="">Material 1</option>
                                        <option value="">Material 2</option>
                                        <option value="">Material 3</option>
                                        <option value="">Material 4</option>
                                    </select>
                                </div>

                                {{-- form input description --}}
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Description<span
                                            class="text-danger">*</span></label>
                                    <textarea name="" parsley-trigger="change" required=""
                                        class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-save waves-effect waves-light">
                                Save
                                changes
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal -->
        </div>
    </form>

</div>