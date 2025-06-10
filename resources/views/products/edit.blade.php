{{-- Представление для отображения формы редактирования конкретного продукта --}}
@extends('layout')
@section('title', "Изменение продукта \"$product->name\"")
@section('back', route('products.show', $product))
@section('content')
    <form class="product column gap12 block"
          action="{{ route('products.update', $product) }}"
          method="post"
          enctype="application/x-www-form-urlencoded">
        @csrf {{-- Cкрытое поле для потдверждения что форма была с нашей страницы --}}
        @method('PATCH') {{-- Формами не поддерживается метод PATCH, поэтому передаём в виде скрытого поля --}}

        {{-- Поля формы с привязкой (object) к текущему открытому продукту (product) для отображения старых данных --}}
        <x-form.input  required :object="$product" name="name"            label="Название"/>
        <x-form.select required :object="$product" name="product_type_id" label="Тип" :options="$types"/>
        <x-form.input  required :object="$product" name="article"         label="Артикул"/>
        <x-form.input  required :object="$product" name="minPrice"        label="Минимальная стоимость для партнёра (р)"
                       type="number" min="0" step="0.01"/>
        <x-form.input  required :object="$product" name="width"           label="Ширина рулона (м)"
                       type="number" min="0" step="0.01"/>

        {{-- Кнопка отправки формы --}}
        <button type="submit" class="btn">Сохранить</button>
    </form>
@endsection
