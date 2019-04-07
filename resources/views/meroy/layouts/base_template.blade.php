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
<div class="main-wrapper"> 
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
</script>
</body>
</html>

