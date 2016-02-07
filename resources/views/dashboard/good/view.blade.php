@extends('dashboard.layout')

@section('breadcrumbs', $good->id ? Breadcrumbs::render('good_item', $transporting, $good) : Breadcrumbs::render('good_create', $transporting))

@section('content')
<h3 class="page-header">Изменение товара:  <i>{{ $good->name }}</i></h3>


<div class="row">
    <div class="col-md-8">
        {!! Form::model($good, [
            'route' => $good->id ? ['dashboard.good.update', $transporting->id, $good->id] : ['dashboard.good.store', $transporting->id],
            'class' => 'form-horizontal'
        ]) !!}
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            {!! Form::label('name', 'Наименование', ['class' => 'col-sm-2 control-label'])  !!}
            <div class="col-sm-10">
                {!! Form::text('name', null, ['class' => 'form-control'])  !!}
                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('weight') ? 'has-error' : '' }}">
            {!! Form::label('weight', 'Вес', ['class' => 'col-sm-2 control-label'])  !!}
            <div class="col-sm-10">
                {!! Form::textarea('weight', null, ['class' => 'form-control'])  !!}
                {!! $errors->first('weight', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Сохранить</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection