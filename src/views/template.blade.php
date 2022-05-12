<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Genre</title>
    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    {{-- Jquery --}}
{{--    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>--}}
{{--    <script src="js/genre.js"></script>--}}

</head>
<body>
@yield('content')
@yield('js')
</body>
</html>
