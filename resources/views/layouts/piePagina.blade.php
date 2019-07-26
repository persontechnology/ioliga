<div class="navbar navbar-expand-lg navbar-light">
    <div class="text-center d-lg-none w-100">
        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
            <i class="icon-unfold mr-2"></i>
            Pie de página
        </button>
    </div>

    <div class="navbar-collapse collapse" id="navbar-footer">
        <span class="navbar-text">
            Carlos Quishpe - José Viera – UTC &copy; {{ date('Y') }}
        </span>

        <ul class="navbar-nav ml-lg-auto">
            <li class="nav-item">
                <a href="{{ route('ayuda') }}" class="navbar-nav-link font-weight-semibold">
                    <span class="text-pink-400">
                            <i class="fas fa-question"></i> Ayuda</span>
                </a>
            </li>
        </ul>
    </div>
</div>