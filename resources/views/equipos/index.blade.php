@extends('layouts.app',['titulo'=>'Equipo'])
@section('breadcrumbs', Breadcrumbs::render('equipos'))
@section('acciones')

@can('create', 'ioliga\Models\Equipo\Equipo::class')

    <a href="{{ route('campeonatoCrear') }}" class="breadcrumb-elements-item">
        <i class="fas fa-plus"></i>
        Nuevo Equipo
    </a>
@endcan

@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
         {!! $dataTable->table()  !!}  
         </div>     
    </div>
</div>

@prepend('scriptsHeader')
    <script src="{{ asset('global_assets/js/demo_pages/datatables_extension_buttons_html5.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('plus/DataTables/datatables.min.css') }}"/>
    <script type="text/javascript" src="{{ asset('plus/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>

    {{-- vendor datatbles --}}
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/datatables_extension_buttons_html5.js') }}"></script>
@endprepend

@push('scriptsFooter')
    {!! $dataTable->scripts() !!}
    <script>
        $('#menuEquipo').addClass('active');
   
    </script>   
@endpush




@endsection
