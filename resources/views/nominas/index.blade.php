@extends('layouts.app',['titulo'=>'Lista de juagadores'])

@section('acciones')

@can('create', 'ioliga\Models\equipo::class')

    <a href="" class="breadcrumb-elements-item">
        <i class="fas fa-plus"></i>
        Nuevo Equipo 
    </a>
@endcan
@endsection
@section('content')

<div class="card">
    <div class="card-body">
      

    </div>
</div>
@endsection