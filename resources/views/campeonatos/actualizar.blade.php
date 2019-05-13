@extends('layouts.app',['titulo'=>'Actualizar campeonato'])
@section('breadcrumbs', Breadcrumbs::render('actualizarCampeonato',$campeonato))
@section('acciones')

@can('create', 'ioliga\Models\Campeonato::class')

    <a href="{{ route('campeonatos') }}" class="breadcrumb-elements-item">
        <i class="fas fa-arrow-left"></i>
        Cancelar
    </a>
@endcan

@endsection

@section('content')
<div class="card">
  <div class="card-body">
   <form action="{{ route('editarCampeonato') }}" method="post" enctype="multipart/form-data" id="formIngresoUsuario">
      @csrf
      <input type="hidden" name="campeonato" value="{{ $campeonato->id }}" required="">
      <div class="row">
          <div class="col-md-6">
              <fieldset>
                  <legend class="font-weight-semibold"><i class="far fa-id-card"></i> Detalle campeonato</legend>
                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label" for="nombre">Nombre de campeonato<span class="text-danger">*</span></label>
                      <div class="col-lg-9">
                          <input type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" id="nombre" placeholder="Ingrese.." required="" value="{{ old('nombre',$campeonato->nombre) }}" autofocus="">
                          @if ($errors->has('nombre'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('nombre') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label" for="fechaInicio">Fecha de inicio<span class="text-danger">*</span></label>
                      <div class="col-lg-9">
                          <input type="date" name="fechaInicio" id="fechaInicio" class="form-control{{ $errors->has('fechaInicio') ? ' is-invalid' : '' }}" placeholder="Ingrese.." required="" value="{{ old('fechaInicio',$campeonato->fechaInicio) }}">
                           @if ($errors->has('fechaInicio'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('fechaInicio') }}</strong>
                              </span>
                          @endif

                      </div>
                      
                  </div>


                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label" for="fechaFin">Fecha de finalización<span class="text-danger">*</span></label>
                      <div class="col-lg-9">
                          <input type="date" name="fechaFin" id="fechaFin"  class="form-control{{ $errors->has('fechaFin') ? ' is-invalid' : '' }}" placeholder="Ingrese.." required=""  value="{{ old('fechaFin',$campeonato->fechaFin) }}">
                          @if ($errors->has('fechaFin'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('fechaFin') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label" for="descripcion">Descripción:</label>
                    <div class="col-lg-9">
                        <textarea placeholder="Ingrese.." class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" id="descripcion">{{ old('descripcion',$campeonato->descripcion) }}</textarea>
                        @if ($errors->has('descripcion'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('descripcion') }}</strong>
                            </span>
                        @endif
                    </div>
                 </div>


                 <div class="form-group row">
                      <label class="col-lg-3 col-form-label" for="estado">Estado<span class="text-danger">*</span></label>
                      <div class="col-lg-9">
                          <select class="selectpicker form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}" id="estado" name="estado" required="">
                            <option value="1" {{ $campeonato->estado==true?'selected':'' }}>Activo</option>
                            <option value="0" {{ $campeonato->estado==false?'selected':'' }}>Finalizado</option>
                          </select>
                          @if ($errors->has('estado'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('estado') }}</strong>
                              </span>
                          @endif

                      </div>
                  </div>

              </fieldset>
          </div>

          <div class="col-md-6">
              <fieldset>
                  <legend class="font-weight-semibold"><i class="fas fa-user-lock"></i> Información de categoría de equipos existentes</legend>
            
              @foreach($campeonato->categoriaGenero as $gea)
                  <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="generos[]" checked="" id="ge{{ $gea->id }}" value="{{ $gea->id }}" >
                  <label class="form-check-label" for="ge{{ $gea->id }}">{{ $gea->nombre }} ({{ $gea->equipos()->count() }} equipos)</label>
                </div>
              @endforeach
              
              
                @foreach($generoEquiposNoAsignados as $ge)
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="generos[]" id="ge{{ $ge->id }}" value="{{ $ge->id }}" >
                  <label class="form-check-label" for="ge{{ $ge->id }}">{{ $ge->nombre }} ({{ $ge->equipos()->count() }} equipos)</label>
                </div>
                @endforeach
              

              </fieldset>
          </div>
      </div>

      <div class="text-left">
          <button type="submit" class="btn btn-primary">{{__('Guardar')}} <i class="icon-paperplane ml-2"></i></button>
      </div>
    </form>
  </div>
</div>
@prepend('scriptsHeader')

{{-- select bootsrap --}}
<link rel="stylesheet" href="{{ asset('plus/selectBootstrap/css/bootstrap-select.min.css') }}">
<script src="{{ asset('plus/selectBootstrap/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('plus/selectBootstrap/js/i18n/defaults-es_ES.min.js') }}"></script>
{{-- fin select bootsrap --}}

@endprepend


@push('scriptsFooter')
    <script>
      $('#menuCampeo').addClass('active');
    </script>
@endpush

@endsection