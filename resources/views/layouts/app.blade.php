<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            background: red;
        }
    </style>
</head>
<body>
    @include('layouts.navigation')
    @yield('content')
</body>
</html>