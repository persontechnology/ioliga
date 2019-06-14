@extends('layouts.app',['titulo'=>'Etapas series '])
@section('breadcrumbs', Breadcrumbs::render('etapas-serie-genero',$generoSerie))
@section('content')

<div class="card card-collapsed">
	<div class="card-header bg-dark text-white header-elements-inline">
		<h6 class="card-title">Agregar nueva etapa a esta serie "{{$generoSerie->serie->nombre}}" {{$generoSerie->genero->generoEquipo->nombre}}</h6>
	
		<div class="header-elements">
			<div class="list-icons">
        		<a class="list-icons-item" data-action="collapse"> <i  class="icon-touch b"></i><i  class="icon-stack-plus"></i></a>
        		<a class="list-icons-item" data-action="reload"></a>
        		
        	</div>
    	</div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-6">
				<h6 class="card-title text-center ">Asignar etapas a la serie</h6>
			@can('Crear etapa', 'ioliga\Models\Campeonato\Etapa::class')
				@if($etapas->count()>0)
					<form action="{{route('guardar-etapa-serie')}}" method="post" enctype="multipart/form-data">
    				@csrf
						<input type="hidden" name="generoSerie" id="generoSerie" value="{{$generoSerie->id}}">
						<div class="form-group">
							<label>Seleccione Etapa:</label>
							<select class="form-control select-search " id="etapa" name="etapa" data-fouc required="">
							@foreach($etapas as $no)						
							<option value="{{$no->id}}">				
							{{$no->nombre }}					
							</option>					  						
							@endforeach		
							  @if ($errors->has('etapa'))
	                              <span class="invalid-feedback" role="alert">
	                                  <strong>{{ $errors->first('etapa') }}</strong>
	                              </span>
	                          @endif		
							</select>
						</div>
					
						<div class="text-center">
							<button type="submit" class="btn btn-primary">Asignar <i class="icon-paperplane ml-2"></i></button>
						</div>
				</form>
					
				@else
				 <div class="alert alert-warning alert-styled-left alert-dismissible">
                No existen etapas asignadas              
            	</div>

				@endif
			@endcan
			</div>
			<div class="col-md-6">
				<h6 class="card-title text-center  ">Nueva Etapa</h6>
				   @can('Crear etapa', 'ioliga\Models\Campeonato\Etapa::class')
				   <form action="{{ route('crear-etapa') }}" method="post" enctype="multipart/form-data" id="formIngresoUsuario">
				   @csrf
				   	<input type="hidden" name="generoSerie" id="generoSerie" value="{{$generoSerie->id}}">			   
	                <div class="form-group row">
	                      <label class="col-lg-3 col-form-label" for="nombre">Nombre de la etapa<span class="text-danger">*</span></label>
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
	                    <label class="col-lg-3 col-form-label" for="detalle">Detalle:</label>
	                    <div class="col-lg-9">
	                        <textarea placeholder="Ingrese.." class="form-control{{ $errors->has('detalle') ? ' is-invalid' : '' }}" name="detalle" id="detalle">{{ old('detalle') }}</textarea>
	                        @if ($errors->has('detalle'))
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('detalle') }}</strong>
	                            </span>
	                        @endif
	                    </div>
	                 </div>  			      

				      <div class="text-center">
				          <button type="submit" class="btn btn-primary">{{__('Guardar')}} <i class="icon-paperplane ml-2"></i></button>
				      </div>
				  </form>
				  @endcan
			</div>
			
		</div>
	</div>
