<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ trans('custom.title.'.Route::getCurrentRoute()->getName()) }} | LAM CAR</title>
    <link rel="icon" href="images/icon.png" type="image/x-icon">
    <link href="{{ getenv('APP_URL') }}/css/hireapp.css" rel="stylesheet" type="text/css">
    <link href="{{ getenv('APP_URL') }}/css/jquery.bxslider.css" rel="stylesheet" type="text/css">
    <script src="{{ getenv('APP_URL') }}/js/jquery.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/js/jquery.bxslider.js"></script>
    <script>
    $(document).ready(function(){
        $(".toggle-arrow").click(function() {
            if ( $("#menulist").height() != 77) {
                $("#menulist").animate({ height: 77 }, 500 );
                $(".toggle-arrow").html("&#9650;");
            }
            else {
                $("#menulist").animate({ height: 18 }, 500 );
                $(".toggle-arrow").html("&#9660;");
            }
        });
    });
    </script>
</head>
<body>
    <div id="menulist">
        {{ trans('custom.title.'.Route::getCurrentRoute()->getName()) }}<span class="toggle-arrow">&#9660;</span>
        <ul class="menulist">
            <li><a href="/howto"><p>{{ trans('custom.title.howto') }}</p></a></li>
            <li><a href="/privacy-policy"><p>{{ trans('custom.title.privacy-policy') }}</p></a></li>
        </ul>
    </div>
    @yield('content')
</body>
</html>
