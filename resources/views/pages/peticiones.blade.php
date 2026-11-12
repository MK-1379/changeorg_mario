@extends('layouts.app')

@section('title', 'Descubre tu próxima causa · Change Mario')

@section('content')
<main id="contenido">
    <section class="search-hero container text-center py-5">
        <h1 class="mb-2">Descubre tu próxima causa</h1>
        <p class="fs-5 mb-4">Explora millones de peticiones y encuentra las que te interesan</p>
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <form class="d-flex gap-2" role="search" action="{{ route('pages.peticiones') }}">
                    <div class="search-box flex-grow-1">
                        <i class="bi bi-search"></i>
                        <label for="buscar" class="visually-hidden">Buscar peticiones</label>
                        <input id="buscar" name="q" type="search" class="form-control form-control-chg py-2"
                            placeholder="Buscar peticiones">
                    </div>
                    <button class="btn btn-chg-primary px-4" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </section>

    <section class="container pb-4">
        <h2 class="fs-4 mb-3">Explorar</h2>
        <div class="row g-3">
            <div class="col-4">
                <a href="#populares" class="explore-card d-flex flex-column align-items-center gap-2 p-3 p-md-4 h-100 text-center">
                    <i class="bi bi-geo-alt"></i>
                    <span class="fw-bold small">Cerca de ti</span>
                </a>
            </div>
            <div class="col-4">
                <a href="#populares" class="explore-card d-flex flex-column align-items-center gap-2 p-3 p-md-4 h-100 text-center">
                    <i class="bi bi-graph-up-arrow"></i>
                    <span class="fw-bold small">Populares</span>
                </a>
            </div>
            <div class="col-4">
                <a href="#populares" class="explore-card d-flex flex-column align-items-center gap-2 p-3 p-md-4 h-100 text-center">
                    <i class="bi bi-flag"></i>
                    <span class="fw-bold small">Victorias</span>
                </a>
            </div>
        </div>
    </section>

    <section class="container py-4">
        <h2 class="fs-4 mb-3">Temas</h2>
        <div class="d-flex flex-wrap gap-2">
            <a class="chip chip-blue" href="#populares">Política y Gobierno</a>
            <a class="chip chip-blue" href="#populares">Políticas Públicas</a>
            <a class="chip chip-blue" href="#populares">Gobierno Local</a>
            <a class="chip chip-blue" href="#populares">Medioambiente</a>
            <a class="chip chip-blue" href="#populares">Bienestar y Salud</a>
            <a class="chip chip-blue" href="#populares">Educación</a>
            <a class="chip chip-blue" href="#populares">Negocios y Economía</a>
            <a class="chip chip-blue" href="#populares">Derechos de los Animales</a>
            <a class="chip chip-blue" href="#populares">Justicia Penal</a>
            <a class="chip chip-blue" href="#populares">Bienestar de Familias y Niños</a>
            <a class="chip chip-blue" href="#populares">Salud Pública</a>
            <a class="chip chip-blue" href="#populares">Discapacidad</a>
            <a class="chip chip-blue" href="#populares">Deportes</a>
            <a class="chip chip-blue" href="#populares">Tecnología</a>
            <a class="chip chip-blue" href="#populares">Cuestiones Estudiantiles</a>
            <a class="chip chip-blue" href="#populares">Derechos de las Mujeres</a>
            <a class="chip chip-blue" href="#populares">Contaminación del Agua</a>
        </div>
    </section>

    <section class="container py-5" id="populares">
        <h2 class="fs-4 mb-4">Peticiones populares</h2>
        <div class="row g-4">
            <div class="col-12 col-md-6 col-lg-4">
                <article class="card card-chg h-100">
                    <img src="{{ asset('img/pet-carril-bici.svg') }}" class="card-img-top" alt="Bicicleta">
                    <div class="card-body d-flex flex-column">
                        <p class="card-sponsor mb-1">Patrocinada por 12 firmantes</p>
                        <h3 class="card-title">
                            <a href="{{ route('pages.peticion') }}" class="text-white text-decoration-none">Carril bici seguro hasta los institutos</a>
                        </h3>
                        <p class="fw-semibold mt-auto mb-3"><i class="bi bi-vector-pen me-1"></i>100.853 firmas</p>
                        <a href="{{ route('pages.peticion') }}#firmar" class="btn btn-chg-outline w-100">Firma esta petición</a>
                    </div>
                </article>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <article class="card card-chg h-100">
                    <img src="{{ asset('img/pet-perros.svg') }}" class="card-img-top" alt="Huella de perro">
                    <div class="card-body d-flex flex-column">
                        <p class="card-sponsor mb-1">Patrocinada por 172 firmantes</p>
                        <h3 class="card-title">
                            <a href="{{ route('pages.peticion') }}" class="text-white text-decoration-none">¡Un refugio digno para los animales abandonados!</a>
                        </h3>
                        <p class="fw-semibold mt-auto mb-3"><i class="bi bi-vector-pen me-1"></i>9.608 firmas</p>
                        <a href="{{ route('pages.peticion') }}#firmar" class="btn btn-chg-outline w-100">Firma esta petición</a>
                    </div>
                </article>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <article class="card card-chg h-100">
                    <img src="{{ asset('img/pet-jovenes.svg') }}" class="card-img-top" alt="Megáfono">
                    <div class="card-body d-flex flex-column">
                        <p class="card-sponsor mb-1">Patrocinada por 1 firmante</p>
                        <h3 class="card-title">
                            <a href="{{ route('pages.peticion') }}" class="text-white text-decoration-none">Un centro joven abierto los fines de semana</a>
                        </h3>
                        <p class="fw-semibold mt-auto mb-3"><i class="bi bi-vector-pen me-1"></i>23 firmas</p>
                        <a href="{{ route('pages.peticion') }}#firmar" class="btn btn-chg-outline w-100">Firma esta petición</a>
                    </div>
                </article>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <article class="card card-chg h-100">
                    <img src="{{ asset('img/pet-vivienda.svg') }}" class="card-img-top" alt="Casa">
                    <div class="card-body d-flex flex-column">
                        <p class="card-sponsor mb-1">Patrocinada por 1 firmante</p>
                        <h3 class="card-title">
                            <a href="{{ route('pages.peticion') }}" class="text-white text-decoration-none">Alquileres asequibles para estudiantes de FP</a>
                        </h3>
                        <p class="fw-semibold mt-auto mb-3"><i class="bi bi-vector-pen me-1"></i>491 firmas</p>
                        <a href="{{ route('pages.peticion') }}#firmar" class="btn btn-chg-outline w-100">Firma esta petición</a>
                    </div>
                </article>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <article class="card card-chg h-100">
                    <img src="{{ asset('img/pet-agua.svg') }}" class="card-img-top" alt="Gota de agua">
                    <div class="card-body d-flex flex-column">
                        <p class="card-sponsor mb-1">Patrocinada por 34 firmantes</p>
                        <h3 class="card-title">
                            <a href="{{ route('pages.peticion') }}" class="text-white text-decoration-none">Fuentes de agua potable en todos los parques</a>
                        </h3>
                        <p class="fw-semibold mt-auto mb-3"><i class="bi bi-vector-pen me-1"></i>3.120 firmas</p>
                        <a href="{{ route('pages.peticion') }}#firmar" class="btn btn-chg-outline w-100">Firma esta petición</a>
                    </div>
                </article>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <article class="card card-chg h-100">
                    <img src="{{ asset('img/pet-biblioteca.svg') }}" class="card-img-top" alt="Libro abierto">
                    <div class="card-body d-flex flex-column">
                        <p class="card-sponsor mb-1">Patrocinada por 5 firmantes</p>
                        <h3 class="card-title">
                            <a href="{{ route('pages.peticion') }}" class="text-white text-decoration-none">Bibliotecas abiertas 24 horas en época de exámenes</a>
                        </h3>
                        <p class="fw-semibold mt-auto mb-3"><i class="bi bi-vector-pen me-1"></i>66.138 firmas</p>
                        <a href="{{ route('pages.peticion') }}#firmar" class="btn btn-chg-outline w-100">Firma esta petición</a>
                    </div>
                </article>
            </div>
        </div>

        <div class="text-center mt-5">
            <button type="button" class="btn btn-chg-outline px-5">Cargar más</button>
        </div>
    </section>
</main>
@endsection
