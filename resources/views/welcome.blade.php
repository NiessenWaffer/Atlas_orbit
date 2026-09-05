<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ATLAS & ORBIT</title>
    @php
        $basePath = str_replace('/public/index.php', '', request()->server('SCRIPT_NAME', ''));
        $basePath = $basePath === '/index.php' ? '' : $basePath;
    @endphp
    <link rel="stylesheet" href="{{ $basePath . mix('css/app.css') }}">
</head>
<body>
    <div id="app">
        <router-view></router-view>
    </div>

    <script>
        window.appBasePath = '{{ $basePath }}';
    </script>
    <script src="{{ $basePath . mix('js/app.js') }}" defer></script>
</body>
</html>
