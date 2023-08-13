@extends('dashboard.master')



@section('content')


<div class="page-wrapper">
    <!-- Page header -->
     @include('dashboard.layouts.page_header')
    <!-- Page body -->
    <div class="page-body">
      <div class="container-xl">
        <div class="row row-deck row-cards">

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">My Requests</h3>
              </div>
              <div class="card-body border-bottom py-3">
                <div class="d-flex">
                </div>
              </div>
              <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                  <thead>
                    <tr>
                      <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>
                      <th class="w-1"> # ID. <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 15l6 -6l6 6" /></svg>
                      </th>
                      <th>Invoice Subject</th>
                      <th>Start Date</th>
                      <th>Finish Date</th>
                      <th>Status</th>



                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($requests as $item)
                    <tr>
                        <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                        <td><span class="text-secondary">{{ $item->id }}</span></td>
                        <td><a href="invoice.html" class="text-reset" tabindex="-1">{{ $item->reason }}</a></td>
                        <td>
                            {{ $item->start_date }}
                        </td>
                        <td>
                            {{ $item->end_date}}
                        </td>
                        <td>
                            {{ $item->status }}
                        </td>
                        <td class="text-end">

                            <button class="btn btn-danger btn-delete">
                                Delete
                            </button>
                            <form class="d-inline" action="{{ route('my-requests.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('delete')
                            </form>


                            <a href="#" class="btn btn-secondary d-none d-sm-inline-block edit-request-btn"
                            data-bs-toggle="modal"
                            data-bs-target="#edit-request-modal"
                            data-id="{{ $item->id }}"
                            data-reason="{{ $item->reason }}"
                            data-start-date="{{ $item->start_date }}"
                            data-end-date="{{ $item->end_date }}"
                            data-leave_type_id="{{ $item->leave_type_id }}"
                            data-manual_leave_type="{{ $item->manual_leave_type }}"


                         >
                            Edit Your Leave Request
                         </a>


                        <a href="{{ route('my-requests.show',$item->id) }}" class="btn">
                            Show Details
                          </a>
                        </td>
                      </tr>

                    @empty
                    <h3 class="text-center">No Requests Founrd 4 U :)</h3>

                    @endforelse

                  </tbody>
                </table>
                <div style="padding: 20px">
                    {{ $requests->links() }}
                    </div>
              </div>
              </div>


            </div>
          </div>


        </div>
      </div>
    </div>

    @include('dashboard.layouts.footer')

  </div>
</div>

 @include('dashboard.employee._form')
 @include('dashboard.employee.edit_form')


@endsection


@section('scripts')
<script>
    $(document).ready(function() {
        $('.edit-request-btn').click(function() {
            var requestId = $(this).data('id');
            var reason = $(this).data('reason');
            var startDate = $(this).data('start-date');
            var endDate = $(this).data('end-date');
            var leave_type_id = $(this).data('leave_type_id');
            var status = $(this).data('status');
            var manual_leave_type = $(this).data('manual_leave_type');



            $('#edit-request-modal').find('[name="id"]').val(requestId);
            $('#edit-request-modal').find('[name="reason"]').val(reason);
            $('#edit-request-modal').find('[name="start_date"]').val(startDate);
            $('#edit-request-modal').find('[name="end_date"]').val(endDate);
            $('#edit-request-modal').find('[name="leave_type_id"]').val(leave_type_id);
            $('#edit-request-modal').find('[name="status"]').val(status);
            $('#edit-request-modal').find('[name="manual_leave_type"]').val(manual_leave_type);


        });
    });

    $(document).ready(function() {
        $('.edit-request-btn').click(function() {
            var requestId = $(this).data('id');
            var formAction = "{{ route('my-requests.update', ':id') }}";
            formAction = formAction.replace(':id', requestId);
            $('#edit-request-form').attr('action', formAction);
        });
    });

    </script>




<script>
   document.addEventListener('DOMContentLoaded', function() {
    const leaveTypeDropdown = document.querySelector('[name="leave_type_id"]');
    const manualLeaveTypeInput = document.getElementById('manual-leave-type-input');

    leaveTypeDropdown.addEventListener('change', function() {
        console.log("Selected value:", leaveTypeDropdown.value); // Add this line
        if (leaveTypeDropdown.value === 'other') {
            manualLeaveTypeInput.style.display = 'block';
        } else {
            manualLeaveTypeInput.style.display = 'none';
        }
    });
});

    </script>




@endsection