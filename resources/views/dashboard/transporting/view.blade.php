@extends('dashboard.layout')

@section('content')
<h2 class="page-header">{{ $transporting->name }}</h2>

<div class="row">
    <div class="col-md-8">
        <form class="form-horizontal">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Название</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Пункт назначения</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="inputPassword3"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Сохранить</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-4">
        <table class="table">
            <tbody>
            @foreach($transporting->goods as $good)
                <tr>
                    <td><a href="{{ route('dashboard.good.view', $good->id) }}">{{ $good->name }}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection