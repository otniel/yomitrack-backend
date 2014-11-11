<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LMS</title>

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
    
    <!-- MODALS -->
    {{ HTML::script('js/fancybox/jquery.mousewheel-3.0.6.pack.js') }}
    {{ HTML::script('js/fancybox/jquery.fancybox.js?v=2.1.5') }}
    {{ HTML::style('js/fancybox/jquery.fancybox.css?v=2.1.5') }}
    {{ HTML::style('js/fancybox/helpers/jquery.fancybox-buttons.css?v=1.0.5') }}
    {{ HTML::script('js/fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.5') }}
	{{ HTML::style('js/fancybox/helpers/jquery.fancybox-thumbs.css?v=1.0.7') }}
    {{ HTML::script('js/fancybox/helpers/jquery.fancybox-thumbs.js?v=1.0.7') }}
	{{ HTML::script('js/fancybox/helpers/jquery.fancybox-media.js?v=1.0.6') }}
    
    <!--  NOTIFY -->
    {{ HTML::script('js/notify.min.js') }}
    
    <!--  BOOTBOX: http://bootboxjs.com -->
    {{ HTML::script('js/bootbox.min.js') }}
    
    <!-- Validacion: http://jqueryvalidation.org/documentation/ -->
    {{ HTML::script('js/jquery-validation-1.11/dist/jquery.validate.min.js') }}
    {{ HTML::script('js/jquery-validation-1.11/dist/additional-methods.min.js') }}
    @if (Config::get('app.locale')=='es')
    {{ HTML::script('js/jquery-validation-1.11/localization/messages_es.js') }}
    @endif
    
    <style type="text/css">
             label.error {
                font-weight: bold;
                color: red;
                padding: 2px 8px;
                margin-top: 2px;
            }
            ul.nav li.dropdown:hover ul.dropdown-menu {
                display: block;
            }
	 </style>
    <script>
    function ModalNotifyError(text){
        $.notify(text, { className: 'error', globalPosition: 'top center' });
    }
    function ModalNotifyMessage(text){
        $.notify(text, { className: 'success', globalPosition: 'top center' });
    }
    function ModalNotifyWarning(text){
        $.notify(text, { className: 'warning', globalPosition: 'top center' });
    }
    </script>
    @yield('head')
</head>

<body style="margin-left: 10px;">
    <div id="notificationDiv"></div>
    <div class="container">
    <!--
                    @if ($errors->count() > 0)
                    <div class="alert alert-danger">
                        <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    @if(Session::has('message'))
                    <div class="alert alert-info">
                       {{ Session::get('message') }}<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
                    </div>
                    @endif
    -->
            @yield('content') 
    </div>
    
    <script>
        $(document).ready(function() {
            @if ($errors->count() > 0)
                @foreach($errors->all() as $error)
                    $.notify("{{ $error }}", "error",{ globalPosition: 'top center', elementPosition: 'top center' });
                @endforeach
             @endif
            @if(Session::has('message'))
               $.notify("{{ Session::get('message') }}", "success",{ globalPosition: 'top center', elementPosition: 'top center' });
           @endif
        });
    </script>
    
</body>

</html>