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

<nav class="navbar navbar-light bg-light shadow-sm py-3">
    <a class="navbar-brand text-right d-none d-md-inline-block" href="{{ route('index') }}">
        <span class="bg-warning text-dark font-weight-bold px-2 py-1 small">booking-sdk</span>
    </a>
    <form class="form-inline" action="{{ route('changeServer') }}" method="post">
        @csrf
        @method('patch')
        <div class="input-group">
            <label class="input-group-prepend" for="url">
                <span class="input-group-text">Сервер:</span>
            </label>
            <select class="custom-select" id="url" name="url" onchange="this.form.submit()">
                @foreach($urls as $url)
                    <option value="{{ $url }}">{{ $url }}</option>
                @endforeach
            </select>
            <div class="input-group-append">
                <a href="{{ route('settings') }}" class="btn btn-secondary d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 1em" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </a>
            </div>
        </div>
    </form>
</nav>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb rounded-0">
        @yield('breadcrumb')
    </ol>
</nav>
@if($errors->any())
    <div class="p-3">
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    </div>
@endif
<div id="buttons" class="p-3">
    @yield('buttons')
</div>
<div id="content" class="p-3">
    @yield('content')
</div>
</body>
</html>