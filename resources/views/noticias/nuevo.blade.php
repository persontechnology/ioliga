@extends('layouts.app',['titulo'=>'Noticias'])

@section('breadcrumbs', Breadcrumbs::render('crearNoticiaAdmin')) 
@section('acciones')

  <div class="breadcrumb justify-content-center">
    <a href="{{ route('noticiasAdmin') }}" class="breadcrumb-elements-item">
        <i class="fas fa-arrow-left"></i>
        Cancelar
    </a>
</div>
@endsection


@section('content')


<style>
    #map {
        height: 100vh;
    }
</style>

<div class="card">

    <form action="{{ route('guardarNoticiaAdmin') }}" method="post" enctype="multipart/form-data">
       
        <div class="card-body">
            @csrf
           
            <div class="row">
                <div class="col-md-6">
                    <fieldset>
                        <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Complete la información de la noticia</legend>
                        
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" for="titulo">Título:<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}" name="titulo" id="codigo" placeholder="Ingrese.." required="" value="{{ old('titulo') }}">
                                @if ($errors->has('titulo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('titulo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            
                       
    
                    </fieldset>
                </div>
    
                <div class="col-md-6">
                    
                    <fieldset>
                        
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}" id="customFile" name="foto" required>
                                <label class="custom-file-label" for="customFile">FOTO</label>
                                    @if ($errors->has('foto'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('foto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" for="urlvideo">Url de video:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control{{ $errors->has('urlvideo') ? ' is-invalid' : '' }}" name="urlvideo" id="codigo" placeholder="Ingrese.." value="{{ old('urlvideo') }}">
                                @if ($errors->has('urlvideo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('urlvideo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
    
                    </fieldset>
                    
                </div>
            </div>
    
            <div class="row">
                <div class="col">
                    <label for="detalle">Detalle</label>
                    <textarea name="detalle" id="detalle">{{ old('detalle') }}</textarea>
                </div>
            </div>
           
        </div>
        <div class="card-footer text-muted">
            <button type="submit" class="btn btn-primary mt-2 btn-lg">{{__('Guardar')}} <i class="icon-paperplane ml-2"></i></button>
        </div>
    </form>

</div>




@prepend('scriptsHeader')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
@endprepend


@push('scriptsFooter')
   
    <script>
        $('#m_noticia').addClass('active');
            
        CKEDITOR.replace( 'detalle' );
        
    </script>
@endpush



@endsection