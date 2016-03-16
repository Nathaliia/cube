<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>
        @section('title')
        Cube Summation
        @show
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    {{-- Style page --}}
    <link rel="stylesheet" href="{{ asset('assets/css/layout.css') }}">

    @yield('head-style')

    @yield('head-script')
</head>

<body>

    {{-- content --}}
    @yield('content')

    {{-- tags script --}}
    <script src="{{ asset('assets/js/jquery-1.12.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
