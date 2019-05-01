<!DOCTYPE HTML>
<head>
    <title>{{ config('app.name', 'Laravel') }} | @yield('title') </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('assets/css/flexslider.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('assets/css/style1.css')}}" rel="stylesheet" type="text/css" media="all"/>
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
        <div class="col-12 col-sm-12 col-md-5 col-lg-3">
            @yield('side_menu') 
        </div>
        <div class="col-12 col-sm-12 col-md-7 col-lg-9">
            @yield('slider')
            @yield('content') 
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @yield('new_products')
            @yield('popular_products')
        </div>
    </div>
</div>
    @yield('footer')
</div>  
<script src="{{ asset('assets/js/jquery-1.7.2.min.js')}}"></script> 
<script src="{{ asset('assets/js/jquery.flexslider-min.js') }}"></script>
<script>
$(window).load(function() {
    $('.flexslider').flexslider({
      animation: "slide"
    });
});
</script>
<script src="{{ asset('assets/js/cart_items.js') }}"></script>
{{--<script src="{{ asset('assets/js/cart.js') }}"></script>--}}
</body>
</html>

