@extends('layouts.layout')

@section('head')

<script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1','packages':['corechart']}]}"></script>
<script>
    google.setOnLoadCallback(drawVisualization);

    function drawVisualization() {

        var ticket_trans_data = google.visualization.arrayToDataTable([
            ['Mes', 'Comentarios', 'Crecimiento'],
            ['17-mar',  752,       46],
            ['31-mar',  994,       31],
            ['14-abr',  1002,      41],
            ['28-abr',  1242,      61],
            ['12-may',  1207,      55],
            ['26-may',  1497,     105],
            ['09-jun',  995,      320],
            ['23-jun',  987,      306],
            ['07-jul',  1189,     263],
            ['21-jul',  784,      389],
            ['04-ago',  989,      292]

          ]);

          var rate_trans_data = google.visualization.arrayToDataTable([
              ['Mes', 'Tasa de uso', 'Trans / Socios Activos'],
              ['24-mar',  1.00,               0.11],
              ['07-abr',  0.60,               0.09],
              ['21-abr',  0.65,               0.14],
              ['05-may',  1.50,               0.13],
              ['19-may',  0.95,               0.11],
              ['02-jun',  1.50,               0.10],
              ['16-jun',  1.70,               0.10],
              ['30-jun',  1.60,               0.11],
              ['14-jul',  1.25,               0.13],
              ['28-jul',  1.10,               0.14],
              ['11-ago',  0.55,               0.19]

            ]);

          var ticket_trans_options = {
              width: 530,
              height: 300,
              vAxes: {
                  0: {format: '#,###'},
              },
              hAxis: {format: 'm/d/y'},
              seriesType: "bars",
              series: {
                  0:{ type: "bars", targetAxisIndex: 0, color: '#848C78' },
                  1: { type: "line", targetAxisIndex: 1, color: '#FFAF00'}
              },
            }


            var data2 = google.visualization.arrayToDataTable([
                ['Categoria', 'Porcentaje'],
                ['Comida rápida', 2023],
                ['Ambiente Familiar', 510],
                ['Comedor fino', 553],
                ['Cafetería', 365],
                ['Comida Mexicana', 264],
                ['Bar & Grill', 523],
                ['Comida Italiana', 323],
                ['Pizza', 865],
                ['Cena', 434],
                ['Hamburguesa', 922],
                ['Mariscos', 653],
                ['Buffet', 103]
              ], false);

            var rate_trans_options = {
                width: 530,
                height: 300,
                vAxes: {
                    0: {format: '0.00'},
                    1: {format: '#%'}
                },
                //hAxis: {format: 'm/d/y'},
                seriesType: "bars",
                series: {
                    0:{ type: "bars", targetAxisIndex: 0, color: '#848C78' },
                    1: { type: "line", targetAxisIndex: 1, color: '#FFAF00'}
                },
              }

            var options = {
                width: 550,
                height: 650,
              };

            new google.visualization.ComboChart(document.getElementById('ticket_trans')).draw(ticket_trans_data, ticket_trans_options);
            new google.visualization.ComboChart(document.getElementById('rate_trans')).draw(rate_trans_data, rate_trans_options);
            new google.visualization.PieChart(document.getElementById('categoria')).draw(data2, options);

       }
</script>

@stop

@section('title')
    Estadísticas
@stop

@section('content')
    <div class="container">
        <div class="row clearfix">
            <div class="col-xs-6 col-sm-6">
                <div id="ticket_trans"></div>
                <div  id="rate_trans"></div>
            </div>
                <div class="col-md-6" id="categoria"></div>
        </div>
    </div>
@stop