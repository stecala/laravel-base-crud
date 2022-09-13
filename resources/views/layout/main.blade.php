<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <title>Comics | @yield('title')</title>
</head>
<body>
    @include('include.header')
    @yield('main_content')
    @include('include.footer')
</body>
</html>