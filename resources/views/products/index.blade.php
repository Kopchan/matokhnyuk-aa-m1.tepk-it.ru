{{-- Представление для отображения списка продукции --}}
@extends('layout')
@section('title', 'Продукты')
@section('back', route('home'))
@section('buttons')
    <a class="btn" href="{{ route('products.create') }}">Создать</a>
@endsection
@section('content')
    <div class="products column gap12">
        @foreach($products as $product)
            <div class="column gap6">
                {{-- Карточка с краткой информацией о продукте --}}
                <a class="card" href="{{ route('products.show', $product) }}">
                    <div class="top between">
                        {{-- Вывод типа и названия продукта --}}
                        <h3>
                            <span>{{ $product->type?->name }}</span>
                            <span> | </span>
                            <span>{{ $product->name }}</span>
                        </h3>

                        {{-- Вывод рассчитаной себестоимости продукта --}}
                        <p class="r min-w100"><b>{{ number_format($product->cost, 2, ',', ' ') }} (р)</b></p>
                    </div>
                    <p>Артикул: <b>{{ $product->article }}</b></p>
                    <p>Минимальная стоимость для партнёра: <b>{{ number_format($product->minPrice, 2, ',', ' ') }} (р)</b></p>
                    <p>Ширина: <b>{{ number_format($product->width, 2, ',', ' ') }} (м)</b></p>
                </a>

                {{-- Ссылки доп-действий над продуктом --}}
                <div class="actions between">
                    <a class="link" href="{{ route('products.show', [$product, '#info'  ]) }}">Дополнительная информация</a>
                    <a class="link" href="{{ route('products.show', [$product, '#recipe']) }}">Используемые материалы</a>
                    <a class="link" href="{{ route('products.edit', $product) }}">Редактировать</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
