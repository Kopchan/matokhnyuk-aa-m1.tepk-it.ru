@extends('layout')
@section('title', 'Партнёры')
@section('back', route('home'))
@section('buttons')
    <a class="btn" href="{{ route('partners.create') }}">Создать</a>
@endsection
@section('content')
    <div class="partners list">
        @foreach($partners as $partner)
            <a class="border" href="{{ route('partners.show', $partner->id) }}">
                <div class="top between">
                    <h3>
                        <span>{{$partner->type->name}}</span>
                        <span> | </span>
                        <span>{{$partner->name}}</span>
                    </h3>
                    <p class="discount">{{$partner->discount}}%</p>
                </div>
                <p>{{$partner->ceo}}</p>
                <p>+7 {{$partner->phone}}</p>
                <p>Рейтинг: {{$partner->rating}}</p>
            </a>
        @endforeach
    </div>
@endsection
