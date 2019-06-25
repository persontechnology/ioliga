<?php

namespace ioliga\DataTables;

use ioliga\Models\Noticia;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Storage;
class NoticiasDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
        ->editColumn('foto',function($n){
            if($n->foto){
                $link=Storage::url('public/noticias/'.$n->foto);
                return '<a href="'.$link.'"><img src="'.$link.'" alt="" width="50px" height="50px" class="img-fluid"></a>';
            }else{
                return '';
            }
        })

        ->editColumn('urlVideo',function($n){
            if($n->urlVideo){
                return '<a href="'.$n->urlVideo.'" target="_blank" >Ver video</a>';
            }else{
                return '';
            }
        })

        ->editColumn('detalle',function($n){
            return str_limit($n->detalle, $limit = 10, $end = '...');
        })
        ->editColumn('estado',function($n){
            if($n->estado){
                return '<a href="'.route('estadoNoticia',$n->id).'" class="badge badge-success" data-toggle="tooltip" data-placement="top" title="Cambiar a Sin publicar">Publicado</a>';
            }else{
                return '<a href="'.route('estadoNoticia',$n->id).'" class="badge badge-danger" data-toggle="tooltip" data-placement="top" title="Cambiar a publicar">Sin publicar</a>';
            }
        })
        ->addColumn('action', function($n){
            return view('noticias.acciones',['n'=>$n])->render();
        })
        ->rawColumns(['action','estado','foto','detalle','urlVideo']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \ioliga\Models\Noticia $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Noticia $model)
    {
        return $model->newQuery()->select($this->getColumns());
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumnsTable())
                    ->minifiedAjax()
                    ->addAction(['width' => '80px','printable' => false, 'exportable' => false,'title'=>'Acciones'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'titulo',
            'foto',
            'urlVideo',
            'estado',
            'created_at',
            
        ];
    }

    protected function getColumnsTable()
    {
        return [
            'titulo'=>['title'=>'Título'],
            'foto',
            'urlVideo'=>['title'=>'Video'],
            'estado',
            'created_at'=>['title'=>'Creado el'],
            
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Noticias_' . date('YmdHis');
    }
}
