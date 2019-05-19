<!DOCTYPE HTML>
<head>
    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="{{ asset('assets/images/icons/favicon.png')}}" type="image/png">
    <link href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('assets/css/style1.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="main_wrapper">
<div class="container">
    <div class="row">
        <div class="col-12">
            @yield('header')
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @yield('content')
        </div>    
    </div>
</div>
    @yield('footer')
</div>
<script src="{{ asset('assets/js/cart_items.js') }}"></script>
@yield('script')
</body>
</html>

