<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('logo-square.ico') }}" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href="{{ asset('theme/admin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/admin/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/admin/assets/css/users/login-1.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" href="{{ asset('theme/admin/plugins/font-icons/fontawesome/css/regular.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/admin/plugins/font-icons/fontawesome/css/solid.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/admin/plugins/font-icons/fontawesome/css/brands.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/admin/plugins/font-icons/fontawesome/css/fontawesome.css') }}">

     <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@600;900&display=swap" rel="stylesheet">
    <!-- font -->

    <style>
        
        .fThai{
            font-family: 'Noto Sans Thai', sans-serif;
           
        }
    </style>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-154883467-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-154883467-1');
    </script>

    @yield('head')
</head>

<body class="login">
    @if($errors->any())
        <div class="alert alert-danger fixed-top text-center" role="alert">
            {{ $errors->first() }}
        </div>
    @endif
    @yield('content')


    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('theme/shop/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('theme/shop/assets/js/loader.js') }}"></script>
    <script src="{{ asset('theme/shop/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('theme/shop/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    @yield('script')
</body>

</html>
