<div class="modal modal-blur fade" id="edit-request-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="edit-request-form" action="{{ route('my-requests.update', ':id') }}" method="POST">
                @csrf
                @method('PUT')



                {{-- <h4 style="padding: 30px;">
                    The Status Of Your Leave Request Is:
                    <span style="color: {{ $item->status == 'approved' ? 'green' : 'red' }}">
                        {{ $item->status }}
                    </span>
                </h4> --}}



                <div class="modal-header">
                    <h5 class="modal-title">Edit Employee Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="id">

                    <div class="mb-3">
                        <label class="form-label">Reason</label>
                        <input type="text" class="form-control" name="reason">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Start Date</label>
                        <input type="date" class="form-control" name="start_date" value="{{ $item->start_date }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">End Date</label>
                        <input type="date" class="form-control" name="end_date" value="{{ $item->end_date }}">
                    </div>


                    <div class="col-lg-12">

                        <div class="mb-3">
                            <label class="form-label">Leave Type</label>
                            <select class="form-select @error('leave_type_id') is-invalid @enderror"
                                name="leave_type_id" aria-label="Select a Leave Type">
                                <option disabled>Select a Leave Type</option>

                                @foreach ($leaveType as $leaveTypeItem)
                                    <option value="{{ $leaveTypeItem->id }}"
                                        {{ $leaveTypeItem->id == $item->leave_type_id ? 'selected' : '' }}>
                                        {{ $leaveTypeItem->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('leave_type_id')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <input type="text" class="form-control" name="manual_leave_type" id="manual-leave-type-input" value="{{ $item->manual_leave_type }}" style="padding: 15px;" placeholder="Add Manual Leave Type">
                    {{-- <div class="mb-3">
                        <label class="form-label">Manual Leave Type</label>
                        <input type="text" class="form-control" name="manual_leave_type" value="{{ $item->manual_leave_type }}">
                    </div> --}}


                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Request</button>
                </div>
            </form>
        </div>
    </div>
</div>