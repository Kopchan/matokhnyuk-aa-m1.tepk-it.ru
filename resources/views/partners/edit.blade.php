@extends('layout')
@section('title', "Изменение партнёра \"$partner->name\"")
@section('back', route('partners.show', $partner))
@section('content')
    <form class="partner column gap6 block"
          action="{{ route('partners.update', $partner) }}"
          method="post"
          enctype="application/x-www-form-urlencoded">
        @csrf
        @method('PATCH')
        <div class="flex gap12">
            <div class="label-group">
                <label>Тип</label>
                <select name="type_id">
                    @foreach($types as $type)
                        <option
                            value="{{ $type->id }}"
                            @if($type->id === $partner->type_id)
                            selected
                            @endif
                        >
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
                @error('type_id') <p class="error">{{ $message }}</p> @enderror
            </div>
            <div class="label-group">
                <label>Название</label>
                <input name="name" value="{{ $partner->name }}">
                @error('name') <p class="error">{{ $message }}</p> @enderror
            </div>
        </div>
        <div class="label-group">
            <label>ФИО директора</label>
            <input name="ceo" value="{{ $partner->ceo }}">
            @error('ceo') <p class="error">{{ $message }}</p> @enderror
        </div>
        <div class="label-group">
            <label>Контактный номер телефона</label>
            <div class="flex gap6">
                <p>+7</p>
                <input name="phone" value="{{ $partner->phone }}">
            </div>
            @error('phone') <p class="error">{{ $message }}</p> @enderror
        </div>
        <div class="label-group">
            <label>Контактная электронная почта</label>
            <input name="email" value="{{ $partner->email }}">
            @error('email') <p class="error">{{ $message }}</p> @enderror
        </div>
        <div class="label-group">
            <label>Юридический адрес</label>
            <input name="address" value="{{ $partner->address }}">
            @error('address') <p class="error">{{ $message }}</p> @enderror
        </div>
        <div class="label-group">
            <label>ИНН</label>
            <input name="inn" value="{{ $partner->inn }}">
            @error('inn') <p class="error">{{ $message }}</p> @enderror
        </div>
        <div class="label-group">
            <label>Рейтинг</label>
            <div class="flex gap6">
                <input name="rating" value="{{ $partner->rating }}">
                <p>/ 10</p>
            </div>
            @error('rating') <p class="error">{{ $message }}</p> @enderror
        </div>
        <button type="submit" class="btn">Сохранить</button>
    </form>
@endsection
