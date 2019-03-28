<!DOCTYPE HTML>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <script type="text/javascript" src="{{asset('assets/js/jquery-1.7.2.min.js')}}"></script> 
    <script type="text/javascript" src="{{asset('assets/js/move-top.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/easing.js')}}"></script>
    <script src="{{asset('assets/js/easyResponsiveTabs.js')}}" type="text/javascript"></script>
    <link href="{{asset('assets/css/easy-responsive-tabs.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" href="{{asset('assets/css/global.css')}}">
    <script src="{{asset('assets/js/slides.min.jquery.js')}}"></script>
    <script>
        $(function(){
            $('#products').slides({
                preload: true,
                preloadImage: 'img/loading.gif',
                effect: 'slide, fade',
                crossfade: true,
                slideSpeed: 350,
                fadeSpeed: 500,
                generateNextPrev: true,
                generatePagination: false
            });
        });
    </script>
</head>
<body>
<div class="wrap">
@yield('header')
<div class="main">
    <div class="content">
        <div class="section group">
            <div class="cont-desc span_1_of_2">
                @yield('content')
            </div>
            <div class="rightsidebar span_3_of_1">
                @yield('menu')
            </div>
        </div>
    </div>
</div>
</div>
@yield('footer')
<script type="text/javascript">
    $(document).ready(function() {          
        $().UItoTop({ easingType: 'easeOutQuart' });
    });
</script>
<a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>