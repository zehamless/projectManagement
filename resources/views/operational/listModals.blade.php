<div class="listModals">

    {{-- modals work plan --}}
    <form class="agendasForm" data-parsley-validate>
        <div id="add-work-modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
            style="overflow:hidden;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Add
                            Work Plan</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            {{-- form input description --}}
                            <div class="col-md-12">
                                <div class="mb-3 text-start">
                                    <label for="field-2" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" placeholder="Description" parsley-trigger="change" required></textarea>
                                </div>
                            </div>

                            {{-- form input due date --}}
                            <div class="col-md-12">
                                <div class="mb-3 text-start">
                                    <label for="due-date" class="form-label">Due Date<span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control datepicker" id="due-date"
                                        placeholder="Due date" name="due-date" parsley-trigger="change" required>
                                </div>
                            </div>

                            {{-- form input status payment --}}
                            <div class="col-md-12">
                                <div class="mb-3 text-start">
                                    <label for="progress" class="form-label">Status<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" id="progress" name="progress" parsley-trigger="change"
                                        required>
                                        <option value="Planned" selected>Planned</option>
                                        <option value="On Progress">On Progress</option>
                                        <option value="Done">Done</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-save waves-effect waves-light" id="agendaButton">
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
    {{-- modals operational expenses --}}
    <form class="expensesForm" data-parsley-validate>
        <div id="add-expenses-modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
            style="overflow:hidden;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Add
                            Expenses</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="row">
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3 text-start">
                                    <label for="field-1" class="form-label">Item<span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="expense-item" placeholder="Item"
                                        name="expense-item" parsley-trigger="change" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3 text-start">
                                    <label for="due-date" class="form-label">Date<span class="text-danger">*</span>
                                    </label>
                                    <input type="date" class="form-control datepicker" id="expense-date"
                                        placeholder="date" name="expense-date" parsley-trigger="change" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3 text-start">
                                    <label for="field-2 " class="form-label">Amount<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="expense-amount"
                                        placeholder="Amount" name="expense-amount" parsley-trigger="change" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-save waves-effect waves-light" id="expenseButton">
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
    {{-- modals material utilized --}}
    <form class="materialsForm" data-parsley-validate>
        <div id="add-material-modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" style="overflow:hidden;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Add
                            Material</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="row">
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3 text-start">
                                    <label for="field-1" class="form-label">Memo
                                        Number</label>
                                    <input type="text" class="form-control" id="memo_number"
                                        placeholder="Memo Number">
                                    <small id="emailHelp" class="form-text text-muted">(Optional)</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3 text-start">
                                    <label for="field-2 " class="form-label">Delivery
                                        Order
                                        Number<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="do_number"
                                        placeholder="DO Number" parsley-trigger="change" required="">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-save waves-effect waves-light" id="materialExpense">
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

    {{-- modals technician --}}
    <div id="add-technician-modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true" style="overflow:hidden;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Add
                        Technician</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="row">
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 text-start">
                                <label for="field-1" class="form-label">Operational<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="operational"
                                    placeholder="get value default dari operational id" readonly>
                            </div>
                        </div>
                        <div class="row" style="width: 100%;">
                            <div class="col-md-12">
                                <div class="mb-3 text-start h-10" id="technician-parent"
                                    style="max-height: 300px; overflow-y: auto;">
                                    <label for="field-1" class="form-label">Technician</label>
                                    <div class="d-flex align-items-center justify-between">
                                        <select class="form-select" id="select-technician">
                                            <option selected value="">-- Pilih Technician --</option>
                                        </select>
                                        <input type="text" class="form-control ml-2" id="division"
                                            placeholder="generate value division dari data user"
                                            parsley-trigger="change" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-save waves-effect waves-light" id="technician-button"
                            onclick="attachTeam()">
                            Save
                            changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal -->
    </div>

</div>
