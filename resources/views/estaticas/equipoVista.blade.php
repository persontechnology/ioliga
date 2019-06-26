@extends('layouts.info',['titulo'=>'Equipos'])
@section('content')
@php($nos=ioliga\Models\Nosotro::first())
<!-- Privacy Policy-->
<section class="section section-md bg-gray-100">
<div class="container"> 
  <div class="row row-30">
    <div class="col-lg-8">
      <!-- Heading Component-->
      <article class="heading-component">
        <div class="heading-component-inner">
          <h5 class="heading-component-title">Nombre: {{$equipo->nombre}}
          </h5>
        </div>
      </article>
      <!-- Player Info Corporate-->
      <div class="player-info-corporate">
        <div class="player-info-figure">
          <div class="block-number"><span>{{$equipo->anioCreacion}}</span></div>
          <div class="player-img">
            <img src="{{ Storage::url('public/equipos/'.$equipo->foto) }} " alt="" width="148" height="66"/>
          </div>
          <div class="team-logo-img">
            <img src="{{ Storage::url('public/nosotros/'.$nos->logo) }}" alt="" width="237" height="312"/>
          </div>
        </div>
        <div class="player-info-main">
          <h4 class="player-info-title">{{$equipo->user->apellidos . ' ' . $equipo->user->nombres}}</h4>
          <p class="player-info-subtitle">Representante</p>
          <hr/>
          <div class="player-info-table">
            <div class="table-custom-wrap">
              <table class="table-custom">
                <tr>
                  <th>Género</th>
                  <th>{{$equipo->genero->nombre}}</th>
                  <th>Localidad</th>
                  <th>{{$equipo->localidad}}</th>
             
                </tr>
                <tr>
                  <td>Año creación</td>
                  <td>{{$equipo->anioCreacion}}</td>
                  <th>Color</th>
                  <th>{{$equipo->color}}</th>
                </tr>
              </table>
            </div>
          </div>
          <hr/>
 
        </div>
      </div>
      <!--  Block Player Info-->
      <div class="block-player-info">
        <h4>Reseña histórica</h4>
        <!-- Quote Modern-->
        <article class="quote-modern"> 
          <div class="quote-modern-text">
            <p>{{$equipo->fraseIdentificacion}}</p>
          </div>
        </article>
        <div class="block-player-info-content">
          <p>{{$equipo->resenaHistorica}} </p>
        </div>

        <div class="block-player-info-timeline">
          @foreach($equipo->asignacionesVista as $asig)
          <div class="player-info-timeline-item">
            <div class="player-info-timeline-item-header"><span class="timeline-counter player-info-subtitle">{{$asig->unoGeneroSerie->genero->campeonato->fechaInicio}}</span>
              <h5 class="text-danger">Campeonato : {{$asig->unoGeneroSerie->genero->campeonato->nombre}} Serie: {{$asig->unoGeneroSerie->serie->nombre}}</h5>
            </div>
            <div class="player-info-timeline-item-text">
              @if($asig->unoGeneroSerie->genero->campeonato->estado)
              <span class="game-result-team-label">Activo</span> <br>
              @endif
              <div class="table-game-info-wrap"><span class="table-game-info-title">Estadísticas<span></span></span>
                    <div class="table-game-info-main table-custom-responsive">
                      <table class="table-custom table-game-info">
                        <tbody>
                          <tr>
                            <td class="table-game-info-number">{{$asig->asignacionNomninas->count()}}</td>
                            <td class="table-game-info-category">Nómina</td>
                            <td class="table-game-info-number">{{$asig->asignacionNomninas->count()}}</td>
                          </tr>
                        
                        </tbody>
                      </table>
                    </div>
                  </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-lg-4"> 
      <div class="row row-30">
        <div class="col-md-6 col-lg-12">
          <!-- Heading Component-->
          <article class="heading-component">
            <div class="heading-component-inner">
              <h5 class="heading-component-title">Statistics
              </h5>
              <div class="heading-component-aside">
                <select class="select select-minimal" data-placeholder="All Competitions" data-dropdown-class="select-minimal-dropdown" style="min-width: 160px;">
                  <option value="all" selected="">All Competitions</option>
                  <option value="world">World Champions</option>
                </select>
              </div>
            </div>
          </article>
          <!-- List Statistics-->
          <ul class="list-statictics">
            <li><a href="#">Goals scored</a><span class="list-statictics-counter">50</span></li>
            <li><a href="#">Shots</a><span class="list-statictics-counter">25</span></li>
            <li><a href="#">Shots on target</a><span class="list-statictics-counter">10</span></li>
            <li><a href="#">Assists</a><span class="list-statictics-counter">80</span></li>
            <li><a href="#">Key Passes</a><span class="list-statictics-counter">50</span></li>
            <li><a href="#">Dribbles</a><span class="list-statictics-counter">25</span></li>
            <li><a href="#">Fouls</a><span class="list-statictics-counter">10</span></li>
            <li><a href="#">Minutes played</a><span class="list-statictics-counter">500</span></li>
            <li><a href="#">Yellow Cards</a><span class="list-statictics-counter">25</span></li>
            <li><a href="#">Red Cards</a><span class="list-statictics-counter">02</span></li>
          </ul>
        </div>
        <div class="col-md-6 col-lg-12"> 
          <!-- Heading Component-->
          <article class="heading-component">
            <div class="heading-component-inner">
              <h5 class="heading-component-title">Player Awards
              </h5>
            </div>
          </article>
          <!-- Owl Carousel-->
          <div class="owl-carousel owl-carousel-dots-modern awards-carousel" data-items="1" data-autoplay="true" data-autoplay-speed="4000" data-dots="true" data-nav="false" data-stage-padding="0" data-loop="true" data-margin="0" data-mouse-drag="true">
            <!-- Awards Item-->
            <div class="awards-item"> 
              <div class="awards-item-main">
                <h4 class="awards-item-title"><span class="text-accent">World</span>Champions
                </h4>
                <div class="divider"></div>
                <h5 class="awards-item-time">December 2014</h5>
              </div>
              <div class="awards-item-aside"> <img src="images/thumbnail-minimal-1-67x147.png" alt="" width="67" height="147"/>
              </div>
            </div>
            <!-- Awards Item-->
            <div class="awards-item"> 
              <div class="awards-item-main">
                <h4 class="awards-item-title"><span class="text-accent">Best</span>Forward
                </h4>
                <div class="divider"></div>
                <h5 class="awards-item-time">June 2015</h5>
              </div>
              <div class="awards-item-aside"> <img src="images/thumbnail-minimal-2-68x126.png" alt="" width="68" height="126"/>
              </div>
            </div>
            <!-- Awards Item-->
            <div class="awards-item"> 
              <div class="awards-item-main">
                <h4 class="awards-item-title"><span class="text-accent">Best</span>Coach
                </h4>
                <div class="divider"></div>
                <h5 class="awards-item-time">November 2016</h5>
              </div>
              <div class="awards-item-aside"> <img src="images/thumbnail-minimal-3-73x135.png" alt="" width="73" height="135"/>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-12">
          <!-- Heading Component-->
          <article class="heading-component">
            <div class="heading-component-inner">
              <h5 class="heading-component-title">Player News Log
              </h5>
            </div>
          </article>
          <!-- Comment Modern-->
          <div class="comment-modern">
            <svg version="1.1" x="0px" y="0px" width="6.888px" height="4.68px" viewbox="0 0 6.888 4.68" enable-background="new 0 0 6.888 4.68" xml:space="preserve">
              <path fill="#171617" d="M1.584,0h1.8L2.112,4.68H0L1.584,0z M5.112,0h1.776L5.64,4.68H3.528L5.112,0z"></path>
            </svg>
            <p class="comment-modern-title"><a href="blog-post.html"><span class="text-primary">Williams-Goss</span> Signed a two-year contract with the Serbian club KK Partizan</a></p>
            <time class="comment-modern-time" datetime="2019"><span class="icon mdi mdi-clock icon-primary"></span>April 15, 2019
            </time>
          </div>
          <!-- Comment Modern-->
          <div class="comment-modern">
            <svg version="1.1" x="0px" y="0px" width="6.888px" height="4.68px" viewbox="0 0 6.888 4.68" enable-background="new 0 0 6.888 4.68" xml:space="preserve">
              <path fill="#171617" d="M1.584,0h1.8L2.112,4.68H0L1.584,0z M5.112,0h1.776L5.64,4.68H3.528L5.112,0z"></path>
            </svg>
            <p class="comment-modern-title"><a href="blog-post.html"><span class="text-primary">Hill </span> Underwent surgery Sunday to repair a torn hamstring and is expected to be sidelined</a></p>
            <time class="comment-modern-time" datetime="2019"><span class="icon mdi mdi-clock icon-primary"></span>April 15, 2019
            </time>
          </div>
          <!-- Comment Modern-->
          <div class="comment-modern">
            <svg version="1.1" x="0px" y="0px" width="6.888px" height="4.68px" viewbox="0 0 6.888 4.68" enable-background="new 0 0 6.888 4.68" xml:space="preserve">
              <path fill="#171617" d="M1.584,0h1.8L2.112,4.68H0L1.584,0z M5.112,0h1.776L5.64,4.68H3.528L5.112,0z"></path>
            </svg>
            <p class="comment-modern-title"><a href="blog-post.html"><span class="text-primary">Fultz</span> Says he will be ready for fall camp after his recovery period is finished</a></p>
            <time class="comment-modern-time" datetime="2019"><span class="icon mdi mdi-clock icon-primary"></span>April 15, 2019
            </time>
          </div>
          <!-- Comment Modern-->
          <div class="comment-modern">
            <svg version="1.1" x="0px" y="0px" width="6.888px" height="4.68px" viewbox="0 0 6.888 4.68" enable-background="new 0 0 6.888 4.68" xml:space="preserve">
              <path fill="#171617" d="M1.584,0h1.8L2.112,4.68H0L1.584,0z M5.112,0h1.776L5.64,4.68H3.528L5.112,0z"></path>
            </svg>
            <p class="comment-modern-title"><a href="blog-post.html"><span class="text-primary">Knight </span> Underwent surgery to repair a torn ACL in his left knee and has been declared out</a></p>
            <time class="comment-modern-time" datetime="2019"><span class="icon mdi mdi-clock icon-primary"></span>April 15, 2019
            </time>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>


<!-- Page Footer-->
@endsection