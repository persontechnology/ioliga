@extends('layouts.app',['titulo'=>'Administración'])
@section('breadcrumbs', Breadcrumbs::render('estadios'))

@section('acciones')
    <a href="#" class="breadcrumb-elements-item">
        <i class="icon-comment-discussion mr-2"></i>
        Support
    </a>

    <div class="breadcrumb-elements-item dropdown p-0">
        <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
            <i class="icon-gear mr-2"></i>
            Settings
        </a>

        <div class="dropdown-menu dropdown-menu-right">
            <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
            <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
            <a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
        </div>
    </div>
@endsection

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="card">
    <div class="card-header">Administración</div>

    <div class="card-body">
        
    </div>
</div>



@push('scriptsFooter')
    <script>
        $('#menuHome').addClass('active');
    </script>
@endpush


@endsection
