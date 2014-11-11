@extends('layouts.modal')

@section('head')

<!-- Fuelux -->
<!-- http://exacttarget.github.io/fuelux -->
{{ HTML::style('js/fuelux/fuelux.min.css') }}
{{ HTML::script('js/fuelux/fuelux.js') }}

@stop

@section('content')

    <div class="row clear-fix">
        <div class="col-md-12 column">
            <h3>
                {{ Lang::get('messages.new_promo') }}
                <br/>
                <br/>
            </h3>
            {{ Form::open(['route' => 'promotions.store']) }}
                    <div class="form-group">
                        {{ Form::label('name', Lang::get('messages.name'), array('class' => 'awesome')) }}
                        {{ Form::text('name', '', ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('description', Lang::get('messages.description'), array('class' => 'awesome')) }}
                        {{ Form::textarea('description', null, ['class' => 'form-control']) }}
                    </div>
                {{ Form::submit('Add Promotion', ['class' => 'btn btn-primary btn-sm pull-right']) }}
            {{ Form::close() }}
        </div>
    </div>

@stop