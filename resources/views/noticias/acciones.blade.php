@can('administrarNoticias', ioliga\Models\Noticia::class)
<div class="btn-group btn-group-sm" role="group" aria-label="...">
        <a href="{{ route('editarNoticia',$n->id) }}" class="btn bg-info" data-toggle="tooltip" data-placement="right" title="Editar">
            <i class="fas fa-edit"></i>
        </a>
        <button type="button" class="btn btn-danger" data-url="{{ route('eliminarNoticia',$n->id) }}" onclick="eliminar(this);" data-toggle="tooltip" data-placement="top" title="Eliminar">
            <i class="fas fa-trash-alt"></i>
        </button>
        
    </div>
@endcan