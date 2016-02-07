@extends('dashboard.layout')

@section('breadcrumbs', Breadcrumbs::render('goods', $transporting))

@section('content')
<h3 class="page-header">Товары транспортировки: <i> {{ $transporting->name }}</i></h3>

<a class="btn btn-primary pull-right" href="{{ route('dashboard.good.create',  $transporting->id) }}"><i class="glyphicon glyphicon-plus"></i> Добавить товар</a>


<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Имя</th>
        <th></th>
    </tr>
    </thead>
    <tbody>

    @foreach($goods as $good)
        <tr>
            <td style="width: 1%;">{{ $good->id }}</td>
            <td><a href="{{ route('dashboard.good.view', [$transporting->id, $good->id]) }}">{{ $good->name }}</a></td>
            <td style="width: 1%;">
                <a href="{{ route('dashboard.good.delete', [$transporting->id, $good->id]) }}"><i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
@endsection