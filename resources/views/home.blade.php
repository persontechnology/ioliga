@extends('layouts.app',['titulo'=>'Administración'])
@section('breadcrumbs', Breadcrumbs::render('estadios'))

@section('acciones')
   
@endsection

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="card">
    <div class="card-header">
        Sistema de gestión de Ligas
    </div>
 
    <div class="card">
     
        <div class="card-body">
            <div class="raw">
                <div class="col-xl-12">
                    <div id="numeroequiposGenero">
                        
                    </div>
                </div><br>
                <div class="col-xl-12">
                    <div id="numeroCampeonatos">
                        
                    </div>
                </div><br>
                <div class="col-xl-12">
                    <div id="numeroNomina">
                        
                    </div>
                </div>
            </div>
          
        </div>
    </div>
   
</div>


@prepend('scriptsHeader')

    <script type="text/javascript" src="{{ asset('global_assets/highcharts/code/highcharts.js') }}"></script>
   
    <script type="text/javascript" src="{{ asset('global_assets/highcharts/code/modules/series-label.js') }}"></script>
    <script type="text/javascript" src="{{ asset('global_assets/highcharts/code/modules/exporting.js') }}"></script>
    <script src="http://code.highcharts.com/modules/offline-exporting.js"></script>
    <script type="text/javascript" src="{{ asset('global_assets/highcharts/code/modules/export-data.js') }}"></script>

@endprepend
@push('scriptsFooter')
    <script>
        $('#menuHome').addClass('active');
    </script>
<script type="text/javascript">
Highcharts.chart('numeroequiposGenero', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        openInCloud:false,
        type: 'pie'
    },
    lang: {
            loading: 'Cargando...',
            months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            weekdays: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            shortMonths: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            exportButtonTitle: "Exportar",
            printButtonTitle: "Importar",
            rangeSelectorFrom: "Desde",
            rangeSelectorTo: "Hasta",
            rangeSelectorZoom: "Período",
            downloadPNG: 'Descargar imagen PNG',
            downloadJPEG: 'Descargar imagen JPEG',
            downloadPDF: 'Descargar imagen PDF',
            downloadSVG: 'Descargar imagen SVG',
            downloadXLS:'Descargar imagen XLS',
            downloadCSV:'Descargar imagen CSV',
            viewData:'Vista de Datos',
            contextButtonTitle:'Ver opciones',
            openInCloud:'Ver en la nube',
            viewFullscreen:'Ver pantalla completa',
            printChart: 'Imprimir',
            resetZoom: 'Reiniciar zoom',
            resetZoomTitle: 'Reiniciar zoom',
            thousandsSep: ",",
            decimalPoint: '.'
        },
    title: {
        text: 'Total equipos por género'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Género',
        colorByPoint: true,
        data: [
        @if($genero->count()>0)
        @foreach($genero as $ge)
        {
            name: '{{$ge->nombre}}',
            y: @if($ge->contadorDeAsignaciones($ge->id)->count()>0)
                 @foreach($ge->contadorDeAsignaciones($ge->id) as $con)
                    {{$con->total}},
                @endforeach
                @else
                    0,
                @endif
             
            sliced: true,
            selected: true
        },
        @endforeach
        @endif

        ]
    }]
});

/*consulta de campeonatos*/


Highcharts.chart('numeroCampeonatos', {
    chart: {
        type: 'column'
    },
    lang: {
            loading: 'Cargando...',
            months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            weekdays: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            shortMonths: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            exportButtonTitle: "Exportar",
            printButtonTitle: "Importar",
            rangeSelectorFrom: "Desde",
            rangeSelectorTo: "Hasta",
            rangeSelectorZoom: "Período",
            downloadPNG: 'Descargar imagen PNG',
            downloadJPEG: 'Descargar imagen JPEG',
            downloadPDF: 'Descargar imagen PDF',
            downloadSVG: 'Descargar imagen SVG',
            downloadXLS:'Descargar imagen XLS',
            downloadCSV:'Descargar imagen CSV',
            viewData:'Vista de Datos',
            contextButtonTitle:'Ver opciones',
            openInCloud:'Ver en la nube',
            viewFullscreen:'Ver pantalla completa',
            printChart: 'Imprimir',
            resetZoom: 'Reiniciar zoom',
            resetZoomTitle: 'Reiniciar zoom',
            thousandsSep: ",",
            decimalPoint: '.'
        },
    title: {
        text: 'Equipos por campeonato'
    },
   
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Número de equipos'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Equipos: <b>{point.y:.0f} </b>'
    },
    series: [{
        name: 'Population',
        data: [
         @if($campeonatos->count()>0)
           @foreach($campeonatos as $cam)
            [          
            '{{$cam->fechaInicio.' '.$cam->nombre}}',
              @if($cam->contadorDeAsignaciones($cam->id)->isEmpty())
                0                
                @else 
                @foreach($cam->contadorDeAsignaciones($cam->id) as $con)                
                {{$con->total}}                
                @endforeach
              @endif
            ],
            @endforeach
        @endif         

        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.0f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});

/*consulta de Nomina*/


Highcharts.chart('numeroNomina', {
    chart: {
        type: 'column'
    },
    lang: {
            loading: 'Cargando...',
            months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            weekdays: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            shortMonths: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            exportButtonTitle: "Exportar",
            printButtonTitle: "Importar",
            rangeSelectorFrom: "Desde",
            rangeSelectorTo: "Hasta",
            rangeSelectorZoom: "Período",
            downloadPNG: 'Descargar imagen PNG',
            downloadJPEG: 'Descargar imagen JPEG',
            downloadPDF: 'Descargar imagen PDF',
            downloadSVG: 'Descargar imagen SVG',
            downloadXLS:'Descargar imagen XLS',
            downloadCSV:'Descargar imagen CSV',
            viewData:'Vista de Datos',
            contextButtonTitle:'Ver opciones',
            openInCloud:'Ver en la nube',
            viewFullscreen:'Ver pantalla completa',
            printChart: 'Imprimir',
            resetZoom: 'Reiniciar zoom',
            resetZoomTitle: 'Reiniciar zoom',
            thousandsSep: ",",
            decimalPoint: '.'
        },
    title: {
        text: 'Nómina del los equipos'
    },
   
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Nómina de equipos'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Equipos: <b>{point.y:.0f} Jugadores</b>'
    },
    series: [{
        name: 'Population',
        data: [
         @if($equipo->count()>0)
           @foreach($equipo as $equi)
            [          
            '{{$equi->nombre}}', 
            {{$equi->nominas->count()}} 

            ],
            @endforeach
        @endif         

        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.0f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});


Highcharts.setOptions({
    lang: {
            loading: 'Cargando...',
            months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            weekdays: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            shortMonths: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            exportButtonTitle: "Exportar",
            printButtonTitle: "Importar",
            rangeSelectorFrom: "Desde",
            rangeSelectorTo: "Hasta",
            rangeSelectorZoom: "Período",
            downloadPNG: 'Descargar imagen PNG',
            downloadJPEG: 'Descargar imagen JPEG',
            downloadPDF: 'Descargar imagen PDF',
            downloadSVG: 'Descargar imagen SVG',
            printChart: 'Imprimir',
            resetZoom: 'Reiniciar zoom',
            resetZoomTitle: 'Reiniciar zoom',
            thousandsSep: ",",
            decimalPoint: '.'
        }        
});

</script>
@endpush


@endsection
