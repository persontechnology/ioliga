@extends('layouts.info',['titulo'=>'Noticias'])
@section('content')


<section class="section parallax-container breadcrumbs-wrap" data-parallax-img="images/bg-breadcrumbs-1-1920x726.jpg">
    <div class="parallax-content breadcrumbs-custom context-dark">
      <div class="container">
        <h3 class="breadcrumbs-custom-title">Detalle de noticia</h3>
        <ul class="breadcrumbs-custom-path">
          <li><a href="{{ url('/') }}">Inicio</a></li>
          <li><a href="{{ route('noticias') }}">Noticias</a></li>
          <li class="active">Detalle noticia</li>
        </ul>
      </div>
    </div>
</section>


<!-- Blog Post-->
<section class="section section-sm bg-gray-100">
    <div class="container">
        <div class="row row-30">
        <div class="col-lg-8">
            <div class="blog-post">
            <!-- Badge-->
            <div class="">
                <img src="{{ Storage::url('public/noticias/'.$n->foto) }}" alt="" class="" width="683" height="407" />
            </div>
            <h3 class="blog-post-title">
                {{ $n->titulo }}
            </h3>
            <div class="blog-post-header">
                <div class="blog-post-author">
                <p class="post-author">{{ $n->created_at->diffForHumans() }}</p>
                </div>
                <div class="blog-post-meta">
                <time class="blog-post-time" datetime=""><span class="icon mdi mdi-clock"></span>{{ $n->created_at }}</time>
                
                <div class="blog-post-view"><span class="icon fl-justicons-visible6"></span>{{ $n->vistas }}</div>
                </div>
            </div>
           
            <div class="blog-post-share">
                <p>Compartir esta publicacion</p>
                <ul class="group">
                        <div class="fb-share-button" data-href="{{ route('noticiaDetalle',$n->id) }}" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('noticiaDetalle',$n->id) }}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div>
                </ul>
            </div>
            <div class="blog-post-content">
               
                <p>
                    {!! $n->detalle !!}
                </p>
            </div>
            </div>

     

            <div class="row">
            <div class="col-sm-12">
                <!-- Heading Component-->
                <article class="heading-component">
                <div class="heading-component-inner">
                    <h5 class="heading-component-title">Comentarios
                    </h5>
                </div>
                </article>
                <div class="blog-post-comments">
                    <div class="fb-comments" data-href="{{ route('noticiaDetalle',$n->id) }}" data-width="" data-numposts="5"></div>
                </div>
            </div>
            </div>


        </div>
        <div class="col-lg-4">
            <!-- Blog Alide-->
            <div class="block-aside">
         
            <div class="block-aside-item">
                <!-- Heading Component-->
                <article class="heading-component">
                <div class="heading-component-inner">
                    <h5 class="heading-component-title">
                        Otras noticias
                    </h5>
                    <a class="button button-xs button-gray-outline" href="{{ route('noticias') }}">Ver todos</a>
                </div>
                </article>
                <!-- List Post Classic-->
                <div class="list-post-classic">
                                    <!-- Post Classic-->
                    @foreach($no as $not)
                        <article class="post-classic">
                            <div class="post-classic-aside">
                                <a class="post-classic-figure" href="{{ route('noticiaDetalle',$not->id) }}">
                                    <img src="{{ Storage::url('public/noticias/'.$n->foto) }}" alt="" width="94" height="94"/>
                                </a>
                            </div>
                            <div class="post-classic-main">
                                <p class="post-classic-title">
                                    <a href="{{ route('noticiaDetalle',$not->id) }}">
                                        {{ $n->titulo }}
                                    </a></p>
                                <div class="post-classic-time"><span class="icon mdi mdi-clock"></span>
                                <time datetime="">{{ $n->created_at }}</time>
                                </div>
                            </div>
                        </article>
                    @endforeach

                    
                </div>
            </div>
          
           
            </div>
        </div>
        </div>
    </div>
</section>



@push('scriptsFooter')
    <script>
        $('#menuNoticias').addClass('active');
    </script>
    
@endpush



@endsection