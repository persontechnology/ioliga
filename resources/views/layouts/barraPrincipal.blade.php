<div class="navbar navbar-expand-md navbar-dark bg-indigo navbar-static">
    <div class="navbar-brand">
        <a href="{{ url('/') }}" class="d-inline-block">
            <img src="{{ asset('global_assets/images/logo_light.png') }}" alt="">
        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        @auth
            <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
                <i class="icon-paragraph-justify3"></i>
            </button>
        @endauth
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        @auth
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                        <i class="icon-paragraph-justify3"></i>
                    </a>
                </li>
            </ul>

            <span class="navbar-text ml-md-3">
                <span class="badge badge-mark border-orange-300 mr-2"></span>
                Buenos días, {{ Auth::user()->name }}!
            </span>

            <ul class="navbar-nav ml-md-auto">
               

                <li class="nav-item">
                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="navbar-nav-link">
                        <i class="icon-switch2"></i>
                        <span class="d-md-none ml-2">Salir</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        @else
            <ul class="navbar-nav ml-md-auto">
                <li class="nav-item">
                    <a class="navbar-nav-link" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt"></i>
                            {{ __('Login') }}</a>
                </li>

                <li class="nav-item">
                    <a class="navbar-nav-link" href="{{ route('register') }}">
                        <i class="fas fa-sign-out-alt"></i>
                            {{ __('Register') }}</a>
                </li>

            </ul>
        @endauth
        

    </div>


</div>