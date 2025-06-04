<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>@yield('title', 'Employee Form')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 p-6 font-sans text-gray-800">
    <div class="max-w-4xl mx-auto">
         @yield('content') {{--this is where HTML goes --}}
    </div>
    @vite('resources/js/app.js')
    @yield('scripts') {{--JS better place last in the body section--}}
</body>
</html>
