@extends('booking-sdk::layouts.base')

@section('title', "Создать бронирование")

@section('navbar')
    <nav aria-label="breadcrumb" class="">
        <ol class="breadcrumb m-0 bg-dark">
            <li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-white">Бронирования</a></li>
            <li class="breadcrumb-item"><a href="{{ route('customer.index') }}" class="text-white">Клиенты</a></li>
            <li class="breadcrumb-item active text-white" aria-current="page">
                <span class="text-white">Создать бронирование</span>
            </li>
        </ol>
    </nav>
@endsection

@section('content')
    <form action="{{ route('store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="customer_id">id клиента</label>
            <input type="number" class="form-control" name="customer_id" id="customer_id"
                   readonly value="{{ $customer_id }}">
        </div>
        <div class="form-group">
            <label for="from">Начало (укажите минуты 00)</label>
            <input type="datetime-local" class="form-control" id="from" name="from" value="{{ old('from') }}">
        </div>
        <div class="form-group">
            <label for="to">Конец (укажите минуты 00)</label>
            <input type="datetime-local" class="form-control" id="to" name="to" value="{{ old('to') }}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Создать</button>
        </div>
    </form>
@endsection