</div>
<div class="row">
	@if($generoSerie->etapaSerie->count()>0)
	@foreach($generoSerie->etapaSerie as $etapaSerie)

	<div class="col-xl-6 col-md-6">
		<div class="card card-body bg-{{$etapaSerie->estado==false ? 'blue-600':'indigo-400'}} border-{{$etapaSerie==true  ? 'success':'danger'}}">
			<div class="media">
				<div class="media-body">
					<div class="font-weight-semibold">Nombre de la etapa: {{$etapaSerie->etapa->nombre}}</div>
					<span class=" text-justify">{{$etapaSerie->etapa->detalle}}</span><br>

					<span class="">Etapa: {{$etapaSerie->estado==false  ? 'Activa':'Finalizada'}}</span>
				</div>
				<hr>

				<div class="ml-3 align-self-center">
					<span class="badge badge-mark bg-{{$etapaSerie->estado==false ? 'success':'danger'}} border-{{$etapaSerie->estado==false  ? 'success':'danger'}}"></span>
					<div class="list-icons">
                    	<div class="list-icons-item dropdown">
	                    	<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
	                    	<div class="dropdown-menu dropdown-menu-right">
	                    		@if($etapaSerie->fechas->count()==0)
								<a href="#" data-url="{{ route('eliminar-etapa-serie',$etapaSerie->id) }}" data-msj="{{ $etapaSerie->etapa->nombre}}" onclick="eliminar(this);" class="dropdown-item"><i class="icon-cross2 text-danger-400"></i>  Eliminar</a>
								@endif
								<a href="#" class="dropdown-item"><i class="icon-phone2"></i> Make a call</a>
								<a href="{{route('fechas-etapa',$etapaSerie->id)}}" class="dropdown-item"><i class="icon-calendar"></i> Fechas</a>
								<div class="dropdown-divider"></div>
								@if($etapaSerie->fechas->count()>0)
								@php($i=0)
								@foreach($etapaSerie->fechas as $fe)
								@php($i++)
								<a href="{{route('fecha',$fe->id)}}" class="dropdown-item"><i class="icon-calendar"></i>{{$fe->nombre}} {{$i}}</a>
								@endforeach
								@endif
							</div>
                    	</div>
                	</div>
				</div>

			</div>
			<div class="card">
				<div class="card-header bg-dark header-elements-inline">
					<h6 class="card-title">Tabla de posiciones</h6>
					<div class="header-elements">
						<div class="list-icons">
	                		<a class="list-icons-item" data-action="collapse"></a>
	                		<a class="list-icons-item" data-action="reload"></a>	                
	                	</div>
	            	</div>
				</div>				
				<div class="card-body text-dark">
					<table class="">
						<thead>
							<tr>
								<th class="bg-warning p-2">#</th>
								<th >Equipo</th>
								<th id="pintos" class="p-1">Pbs.</th>
								<th class="bg-warning p-1">Pts.</th>
								<th class="p-1">PJ</th>
								<th class="p-1">PG</th>
								<th class="p-1">PE</th>
								<th class="p-1">GF</th>
								<th class="p-1">GC</th>
								<th class="p-1">GT</th>
							</tr>
						</thead>
						<tbody>
						@if($etapaSerie->tablas->count()>0)
						@php($i=0)
						@foreach($etapaSerie->tablas as $tabla)
						@php($i++)
							<tr class="text-center">
								<td class="bg-dark " > <span class=" media-title">{{$i}}</span></td>
								<td>
									<ul class="media-list">
										<li class="media">
											<div class="mr-3">
				                              <img src="{{ Storage::url('public/equipos/'.$tabla->asignacion->equipos->foto) }}" class="rounded-circle" width="40" height="40" alt="">                        
				                            </div>
				                             <div class="media-body">
				                                <div class="media-title font-weight-semibold">{{$tabla->asignacion->equipos->nombre}}</div>				                               
				                            </div>
											
										</li>
									</ul>
								</td>

								<td>
									{{$tabla->bonificacion}}
								</td>
								<td class="bg-dark">
									{{$tabla->puntosTotales($tabla->partidosGanados->count(),$tabla->partidosEmpatados->count(),$tabla->bonificacion)}}
									
								</td>
								<td>
									{{$tabla->resultados->count()}}
								</td>
								<td>
									{{$tabla->partidosGanados->count()}}
								</td>
								<td>
									{{$tabla->partidosEmpatados->count()}}
									
								</td>
								<td>
									{{$tabla->golesFavor->sum('golesFavor')}}
									
								</td>
								<td>
									{{$tabla->golesContra->sum('golesContra')}}
									
								</td>
								<td>
									{{$tabla->golesTotal($tabla->golesFavor->sum('golesFavor'),$tabla->golesContra->sum('golesContra'))}}
									
								</td>
							
							</tr>
							@endforeach
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	@endforeach
	@else
	<div class="alert alert-warning alert-styled-left alert-dismissible">
           No existen etapas en esta serie              
     </div>
	@endif
</div>
@prepend('scriptsHeader')

    <script type="text/javascript" src="{{ asset('global_assets/js/plugins/extensions/jquery_ui/interactions.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('global_assets/js/demo_pages/form_select2.js') }}"></script>

@endprepend
<script type="text/javascript">
$( document ).ready(function() {	
	$('.select-search').select2({    
	  language: {

	    noResults: function() {

	      return "No existen etapas";        
	    },
	    searching: function() {

	      return "Buscando..";
	    }
	  }
	})
});	
</script>
<script>
        $('#menuCampeo').addClass('active');
$(document).ready(function () {
	  $('#pintos').addClass('asc selected');
      $('#pintos').removeClass('desc');
	
	$(this).addClass('asc selected');
        $('th').each(function (col) {
            $(this).hover(
                    function () {
                        $(this).addClass('focus');
                    },
                    function () {
                        $(this).removeClass('focus');
                    }
            );
            $(this).click(function () {
                if ($(this).is('.desc')) {
                     $(this).addClass('asc selected');
                    $(this).removeClass('desc');
                    sortOrder = 1;
                } else {
                  
                    $(this).removeClass('asc');
                    $(this).addClass('desc selected');
                    sortOrder = -1;
                }
                $(this).siblings().removeClass('asc selected');
                $(this).siblings().removeClass('desc selected');
                var arrData = $('table').find('tbody >tr:has(td)').get();
                arrData.sort(function (a, b) {
                    var val1 = $(a).children('td').eq(col).text().toUpperCase();
                    var val2 = $(b).children('td').eq(col).text().toUpperCase();
                    if ($.isNumeric(val1) && $.isNumeric(val2))
                        return sortOrder == 1 ? val1 - val2 : val2 - val1;
                    else
                        return (val1 < val2) ? -sortOrder : (val1 > val2) ? sortOrder : 0;
                });
                $.each(arrData, function (index, row) {
                    $('tbody').append(row);
                });
            });
        });
    });
</script>
<style type="text/css">
	      table, th, td {
            border: 1px solid black;
        }
        th {
            cursor: pointer;
        }
</style>
@endsection