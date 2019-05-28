@extends('layouts.app',['titulo'=>'Campeonatos'])
@section('breadcrumbs', Breadcrumbs::render('equipos',$genero))
@section('acciones')
@can('Crear equipos')

    <a href="{{route('crear-equipos',$genero->id)}}" class="breadcrumb-elements-item">
        <i class="fas fa-plus"></i>
        Nuevo Equipo {{$genero->nombre}}
    </a>

@endcan
@endsection
@section('content')

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
         {!! $dataTable->table()  !!}  
         </div>     
    </div>
</div>

@prepend('scriptsHeader')
    <script src="{{ asset('global_assets/js/demo_pages/datatables_extension_buttons_html5.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('plus/DataTables/datatables.min.css') }}"/>
    <script type="text/javascript" src="{{ asset('plus/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>

    {{-- vendor datatbles --}}
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/datatables_extension_buttons_html5.js') }}"></script>
@endprepend

@push('scriptsFooter')
    {!! $dataTable->scripts() !!}
    <script>
        $('#menuEquipo').addClass('active');
       
         var estadoEquipo="{{route('estadoEquipo')}}"
        function cambiarEstadoEquipo(argument){
                  var op=argument.options[argument.selectedIndex].text;
            var id=argument.value;
            var estado=op;
            $.post(estadoEquipo,{id:id,estado:estado})
            .done(function( data ) {
            window.location.replace("{{route('equipos',$genero->id)}}");     
            })
        }
    </script>

@endpush




@endsection
