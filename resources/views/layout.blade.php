<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/sass/app.scss','resources/css/app.css'])
</head>
<body>
    @yield('content')
    @vite(['resources/js/app.js'])
</body>
</html>