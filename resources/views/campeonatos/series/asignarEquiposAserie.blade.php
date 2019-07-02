@extends('layouts.app',['titulo'=>'Series en '.$generoSerie->genero->campeonato->nombre])
@section('breadcrumbs', Breadcrumbs::render('asignarEquiposAserie',$generoSerie))

@section('acciones')
    <a href="{{ route('campeonatos') }}" class="breadcrumb-elements-item">
        <i class="fas fa-arrow-left"></i>
        Cancelar
    </a>

@endsection

@section('content')


{{-- presentar formulario si solo el campeonato esta activo --}}
@can('serieEnCampeonatoActivo',$generoSerie->genero->campeonato)
<div class="card-group-control card-group-control-right" id="accordion-control-right">
    <div class="card">
        <div class="card-header">
            <h6 class="card-title">
                <a data-toggle="collapse" class="text-default" href="#accordion-control-right-group1">
                    {{ count($equiposSi)>0 ? 'Actualizar equipos':'Agregar equipos' }}
                </a>
            </h6>
        </div>

        <div id="accordion-control-right-group1" class="collapse {{ count($equiposSi)>0 ? '':'show' }}" data-parent="#accordion-control-right">
            <form action="{{ route('agregarEquipoAserie') }}" method="post">
            @csrf
                <div class="card-body">
                    <input type="hidden" name="serie" class="" value="{{ $generoSerie->id }}">
                    <select multiple="multiple" name="equipos[]" class="form-control listbox-no-selection" data-fouc>
                        
                        @foreach($equiposNo as $equipo_no)
                        <option value="{{ $equipo_no->id }}">{{ $equipo_no->nombre }}</option>
                        @endforeach

                        
                        @foreach($equiposSi as $equipo_si)
                        
                        <option value="{{ $equipo_si->id }}" selected>{{ $equipo_si->nombre }}</option>
                        
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


@if(count($equiposSi)>0)
<div class="row">
    @foreach($equiposSi as $equipo_si_x)
    <div class="col-md-4">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $equipo_si_x->nombre }}
                </h5>
                <p class="card-text">
                    Creado, {{ $equipo_si_x->created_at->diffForHumans() }}
                </p>
            </div>

            <ul class="list-group list-group-flush border-top">
                <a href="" class="list-group-item list-group-item-action">
                    <span class="font-weight-semibold">
                        <i class="fas fa-user"></i>
                        JUGADOR UNO
                    </span>
                    <span class="badge bg-success ml-auto">New</span>
                </a>
                <a href="" class="list-group-item list-group-item-action">
                    <span class="font-weight-semibold">
                        <i class="fas fa-user"></i>
                        JUGADOR DOS
                    </span>
                    <span class="badge bg-indigo-400 badge-pill ml-auto">38</span>
                </a>
            </ul>

            <div class="card-footer d-flex justify-content-between">
                <span class="text-muted">Updated 2 hours ago</span>
            </div>
        </div>
        
    </div>
        
    @endforeach
</div>
@endif

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
