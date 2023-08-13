<!doctype html>
<html lang="en">

<head>
    @include('dashboard.layouts.head')
    <style>
    body {
        background-image: url('./img/background.png');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
    }

    .transparent-bg {
        background-color: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(1px);
    }
    </style>
</head>

<body>
    <script src="{{ asset('dashboard/assets/js/demo-theme.min.js?1685973381') }}"></script>
    <div class="page page-center ">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark">
                </a>
            </div>
            <div class="card card-md transparent-bg">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Login As</h2>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">
                            <a href="{{ route('login',['userType' => 'employee']) }}"
                                class="btn btn-primary w-100">Employee</a></button>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100"><a
                                href="{{ route('login',['userType' => 'admin']) }}"
                                class="btn btn-primary w-100">Admin</a></button>
                    </div>
                    </form>
                </div>

            </div>
</body>

</html>