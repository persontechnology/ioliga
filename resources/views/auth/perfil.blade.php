@extends('layouts.app',['titulo'=>'Usuarios'])

@section('breadcrumbs', Breadcrumbs::render('usuarios'))

@section('content')

<style>
    .perfil-fondo{
        height: 200px;
        width: 100%;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
             <div class="card border-success">
                <div class="card-header bg-transparent">
                    <img class="perfil-fondo" src="{{ asset('global_assets/images/backgrounds/user_bg3.jpg') }}" alt="Card image cap">
                </div>
              
              <div class="card-body">
                 @if( Storage::exists('public/usuarios/'.(Auth::user()->foto??'sn')))
                  
                     <img class="img-thumbnail" style="margin-top: -95px; width: 180px; " src="{{Storage::url('public/usuarios/'.Auth::user()->foto)}}" alt="Card image cap">
                @else
                     <img class="img-thumbnail" style="margin-top: -95px; width: 120px; " src="{{ asset('global_assets/images/juavatar.png') }}" alt="Card image cap">
                @endif
               
                <h5 class="card-title">{{Auth::user()->email}}</h5>
               <nav>
                  <div class="nav nav-tabs nav-tabs-solid bg-teal-400 border-0 " id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Actualizar Datos</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Cambiar clave</a>
                  </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <br>
                    <form method="POST" action="{{ route('actualizarMiPerfil') }}" enctype="multipart/form-data">
                        @csrf

                       <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::user()->name }}" required autofocus placeholder="Ingrese nombre de usuario..">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombres" class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>

                            <div class="col-md-6">
                                <input id="nombres" type="text" class="form-control{{ $errors->has('nombres') ? ' is-invalid' : '' }}" name="nombres" value="{{ Auth::user()->nombres }}" required  placeholder="Ingrese nombres..">

                                @if ($errors->has('nombres'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombres') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="apellidos" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="apellidos" type="text" class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }}" name="apellidos" value="{{ Auth::user()->apellidos }}" required  placeholder="Ingrese apellidos..">

                                @if ($errors->has('apellidos'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellidos') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

                            <div class="col-md-6">
                                <input id="telefono" type="number" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ Auth::user()->telefono }}" required >

                                @if ($errors->has('telefono'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fechaNacimiento" class="col-md-4 col-form-label text-md-right">{{ __('Edad') }}</label>

                            <div class="col-md-6">
                                <input id="fechaNacimiento" type="date" min="10" max="100" class="form-control{{ $errors->has('edad') ? ' is-invalid' : '' }}" name="fechaNacimiento" value="{{ Auth::user()->fechaNacimiento }}" required  placeholder="Ingrese fecha Nacimiento..">

                                @if ($errors->has('fechaNacimiento'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fechaNacimiento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="edad" class="col-md-4 col-form-label text-md-right">{{ __('Sexo') }}</label>

                            <div class="col-md-6">
                                
                                <select name="sexo" id="" class="form-control{{ $errors->has('edad') ? ' is-invalid' : '' }}" required>
                                    <option value="Hombre" {{Auth::user()->sexo=='Hombre' ? 'selected' : ''}}>Hombre</option>
                                    <option value="Mujer" {{Auth::user()->sexo=='Mujer' ? 'selected' : ''}}>Mujer</option>
                                </select>

                                @if ($errors->has('edad'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('edad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('foto') }}</label>

                            <div class="col-md-6">
                                <input id="foto" name="foto" type="file" class="form-control{{ $errors->has('edad') ? ' is-invalid' : '' }}"  placeholder="Ingrese fecha Nacimiento..">

                                @if ($errors->has('foto'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('foto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                     

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-success">
                                    {{ __('Actualizar información') }}
                                </button>
                            </div>
                        </div>
                    </form>
                  </div>

                  <!-- cambiar password -->
                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <br>
                      <form action="{{route('actualizarPassword')}}" method="post">
                         @csrf
                        <div class="form-group row">
                            <label for="passwordAntiguo" class="col-md-4 col-form-label text-md-right">{{ __('Password antiguo') }}</label>

                            <div class="col-md-6">
                                <input id="passwordAntiguo" type="password" class="form-control{{ $errors->has('passwordAntiguo') ? ' is-invalid' : '' }}" name="passwordAntiguo" required placeholder="******">

                                @if ($errors->has('passwordAntiguo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('passwordAntiguo') }}</strong>
                                    </span>
                                    
                                @endif


                                
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Nuevo password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="******">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    <script>
                                      $('#nav-tab a[href="#nav-profile"]').tab('show')
                                  </script>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirme Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="******">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-success">
                                    {{ __('Actualizar password') }}
                                </button>
                            </div>
                        </div>
                      </form>
                      
                  </div>
                  
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@prepend('scriptsHeader')

{{-- file input --}}
<link href="{{ asset('plus/bootstrap-fileinput/css/fileinput.min.css') }}" media="all" rel="stylesheet" type="text/css" />

<script src="{{ asset('plus/bootstrap-fileinput/js/fileinput.min.js') }}"></script>

<script src="{{ asset('plus/bootstrap-fileinput/js/locales/es.js') }}"></script>

@endprepend
@if(session('errorPassworAntiguo'))
<script>
     Lobibox.notify('error', {
                title: 'Password antiguo incorrecto',
                sound:false,
                msg: "{{ session('errorPassworAntiguo') }}"
            });
      $('#nav-tab a[href="#nav-profile"]').tab('show')
   
  </script>

@endif
<script type="text/javascript">
     @if( Storage::exists('public/usuarios/'.(Auth::user()->foto??'sn')))
        var urlFotoPerfil="{{Storage::url('public/usuarios/'.Auth::user()->foto)}}";
    @else
        var urlFotoPerfil="{{asset('global_assets/images/juavatar.png')}}";
    @endif
    

    $("#foto").fileinput({
        allowedFileExtensions: ["jpg", "gif", "png", "jpeg"],
        initialPreview:[urlFotoPerfil],
        initialPreviewAsData:true,    
        overwriteInitial:false,
        initialCaption: "Foto de perfil",        
        
        language:'es',
        maxFileCount: 1,
    })
</script>


@endsection