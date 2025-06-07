@extends('layout')
@section('title', "Партнёр \"$partner->name\"")
@section('back', route('partners.index'))
@section('buttons')
    <a class="btn" href="{{ route('partners.edit', $partner) }}">Изменить</a>
@endsection
@section('content')
    <div class="partner column gap6 block">
        <h3 class="bottom12">Общая информация</h3>
        <div class="flex gap12">
            <div class="label-group">
                <label>Тип</label>
                <p>{{ $partner->type->name }}</p>
            </div>
            <div class="label-group">
                <label>Название</label>
                <p>{{ $partner->name }}</p>
            </div>
        </div>
        <div class="label-group">
            <label>ФИО директора</label>
            <p>{{ $partner->ceo }}</p>
        </div>
        <div class="label-group">
            <label>Контактный номер телефона</label>
            <p>+7 {{ $partner->phone }}</p>
        </div>
        <div class="label-group">
            <label>Контактная электронная почта</label>
            <p>{{ $partner->email }}</p>
        </div>
        <div class="label-group">
            <label>Юридический адрес</label>
            <p>{{ $partner->address }}</p>
        </div>
        <div class="label-group">
            <label>ИНН</label>
            <p>{{ $partner->inn }}</p>
        </div>
        <div class="label-group">
            <label>Рейтинг</label>
            <p>
                <span class="rating">{{ $partner->rating }}</span>
                / 10
            </p>
        </div>
    </div>
    <div class="block">
        <h3 class="bottom12">История реализации</h3>
        @if (count($partner->sales))
            <table>
                <tr>
                    <th>ИД</th>
                    <th>Продукт</th>
                    <th>Кол-во</th>
                    <th>Дата</th>
                </tr>
                @foreach($partner->sales as $sale)
                    <tr>
                        <td>#{{ str_pad($sale->id, 3, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $sale->product->name }}</td>
                        <td>{{ $sale->quantity }}</td>
                        <td>{{ date_format(new DateTime($sale->date), 'd.m.Y') }}</td>
                    </tr>
                @endforeach
            </table>
        @else
            <p>С этим партнёром ещё не было реализовано продукции</p>
        @endif
    </div>
@endsection
