<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@600;900&display=swap" rel="stylesheet">
    <!-- font -->

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href="{{ asset('theme/admin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/admin/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/admin/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/admin/plugins/table/datatable/custom_dt_customer.css') }}">
    <!-- END PAGE LEVEL CUSTOM STYLES -->

    <link rel="stylesheet" href="{{ asset('theme/admin/plugins/font-icons/fontawesome/css/regular.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/admin/plugins/font-icons/fontawesome/css/solid.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/admin/plugins/font-icons/fontawesome/css/brands.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/admin/plugins/font-icons/fontawesome/css/fontawesome.css') }}">

    <!-- custom style -->
    <link href="{{ asset('theme/admin/assets/css/ui-kit/miscellaneous.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/admin/plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/admin/assets/css/ui-kit/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/admin/assets/css/ui-kit/buttons/creative/creative-material.css') }}" rel="stylesheet" type="text/css" />
    
    <style>
        body{
            font-family: 'Noto Sans Thai', sans-serif;
        }

        .f900 {
            font-weight: 900;
        }
        .swal2-icon.swal2-warning{
            font-size: 34px !important;
            line-height: unset !important;
        }
    </style>
    <!-- custom style -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-154883467-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-154883467-1');
    </script>
    @yield('head')
</head>

<body>
    @include('layouts.header')

    @include('layouts.navbar')

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>

        @include('layouts.sidebar')

        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            @yield('content')
        </div>
        <!--  END CONTENT PART  -->

    </div>
    <!-- END MAIN CONTAINER -->

    @include('layouts.footer')


    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('theme/admin/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('theme/admin/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('theme/admin/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/admin/plugins/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('theme/admin/assets/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            App.init();

        });
    </script>
    <script src="{{ asset('theme/admin/assets/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- custom script -->
    <script src="{{ asset('theme/admin/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script>
        function logOut(){
           
            swal({
                title: 'ออกจากระบบ',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ปิด',
                padding: '2em'
            }).then(function(result) {
                if (result.value) {
                   setTimeout(()=>{
                        $('#logout-form').submit()
                   },200)
                }
            })
        }
       
    </script>
    <!-- custom script -->
</body>

</html>