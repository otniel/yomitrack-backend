
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css"> <!-- load bootstrap via cdn -->

    <style type="text/css">
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #eee;
        }

        .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }
        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }
        .form-signin .checkbox {
            font-weight: normal;
        }
        .form-signin .form-control {
            position: relative;
            font-size: 16px;
            height: auto;
            padding: 10px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }

        /* The white background content wrapper */
        .container > .content {
            background-color: #fff;
            padding: 20px;
            margin: 0 -20px;
            -webkit-border-radius: 10px 10px 10px 10px;
            -moz-border-radius: 10px 10px 10px 10px;
            border-radius: 10px 10px 10px 10px;
            -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
            -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
            box-shadow: 0 1px 2px rgba(0,0,0,.15);
        }

    </style>
</head>
<body>

<div class="container">
    <div class="content">

        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Login</h3>
            </div>
            <div class="panel-body">

                <center>
                    <img src="http://i.imgur.com/l13n7pk.jpg" alt="Logo"> <h1>YomiTrack</h1>
                </center>


                <!--<form method="GET" action="http://yomitrack.ensi.com.mx/dashboard" accept-charset="UTF-8" class="form-signin">
                    <input name="_token" type="hidden" value="7EPCGxhbBZq98xYzUFekcer2htllRYqjsKv0JtHd">-->
                    <!-- check for login errors flash var -->
                    {{ Form::open(array('route' => 'sessions.store', 'class' => 'form-signin')) }}

                    <fieldset>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" name="email" class="form-control" placeholder="E-Mail" required autofocus>
                        </div>

                        <div class="form-group input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>

                        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                    </fieldset>
                    {{ Form::close() }}

                <!--</form>-->
            </div>

        </div>

    </div>
</div>

</body>
</html>
