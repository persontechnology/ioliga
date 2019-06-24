@extends('layouts.info',['titulo'=>'Nosotros'])
@section('content')


<section class="section parallax-container breadcrumbs-wrap" data-parallax-img="images/bg-breadcrumbs-1-1920x726.jpg">
    <div class="parallax-content breadcrumbs-custom context-dark">
      <div class="container">
        <h3 class="breadcrumbs-custom-title">Noticias</h3>
        <ul class="breadcrumbs-custom-path">
          <li><a href="{{ url('/') }}">Inicio</a></li>
          <li class="active">Noticias</li>
        </ul>
      </div>
    </div>
</section>

<!-- News 5-->
<section class="section section-sm bg-gray-100">   
    <div class="container">
        <!-- Heading Component-->
        <article class="heading-component">
        <div class="heading-component-inner">
            <h5 class="heading-component-title">
                Últimas noticias
            </h5>
        </div>
        </article>
        <div class="row row-30">
            @if(count($no)>0)
            @foreach ($no as $n)
            <div class="col-md-6 col-lg-4">
                <!-- Post Carmen-->
                <article class="post-carmen">
                    <img src="{{ Storage::url('public/noticias/'.$n->foto) }}" alt="" width="369" height="343"/>
                <div class="post-carmen-header">
                    <!-- Badge-->
                    @if(!$n->urlVideo)
                    <a class="post-video-button" id="verVideo" href="#modal1" data-url="{{ Storage::url('public/noticias/'.$n->foto) }}" data-toggle="modal">
                        <span class="icon material-icons-play_arrow"></span>
                    </a>
                    @endif
                </div>
                <div class="post-carmen-main">
                    <h4 class="post-carmen-title">
                        <a href="blog-post.html">
                            {{ $n->titulo }}
                        </a>
                        </h4>
                    <div class="post-carmen-meta">
                    <div class="post-carmen-time"><span class="icon mdi mdi-clock"></span>
                        <time datetime="2019">{{ $n->created_at }}</time>
                    </div>
                    
                    <div class="post-carmen-view"><span class="icon fl-justicons-visible6"></span>
                        {{ $n->vistas }}
                    </div>
                    </div>
                </div>
                </article>
            </div>
         
            @endforeach
           @else
            <div class="alert alert-info" role="alert">
                No tenemos noticias por el momento
            </div>
           @endif
        </div>
        <nav class="pagination-wrap" aria-label="Page navigation">
                {{ $no->links() }}
        </nav>
    </div>
</section>
 



@push('scriptsFooter')
    <script>
        $('#menuNoticias').addClass('active');
    </script>
@endpush


@endsection