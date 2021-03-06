@extends('booking-sdk::layouts.base')

@section('title', "Клиенты")

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('index') }}">Бронирования</a></li>
    <li class="breadcrumb-item active" aria-current="page">Клиенты</li>
@endsection

@section('buttons')
    <a href="{{ route('customer.create') }}" class="btn btn-primary">Создать клиента</a>
@endsection

@section('content')
    <div class="mb-2">Выберите клиента и нажмите на кнопку Создать бронирование</div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Имя</th>
                <th scope="col">E-mail</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)
                <tr>
                    <th scope="row">{{ $customer['id'] }}</th>
                    <td>{{ $customer['name'] }}</td>
                    <td>{{ $customer['email'] }}</td>
                    <td class="text-right">
                        <a href="{{ route('create', ['customer_id' => $customer['id']]) }}"
                           class="btn btn-sm btn-success">Создать бронирование</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection