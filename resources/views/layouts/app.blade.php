<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>StayBuddy</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/profile.js') }}"defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="">
    @yield('content')
</body>

</html>
