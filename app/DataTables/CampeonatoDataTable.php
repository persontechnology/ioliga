<?php

namespace ioliga\DataTables;

use ioliga\Models\Campeonato;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Storage;

class CampeonatoDataTable extends DataTable
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
            ->addColumn('action', 'campeonatodatatable.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \ioliga\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Campeonato $model)
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
            'fechainicio',
            'fechafin',
            'estado',
            'descripcion'

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Campeonato_' . date('YmdHis');
    }
}
