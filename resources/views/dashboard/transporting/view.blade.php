@extends('dashboard.layout')

@section('content')
    <h2 class="page-header">{{ $transporting->id ? $transporting->name : 'Создание транспортировки' }}</h2>

    <div class="row">
        <div class="col-md-8">
            {!! Form::model($transporting, [
                'route' => $transporting->id ? ['dashboard.transporting.update', $transporting->id] : ['dashboard.transporting.store'],
                'class' => 'form-horizontal'
            ]) !!}
            <div class="form-group {{ $errors->has('destination') ? 'has-error' : '' }}">
                {!! Form::label('name', 'Наименование', ['class' => 'col-sm-2 control-label'])  !!}
                <div class="col-sm-10">
                    {!! Form::text('name', null, ['class' => 'form-control'])  !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('destination') ? 'has-error' : '' }}">
                {!! Form::label('destination', 'Пункт назначения', ['class' => 'col-sm-2 control-label'])  !!}
                <div class="col-sm-10">
                    {!! Form::textarea('destination', null, ['class' => 'form-control'])  !!}
                    {!! $errors->first('destination', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Сохранить</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>

        <div class="col-md-4">
            <table class="table">
                <tbody>
                @foreach($transporting->goods as $good)
                    <tr>
                        <td><a href="{{ route('dashboard.good.view', [$transporting->id, $good->id]) }}">{{ $good->name }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection