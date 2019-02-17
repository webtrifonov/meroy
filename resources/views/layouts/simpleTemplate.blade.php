<!DOCTYPE HTML>
<head>
<title>{{ config('app.name', 'Laravel') }} | @yield('title') </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="{{ asset('assets/css/slider.css')}}" rel="stylesheet" type="text/css" media="all"/>
<link href="{{ asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
<link href="{{ asset('assets/css/flexslider.css')}}" rel="stylesheet" type="text/css" media="all"/>

<script src="{{ asset('assets/js/jquery-1.7.2.min.js')}}"></script> 
<script src="{{ asset('assets/js/move-top.js')}}"></script>
<script src="{{ asset('assets/js/easing.js')}}"></script>
<script src="{{ asset('assets/js/startstop-slider.js')}}"></script>
<script src="{{ asset('assets/js/jquery.flexslider-min.js') }}"></script>
<script>
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide"
  });
});
</script>
</head>
<body>
<div class="wrap">
	@yield('header')
 	<div class="main">
		<div class="content">
			@yield('content')
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

