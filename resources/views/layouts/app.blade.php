<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="refresh" content="60">
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}" type="image/x-icon">
    <title>
        @yield('title')
    </title>
  
    <link rel="stylesheet" href="{{asset('build/assets/app-f95e9dc0.css')}}">
    <script src="{{ asset('build/assets/app-f4463062.js') }}"></script>
</head>
<body class="font-body">
    
    @yield('content')

</body>
</html>