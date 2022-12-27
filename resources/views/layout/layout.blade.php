<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets-mazer/css/bootstrap.css') }}">
    
    <link rel="stylesheet" href="{{ asset('assets-mazer/vendors/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{ asset('assets-mazer/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-mazer/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-mazer/vendors/toastify/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-mazer/vendors/fontawesome/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('css')
    <link rel="stylesheet" href="{{ asset('assets-mazer/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets-mazer/images/favicon.svg') }}" type="image/x-icon">
</head>

<body>
    <div id="app">
        @include('layout.sidebar')
        <div id="main">
            @include('layout.header')
            
            <div class="page-heading">
                @yield('page-heading')
            </div>
            <div class="page-content">
                @yield('page-content')
            </div>

            @include('layout.footer')
        </div>
    </div>
<script src="{{ asset('assets-mazer/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets-mazer/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets-mazer/vendors/toastify/toastify.js') }}"></script>
<script>
    @if(Session::has('status') && Session::get('status') === "success")
        Toastify({
            text: `
            {{ Session::get('message') }}
            `,
            backgroundColor: "#198754",
            close: true,
        }).showToast();
    @endif
    @if(isset($errors) && count($errors) > 0)
        @forelse ($errors->messages() as $index => $values)
                Toastify({
                    text: `
                    {{ $values[0] }}
                    `,
                    backgroundColor: "#dc3545",
                    close: true,
                }).showToast();
        @empty
            
        @endforelse
    @endif
    @if(Session::has('status') && Session::get('status') === "failed")
        Toastify({
            text: `
            {{ Session::get('message') }}
            `,
            backgroundColor: "#dc3545",
            close: true,
        }).showToast();
    @endif
</script>
<script src="{{ asset('assets-mazer/vendors/fontawesome/all.min.js') }}"></script>
@yield('script')
<script src="{{ asset('assets-mazer/js/mazer.js') }}"></script>
</body>

</html>
