@extends('layouts.info',['titulo'=>'Contactos'])
@section('content')


<section class="section parallax-container breadcrumbs-wrap" data-parallax-img="images/bg-breadcrumbs-1-1920x726.jpg">
    <div class="parallax-content breadcrumbs-custom context-dark">
      <div class="container">
        <h3 class="breadcrumbs-custom-title">Nuestros contactos</h3>
        <ul class="breadcrumbs-custom-path">
          <li><a href="{{ url('/') }}">Inicio</a></li>
          <li class="active">Contactos</li>
        </ul>
      </div>
    </div>
  </section>


  <!-- Section Contact-->
      <section class="section section-variant-1 bg-gray-100">
        <div class="container">
          <div class="row row-50">
            <div class="col-lg-7 col-xl-8">
              <!-- Heading Component-->
              <article class="heading-component">
                <div class="heading-component-inner">
                  <h5 class="heading-component-title">Estar en contacto
                  </h5>
                </div>
              </article>
              <form class="rd-form rd-mailforml" data-form-output="form-output-global" data-form-type="contact" method="post" action="{{ route('enviarContacto') }}">
                @csrf
                <div class="row row-10 row-narrow">
                  <div class="col-md-6">
                    <div class="form-wrap">
                      <label class="form-label" for="form-user-name-1">Nombre</label>
                      <input class="form-input" id="form-user-name-1" type="text" name="nombre" data-constraints="@Required">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-wrap">
                      <label class="form-label" for="form-user-phone">Asunto</label>
                      <input class="form-input" id="form-user-phone" type="text" name="asunto" data-constraints="@Required">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-wrap">
                      <label class="form-label" for="form-message">Mensaje</label>
                      <textarea class="form-input" id="form-message" name="mensaje" data-constraints="@Required"></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-wrap">
                      <label class="form-label" for="form-email">E-mail</label>
                      <input class="form-input" id="form-email" type="email" name="email" data-constraints="@Email @Required">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <button class="button button-lg button-primary button-block" type="submit">Enviar mensaje</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-lg-5 col-xl-4">
              <!-- Heading Component-->
              <article class="heading-component">
                <div class="heading-component-inner">
                  <h5 class="heading-component-title">Detalles de contacto
                  </h5>
                </div>
              </article>
              <div class="contact-list">
                <dl>
                  <dt>E-mail</dt>
                  <dd><span class="icon icon-primary mdi mdi-email-outline"></span>
                    <a class="link" href="">
                        <span class="__cf_email__" data-cfemail="">carlosquishpe001@gmail.com</span>
                    </a></dd>
                </dl>
                <dl>
                  <dt>Dirección</dt>
                  <dd><span class="icon icon-primary mdi mdi-map-marker"></span>
                    <a class="link" href="#">Latacunga - San Felipe</a></dd>
                </dl>
                <dl>
                  <dt>Télefono</dt>
                  <dd><span class="icon icon-primary mdi mdi-phone"></span>
                    <a class="link link-md" href="">0997753249</a></dd>
                </dl>
              </div>
            </div>
          </div>
        </div>
      </section>



@push('scriptsFooter')
    <script>
        $('#menuContacto').addClass('active');
    </script>
@endpush


@endsection