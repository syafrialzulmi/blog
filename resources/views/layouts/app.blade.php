<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Lembayung' }}</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
</head>
<body>
    @include('layouts.navigation')
    <div class="py-4">
        @yield('content')
    </div>    
</body>
</html>