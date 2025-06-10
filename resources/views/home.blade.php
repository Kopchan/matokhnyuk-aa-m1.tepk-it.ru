@php use App\Models\Product; @endphp
@extends('layout')
@section('content')
    <div class="column gap12">
        <a class="card" href="{{ route('products.index') }}">
            <h3>Продукты ({{ Product::count() }})</h3>
            <p>Просмотреть все</p>
        </a>
    </div>
@endsection
