<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyHealth</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets-mazer/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-mazer/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-mazer/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-mazer/css/pages/auth.css') }}">
</head>

<body>
    <div id="auth">
        @if (Session::has('status') && Session::get('status') === "error")
            <div class="alert alert-danger alert-dismissible show fade position-fixed end-0" style="width: 100%;max-width: 500px;">
                {{ Session::get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">Log in with your data.</p>

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" name="username" placeholder="Username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="password" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Log in</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                    <div class="h-100 w-100 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/image/logo/logo2.svg') }}" alt="" style="width: 100%; max-width: 350px">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets-mazer/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-mazer/js/mazer.js') }}"></script>
</body>

</html>
