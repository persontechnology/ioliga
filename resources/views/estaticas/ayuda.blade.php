@extends('layouts.info',['titulo'=>'Contactos'])
@section('content')


<section class="section parallax-container breadcrumbs-wrap" data-parallax-img="images/bg-breadcrumbs-1-1920x726.jpg">
    <div class="parallax-content breadcrumbs-custom context-dark">
      <div class="container">
        <h3 class="breadcrumbs-custom-title">Ayuda</h3>
        <ul class="breadcrumbs-custom-path">
          <li><a href="{{ url('/') }}">Inicio</a></li>
          <li class="active">Ayuda</li>
        </ul>
      </div>
    </div>
  </section>


  <!-- Section Contact-->
      <section class="section section-variant-1 bg-gray-100">
        <div class="container">
          En pronto estaremos con ustedes..
        </div>
      </section>



@push('scriptsFooter')
    <script>
        $('#menuAyuda').addClass('active');
    </script>
@endpush


@endsection