<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HireApp</title>   
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ getenv('APP_URL') }}/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ getenv('APP_URL') }}/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ getenv('APP_URL') }}/js/hireapp.js"></script>  
    @yield('js')   

    <!-- Bootstrap -->
    <link href="{{ getenv('APP_URL') }}/css/bootstrap.min.css" rel="stylesheet">
    <!-- HireApp CSS -->
    <link rel="stylesheet" type="text/css" href="{{ getenv('APP_URL') }}/css/hireapp.css">
    @yield('css')   

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>          

    <script>
    $(document).ready(function(){
        $("#payment-btn").click(function(){
            $("#payment-btn").hide();
            $("#pleasewait").show();
            $("#backtoapp").hide();
            $("#backtoapp2").show();
        });
    });
    </script>
    <style>
        body {font-family: 'Lato';}
        .fa-btn {margin-right: 6px;}
    </style>
  </head>
  <body>
    <div class="container">
        @yield('content')
    </div>
    <section>
        <footer>
            <div class="row">Hire App &copy; Copyright</div>
        </footer>
    </section>
  </body>
</html>
