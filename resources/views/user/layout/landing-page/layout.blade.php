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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    @include('user.layout.landing-page.alert')
    @include('user.layout.landing-page.navbar')

    @include('user.layout.landing-page.modal')

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>
        $(document).on('click', '#btn-navbar-mobile', function(){
            let kondisi = $('#navbar-mobile').attr('check')

            if(kondisi == 'close'){
                $('#navbar-mobile').removeClass('hidden')
                $('#navbar-mobile').attr('check', 'open')
            }else if(kondisi == 'open'){
                $('#navbar-mobile').addClass('hidden')
                $('#navbar-mobile').attr('check', 'close')
            }
        })

        $(document).on('click', '#btn-close-navbar-mobile', function(){
            let kondisi = $('#navbar-mobile').attr('check')

            if(kondisi == 'close'){
                $('#navbar-mobile').removeClass('hidden')
                $('#navbar-mobile').attr('check', 'open')
            }else if(kondisi == 'open'){
                $('#navbar-mobile').addClass('hidden')
                $('#navbar-mobile').attr('check', 'close')
            }
        })
    </script>
</body>
</html>