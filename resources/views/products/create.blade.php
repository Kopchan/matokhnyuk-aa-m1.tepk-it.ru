{{-- Представление для отображения формы создания нового продукта --}}
@extends('layout')
@section('title', "Создание продукта")
@section('back', route('products.index'))
@section('content')
    <form class="product column gap6 block"
          action="{{ route('products.store') }}"
          method="post"
          enctype="application/x-www-form-urlencoded">
        @csrf {{-- Cкрытое поле для потдверждения что форма была с нашей страницы --}}

        {{-- Поля формы --}}
        <x-form.input  name="name"            label="Название"/>
        <x-form.select name="product_type_id" label="Тип" :options="$types"/>
        <x-form.input  name="article"         label="Артикул"/>
        <x-form.input  name="minPrice"        label="Минимальная стоимость для партнёра (р)"
                       type="number" min="0" step="0.01" default="0"/>
        <x-form.input  name="width"           label="Ширина рулона (м)"
                       type="number" min="0" step="0.01" default="0"/>

        {{-- Кнопка отправки формы --}}
        <button type="submit" class="btn">Сохранить</button>
    </form>
@endsection
