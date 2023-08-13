@extends('dashboard.master')




@section('content')


<div class="page-wrapper">
    <!-- Page header -->
     {{-- @include('dashboard.layouts.page_header') --}}
    <!-- Page body -->
    <div class="page-body">
      <div class="container-xl">
        <div class="row row-deck row-cards">




          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Employee Requests</h3>
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
                      <th>User Name</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Created At</th>

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
                          {{ $item->user->name }}
                        </td>
                        <td>
                          {{ $item->start_date }}
                        </td>
                        <td>
                            {{ $item->end_date }}
                          </td>
                        <td>
                          {{ $item->created_at->diffForHumans() }}
                        </td>
                           <td>
                            <a href="{{ route('request.details',$item->id) }}" class="btn">
                                Reply
                              </a>
                           </td>
                      </tr>

                    @empty
                    <h3 class="text-center">No Requests Founrd For This Leave Type :)</h3>

                    @endforelse

                  </tbody>
                </table>
              </div>


            </div>
          </div>


        </div>
      </div>
    </div>

    @include('dashboard.layouts.footer')



  </div>
</div>


@endsection
