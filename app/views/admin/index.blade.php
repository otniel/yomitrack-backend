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
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Usuarios
                                <br>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <h4>
                                <span class="label label-default">{{Lang::get('messages.pagination_showing')}} {{$users->getFrom() }} {{Lang::get('messages.pagination_to')}} {{$users->getTo() }} {{Lang::get('messages.pagination_of')}} {{ $users->getTotal() }}</span>
                                {{ link_to("/admin/create", "Agregar usuario", ['class' => 'btn btn-info btn-xs pull-right']) }}
                            </h4>
                            <table class="table table-striped table-condensed table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>email</th>
                                    <th width="50px">Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>
                       				{{ link_to("/admin/{$user->id}/edit", "$user->username ") }}
                                    </td>
                                    <td width="550px"> {{ $user->email }}</td>
                                    <td>

                                        {{Form::delete('admin/'. $user->id,
                                                                    'Borrar',
                                                                    array('id'=>'the_form_id','class' => 'delete-form'),
                                                                    array('class' => 'btn btn-danger btn-sm')
                                         )}}
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
                $(document).on('submit', '.delete-form', function(){
                    return confirm('Are you sure?');
                });
            </script>
    </body>
</html>
