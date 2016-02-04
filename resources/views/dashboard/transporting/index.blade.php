@extends('dashboard.layout')

@section('content')

<h3 class="page-header">Транспортировки</h3>

<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Имя</th>
        <th></th>
    </tr>
    </thead>
    <tbody>

    @foreach($transportings as $transporting)
        <tr>
            <td>{{ $transporting->id }}</td>
            <td><a href="{{ route('dashboard.transporting.view', $transporting->id) }}">{{ $transporting->name }}</a></td>
            <td></td>
        </tr>
    @endforeach

    </tbody>
</table>
@endsection