@extends('booking-sdk::layouts.base')

@section('title', "Ошибка")

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('index') }}">Бронирования</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ошибка</li>
@endsection