@extends('layout')
@section('title', "Создание партнёра")
@section('back', route('partners.index'))
@section('content')
    <form class="partner column gap6 block"
          action="{{ route('partners.store') }}"
          method="post"
          enctype="application/x-www-form-urlencoded">
        @csrf
        <div class="flex gap12">
            <div class="label-group">
                <label>Тип</label>
                <select name="type_id">
                    @foreach($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                @error('type_id') <p class="error">{{ $message }}</p> @enderror
            </div>
            <div class="label-group">
                <label>Название</label>
                <input name="name">
                @error('name') <p class="error">{{ $message }}</p> @enderror
            </div>
        </div>
        <div class="label-group">
            <label>ФИО директора</label>
            <input name="ceo">
            @error('ceo') <p class="error">{{ $message }}</p> @enderror
        </div>
        <div class="label-group">
            <label>Контактный номер телефона</label>
            <div class="flex gap6">
                <p>+7</p>
                <input name="phone">
            </div>
            @error('phone') <p class="error">{{ $message }}</p> @enderror
        </div>
        <div class="label-group">
            <label>Контактная электронная почта</label>
            <input name="email">
            @error('email') <p class="error">{{ $message }}</p> @enderror
        </div>
        <div class="label-group">
            <label>Юридический адрес</label>
            <input name="address">
            @error('address') <p class="error">{{ $message }}</p> @enderror
        </div>
        <div class="label-group">
            <label>ИНН</label>
            <input name="inn">
            @error('inn') <p class="error">{{ $message }}</p> @enderror
        </div>
        <div class="label-group">
            <label>Рейтинг</label>
            <div class="flex gap6">
                <input name="rating">
                <p>/ 10</p>
            </div>
            @error('rating') <p class="error">{{ $message }}</p> @enderror
        </div>
        <button type="submit" class="btn">Сохранить</button>
    </form>
@endsection
