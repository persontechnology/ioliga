@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">ESTADIOS</div>

    <div class="card-body">
        {!! $dataTable->table()  !!}       
    </div>
</div>


{!! $dataTable->scripts() !!}




@endsection
