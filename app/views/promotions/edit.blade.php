@extends('layouts.modal')

@section('title')
Detalle promoción
@stop

@section('content')
<div class="clearfix">
    <div class="col-md-12 column">
        <h3>
            Detalle promoción
            <br/>
            <br/>
        </h3>
        <div class="row">
            {{ Form::open(array('url' => 'promotions/'.$promotion->id, 'method' => 'PUT')) }}
            <div class="form-group">
                {{ Form::label('name', Lang::get('messages.name'), array('class' => 'awesome')) }}
                {{ Form::text('name', $promotion->name, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('description', Lang::get('messages.description'), array('class' => 'awesome')) }}
                {{ Form::textarea('description', $promotion->description, ['class' => 'form-control']) }}
            </div>
            {{ Form::submit('Save', ['class' => 'btn btn-primary btn-sm pull-right']) }}
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop