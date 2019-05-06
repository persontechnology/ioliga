<?php

namespace ioliga\DataTables\Usuarios;

use ioliga\User;
use Yajra\DataTables\Services\DataTable;

class UsuariosDataTable extends DataTable
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
            ->editColumn('foto',function($user){
              return '<a href="'.route('editarFotoUsuario',$user->id).'"><i class="fas fa-camera-retro"></i></a>';
                
            })
            ->editColumn('celular',function($user){
                return $user->telefono.' '.$user->celular;
            })
            ->addColumn('action', function($user){
                return view('usuarios.usuarios.acciones',['user'=>$user])->render();
            })->rawColumns(['foto','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \ioliga\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
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
            'email',
            'identificacion',
            'nombres',
            'apellidos',
            'foto',
            'sexo',
            'celular',
            'telefono'
        ];
    }

    protected function getColumnsTable()
    {
        return [
            'foto',
            'nombres',
            'apellidos',
            'identificacion'=>['title'=>'Identificación'],
            'email',
            'sexo',
            'celular'=>['title'=>'Contactos']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Usuarios/Usuarios_' . date('YmdHis');
    }
}
