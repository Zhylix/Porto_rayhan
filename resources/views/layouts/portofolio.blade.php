<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portfolio</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body class="bg-black text-white">

    {{ $slot ?? '' }}
    @yield('content')

    @stack('scripts')

</body>
</html>
