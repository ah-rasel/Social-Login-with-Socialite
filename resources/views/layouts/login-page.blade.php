<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>Login - Task App from Pioneer Alpha</title>
    @livewireStyles
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="bg-gray-100 font-roboto">
    @yield('contents')
    @livewireScripts
</body>

</html>
