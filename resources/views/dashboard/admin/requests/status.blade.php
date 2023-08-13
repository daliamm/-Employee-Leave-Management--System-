@extends('dashboard.master')



@section('content')


<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          <div class="col">
            <h2 class="page-title">
              Invoice
            </h2>
          </div>
          <!-- Page title actions -->
          <div class="col-auto ms-auto d-print-none">
            <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
              <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" /></svg>
              Print Invoice
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
      <div class="container-xl">
        <div class="card card-lg">
          <div class="card-body">
            <div class="row">
              <div class="col-6">
                <p class="h3">Type</p>
                <address>

                  Start Daea<br>
                  End Date<br>
                  Status<br>
                 Created At
                </address>
              </div>
              <div class="col-6 text-end">
                <p class="h3">Employee</p>
                <address>
                  {{ $leaveRequest->start_date }}<br>
                  {{ $leaveRequest->end_date }}<br>
                  {{ $leaveRequest->status }}<br>
                  {{ $leaveRequest->created_at->diffForHumans() }}
                </address>
              </div>

              <form action="{{ route('update.leave-request', $leaveRequest->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="status">
                        <option value="pending" {{ $leaveRequest->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ $leaveRequest->status === 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="rejected" {{ $leaveRequest->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Reply</label>
                    <textarea class="form-control" name="reply" rows="3">{{ $leaveRequest->reply }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>

{{--
              <h4 style="padding-top: 10px">Change Leave Request Status</h4>

              <select class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>



              <h4 style="padding-top: 10px">Write a Reaon</h4>
              <textarea name="" id="" cols="30" rows="10"></textarea>




              <button type="button" class="btn btn-primary" style="margin-top: 50px">

               Change Now
              </button> --}}



          </div>
        </div>
      </div>
    </div>

  </div>

@endsection
