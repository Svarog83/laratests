<!doctype html>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">

</head>
<body>
@include('layouts.partials.nav')
  <div class="container">
        @include('flash::message')
  
        @yield('content')
  </div>
   <script src="https://code.jquery.com/jquery.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
   <script>$('#flash-overlay-modal').modal();</script>
</body>
</html>
