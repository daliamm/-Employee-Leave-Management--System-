@extends('dashboard.master')




@section('content')


<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
          <div class="row g-2 align-items-center">
            <div class="col">
              <!-- Page pre-title -->
              <div class="page-pretitle">
                Overview
              </div>
              <h2 class="page-title">
                My tasks here
              </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">

            </div>
          </div>
        </div>
      </div>

    <!-- Page body -->
    <div class="page-body">

      <div class="container-xl">

        <div class="row row-deck row-cards">


          <div class="col-md-12 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">My Tasks</h3>
              </div>
              <div class="table-responsive">
                <table class="table card-table table-vcenter">
                   @forelse ($tasks as $item)
                   <tr>
                    <td class="w-100">
                      <a href="#" class="text-reset">{{ $item->title }}</a>
                    </td>
                    <td class="text-nowrap text-secondary">
                      <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M11 15h1" /><path d="M12 15v3" /></svg>
                      {{ $item->created_at }}
                    </td>
                    <td class="text-nowrap text-secondary">
                        <button class="btn btn-danger btn-delete" type="submit">
                            Leave
                        </button>
                        <form class="d-inline" action="{{ route('tasks.leave', $item->id) }}" method="post">
                            @csrf

                        </form>

                        <a href="{{ route('tasks.show',$item->id) }}" class="btn btn-secondary d-none d-sm-inline-block edit-leave-type-btn"
                       >
                        Show Details
                       </a>
                    </td>
                  </tr>
                   @empty
                   <h3 class="text-center">No Tasks Found</h3>

                   @endforelse
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
