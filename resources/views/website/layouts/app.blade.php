<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>ECO Edition</title>

    @include('website.partial.css')

  </head>

<body>
@include('website.partial.header')

 @yield('content')
 
 @include('website.partial.footer')

  @include('website.partial.js')

</body>
</html>