@extends('layout')

@section('content')
<ul style="padding-top: 20px;">
    @foreach ($transportings as $transporting)
    <li><a href="{{ route('transporting.view', $transporting->id) }}">{{ $transporting->name }}</a> <small>{{ $transporting->destination }}</small></li>
    @endforeach
</ul>
@endsection

@section ('title')
    Список поездок
@endsection