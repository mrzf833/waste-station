<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
                theme: {
                    extend: {}
                },
                variants: {
                    opacity: ({ after }) => after(['disabled'])
                },
            }
      </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
    <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
</head>
<body>
    @include('user.layout.dashboard.navbar')
    
    <img src="{{ asset('assets-user/awan-atas.svg') }}" class="img-awan-atas absolute l-0 top-16" alt="">

    @yield('content')

    <div class="pt-32">
        <img src="{{ asset('assets-user/bawah.png') }}" class="w-full" alt="">
        </div>
    </div>
</body>
</html>