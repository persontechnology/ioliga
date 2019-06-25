@extends('layouts.info',['titulo'=>'Equipos'])
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
  <section class="section ">
    <div class="container">
      <div class="row">
        @if($genero->count()>0) 
         @foreach($genero as $ge)  
        <div class="col-md-12">
          <!-- Heading Component-->
            <section class="section section-md ">
              <div class="container">
                <div class="row row-50">
                  <div class="col-md-12">
                    <!-- Heading Component-->
                    <article class="heading-component">
                      <div class="heading-component-inner">
                        <h5 class="heading-component-title">Genero "{{$ge->nombre}}"
                        </h5>
                      
                      </div>
                    </article>
                  </div>
                @foreach($ge->equipos as $equi)  
               
                  <div class="col-md-6 col-lg-3">
                    <article class="product">
                      <header class="product-header">
                        <!-- Badge-->
                        <div class="badge badge-{{$equi->estado==true?'shop':'red'}}">{{$equi->estado==true?'Activo':'Inactivo'}}
                        </div>
                        <div class="product-figure"><img width="200" height="200" src=" {{ Storage::url('public/equipos/'.$equi->foto) }}" alt=""/></div>
                        <div class="product-buttons">
                        <a class="product-button fl-bigmug-line-shopping202" href="shopping-cart.html" style="font-size: 26px"></a><a class="product-button fl-bigmug-line-zoom60" href="{{ Storage::url('public/equipos/'.$equi->foto) }}" data-lightgallery="item" style="font-size: 25px"></a>
                        </div>
                      </header>
                      <footer class="product-content">
                        <h6 class="product-title"><a href="product-page.html">{{$equi->nombre}}</a></h6>
                        <div class="product-price"><span class="heading-6 product-price-new">Representante: {{$equi->user->nombres .' '. $equi->user->apellidos}}</span>
                        </div>
                     
                      </footer>
                    </article>
                  </div>

                  @endforeach
                </div>

              </div>
            </section>


        </div>
        @endforeach
        @endif

      </div>
    </div>
  </section>



@push('scriptsFooter')
    <script>
        $('#menuNosotros').addClass('active');
    </script>
@endpush


@endsection