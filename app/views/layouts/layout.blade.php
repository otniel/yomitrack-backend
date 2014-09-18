<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>YomiTrack</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- JQUERY -->
    {{ HTML::script('js/jquery-1.10.2.min.js') }}

    <!-- BOOTSTRAP -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
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

    @yield('head')
</head>

<body>

<div class="container">
    <div class="panel panel-success">
        <div class="panel-heading">
            <span class="badge alert-primary pull-left">Bienvenido, Otniel</span>
            <div class="btn-toolbar pull-right" >
                <div class="btn-group">
                    <a href="#" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-user"></span></a>
                    <a href="#" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-off"></span></a>
                </div>
            </div>
            <br>
            <br>
        </div>

        <div class="panel-body text-left">

            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <img class="pull-right" src=" http://i.imgur.com/l13n7pk.jpg">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#">{{Lang::get('messages.dashboard')}}</a>
                        </li>
                        <li>
                            <a href="#">{{Lang::get('messages.promotions')}}</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="btn-toolbar pull-right">
                @yield('toolbar')
            </div>

            <div id="notificationDiv"></div>

            <h3 id="titleElement">
                @yield('title')
            </h3>

            @yield('content')

        </div>

    </div>
</div>

</body>

</html>