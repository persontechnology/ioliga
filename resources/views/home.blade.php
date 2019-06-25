@extends('layouts.app',['titulo'=>'Administración'])
@section('breadcrumbs', Breadcrumbs::render('estadios'))

@section('acciones')
   
@endsection

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="card">
    <div class="card-header">
        Sistema de gestión de Ligas
    </div>

    <div class="card-body">
        <img src="{{asset('img/home.png')}}" class="img-responsive img-fluid">
    </div>
</div>



@push('scriptsFooter')
    <script>
        $('#menuHome').addClass('active');
    </script>
@endpush


@endsection
