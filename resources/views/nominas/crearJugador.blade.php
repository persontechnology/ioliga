@extends('layouts.app',['titulo'=>'crear jugadores'])

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('guardar-jugador') }}" method="post" enctype="multipart/form-data" id="formIngresoUsuario">
      @csrf
      <div class="row">
          <div class="col-md-6">
              <fieldset>
                  <legend class="font-weight-semibold"><i class="far fa-id-card"></i> Detalle personal</legend>

                  <input type="text" name="equipo" id="equipo" value="{{Crypt::encryptString($equipo->id)}}" />
                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label" for="nombres">Nombres<span class="text-danger">*</span></label>
                      <div class="col-lg-9">
                          <input type="text" class="form-control{{ $errors->has('nombres') ? ' is-invalid' : '' }}" name="nombres" id="nombres" placeholder="Ingrese.." required="" value="{{ old('nombres') }}" autofocus="">
                          @if ($errors->has('nombres'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('nombres') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label" for="apellidos">Apellidos<span class="text-danger">*</span></label>
                      <div class="col-lg-9">
                          <input type="text" name="apellidos" id="apellidos" class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }}" placeholder="Ingrese.." required="" value="{{ old('apellidos') }}">
                           @if ($errors->has('apellidos'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('apellidos') }}</strong>
                              </span>
                          @endif

                      </div>
                      
                  </div>

                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label" for="tipoIdentificacion">Tipo de identificación<span class="text-danger">*</span></label>
                      <div class="col-lg-9">
                          <select class="selectpicker form-control{{ $errors->has('tipoIdentificacion') ? ' is-invalid' : '' }}" id="tipoIdentificacion" name="tipoIdentificacion" required="">
                            <option value="Cédula" {{ old('tipoIdentificacion')=='Cédula'?'selected':'' }}>Cédula</option>
                            <option value="RUC de persona natural" {{ old('tipoIdentificacion')=='RUC de persona natural'?'selected':'' }}>RUC de persona natural</option>
                            <option value="RUC de sociedad privada" {{ old('tipoIdentificacion')=='RUC de sociedad privada'?'selected':'' }}>RUC de sociedad privada</option>
                            <option value="RUC de sociedad pública" {{ old('tipoIdentificacion')=='RUC de sociedad pública'?'selected':'' }}>RUC de sociedad pública</option>
                            <option value="Pasaporte" {{ old('tipoIdentificacion')=='Pasaporte'?'selected':'' }}>Pasaporte</option>
                            <option value="Consumidor final" {{ old('tipoIdentificacion')=='Consumidor final'?'selected':'' }}>Consumidor final</option>

                          </select>
                          @if ($errors->has('tipoIdentificacion'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('tipoIdentificacion') }}</strong>
                              </span>
                          @endif

                      </div>
                  </div>

                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label" for="identificacion">Identificación<span class="text-danger">*</span></label>
                      <div class="col-lg-9">
                          <input type="number" name="identificacion" id="identificacion"  class="form-control{{ $errors->has('identificacion') ? ' is-invalid' : '' }}" placeholder="Ingrese.." required=""  value="{{ old('identificacion') }}">
                          @if ($errors->has('identificacion'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('identificacion') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  
                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label" for="sexo">Sexo:<span class="text-danger">*</span></label>
                      <div class="custom-control custom-radio">
                          <input type="radio" class="custom-control-input {{ $errors->has('sexo') ? ' is-invalid' : '' }}" value="Hombre" id="Hombre" name="sexo"  required {{ old('sexo')=='Hombre'?'checked':'checked' }}>
                          <label class="custom-control-label" for="Hombre">Hombre</label>
                      </div>
                      <div class="custom-control custom-radio ml-1">
                          <input type="radio" class="custom-control-input{{ $errors->has('sexo') ? ' is-invalid' : '' }}" value="Mujer" id="Mujer" name="sexo" required {{ old('sexo')=='Mujer'?'checked':'' }}>
                          <label class="custom-control-label" for="Mujer">Mujer</label>
                          
                          @if ($errors->has('sexo'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('sexo') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label" for="sexo">Estado civil:<span class="text-danger">*</span></label>
                      
                      <div class="custom-control custom-radio">
                          <input type="radio" class="custom-control-input {{ $errors->has('estadoCivil') ? ' is-invalid' : '' }}" value="Casado/a" id="Casado/a" name="estadoCivil"  required {{ old('estadoCivil')=='Casado/a'?'checked':'checked' }}>
                          <label class="custom-control-label" for="Casado/a">Casado/a</label>
                      </div>

                      <div class="custom-control custom-radio ml-1">
                          <input type="radio" class="custom-control-input {{ $errors->has('estadoCivil') ? ' is-invalid' : '' }}" value="Soltero/a" id="Soltero/a" name="estadoCivil"  required {{ old('estadoCivil')=='Soltero/a'?'checked':'' }}>
                          <label class="custom-control-label" for="Soltero/a">Soltero/a</label>
                      </div>
                     

                      <div class="custom-control custom-radio ml-1">
                          <input type="radio" class="custom-control-input {{ $errors->has('estadoCivil') ? ' is-invalid' : '' }}" value="Divorciado/a" id="Divorciado/a" name="estadoCivil"  required {{ old('estadoCivil')=='Divorciado/a'?'checked':'' }}>
                          <label class="custom-control-label" for="Divorciado/a">Divorciado/a</label>
                      </div>

                      <div class="custom-control custom-radio ml-1">
                          <input type="radio" class="custom-control-input{{ $errors->has('estadoCivil') ? ' is-invalid' : '' }}" value="Vuido/a" id="Vuido/a" name="estadoCivil" required {{ old('estadoCivil')=='Vuido/a'?'checked':'' }}>
                          <label class="custom-control-label" for="Vuido/a">Vuido/a</label>
                          
                          @if ($errors->has('estadoCivil'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('estadoCivil') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  
                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Contactos:</label>
                      <div class="col-lg-9">
                          <div class="row">
                              <div class="col-md-6">
                                  <input type="number" placeholder="Celular" name="celular" id="celular" class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" value="{{ old('celular') }}">
                                  @if ($errors->has('celular'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('celular') }}</strong>
                                      </span>
                                  @endif
                              </div>

                              <div class="col-md-6">
                                  <input type="number" name="telefono" id="telefono" placeholder="Télefono" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" value="{{ old('telefono') }}">
                                  @if ($errors->has('telefono'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('telefono') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                      </div>
                  </div>

                

              </fieldset>
          </div>

          <div class="col-md-6">
              <fieldset>
                  <legend class="font-weight-semibold"><i class="fas fa-user-lock"></i> Información de cuenta</legend>
                  
                   <div class="form-group row">
                      <label class="col-lg-3 col-form-label" for="fechaNacimiento">Fecha De Nacimiento<span class="text-danger">*</span></label>
                      <div class="col-lg-9">
                          <input type="date" name="fechaNacimiento" id="fechaNacimiento"  class="form-control{{ $errors->has('fechaNacimiento') ? ' is-invalid' : '' }}" placeholder="Ingrese.." required=""  value="{{ old('fechaNacimiento') }}">
                          @if ($errors->has('fechaNacimiento'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('fechaNacimiento') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                   <div class="form-group row">
	                  <label class="col-lg-3 col-form-label" for="nacionalidad">Nacionalidad<span class="text-danger">*</span></label>
	                  <div class="col-lg-9">
	                      <input type="text" name="nacionalidad" id="nacionalidad"  class="form-control{{ $errors->has('nacionalidad') ? ' is-invalid' : '' }}" placeholder="Ingrese.." required=""  value="{{ old('nacionalidad') }}">
	                      @if ($errors->has('nacionalidad'))
	                          <span class="invalid-feedback" role="alert">
	                              <strong>{{ $errors->first('nacionalidad') }}</strong>
	                          </span>
	                      @endif
	                  </div>
                  </div>

                  <div class="form-group row">
	                  <label class="col-lg-3 col-form-label" for="lugarProcedencia">Lugar de Procedencia<span class="text-danger">*</span></label>
	                  <div class="col-lg-9">
	                      <input type="text" name="lugarProcedencia" id="lugarProcedencia"  class="form-control{{ $errors->has('lugarProcedencia') ? ' is-invalid' : '' }}" placeholder="Ingrese.." required=""  value="{{ old('lugarProcedencia') }}">
	                      @if ($errors->has('lugarProcedencia'))
	                          <span class="invalid-feedback" role="alert">
	                              <strong>{{ $errors->first('lugarProcedencia') }}</strong>
	                          </span>
	                      @endif
	                  </div>
                  </div>

                  <div class="form-group row">

                      <label for="name" class="col-lg-3 col-form-label">{{ __('Name') }} de usuario<span class="text-danger">*</span></label>

                      <div class="col-lg-9">
                          <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Ingrese..">

                          @if ($errors->has('name'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="email" class="col-lg-3 col-form-label">{{ __('E-Mail Address') }}<span class="text-danger">*</span></label>

                      <div class="col-lg-9">
                          <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Ingrese..">

                          @if ($errors->has('email'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Detalle:</label>
                    <div class="col-lg-9">
                        <textarea placeholder="Ingrese.." class="form-control{{ $errors->has('detalle') ? ' is-invalid' : '' }}" name="detalle" id="detalle">{{ old('detalle') }}</textarea>
                        @if ($errors->has('detalle'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('detalle') }}</strong>
                            </span>
                        @endif
                    </div>
                 </div>

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
  $('#menuUsuario').addClass('active');
  </script>

@endpush


@endsection


