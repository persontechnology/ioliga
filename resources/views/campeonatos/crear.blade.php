@extends('layouts.app',['titulo'=>'Campeonatos'])
@section('breadcrumbs', Breadcrumbs::render('campeonatos'))
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
    <form action="{{ route('guardarEstadio') }}" method="post" enctype="multipart/form-data">
    	@csrf
	
			<legend class="text-uppercase font-size-sm font-weight-bold">Completar información</legend>
	     <div class="row">
           <div class="col-sm-6">  

			<div class="form-group row">
				<label for="direccion" class="col-form-label col-lg-2">Nombre<span class="text-danger">*</span></label>
				<div class="col-lg-10">
					<input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" placeholder="Ingrese.." required="">
					@error('nombre')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
				</div>
			</div>

			<div class="form-group row">
				<label for="fechainicio" class="col-form-label col-lg-2">Fecha Inicio<span class="text-danger">*</span></label>
				<div class="col-lg-10">
					<input type="date" name="fechainicio" id="fechainicio" value="{{ old('fechainicio') }}" class="form-control @error('fechainicio') is-invalid @enderror" placeholder="Ingrese..">
					@error('fechainicio')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
				</div>
			</div>
			<div class="form-group row">
				<label for="fechafin" class="col-form-label col-lg-2">Fecha Fin</label>
				<div class="col-lg-10">
					<input type="date" name="fechafin" id="fechafin" value="{{ old('fechafin') }}" class="form-control @error('fechafin') is-invalid @enderror" placeholder="Ingrese..">
					@error('fechafin')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
				</div>
			</div>
			</div>
            <div class="col-sm-6">  
			<div class="form-group row">
				<label for="descripcion" class="col-form-label col-lg-2">Dirección<span class="text-danger">*</span></label>
				<div class="col-lg-10">
					<textarea name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" placeholder="Ingrese.." required="">{{ old('descripcion')}}</textarea>
					@error('descripcion')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
				</div>
			</div>
        </div>
    </div>
      <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
		
			<button type="submit" class="btn btn-dark btn-rounded">{{ __('Save') }} <i class="icon-paperplane ml-2"></i></button>
		</div>
	</div>
	</form>
  </div>
</div>


@endsection