@extends('layouts.layout')

@section('title')
    {{ Lang::get('messages.promotions') }}
@stop

@section('content')
    <!-- Container de la búsqueda-->
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    {{ Lang::get('messages.search') }}
                </h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    {{ Form::open(['method' => 'GET']) }}
                        <div class="col-xs-6">
                            <div class="form-group">
                                {{ Form::label('category', Lang::get('messages.search_promotion'), array('class' => 'awesome')) }}
                                {{ Form::text('search', null, ['class' => 'form-control ']) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Promociones
                    <br>
                </h3>
            </div>
            <div class="panel-body">
                <h4>
                    <span class="label label-default">{{Lang::get('messages.pagination_showing')}} {{$promotions->getFrom() }} {{Lang::get('messages.pagination_to')}} {{$promotions->getTo() }} {{Lang::get('messages.pagination_of')}} {{ $promotions->getTotal() }}</span>
                </h4>
                <table class="table table-striped table-condensed table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($promotions as $promotion)
                    <tr>
                        <td> {{ $promotion->name }}</td>
                        <td width="550px"> {{ $promotion->description }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="#" class="btn btn-default btn-sm" alt="Ver detalle"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="#" class="btn btn-default btn-sm" alt="Movimientos"><span class="glyphicon glyphicon-list"></span></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $promotions->links() }}
            </div>
        </div>
    </div>
@stop