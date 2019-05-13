@extends('layouts.app',['titulo'=>'Series en '.$genero->campeonato->nombre])
@section('breadcrumbs', Breadcrumbs::render('series',$genero))

@section('acciones')
    <a href="{{ route('campeonatos') }}" class="breadcrumb-elements-item">
        <i class="fas fa-arrow-left"></i>
        Cancelar
    </a>

@endsection

@section('content')

<h1>Total de equipos en <strong> {{ $genero->generoEquipo->nombre }} : {{ count($genero->generoEquipo->equipos) }}</strong></h1>
@if(count($seriesSi)>0)
<h1>Series</h1>
   <div class="row">

    
    @foreach($seriesSi as $si_ok)
        <div class="col-sm-6 col-xl-3">
            <a href="">
                <div class="card card-body">
                    <div class="media">
                        <div class="mr-3 align-self-center">
                            <i class="icon-pointer icon-3x text-success-400"></i>
                        </div>

                        <div class="media-body text-right">
                            <h1 class="font-weight-semibold mb-0">{{ $si_ok->nombre }}</h1>
                            <span class="text-uppercase font-size-sm text-muted">
                                Total de equipos (0)
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach

    </div>


@else
    <div class="alert alert-dark alert-styled-left alert-dismissible">
        <span class="font-weight-semibold">No existe series en este campeonato!</span>
    </div>
@endif


{{-- presentar formulario si solo el campeonato esta activo --}}
@can('serieEnCampeonatoActivo',$genero->campeonato)
<div class="card-group-control card-group-control-right" id="accordion-control-right">
    <div class="card">
        <div class="card-header">
            <h6 class="card-title">
                <a data-toggle="collapse" class="text-default" href="#accordion-control-right-group1">
                    {{ count($seriesSi)>0 ? 'Actualizar series':'Agregar series' }}
                </a>
            </h6>
        </div>

        <div id="accordion-control-right-group1" class="collapse {{ count($seriesSi)>0 ? '':'show' }}" data-parent="#accordion-control-right">
            <form action="{{ route('agregarSerieCampeonato') }}" method="post">
            @csrf
                <div class="card-body">
                    <input type="hidden" name="genero" class="" value="{{ $genero->id }}">
                    <select multiple="multiple" name="series[]" class="form-control listbox-no-selection" data-fouc>
                        @foreach($seriesSi as $ser)
                        <option value="{{ $ser->id }}" selected>{{ $ser->nombre }}</option>
                        @endforeach

                        @foreach($seriesNo as $serNo)
                        <option value="{{ $serNo->id }}">{{ $serNo->nombre }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endcan



@prepend('scriptsHeader')
  <script src="{{ asset('global_assets/js/plugins/forms/inputs/duallistbox/duallistbox.min.js') }}"></script>
@endprepend



@push('scriptsFooter')
    <script>
        $('#menuCampeo').addClass('active');

          $('.listbox-no-selection').bootstrapDualListbox({
            preserveSelectionOnMove: 'moved',
            /*moveOnSelect: false,*/
            filterTextClear:'mostrar todo',
            filterPlaceHolder:'Filtrar',
            moveSelectedLabel:'Mover seleccionado',
            moveAllLabel:'Mueve todo',
            removeSelectedLabel:'Eliminar selección',
            removeAllLabel:'Eliminar todo',
            infoText:'Mostrando todos {0}',
            infoTextFiltered:'<span class="label label-warning">Filtrado</span> {0} desde {1}',
            infoTextEmpty:'Lista vacía',
            nonSelectedListLabel: 'SIN AGREGAR',
            selectedListLabel: 'AGREGADOS',
        });


    </script>
@endpush


@endsection
