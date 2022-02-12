<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    @yield('navbar')
    <a class="navbar-brand" href="{{ route('index') }}">
        <span class="bg-warning text-dark font-weight-bold px-2 py-1 small">booking-sdk</span>
    </a>
</nav>
<div id="buttons" class="p-3">
    @yield('buttons')
</div>
<div class="p-3">
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
</div>
<div id="content" class="p-3">
    @yield('content')
</div>
</body>
</html>