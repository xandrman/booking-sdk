@extends('booking-sdk::layouts.base')

@section('title', "Настройки")

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('index') }}">Бронирования</a></li>
    <li class="breadcrumb-item active" aria-current="page">Настройки</li>
@endsection

@section('buttons')
@endsection

@section('content')
    <div class="card mb-3">
        <form action="">
            <div class="card-header">
                Справка
            </div>
            <div class="card-body">
                <div class="font-italic">По умолчнию точка входа читается из файла .env</div>
                <div class="font-italic">Вы можете включить функцию чтения нескольких точек входа из хранилища.</div>
                <div class="font-italic">Для этого добавьте хотя бы одну точку входа в форме ниже.</div>
            </div>
        </form>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            Точки входа из хранилища
        </div>
        <div class="card-body">
            @forelse ($storageUrls as $storageUrl)
                <form action="{{ route('destroyServer') }}" method="post">
                    @csrf
                    @method('delete')
                    <div class="input-group @if(!$loop->last) mb-2 @endif">
                        <input type="text" id="url" name="url" class="form-control" aria-label="" aria-describedby=""
                               value="{{ $storageUrl }}" readonly>
                        <div class="input-group-append">
                            <button class="btn btn-danger" type="submit">Удалить</button>
                        </div>
                    </div>
                </form>
            @empty
                <div class="font-italic">В хранилище не задано ни одной точки входа</div>
            @endforelse
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Добавить в хранилище точку входа
        </div>
        <div class="card-body">
            <form action="{{ route('addServer') }}" method="post">
                @csrf
                @method('post')
                <div class="input-group">
                    <input type="url" id="url" name="url" class="form-control"
                           placeholder="http://127.0.0.1:9001" aria-label="" aria-describedby="">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit">Добавить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection