@extends('layouts.app',['titulo'=>'Series en '.$genero->campeonato->nombre])
@section('breadcrumbs', Breadcrumbs::render('series',$genero))

@section('acciones')
    <a href="{{ route('campeonatos') }}" class="breadcrumb-elements-item">
        <i class="fas fa-arrow-left"></i>
        Cancelar
    </a>

@endsection

@section('content')




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

<!-- Sortable media list -->
<div class="mb-2">


    <div class="row">
        
        <div class="col-md-9">
            <!-- Right list container -->
            @if(count($genero->GenerosSeries)>0)
            <div class="row">
                @foreach($genero->GenerosSeries as $serie_si_x)

                <div class="col-md-4">

                    <!-- Linked list group -->
                    <div class="card">
                        <a href="{{ route('asignarEquiposAserie',$serie_si_x->id) }}">
                        <div class="card-body text-center">
                            <p class="card-text">
                                SERIE
                            </p>
                            <h1 class="card-title">{{ $serie_si_x->serie->nombre }}</h1>
                            <small class="float-right">+ Asignar equipos</small>
                        </div>
                        </a>


                        @if(count($serie_si_x->equipos)>0)
                        <ul class="list-group list-group-flush border-top">
                            
                            @foreach ($serie_si_x->equipos as $equipo)
                                
                                
                                <a href="#" class="list-group-item list-group-item-action">
                                    <span class="font-weight-semibold">
                                        <i class="icon-grid mr-2"></i>
                                        {{ $equipo->nombre }}
                                    </span>
                                    <span class="badge bg-success ml-auto">New</span>
                                </a>

                            @endforeach

                        </ul>
                        @endif

                        <div class="card-footer d-flex justify-content-between">
                         @can('Ver etapas', 'ioliga\Models\Campeonato\Etapa::class')
                          <a href="{{route('etapas-serie',$serie_si_x->id)}}" class="list-group-item list-group-item-action">
                              <span class="badge bg-dark "> {{ $serie_si_x->serie->nombre }} Etapas</span>
                          </a>
                        @endcan

                            <span class="text-muted">Updated 2 hours ago</span>
                            <span>
                                <i class="icon-star-full2 font-size-base text-warning"></i>
                                <i class="icon-star-full2 font-size-base text-warning"></i>
                                <i class="icon-star-full2 font-size-base text-warning"></i>
                                <i class="icon-star-full2 font-size-base text-warning"></i>
                                <i class="icon-star-empty3 font-size-base text-warning"></i>
                                <span class="text-muted ml-2">(86)</span>
                            </span>
                        </div>
                    </div>
                    <!-- /linked list group -->

                </div>

                @endforeach
            </div>
            @else
                <div class="alert alert-dark alert-styled-left alert-dismissible">
                    <span class="font-weight-semibold">No existe series en este campeonato!</span>
                </div>
            @endif

            <!-- /right list container -->

        </div>
    </div>
</div>
<!-- /sortable media list -->










@prepend('scriptsHeader')
  <script src="{{ asset('global_assets/js/plugins/forms/inputs/duallistbox/duallistbox.min.js') }}"></script>
  {{-- select bootsrap --}}
<link rel="stylesheet" href="{{ asset('plus/selectBootstrap/css/bootstrap-select.min.css') }}">
<script src="{{ asset('plus/selectBootstrap/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('plus/selectBootstrap/js/i18n/defaults-es_ES.min.js') }}"></script>
{{-- fin select bootsrap --}}
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
