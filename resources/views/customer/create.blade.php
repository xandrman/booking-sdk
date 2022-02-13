@extends('booking-sdk::layouts.base')

@section('title', "Создать клиента")

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('index') }}">Бронирования</a></li>
    <li class="breadcrumb-item"><a href="{{ route('customer.index') }}">Клиенты</a></li>
    <li class="breadcrumb-item active" aria-current="page">Создать клиента</li>
@endsection

@section('content')
    <form action="{{ route('customer.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email"
                   placeholder="name@example.com" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" id="name" name="name"
                   placeholder="Имя клиента" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Создать</button>
        </div>
    </form>
@endsection