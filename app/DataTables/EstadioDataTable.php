<?php

namespace ioliga\DataTables;

use ioliga\Models\Estadio;
use Yajra\DataTables\Services\DataTable;

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
            ->addColumn('action',function($estadio){
                         return view('estadios.acciones', ['estadio'=>$estadio])->render();
            })->rawColumns(['action']);;
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
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction(['width' => '80px'])
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
