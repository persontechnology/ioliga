	
<!-- Linked list group -->
<div class="card">
	
	<ul class="list-group list-group-flush border-top">
		@foreach($campeonato->categoriaGenero as $cat)
		<a href="{{ route('series',$cat->genero->id) }}" class="list-group-item list-group-item-action">
			<span class="font-weight-semibold">
				{{ $cat->nombre }}
			</span>
			<span class="badge ml-auto">{{ count($cat->equipos) }} equipos</span>
		</a>
		
		@endforeach
	</ul>

	<div class="card-footer {{ $campeonato->estado ==false ?'bg-danger':'bg-success' }} d-flex justify-content-between align-items-center">
		<div class="text-white">
			<i class="fas {{ $campeonato->estado ==false ?'fa-power-off':'fas fa-spinner' }}"></i>
			{{ $campeonato->estado ==false ?'FINALIZADO':'ACTIVO' }}
		</div>
	</div>
</div>

<!-- /linked list group -->