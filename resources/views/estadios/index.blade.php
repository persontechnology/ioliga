@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('inicio'))

@section('acciones')
    <a href="#" class="breadcrumb-elements-item">
        <i class="icon-comment-discussion mr-2"></i>
        Nuevo
    </a>
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        {!! $dataTable->table()  !!}       
    </div>
</div>


{!! $dataTable->scripts() !!}




@endsection
