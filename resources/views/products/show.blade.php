{{-- Представление для отображения конретного продукта --}}
@extends('layout')
@section('title', "Продукт \"$product->name\"")
@section('back', route('products.index'))
@section('buttons')
    <a class="btn" href="{{ route('products.edit', $product) }}">Изменить</a>
@endsection
@section('content')
    {{-- Блок общей информации о открытом продукте --}}
    <div class="info product block column gap12">
        <h3 id="info">Общая информация</h3>
        <x-form.label-group label="Название"      content="{{ $product->name }}"/>
        <x-form.label-group label="Тип"           content="{{ $product->type?->name }}"/>
        <x-form.label-group label="Артикул"       content="{{ $product->article }}"/>
        <x-form.label-group label="Минимальная стоимость для партнёра"
                                                  content="{{ number_format($product->minPrice, 2, ',', ' ') }} (р)"/>
        <x-form.label-group label="Ширина рулона" content="{{ number_format($product->width, 2, ',', ' ') }} (м)"/>
        <x-form.label-group label="Идентификатор" content="#{{ str_pad($product->id, 3, '0', STR_PAD_LEFT) }}"/>
    </div>

    {{-- Блок с таблицей используемых материалов с ценами --}}
    <div class="recipe product block column gap12">
        <h3 id="recipe">Используемые материалы</h3>

        {{-- Только если в связи с используемыми материалами хотя бы один материал -
             - выводится таблица, иначе сообщение что материалов нет --}}
        @if (count($product->materials))
            <table>
                <tr>
                    <th style="min-width:  50px">ИД</th>
                    <th style="min-width: 200px">Название</th>
                    <th style="min-width: 110px">Цена за ед.</th>
                    <th style="min-width: 100px">Кол-во</th>
                    <th style="min-width: 110px">Цена общ.</th>
                </tr>
                @foreach($product->materials as $m)
                    <tr>
                        <td>#{{ str_pad($m?->id, 3, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $m->name }}</td>
                        <td class="r">{{ number_format($m->price, 2, ',', ' ') }} (р)</td>
                        <td class="r">{{ number_format($m->pivot?->quantity, 2, ',', ' ') }} ({{ $m->unit?->name }})</td>
                        <td class="r">{{ number_format($m->price * $m->pivot?->quantity, 2, ',', ' ') }} (р)</td>
                    </tr>
                @endforeach
            </table>

            {{-- Подсчитанная (в контроллере) стоимость продукта по всем используемым материалам --}}
            <p class="r"><b>Итоговая себестоимость:</b> {{ number_format($product->cost, 2, ',', ' ') }} (р)</p>
        @else
            <p>У этого продукта ещё не заданы используемые материалы.</p>
        @endif
    </div>
@endsection
