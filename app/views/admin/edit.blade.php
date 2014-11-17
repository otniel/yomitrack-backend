<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>YomiTrack</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- BOOTSTRAP -->

        <!-- JQUERY -->
        {{ HTML::script('js/jquery-1.10.2.min.js') }}

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

        <!-- JQUERY UI -->
        {{ HTML::style('js/jquery-ui-1.10.3/themes/base/jquery-ui.css') }}
        {{ HTML::script('js/jquery-ui-1.10.3/ui/jquery-ui.js') }}
        @if (Config::get('app.locale')=='es')
        {{ HTML::script('js/jquery-ui-1.10.3/ui/i18n/jquery.ui.datepicker-es.js') }}
        @else
        {{ HTML::script('js/jquery-ui-1.10.3/ui/jquery.ui.datepicker.js') }}
        @endif
        {{ HTML::script('js/jquery.hotkeys-0.7.9.min.js') }}

        <!-- MODALS: http://fancybox.net/ -->
        {{ HTML::script('js/fancybox/jquery.mousewheel-3.0.6.pack.js') }}
        {{ HTML::script('js/fancybox/jquery.fancybox.js?v=2.1.5') }}
        {{ HTML::style('js/fancybox/jquery.fancybox.css?v=2.1.5') }}
        {{ HTML::style('js/fancybox/helpers/jquery.fancybox-buttons.css?v=1.0.5') }}
        {{ HTML::script('js/fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.5') }}
        {{ HTML::style('js/fancybox/helpers/jquery.fancybox-thumbs.css?v=1.0.7') }}
        {{ HTML::script('js/fancybox/helpers/jquery.fancybox-thumbs.js?v=1.0.7') }}
        {{ HTML::script('js/fancybox/helpers/jquery.fancybox-media.js?v=1.0.6') }}

        <!--  NOTIFY: http://notifyjs.com -->
        {{ HTML::script('js/notify.min.js') }}

        <!--  BOOTBOX: http://bootboxjs.com -->
        {{ HTML::script('js/bootbox.min.js') }}

        <!-- Validacion: http://jqueryvalidation.org/documentation/ -->
        {{ HTML::script('js/jquery-validation-1.11/dist/jquery.validate.min.js') }}
        {{ HTML::script('js/jquery-validation-1.11/dist/additional-methods.min.js') }}
        @if (Config::get('app.locale')=='es')
        {{ HTML::script('js/jquery-validation-1.11/localization/messages_es.js') }}
        @endif
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
        {{ HTML::script('js/locationpicker.jquery.js') }}
        <style>
            textarea {
                resize: vertical;
            }

            #us2 {
                border: double;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Crear usuario
                </div>
                <div class="panel-body">
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        Usuario
                                    </div>
                                    <div class="panel-body">
                                        {{ Form::open(['url' => 'admin/'.$user->id, 'method' => 'PUT']) }}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('username', 'Nombre', array('class' => 'awesome')) }}
                                                {{ Form::text('username', $user->username, ['class' => 'form-control']) }}
                                                {{ $errors->first('username') }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('email', 'Email', array('class' => 'awesome')) }}
                                                {{ Form::text('email', $user->email, ['class' => 'form-control']) }}
                                                {{ $errors->first('email') }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('password', 'Password', array('class' => 'awesome')) }}
                                                {{ Form::password('password', ['class' => 'form-control']) }}
                                                {{ $errors->first('password') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        Restaurant
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('name', Lang::get('messages.name'), array('class' => 'awesome')) }}
                                                {{ Form::text('name', $restaurant->name, ['class' => 'form-control']) }}
                                                {{ $errors->first('name') }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('description', Lang::get('messages.description'), array('class' => 'awesome')) }}
                                                {{ Form::textarea('description', $restaurant->description, ['class' => 'form-control']) }}
                                                {{ $errors->first('description') }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('rest_email', Lang::get('messages.email'), array('class' => 'awesome')) }}
                                                {{ Form::email('rest_email', $restaurant->email, ['class' => 'form-control']) }}
                                                {{ $errors->first('rest_email') }}
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {{ Form::label('tel', Lang::get('messages.tel'), array('class' => 'awesome')) }}
                                                    {{ Form::text('tel', $restaurant->tel, ['class' => 'form-control']) }}
                                                    {{ $errors->first('tel') }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('address', Lang::get('messages.address'), array('class' => 'awesome')) }}
                                                {{ Form::text('address', $restaurant->address, ['class' => 'form-control', 'id' => 'us2-address', 'disabled']) }}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            {{ Form::label('radius', 'Radio', array('class' => 'awesome')) }}
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                {{ Form::text('radius', $restaurant->radius, ['class' => 'form-control', 'id' => 'us2-radius']) }}
                                                {{ Form::hidden('latitude', $restaurant->latitude, ['id' => 'us2-lat']) }}
                                                {{ Form::hidden('longitude', $restaurant->longitude, ['id' => 'us2-lon']) }}
                                                {{ Form::hidden('address', null, ['id' => 'address']) }}

                                            </div>

                                            <div id="us2" style="width: 493px; height: 360px;"></div>
                                        <br/><br/>
                                        {{ link_to("/admin", "Regresar", ['class' => 'btn btn-danger']) }}
                                        <button type="submit" class=" btn btn-primary">{{ Lang::get('messages.save') }}</button>
                                        </div>
                                        <div class="col-md-3">
                                    </div>
                                    <div class="col-md-6">
                                        <br/><br/>
                                    </div>
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $( document ).ready(getLocation());

            function getLocation() {
               if (navigator.geolocation) {
                   navigator.geolocation.getCurrentPosition(showPosition, showError);
               } else {
                   alert("Geolocation is not supported by this browser.");
               }
            }

            function showPosition(position) {
               var lat = position.coords.latitude;
               var lon = position.coords.longitude;

               var latitude_field = document.getElementById('us2-lat').value
               var longitude_field = document.getElementById('us2-lon').value
               var radius_field = document.getElementById('us2-radius').value

               $('#us2').locationpicker({
                   location: {latitude: latitude_field, longitude: longitude_field},
                   radius: radius_field,
                   inputBinding: {
                       latitudeInput: $('#us2-lat'),
                       longitudeInput: $('#us2-lon'),
                       radiusInput: $('#us2-radius'),
                       locationNameInput: $('#us2-address')
                   },
                   enableAutocomplete: true,
                   onchanged: function(currentLocation, radius, isMarkerDropped) {
                       var address = $(this).locationpicker('location').name;
                        $('#address').val(address);
                        $('#us2-lat').val(currentLocation.latitude);
                        $('#us2-lon').val(currentLocation.longitude);
                       //alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
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
    </body>
</html>