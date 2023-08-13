<!doctype html>
<html lang="en">
@include('dashboard.layouts.head')
<body>
    <script src="{{ asset('dashboard/assets/js/demo-theme.min.js?1685973381') }}"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"></a>
            </div>
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Login to your account</h2>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="name"
                                autocomplete="off">
                        </div>
                        <div class=<div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="name@example.com"
                                autocomplete="off">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">
                                Password
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control" name="password" placeholder="Your password"
                                    autocomplete="off">

                            </div>
                        </div>

                        <div class="mb-2">
                            <label class="form-label">
                                Confirm Password
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control" name="password_confirmation"
                                    placeholder="Confirm password" autocomplete="off">

                            </div>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Sign in</button>
                        </div>
                    </form>
                </div>


            </div>

        </div>
</body>

</html>