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
        <x-form.label-group label="Название"                           content="{{ $product->name }}"/>
        <x-form.label-group label="Тип"                                content="{{ $product->type?->name }}"/>
        <x-form.label-group label="Артикул"                            content="{{ $product->article }}"/>
        <x-form.label-group label="Минимальная стоимость для партнёра" content="{{ number_format($product->minPrice, 2, ',', ' ') }} (р)"/>
        <x-form.label-group label="Ширина рулона"                      content="{{ number_format($product->width, 2, ',', ' ') }} (м)"/>
        <x-form.label-group label="Идентификатор" content="#{{ str_pad($product->id, 3, '0', STR_PAD_LEFT) }}"/>
    </div>
@endsection
