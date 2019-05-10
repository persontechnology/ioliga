@extends('layouts.app',['titulo'=>'Genero Equipo'])
@section('breadcrumbs', Breadcrumbs::render('categorias'))
@section('content')
<!-- Card Wider -->
<div class="content">
    <!-- Simple lists -->
    <div class="row">
        @foreach($genero as $ge)
        <div class="col-md-6">            
            <!-- Simple list -->
            <div class="card" style="zoom: 1;">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Equipos Categoría {{$ge->nombre}}</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>     
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <ul class="media-list">
                        <li class="media bg-light font-weight-semibold py-2"><i class="fas fa-child"></i> {{$ge->nombre}} <a href="{{route('equipos',$ge->id)}}" class="btn btn-dark ml-5   mt-sm-0"> Ver todos <i class="icon-arrow-right14 ml-2"></i></a>
                         </li>
                         @if($ge->equipos->count()>0)
                         @foreach($ge->equipos as $equipo)
                        <li class="media">
                            @if($equipo->foto)
                            <div class="mr-3">
                                <a href="#">
                                    <img src="{{ Storage::url('public/equipos/'.$equipo->foto) }}" class="rounded-circle" width="40" height="40" alt="">
                                </a>
                            </div>
                            @else
                             <div class="mr-3">
                                <a href="#">
                                    <img src="{{ asset('global_assets/images/demo/users/balon.jpg') }}" class="rounded-circle" width="40" height="40" alt="">
                                </a>
                            </div>
                            @endif
                            <div class="media-body">
                                <div class="media-title font-weight-semibold">{{$equipo->nombre}}</div>
                                <span class="text-muted">{{$equipo->user->nombres.' '.$equipo->user->apellidos }}</span>
                            </div>

                            <div class="align-self-center ml-3">
                                <div class="list-icons list-icons-extended">
                                    <a href="#" class="list-icons-item" data-popup="tooltip" title="" data-toggle="modal" data-trigger="hover" data-target="#call" data-original-title="Call"><i class="icon-phone2"></i></a>
                                    <a href="#" class="list-icons-item" data-popup="tooltip" title="" data-toggle="modal" data-trigger="hover" data-target="#chat" data-original-title="Chat"><i class="icon-comment"></i></a>
                                    <a href="#" class="list-icons-item" data-popup="tooltip" title="" data-toggle="modal" data-trigger="hover" data-target="#video" data-original-title="Video"><i class="icon-video-camera"></i></a>
                                </div>
                            </div>
                        </li>
                        @endforeach
                        @else
                         <div class="alert alert-warning alert-styled-left alert-dismissible">
                            No existen equipos {{$ge->nombre}} crear
                            <a href="{{route('equipos',$ge->id)}}" class="alert-link"> aquí</a>
                        </div>
                         @endif
                    </ul>
                </div>
            </div>
            <!-- /simple list -->      
        </div>
        @endforeach
    </div>
    <!-- /simple lists -->

    <!-- Phone call modal -->
    <div id="call" class="modal fade" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="card-img-actions d-inline-block mb-3">
                        <img class="rounded-circle" src="../../../../global_assets/images/demo/users/face2.jpg" width="160" height="160" alt="">
                        <div class="card-img-actions-overlay card-img rounded-circle">
                            <a href="#" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round legitRipple">
                                <i class="icon-question7"></i>
                            </a>
                        </div>
                    </div>

                    <div class="mb-3">
                        <h6 class="font-weight-semibold mb-0">Nathan Jacobson</h6>
                        <span class="d-block text-muted">Lead UX designer</span>
                    </div>

                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="#" class="btn btn-success btn-float rounded-round legitRipple"><i class="icon-phone2"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="btn btn-danger btn-float rounded-round legitRipple" data-dismiss="modal"><i class="icon-phone-slash"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /phone call modal -->


    <!-- Chat modal -->
    <div id="chat" class="modal fade" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title"><span class="status-mark bg-success mr-2"></span> James Alexander</h6>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body">
                    <ul class="media-list media-chat media-chat-scrollable mb-3">
                        <li class="media content-divider justify-content-center text-muted mx-0">Today</li>

                        <li class="media media-chat-item-reverse">
                            <div class="media-body">
                                <div class="media-chat-item">Thus superb the tapir the wallaby blank frog execrably much since dalmatian by in hot. Uninspiringly arose mounted stared one curt safe</div>
                                <div class="font-size-sm text-muted mt-2">Tue, 8:12 am <a href="#"><i class="icon-pin-alt ml-2 text-muted"></i></a></div>
                            </div>

                            <div class="ml-3">
                                <a href="../../../../global_assets/images/demo/images/3.png">
                                    <img src="../../../../global_assets/images/demo/users/face1.jpg" class="rounded-circle" width="40" height="40" alt="">
                                </a>
                            </div>
                        </li>

                        <li class="media">
                            <div class="mr-3">
                                <a href="../../../../global_assets/images/demo/images/3.png">
                                    <img src="../../../../global_assets/images/demo/users/face11.jpg" class="rounded-circle" width="40" height="40" alt="">
                                </a>
                            </div>

                            <div class="media-body">
                                <div class="media-chat-item">Tolerantly some understood this stubbornly after snarlingly frog far added insect into snorted more auspiciously heedless drunkenly jeez foolhardy oh.</div>
                                <div class="font-size-sm text-muted mt-2">Wed, 4:20 pm <a href="#"><i class="icon-pin-alt ml-2 text-muted"></i></a></div>
                            </div>
                        </li>

                        <li class="media media-chat-item-reverse">
                            <div class="media-body">
                                <div class="media-chat-item">Satisfactorily strenuously while sleazily dear frustratingly insect menially some shook far sardonic badger telepathic much jeepers immature much hey.</div>
                                <div class="font-size-sm text-muted mt-2">2 hours ago <a href="#"><i class="icon-pin-alt ml-2 text-muted"></i></a></div>
                            </div>

                            <div class="ml-3">
                                <a href="../../../../global_assets/images/demo/images/3.png">
                                    <img src="../../../../global_assets/images/demo/users/face1.jpg" class="rounded-circle" width="40" height="40" alt="">
                                </a>
                            </div>
                        </li>

                        <li class="media">
                            <div class="mr-3">
                                <a href="../../../../global_assets/images/demo/images/3.png">
                                    <img src="../../../../global_assets/images/demo/users/face11.jpg" class="rounded-circle" width="40" height="40" alt="">
                                </a>
                            </div>

                            <div class="media-body">
                                <div class="media-chat-item">Grunted smirked and grew less but rewound much despite and impressive via alongside out and gosh easy manatee dear ineffective yikes.</div>
                                <div class="font-size-sm text-muted mt-2">13 minutes ago <a href="#"><i class="icon-pin-alt ml-2 text-muted"></i></a></div>
                            </div>
                        </li>

                        <li class="media media-chat-item-reverse">
                            <div class="media-body">
                                <div class="media-chat-item"><i class="icon-menu"></i></div>
                            </div>

                            <div class="ml-3">
                                <a href="../../../../global_assets/images/demo/images/3.png">
                                    <img src="../../../../global_assets/images/demo/users/face1.jpg" class="rounded-circle" width="40" height="40" alt="">
                                </a>
                            </div>
                        </li>
                    </ul>

                    <textarea name="enter-message" class="form-control mb-3" rows="3" cols="1" placeholder="Enter your message..."></textarea>

                    <div class="d-flex align-items-center">
                        <div class="list-icons list-icons-extended">
                            <a href="#" class="list-icons-item" data-popup="tooltip" data-container="body" title="" data-original-title="Send photo"><i class="icon-file-picture"></i></a>
                            <a href="#" class="list-icons-item" data-popup="tooltip" data-container="body" title="" data-original-title="Send video"><i class="icon-file-video"></i></a>
                            <a href="#" class="list-icons-item" data-popup="tooltip" data-container="body" title="" data-original-title="Send file"><i class="icon-file-plus"></i></a>
                        </div>

                        <button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-auto legitRipple"><b><i class="icon-paperplane"></i></b> Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /chat modal -->


</div>
<!-- Card Regular -->

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
   
    <script>
        $('#menuEquipo').addClass('active');
    </script>
@endpush




@endsection
