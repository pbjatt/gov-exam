<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{ Html::style('/assets/css/style.css') }}
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <title>Laravel - @yield('title')</title>
</head>
<body class="antialiased">
    @yield('content')
</body>
</html>