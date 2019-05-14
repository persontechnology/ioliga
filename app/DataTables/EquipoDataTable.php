<?php

namespace ioliga\DataTables;

use ioliga\Models\Equipo\Equipo;
use ioliga\Models\Equipo\GeneroEquipo;
use Yajra\DataTables\Services\DataTable;
use ioliga\User;
use Illuminate\Support\Facades\Storage;

class EquipoDataTable extends DataTable
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
             ->editColumn('foto',function($equipo){
                if($equipo->foto){
                    return '<a href="'.Storage::url('public/equipos/'.$equipo->foto).'"><i class="far fa-image"></i></a>';    
                }
                
            })
            ->editColumn('users_id',function($equipo){
                return $equipo->user->nombres.' '.$equipo->user->apellidos ;
            })
             ->editColumn('generoEquipo_id',function($equipo){
                return $equipo->genero->nombre;
            })
              ->editColumn('estado',function($equipo){           
                    return view('equipos.estados', ['equipo'=>$equipo])->render();         
            })
            ->addColumn('action',function($equipo){
                         return view('equipos.acciones', ['equipo'=>$equipo])->render();
           })->rawColumns(['foto','estado','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \ioliga\Models\Equipo\Equipo $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(GeneroEquipo $model)

    {
        $idGenero=$this->idGenero;
        return $model->find($idGenero)->equipos()->select($this->getColumns());
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
            'localidad',
            'users_id',
            'generoEquipo_id',
            'telefono',
            'anioCreacion',                     
            'foto',
            'estado'
        ];
    }
      protected function getColumnsTable()
    {
        return [
            'nombre',        
            'localidad',
            'users_id'=>['title'=>'Representante','data'=>'users_id'],
            'generoEquipo_id'=>['title'=>'Género','data'=>'generoEquipo_id'],
            'telefono'=>['title'=>'Teléfono'],
            'anioCreacion',                   
            'foto',
            'estado'
        ];
    }
    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Equipo_' . date('YmdHis');
    }
}
