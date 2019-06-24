@extends('layouts.info',['titulo'=>'Nosotros'])
@section('content')


<section class="section parallax-container breadcrumbs-wrap" data-parallax-img="images/bg-breadcrumbs-1-1920x726.jpg">
    <div class="parallax-content breadcrumbs-custom context-dark">
      <div class="container">
        <h3 class="breadcrumbs-custom-title">Acerca de nosotros</h3>
        <ul class="breadcrumbs-custom-path">
          <li><a href="{{ url('/') }}">Inicio</a></li>
          <li class="active">Nosotros</li>
        </ul>
      </div>
    </div>
  </section>
  <section class="section section-md bg-gray-100">
    <div class="container">
      <div class="row">
          
        <div class="col-md-8">
          <!-- Heading Component-->


          {{-- acerca --}}
          @if(isset($nos->acerca))
          <article class="heading-component">
            <div class="heading-component-inner">
              <h5 class="heading-component-title">Acerca de nosotros
              </h5>
            </div>
          </article>
            <div class="">
                <p class="text-justify">
                        {{ $nos->acerca }}
                </p>
            </div>
            
          @endif

          {{-- reseña --}}

          @if(isset($nos->resena))
          <article class="heading-component mt-4">
            <div class="heading-component-inner">
              <h5 class="heading-component-title">Nuestra Reseña
              </h5>
            </div>
          </article>
            <div class="">
                <p class="text-justify">
                        {{ $nos->resena }}
                </p>
            </div>
            
          @endif

            {{-- mision --}}
          @if(isset($nos->mision))
          <article class="heading-component mt-4">
            <div class="heading-component-inner">
              <h5 class="heading-component-title">Nuestra Misión
              </h5>
            </div>
          </article>
            <div class="">
                <p class="text-justify">
                        {{ $nos->mision }}
                </p>
            </div>
          @endif

          {{-- vision --}}
          @if(isset($nos->vision))
          <article class="heading-component mt-4">
            <div class="heading-component-inner">
              <h5 class="heading-component-title">Nuestra Visión
              </h5>
            </div>
          </article>
            <div class="">
                <p class="text-justify">
                        {{ $nos->vision }}
                </p>
            </div>
          @endif

        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Directivos
                </div>
                <div class="card-body">
                    @if(isset($nos->presidente))
                    <p><strong>Presidente: </strong>{{ $nos->presidente }}</p>
                    @endif

                    @if(isset($nos->vocala))
                    <p><strong>Vocal A: </strong>{{ $nos->vocala }}</p>
                    @endif

                    @if(isset($nos->vocalb))
                    <p><strong>Vocal B:</strong>{{ $nos->vocalb }}</p>
                    @endif

                </div>
                
            </div>   
            
            <div class="card mt-2">
              <div class="card-body">
                <p>
                  <p>Siguenos en nuestras redes sociales</p>
                </p>
                <div class="group-item">
                        <ul class="list-inline list-inline-xs">
        
                            @if(isset($nos->facebook))
                            <li><a class="icon icon-corporate fa fa-facebook" href="{{ $nos->facebook }}" target="_blank"></a></li>
                            @endif
        
                            @if(isset($nos->twitter))
                            <li><a class="icon icon-corporate fa fa-twitter" href="{{ $nos->twitter }}" target="_blank"></a></li>
                            @endif
        
                            @if(isset($nos->youtube))
                            <li><a class="icon icon-corporate fa fa-youtube" href="{{ $nos->youtube }}" target="_blank"></a></li>
                            @endif
                            
                            @if(isset($nos->istagram))
                            <li><a class="icon icon-corporate fa fa-instagram" href="{{ $nos->istagram }}" target="_blank"></a></li>
                            @endif
                        </ul>
                    </div>
              </div>
            </div>


            <div class="card mt-2">
                <div class="card-header">
                    Contactanos
                </div>
                <div class="card-body">
                    @if($nos->email)
                        <p class="card-text"> <i class="icon fa fa-envelope" aria-hidden="true"></i> {{ $nos->email }}</p>
                    @endif

                    @if($nos->telefono)
                        <p class="card-text"> <i class="icon fa fa-phone-square" aria-hidden="true"></i> {{ $nos->telefono }}</p>
                    @endif

                    <a class="button button-sm button-default-outline" href="#">
                            <i class="icon fa fa-envelope" aria-hidden="true"></i> Escribenos
                    </a>
                </div>
            </div>
</div>
      </div>
    </div>
  </section>



@push('scriptsFooter')
    <script>
        $('#menuNosotros').addClass('active');
    </script>
@endpush


@endsection