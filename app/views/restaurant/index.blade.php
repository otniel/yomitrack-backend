@extends('layouts.layout')

@section('head')
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
    {{ HTML::script('js/locationpicker.jquery.js') }}
@stop

@section('title')
    Mi restaurant
@stop

@section('content')

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            Mi restaurant
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                {{ Form::open(array('url' => 'restaurant/'.$restaurant->id, 'method' => 'PUT')) }}
                    <div class="form-group">
                        {{ Form::label('name', Lang::get('messages.name'), array('class' => 'awesome')) }}
                        {{ Form::text('name', $restaurant->name, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', Lang::get('messages.description'), array('class' => 'awesome')) }}
                        {{ Form::textarea('description', $restaurant->description, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('email', Lang::get('messages.email'), array('class' => 'awesome')) }}
                        {{ Form::text('email', $restaurant->email, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('tel', Lang::get('messages.tel'), array('class' => 'awesome')) }}
                        {{ Form::text('tel', $restaurant->tel, ['class' => 'form-control']) }}
                    </div>
                    <button type="submit" class="btn btn-default">{{ Lang::get('messages.save') }}</button>
                {{ Form::close() }}
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('address', Lang::get('messages.address'), array('class' => 'awesome')) }}
                    {{ Form::text('address', '', ['class' => 'form-control', 'id' => 'us2-address']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('radius', 'Radius', array('class' => 'awesome')) }}
                    {{ Form::text('radius', '', ['class' => 'form-control', 'id' => 'us2-radius']) }}
                </div>
                <div id="us2" style="width: 493px; height: 360px;"></div>
            </div>
        </div>
    </div>

@stop

@section('bottom-scripts')
    <script>
        $( document ).ready(getLocation());

        function getLocation() {
           if (navigator.geolocation) {
               navigator.geolocation.getCurrentPosition(showPosition, showError);
           } else {
               x.innerHTML = "Geolocation is not supported by this browser.";
           }
        }

        function showPosition(position) {
           var lat = position.coords.latitude;
           var lon = position.coords.longitude;

           $('#us2').locationpicker({
               location: {latitude: lat, longitude: lon},
               radius: 300,
               inputBinding: {
                   latitudeInput: $('#us2-lat'),
                   longitudeInput: $('#us2-lon'),
                   radiusInput: $('#us2-radius'),
                   locationNameInput: $('#us2-address')
               }
            });
        }

        function showError(error) {
           switch(error.code) {
               case error.PERMISSION_DENIED:
                   alert("User denied the request for Geolocation.")
                   break;
               case error.POSITION_UNAVAILABLE:
                   alert("Location information is unavailable.")
                   break;
               case error.TIMEOUT:
                   alert("The request to get user location timed out.")
                   break;
               case error.UNKNOWN_ERROR:
                  alert("An unknown error occurred.")
                   break;
           }
        }
    </script>
@stop

