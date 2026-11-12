<nav class="navbar navbar-expand-lg navbar-chg sticky-top">
    <div class="container-fluid px-3 px-lg-4">
        <a class="brand-logo me-lg-4" href="{{ route('home') }}">change.org</a>
        <div class="d-flex align-items-center gap-1 ms-auto d-lg-none">
            <a class="btn btn-chg-outline btn-sm py-2 px-2" href="{{ route('pages.crear') }}">Inicia una petición</a>
            <a class="btn text-white px-2" href="{{ route('pages.peticiones') }}" aria-label="Buscar peticiones">
                <i class="bi bi-search"></i>
            </a>
            <button class="navbar-toggler border-0 px-1" type="button" data-bs-toggle="collapse"
                data-bs-target="#menuPrincipal" aria-controls="menuPrincipal" aria-expanded="false"
                aria-label="Abrir menú">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="menuPrincipal">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('pages.peticiones') }}">Mis peticiones</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Programa de socios/as</a></li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('pages.peticiones')) active @endif" href="{{ route('pages.peticiones') }}"><i class="bi bi-search me-1"></i>Buscar</a>
                </li>
                <li class="nav-item d-lg-none"><a class="nav-link" href="#">Entrar</a></li>
            </ul>
            <div class="d-none d-lg-flex align-items-center gap-3">
                <a class="btn btn-chg-outline btn-sm py-2 px-3" href="{{ route('pages.crear') }}">Inicia una petición</a>
                <a class="nav-link fw-semibold" href="#">Entrar</a>
            </div>
        </div>
    </div>
</nav>
