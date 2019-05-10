	
<!-- Linked list group -->
<div class="card">
	
	<ul class="list-group list-group-flush border-top">
		@foreach($campeonato->categoriaGenero as $cat)
		<a href="{{ route('series',$cat->genero->id) }}" class="list-group-item list-group-item-action">
			<span class="font-weight-semibold">
				{{ $cat->nombre }}
			</span>
			<span class="badge bg-success ml-auto">{{ count($cat->equipos) }} equipos</span>
		</a>
		
		@endforeach
	</ul>

	<div class="card-footer bg-white d-flex justify-content-between align-items-center">
		<div class="text-{{ $campeonato->estado ==false ?'danger':'success' }}">
			<i class="fas {{ $campeonato->estado ==false ?'fa-power-off':'fa-clipboard-check' }}"></i>
			{{ $campeonato->estado ==false ?'FINALIZADO':'ACTIVO' }}
		</div>

    	<div class="btn-group btn-group-sm">
            <button class="btn btn-dark btn-sm dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a href="#" class="dropdown-item">Action</a>
				<a href="#" class="dropdown-item">Another action</a>
				<a href="#" class="dropdown-item">Something else here</a>
				<div class="dropdowndivider"></div>
				<a href="#" class="dropdown-item">One more separated line</a>
			</div>
        </div>
	</div>
</div>
<!-- /linked list group -->