@extends('layout')

@section('content')
    <h3>{{ $transporting->name }}</h3>

    <p>{{ $transporting->destination }}</p>

    <h4>Goods</h4>

    <ul>
        @foreach ($transporting->goods as $good)
            <li>{{ $good->name }} <small>{{ $good->weight }}kg</small></li>
        @endforeach
    </ul>
@endsection

@section('title')
    {{ $transporting->name }}
@endsection