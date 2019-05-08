@extends('layouts.app',['titulo'=>'Crear campeonato'])
@section('breadcrumbs', Breadcrumbs::render('crearCampeonato'))
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
   <form action="{{ route('guardarCampeonato') }}" method="post" enctype="multipart/form-data" id="formIngresoUsuario">
      @csrf
      <div class="row">
          <div class="col-md-6">
              <fieldset>
                  <legend class="font-weight-semibold"><i class="far fa-id-card"></i> Detalle campeonato</legend>
                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label" for="nombre">Nombre de campeonato<span class="text-danger">*</span></label>
                      <div class="col-lg-9">
                          <input type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" id="nombre" placeholder="Ingrese.." required="" value="{{ old('nombre') }}" autofocus="">
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
                          <input type="date" name="fechaInicio" id="fechaInicio" class="form-control{{ $errors->has('fechaInicio') ? ' is-invalid' : '' }}" placeholder="Ingrese.." required="" value="{{ old('fechaInicio') }}">
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
                          <input type="date" name="fechaFin" id="fechaFin"  class="form-control{{ $errors->has('fechaFin') ? ' is-invalid' : '' }}" placeholder="Ingrese.." required=""  value="{{ old('fechaFin') }}">
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
                        <textarea placeholder="Ingrese.." class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" id="descripcion">{{ old('descripcion') }}</textarea>
                        @if ($errors->has('descripcion'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('descripcion') }}</strong>
                            </span>
                        @endif
                    </div>
                 </div>

              </fieldset>
          </div>

          <div class="col-md-6">
              <fieldset>
                  <legend class="font-weight-semibold"><i class="fas fa-user-lock"></i> Información de categoría de equipos existentes</legend>
                  
                @if(count($generoEquipos)>0)
                
                @foreach($generoEquipos as $ge)
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="generos[]" id="ge{{ $ge->id }}" value="{{ $ge->id }}" checked="">
                  <label class="form-check-label" for="ge{{ $ge->id }}">{{ $ge->nombre }} ({{ $ge->equipos()->count() }} equipos)</label>
                </div>
                @endforeach

                @else
                <p>No existe generos de equipos creados, es decir no existe equipos en el sistema</p>
                @endif

              </fieldset>
          </div>
      </div>

      <div class="text-left">
          <button type="submit" class="btn btn-primary">{{__('Guardar')}} <i class="icon-paperplane ml-2"></i></button>
      </div>
    </form>
  </div>
</div>


@push('scriptsFooter')
    <script>
      $('#menuCampeo').addClass('active');
    </script>
@endpush

@endsection