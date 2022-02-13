@extends('booking-sdk::layouts.base')

@section('title', "Бронирования")

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Бронирования</li>
@endsection

@section('buttons')
    <a href="{{ route('customer.index') }}" class="btn btn-primary">Создать бронирование</a>
@endsection

@section('content')
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Имя клиента</th>
                <th scope="col">E-mail клиента</th>
                <th scope="col">Начало</th>
                <th scope="col">Конец</th>
            </tr>
            </thead>
            <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <th scope="row">{{ $booking['id'] }}</th>
                    <td>{{ $booking['customer']['name'] }}</td>
                    <td>{{ $booking['customer']['email'] }}</td>
                    <td>{{ $booking['from'] }}</td>
                    <td>{{ $booking['to'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection