<?php

namespace ioliga\DataTables;

use ioliga\Models\Estadio;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Storage;
class EstadioDataTable extends DataTable
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
            ->editColumn('foto',function($es){
                if($es->foto){
                    return '<a href="'.Storage::url('public/estadios/'.$es->foto).'"><i class="far fa-image"></i></a>';    
                }
                
            })
            ->editColumn('estado',function($es){           
                    return view('estadios.estados', ['estadio'=>$es])->render();         
            })
            ->addColumn('action',function($es){
                         return view('estadios.acciones', ['estadio'=>$es])->render();
            })->rawColumns(['foto','estado','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \ioliga\Models\Estadio $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Estadio $model)
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
            'nombre',
            'direccion',
            'telefono',
            'foto',
            'estado',
            'usuarioCreado',
            'usuarioActualizado',
            'created_at',
            'updated_at'
        ];
    }


    protected function getColumnsTable()
    {
        return [
            
            'nombre',
            'direccion'=>['title'=>'Dirección'],
            'telefono'=>['title'=>'Teléfono'],
            'foto',
            'estado',
            
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Estadio_' . date('YmdHis');
    }
}
