<!doctype html>

<html lang="en">
   @include('dashboard.layouts.head')

   <body >
    <script src="{{ asset('dashboard/assets/js/demo-theme.min.js?1685973381') }}"></script>
    <div class="page">
      <!-- Sidebar -->
       @include('dashboard.layouts.sidebar')


       @yield('content')





    @include('dashboard.layouts.scripts')

  </body>
</html>
