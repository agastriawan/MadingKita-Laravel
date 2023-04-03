<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mading Kita</title>

    <link rel="stylesheet" href="{{ asset('css/font-awsome.css') }}">
    <link rel="stylesheet" class="js-color-style" href="{{ asset('css/color/color-1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body class="body">

    @include('nav.navbar')

    <div class="main-wrapper">
        @yield('container')
    </div>

    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
