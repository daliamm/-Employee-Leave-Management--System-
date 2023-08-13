<div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('my-requests.store') }}" method="POST">
            @csrf

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">From </label>
                                <input type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date">
                                @error('start_date')
                                <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">To</label>
                                <input type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date">
                                @error('end_date')
                                <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div>
                                <label class="form-label">The Reason</label>
                                <textarea class="form-control @error('reason') is-invalid @enderror"  name="reason" rows="3"></textarea>
                                @error('reason')
                                <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Leave Type</label>
                            <div style="padding-right: 15px;"> <!-- Add padding here -->
                                <select class="form-select @error('leave_type_id') is-invalid @enderror" name="leave_type_id" aria-label="Select a Leave Type">
                                    <option selected disabled>Select a Leave Type</option>
                                    @foreach ($leaveType as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <input type="text" class="form-control" name="manual_leave_type" id="manual-leave-type-input" style="display: none; padding: 15px;" placeholder="Add Manual Leave Type">

                        </div>



                    </div>
                </div>

                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto">
                        Create new leave request
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>