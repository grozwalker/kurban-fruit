@extends('dashboard.layout')

@section('content')

<h3 class="page-header">Транспортировки</h3>

<a class="btn btn-primary pull-right" href="{{ route('dashboard.transporting.create') }}"><i class="glyphicon glyphicon-plus"></i> Добавить транспортировку</a>

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
            <td style="width: 1%;">
                <a href="{{ route('dashboard.transporting.delete', $transporting->id) }}"><i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
@endsection