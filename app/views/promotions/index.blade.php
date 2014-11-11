@extends('layouts.layout')

@section('head')

    <script>
        function createPromotion(){
            $.fancybox.open({
                href: "{{URL::route('promotions.create')}}",
                type: 'iframe',
                minHeight : '300',
                autoScale: false,
                autoDimensions: false
            });
        }

        function viewPromoDetails(id){
           // document.write(id);
            $.fancybox.open({
                href: "{{ URL::to('promotions')}}/"+id+"/edit",
                type: 'iframe',
                minHeight : '500',
                autoScale: false,
                autoDimensions: false
            });
        }

        function deletePromotion(id){
            bootbox.confirm("Are you sure?" + id, function(result) {
                if(result) {
                    $('form#delete').submit();
                }
            });
        }


    </script>
    <style>
        th {
            text-align: center;
        };
    </style>
@stop
@section('title')
    {{ Lang::get('messages.promotions') }}
@stop

@section('toolbar')


    <div class="container">
        <!--<div class="btn-group dropup">
            <button type="button" class="btn btn-default">Promociones</button>
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <!-- Dropdown menu links >
            </ul>
        </div>-->
            <button type="button" onclick="javascript:createPromotion();" class="btn btn-info">Agregar promoción</button>
    </div>
@stop
@section('content')
    <!-- Container de la búsqueda-->
    <br/>
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
                        <th width="50px">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($promotions as $promotion)
                    <tr>
                        <td>
                            <a href="javascript:void(0);" onclick="javascript:viewPromoDetails({{ $promotion->id }});" alt="Ver detalle"> {{ $promotion->name }}</a>
                        </td>
                        <td width="550px"> {{ $promotion->description }}</td>
                        <td>

                            <!-- Single button -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    Opciones <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="javascript:void(0);" onclick="javascript:viewPromoDetails({{ $promotion->id }});" alt="Ver detalle">Edit</a>
                                    </li>
                                    <li> {{Form::delete('promotions/'. $promotion->id,
                                                        'Delete',
                                                        array('id'=>'the_form_id','class' => 'delete-form')
                                            )}}
                                    </li>
                                </ul>
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

@section('bottom-scripts')
    <script>
        $(document).on('submit', '.delete-form', function(){
            bootbox.confirm("Are you sure?", function(result) {
                if(result) {
                    continue;
                }
            });
            //return confirm('Are you sure?');
        });
    </script>
@stop




















