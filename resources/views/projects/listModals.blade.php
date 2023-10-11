<div class="listModals">

    {{-- modals edit milestone --}}
    <form action="{{ route('milestone.update') }}" class="parsley-examples" novalidate="" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div id="edit-milestone-modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
            style="overflow:hidden;">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Edit Milestone</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body milestoneEditModal">
                        <div class="row">

                            {{-- form input hidden project id --}}
                            <input type="hidden" name="milestone_id" id="milestone_id" value="">

                            {{-- form input submitted date --}}
                            <div class="mb-3">
                                <label for="submitted_date" class="form-label">Submitted Date<span
                                        class="text-danger">*</span></label>
                                <input type="date" name="submitted_date" parsley-trigger="change" required=""
                                    placeholder="Masukkan tanggal" class="form-control datepicker" id="submitted_date">
                            </div>

                            {{-- form input description --}}
                            <div class="mb-3">
                                <label for="userName" class="form-label">Description<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="description" parsley-trigger="change" required=""
                                    placeholder="Tambahkan deskripsi" id="description" class="form-control"
                                    value="">
                            </div>

                            {{-- form input due date --}}
                            <div class="mb-3">
                                <label for="due_date" class="form-label">Due Date<span
                                        class="text-danger">*</span></label>
                                <input type="date" name="due_date" parsley-trigger="change" required=""
                                    placeholder="Masukkan tanggal" class="form-control datepicker" id="due_date">
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

    {{-- modals edit document record --}}
    <form action="" class="parsley-examples" novalidate="" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div id="edit-record-modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
            style="overflow:hidden;">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Edit Document Record</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body milestoneEditModal">
                        <div class="row">

                            {{-- form input hidden project id --}}
                            <input type="hidden" name="milestone_id" id="milestone_id" value="">

                            {{-- form input submitted date --}}
                            <div class="mb-3">
                                <label for="submitted_date" class="form-label">Submitted Date<span
                                        class="text-danger">*</span></label>
                                <input type="date" name="submitted_date" parsley-trigger="change" required=""
                                    placeholder="Masukkan tanggal" class="form-control datepicker"
                                    id="submitted_date">
                            </div>

                            {{-- form input description --}}
                            <div class="mb-3">
                                <label for="userName" class="form-label">Description<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="description" parsley-trigger="change" required=""
                                    placeholder="Tambahkan deskripsi" id="description" class="form-control"
                                    value="">
                            </div>

                            {{-- form input due date --}}
                            <div class="mb-3">
                                <label for="due_date" class="form-label">Due Date<span
                                        class="text-danger">*</span></label>
                                <input type="date" name="due_date" parsley-trigger="change" required=""
                                    placeholder="Masukkan tanggal" class="form-control datepicker" id="due_date">
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
                                    data-plugins="dropify" data-height="150" class="form-control"
                                    id="fileAttachment">
                            </div>
                        </div>

                        {{-- button cancel dan save --}}
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

    {{-- modals edit production cost --}}
    <form action="{{ route('cost.update') }}" class="parsley-examples" novalidate="" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div id="edit-cost-modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" style="overflow:hidden;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Edit Production Cost</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            {{-- form generate read only project name --}}
                            <div class="mb-3">
                                <label for="userName" class="form-label">Projects<span
                                        class="text-danger">*</span></label>
                                <input type="hidden" name="project_id" value="{{ $projectData->id }}"
                                    id="project_id">
                                <input type="hidden" name="cost_id" value="" id="cost_id">
                                <input type="text" name="project_name" id="project_name"
                                    value="{{ $projectData['label'] }}" parsley-trigger="change" class="form-control"
                                    readonly value="">
                            </div>

                            {{-- form input description --}}
                            <div class="mb-3">
                                <label for="description_cost" class="form-label">Description<span
                                        class="text-danger">*</span></label>
                                <textarea type="text" name="description" parsley-trigger="change" id="description_cost" required
                                    placeholder="Enter description" class="form-control"> </textarea>
                            </div>

                            {{-- form input amount --}}
                            <div class="mb-3">
                                <label for="amount_cost" class="form-label">Amount<span
                                        class="text-danger">*</span></label>
                                <div class="flex input-group">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="text" name="amount" id="amount_cost" parsley-trigger="change"
                                        required placeholder="Enter amount" class="form-control">
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

    {{-- modals edit fields service log --}}
    <form action="{{ route('operational.update') }}" class="parsley-examples" novalidate="" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div id="edit-service-modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" style="overflow:hidden;">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Edit Field Service Log</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-6">
                                {{-- form input service date --}}
                                <div class="mb-3">
                                    <label for="date_operational" class="form-label">Service Date<span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="date" parsley-trigger="change" required=""
                                        placeholder="Enter service date" class="form-control datepicker"
                                        id="date_operational">
                                </div>
                                <input type="hidden" name="id" id="id_operational">

                                {{-- form input project label --}}
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Project Label<span
                                            class="text-danger">*</span></label>
                                    <select name="project_id" parsley-trigger="change" required class="form-control">
                                        <option value="{{ $projectData->id }}" selected>{{ $projectData->label }}
                                        </option>
                                    </select>
                                </div>

                                {{-- form input service type --}}
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Service Type<span
                                            class="text-danger">*</span></label>
                                    <select name="type" parsley-trigger="change" required=""
                                        class="form-control" id="type_operational">
                                        <option value="Pre-Commisioning">Pre-Commisioning</option>
                                        <option value="Comissioning">Comissioning</option>
                                        <option value="Maintenance">Maintenance</option>
                                        <option value="Contract Service">Contract Service</option>
                                        <option value="Oil Sampling">Oil Sampling</option>
                                        <option value="Assesment">Assesment</option>
                                        <option value="Warranty">Warranty</option>
                                        <option value="Persiapan Project">Persiapan Project</option>
                                    </select>

                                </div>
                                {{-- form input SPK Code --}}
                                <div class="mb-3">
                                    <label for="spk_code_operational" class="form-label">SPK Code<span
                                            class="text-danger">*</span></label>
                                    <select name="spk_code" id="spk_code_operational" parsley-trigger="change"
                                        required="" class="form-control">
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
                                    <label for="spk_number_operational" class="form-label">SPK Number<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span id="code-Spk" class="input-group-text"></span>
                                        <input type="text" placeholder="Enter SPK Number" name="spk_number"
                                            id="spk_number_operational" class="form-control" style="outline: none;">
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                {{-- form input transportation mode --}}
                                <div class="mb-3">
                                    <label for="transportation_mode_operational" class="form-label">Transportation
                                        Mode<span class="text-danger">*</span></label>
                                    <select name="transportation_mode" id="transportation_mode_operational"
                                        parsley-trigger="change" required="" class="form-control">
                                        <option value="pesawat">Pesawat</option>
                                        <option value="mobil">Mobil</option>
                                        <option value="kereta_api">Kereta Api</option>
                                        <option value="lain_lain">Lain-Lain</option>
                                    </select>
                                </div>

                                {{-- form input vehicle number --}}
                                <div class="mb-3" id="vehicle_number_container">
                                    <label for="userName" class="form-label">Vehicle Number<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="vehicle_number" id="vehicle_number_operational"
                                        placeholder="Enter vehicle number" parsley-trigger="change" required=""
                                        class="form-control">
                                </div>


                                {{-- form input genereate created by user --}}
                                <div class="mb-3">
                                    <label for="created_by_operational" class="form-label">Created By<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="created" id="created_by_operational" readonly
                                        parsley-trigger="change" required="" class="form-control">
                                </div>
                                {{-- form input description --}}
                                <div class="mb-3">
                                    <label for="description_operational" class="form-label">Description<span
                                            class="text-danger">*</span></label>
                                    <textarea name="description" parsley-trigger="change" id="description_operational" required=""
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

    {{-- modals edit payment --}}
    <form action="{{ route('top.update') }}" class="parsley-examples" novalidate="" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div id="edit-payment-modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" style="overflow:hidden;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Payment</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            {{-- Form input payment type --}}
                            <div class="mb-3">
                                <label class="form-label" for="type_payment">Payment Type</label>
                                <input type="hidden" id="id_payment" name="id" value="">
                                <input type="hidden" name="project_id" value="{{ $projectData->id }}">
                                <input type="text" name="type" id="type_payment" parsley-trigger="change"
                                    required placeholder="Enter payment type..." class="form-control">
                                @error('type')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Form input progress --}}
                            <div class="mb-3">
                                <label class="form-label" for="progress_payment">Progress</label>
                                <div class="flex input-group">
                                    <input type="number" name="progress" parsley-trigger="change" required
                                        placeholder="Enter progress percentage.." id="progress_payment"
                                        class="form-control">
                                    <span class="input-group-text">%</span>
                                </div>
                                @error('progress')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Form input description --}}
                            <div class="mb-3">
                                <label for="description_payment" class="form-label">Description<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="description" parsley-trigger="change" required
                                    placeholder="Enter description" id="description_payment" class="form-control">
                                @error('description')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Form input status payment --}}
                            <div class="mb-3">
                                <label for="status_payment" class="form-label">Status<span
                                        class="text-danger">*</span></label>
                                <select class="form-control" name="status" id="status_payment"
                                    parsley-trigger="change" required>
                                    <option value="On Progress">On Progress</option>
                                    <option value="Done">Done</option>
                                </select>
                                @error('status')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Form input file bukti pembayaran --}}
                            <div class="mb-3">
                                <label class="form-label">Bukti Pembayaran</label>
                                <input type="file" name="file" parsley-trigger="change" data-plugins="dropify"
                                    data-height="150" class="form-control" id="bukti-pembayaran">
                                @error('file')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-save waves-effect waves-light">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


</div>
