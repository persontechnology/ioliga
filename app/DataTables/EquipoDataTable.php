<?php

namespace ioliga\DataTables;

use ioliga\Models\Equipo\Equipo;
use ioliga\Models\Equipo\GeneroEquipo;
use Yajra\DataTables\Services\DataTable;

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
            ->addColumn('action', 'equipo.action');
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
                    ->columns($this->getColumns())
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
            'equipo.id',
            'equipo.nombre',        
            'equipo.localidad',
            'equipo.users_id',
            'equipo.generoEquipo_id',
            'equipo.telefono',
            'equipo.anioCreacion',                     
            'equipo.foto',
            'equipo.estado'
        ];
    }
      protected function getColumnsTable()
    {
        return [
            'nombre',        
            'localidad',
            'user_id'=>['title'=>'Representante','data'=>'user_id'],
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
