<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.css" />
    <script src="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.js"></script>
    <style>
        .link-navbar{
            color: #868984;
        }
    
        .link-navbar-active{
            color: #5CB319;
        }
    </style>
</head>
<body>
    @include('user.layout.landing-page.navbar')

    @include('user.layout.landing-page.modal')

    @yield('content')
</body>
</html>