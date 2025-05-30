<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Employee Form')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 p-6 font-sans text-gray-800">
    <div class="max-w-4xl mx-auto">
        @yield('content')
    </div>
</body>
</html>
