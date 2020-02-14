<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Senicub</title>
    <link rel="icon" type="image/png" href="../img/logo-senincub.png" />

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
    body{
    background-color: #27245f;
    color: white;

    }
    /* .container{
    background: #c2c72f;
    padding: 4%;
    border-top-left-radius: 0.5rem;
    border-bottom-left-radius: 0.5rem;
    } */
    .btna{
      background: #c2c72f;
      color: white;
    }

    

    </style>
  </head>
  <body>
    <div class="container">
      <br><br><br>
      @yield('content')
    </div>
  </body>
</html>