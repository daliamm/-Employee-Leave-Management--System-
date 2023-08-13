@extends('dashboard.master')




@section('content')


<div class="page-wrapper">
    <!-- Page header -->
     @include('dashboard.layouts.page_header')
    <!-- Page body -->
    <div class="page-body">
        
      <div class="container-xl">

        <div class="row row-deck row-cards">


          <div class="col-md-12 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">My Requests</h3>
              </div>
              <div class="table-responsive">
                <table class="table card-table table-vcenter">
                  <tr>
                    <td class="w-1 pe-0">
                      <input type="checkbox" class="form-check-input m-0 align-middle" aria-label="Select task" checked >
                    </td>
                    <td class="w-100">
                      <a href="#" class="text-reset">Extend the data model.</a>
                    </td>
                    <td class="text-nowrap text-secondary">
                      <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M11 15h1" /><path d="M12 15v3" /></svg>
                      August 04, 2021
                    </td>
                    <td class="text-nowrap">
                      <a href="#" class="text-secondary">
                        <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                        2/7
                      </a>
                    </td>
                    <td class="text-nowrap">
                      <a href="#" class="text-secondary">
                        <!-- Download SVG icon from http://tabler-icons.io/i/message -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9h8" /><path d="M8 13h6" /><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" /></svg>
                        3</a>
                    </td>
                    <td>
                      <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-1 pe-0">
                      <input type="checkbox" class="form-check-input m-0 align-middle" aria-label="Select task" >
                    </td>
                    <td class="w-100">
                      <a href="#" class="text-reset">Verify the event flow.</a>
                    </td>
                    <td class="text-nowrap text-secondary">
                      <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M11 15h1" /><path d="M12 15v3" /></svg>
                      January 03, 2019
                    </td>
                    <td class="text-nowrap">
                      <a href="#" class="text-secondary">
                        <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                        3/10
                      </a>
                    </td>
                    <td class="text-nowrap">
                      <a href="#" class="text-secondary">
                        <!-- Download SVG icon from http://tabler-icons.io/i/message -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9h8" /><path d="M8 13h6" /><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" /></svg>
                        6</a>
                    </td>
                    <td>
                      <span class="avatar avatar-sm">JL</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-1 pe-0">
                      <input type="checkbox" class="form-check-input m-0 align-middle" aria-label="Select task" >
                    </td>
                    <td class="w-100">
                      <a href="#" class="text-reset">Database backup and maintenance</a>
                    </td>
                    <td class="text-nowrap text-secondary">
                      <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M11 15h1" /><path d="M12 15v3" /></svg>
                      December 28, 2018
                    </td>
                    <td class="text-nowrap">
                      <a href="#" class="text-secondary">
                        <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                        0/6
                      </a>
                    </td>
                    <td class="text-nowrap">
                      <a href="#" class="text-secondary">
                        <!-- Download SVG icon from http://tabler-icons.io/i/message -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9h8" /><path d="M8 13h6" /><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" /></svg>
                        1</a>
                    </td>
                    <td>
                      <span class="avatar avatar-sm" style="background-image: url(./static/avatars/002m.jpg)"></span>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-1 pe-0">
                      <input type="checkbox" class="form-check-input m-0 align-middle" aria-label="Select task" checked >
                    </td>
                    <td class="w-100">
                      <a href="#" class="text-reset">Identify the implementation team.</a>
                    </td>
                    <td class="text-nowrap text-secondary">
                      <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M11 15h1" /><path d="M12 15v3" /></svg>
                      November 07, 2020
                    </td>
                    <td class="text-nowrap">
                      <a href="#" class="text-secondary">
                        <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                        6/10
                      </a>
                    </td>
                    <td class="text-nowrap">
                      <a href="#" class="text-secondary">
                        <!-- Download SVG icon from http://tabler-icons.io/i/message -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9h8" /><path d="M8 13h6" /><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" /></svg>
                        12</a>
                    </td>
                    <td>
                      <span class="avatar avatar-sm" style="background-image: url(./static/avatars/003m.jpg)"></span>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-1 pe-0">
                      <input type="checkbox" class="form-check-input m-0 align-middle" aria-label="Select task" >
                    </td>
                    <td class="w-100">
                      <a href="#" class="text-reset">Define users and workflow</a>
                    </td>
                    <td class="text-nowrap text-secondary">
                      <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M11 15h1" /><path d="M12 15v3" /></svg>
                      November 23, 2021
                    </td>
                    <td class="text-nowrap">
                      <a href="#" class="text-secondary">
                        <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                        3/7
                      </a>
                    </td>
                    <td class="text-nowrap">
                      <a href="#" class="text-secondary">
                        <!-- Download SVG icon from http://tabler-icons.io/i/message -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9h8" /><path d="M8 13h6" /><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" /></svg>
                        5</a>
                    </td>
                    <td>
                      <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000f.jpg)"></span>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-1 pe-0">
                      <input type="checkbox" class="form-check-input m-0 align-middle" aria-label="Select task" checked >
                    </td>
                    <td class="w-100">
                      <a href="#" class="text-reset">Check Pull Requests</a>
                    </td>
                    <td class="text-nowrap text-secondary">
                      <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M11 15h1" /><path d="M12 15v3" /></svg>
                      January 14, 2021
                    </td>
                    <td class="text-nowrap">
                      <a href="#" class="text-secondary">
                        <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                        2/9
                      </a>
                    </td>
                    <td class="text-nowrap">
                      <a href="#" class="text-secondary">
                        <!-- Download SVG icon from http://tabler-icons.io/i/message -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9h8" /><path d="M8 13h6" /><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" /></svg>
                        3</a>
                    </td>
                    <td>
                      <span class="avatar avatar-sm" style="background-image: url(./static/avatars/001f.jpg)"></span>
                    </td>
                  </tr>
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

 @include('dashboard.layouts.report')

@endsection
