@extends('layouts.app',['titulo'=>'Acerca de nosotros'])
@section('breadcrumbs', Breadcrumbs::render('nosotrosAdmin'))

@section('content')


<div class="card">
    <div class="card-header">Actualizar información de la LIGA</div>
    
    <div class="card-body">
        
        <form action="{{ route('actualizarNosotrosAdmin') }}" method="post" enctype="multipart/form-data" id="formIngresoUsuario">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <fieldset>
      
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" for="nombre">Nombre de la liga</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" id="nombre" placeholder="Ingrese.."  value="{{ old('nombre',$no->nombre??'') }}" autofocus="" required>
                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        {{--  reseña historica  --}}

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Reseña histórica:</label>
                            <div class="col-lg-9">
                                <textarea placeholder="Ingrese.." class="form-control{{ $errors->has('resena') ? ' is-invalid' : '' }}" name="resena" id="resena">{{ old('resena',$no->resena??'') }}</textarea>
                                @if ($errors->has('resena'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('resena') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

      
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" for="presidente">Presidente</label>
                            <div class="col-lg-9">
                                <input type="text" name="presidente" id="presidente" class="form-control{{ $errors->has('presidente') ? ' is-invalid' : '' }}" placeholder="Ingrese.."  value="{{ old('presidente',$no->presidente??'') }}">
                                 @if ($errors->has('presidente'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('presidente') }}</strong>
                                    </span>
                                @endif
      
                            </div>
                            
                        </div>
                        
      
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" for="vocala">Vocal A</label>
                            <div class="col-lg-9">
                                <input type="text" name="vocala" id="vocala"  class="form-control{{ $errors->has('vocala') ? ' is-invalid' : '' }}" placeholder="Ingrese.."   value="{{ old('vocala',$no->vocala??'') }}">
                                @if ($errors->has('vocala'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('vocala') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" for="vocalb">Vocal B</label>
                            <div class="col-lg-9">
                                <input type="text" name="vocalb" id="vocalb"  class="form-control{{ $errors->has('vocalb') ? ' is-invalid' : '' }}" placeholder="Ingrese.."   value="{{ old('vocalb',$no->vocalb??'') }}">
                                @if ($errors->has('vocalb'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('vocalb') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
      
                        <div class="form-group row">
                            <label for="numeroJugadoresNomina" class="col-lg-3 col-form-label">{{ __('Número de jugadores de nómina') }}</label>
        
                            <div class="col-lg-9">
                                <input id="numeroJugadoresNomina" type="number" class="form-control{{ $errors->has('numeroJugadoresNomina') ? ' is-invalid' : '' }}" name="numeroJugadoresNomina" value="{{ old('numeroJugadoresNomina',$no->numeroJugadoresNomina??'') }}"   placeholder="Ingrese..">
        
                                @if ($errors->has('numeroJugadoresNomina'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('numeroJugadoresNomina') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
          
                        <div class="form-group row">
                            <label for="numeroJugadoresEncuentro" class="col-lg-3 col-form-label">{{ __('Número de jugadores de encuentro') }}</label>
        
                            <div class="col-lg-9">
                                <input id="numeroJugadoresEncuentro" type="number" class="form-control{{ $errors->has('numeroJugadoresEncuentro') ? ' is-invalid' : '' }}" name="numeroJugadoresEncuentro" value="{{ old('numeroJugadoresEncuentro',$no->numeroJugadoresEncuentro??'') }}"  autocomplete="numeroJugadoresEncuentro" placeholder="Ingrese..">
        
                                @if ($errors->has('numeroJugadoresEncuentro'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('numeroJugadoresEncuentro') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-lg-3 col-form-label">{{ __('Email') }}</label>
        
                            <div class="col-lg-9">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email',$no->email??'') }}"  autocomplete="email" placeholder="Ingrese..">
        
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefono" class="col-lg-3 col-form-label">{{ __('Teléfono') }}</label>
        
                            <div class="col-lg-9">
                                <input id="telefono" type="number" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono',$no->telefono??'') }}"  autocomplete="telefono" placeholder="Ingrese..">
        
                                @if ($errors->has('telefono'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      
      
                    </fieldset>
                </div>
      
                <div class="col-md-6">
                    <fieldset>
      
                        
                        <div class="form-group row">
                            <label for="facebook" class="col-lg-3 col-form-label">{{ __('Url de facebook') }}</label>
        
                            <div class="col-lg-9">
                                <input id="facebook" type="text" class="form-control{{ $errors->has('facebook') ? ' is-invalid' : '' }}" name="facebook" value="{{ old('facebook',$no->facebook??'') }}"  autocomplete="facebook" placeholder="Ingrese..">
        
                                @if ($errors->has('facebook'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('facebook') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="twitter" class="col-lg-3 col-form-label">{{ __('Url de twitter') }}</label>
        
                            <div class="col-lg-9">
                                <input id="twitter" type="text" class="form-control{{ $errors->has('twitter') ? ' is-invalid' : '' }}" name="twitter" value="{{ old('twitter',$no->twitter??'') }}"  autocomplete="twitter" placeholder="Ingrese..">
        
                                @if ($errors->has('twitter'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('twitter') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="youtube" class="col-lg-3 col-form-label">{{ __('Url de youtube') }}</label>
        
                            <div class="col-lg-9">
                                <input id="youtube" type="text" class="form-control{{ $errors->has('youtube') ? ' is-invalid' : '' }}" name="youtube" value="{{ old('youtube',$no->youtube??'') }}"  autocomplete="youtube" placeholder="Ingrese..">
        
                                @if ($errors->has('youtube'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('youtube') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="istagram" class="col-lg-3 col-form-label">{{ __('Url de instagram') }}</label>
        
                            <div class="col-lg-9">
                                <input id="istagram" type="text" class="form-control{{ $errors->has('istagram') ? ' is-invalid' : '' }}" name="istagram" value="{{ old('istagram',$no->istagram??'') }}"  autocomplete="istagram" placeholder="Ingrese..">
        
                                @if ($errors->has('istagram'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('istagram') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Acerca de la liga:</label>
                            <div class="col-lg-9">
                                <textarea placeholder="Ingrese.." class="form-control{{ $errors->has('acerca') ? ' is-invalid' : '' }}" name="acerca" id="acerca">{{ old('acerca',$no->acerca??'') }}</textarea>
                                @if ($errors->has('acerca'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('acerca') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Misión:</label>
                            <div class="col-lg-9">
                                <textarea placeholder="Ingrese.." class="form-control{{ $errors->has('mision') ? ' is-invalid' : '' }}" name="mision" id="mision">{{ old('mision',$no->mision??'') }}</textarea>
                                @if ($errors->has('mision'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mision') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Visión:</label>
                            <div class="col-lg-9">
                                <textarea placeholder="Ingrese.." class="form-control{{ $errors->has('vision') ? ' is-invalid' : '' }}" name="vision" id="vision">{{ old('vision',$no->vision??'') }}</textarea>
                                @if ($errors->has('vision'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('vision') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @if(isset($no->logo))
                        <a href="{{ Storage::url('public/nosotros/'.$no->logo) }}" data-toggle="tooltip" data-placement="top" title="Ver foto">
                            <img src="{{ Storage::url('public/nosotros/'.$no->logo) }}" class="img-fluid" alt="" width="45px;" height="45px;">
                            Ver foto
                        </a> <br><br>    
                        @endif
                        
                        <div class="form-group">
                            
                            <label for="exampleFormControlFile1">Selecione una foto 95x126</label>
                            <input type="file" name="logo" class="form-control-file" id="exampleFormControlFile1">
                        </div>

      
                    </fieldset>
                </div>
            </div>
      
            <div class="text-left">
                <button type="submit" class="btn btn-primary">{{__('Actualizar información')}} <i class="icon-paperplane ml-2"></i></button>
            </div>
          </form>
    </div>
</div>



@push('scriptsFooter')
    <script>
        $('#menuNosotros').addClass('active');
    </script>
@endpush


@endsection
