@extends('layouts.app')

@section('title', 'El cambio comienza aquí · Change Mario')

@section('content')
<main id="contenido">
    <section class="hero text-center px-3 pt-5 pb-4">
        <div class="container">
            <h1 class="hero-title mb-3">El cambio<br>comienza aquí<span class="text-red">.</span></h1>
            <p class="mb-4">Te ayudaremos a lograr el cambio que quieres ver.</p>

            <h2 class="fs-6 fw-bold mb-3">Iniciar una petición para…</h2>
            <form class="hero-textarea mx-auto" action="{{ route('pages.crear') }}">
                <label for="ideaPeticion" class="visually-hidden">Describe tu petición</label>
                <textarea id="ideaPeticion" name="idea" class="form-control form-control-chg"
                    placeholder="Es muy difícil moverse en silla de ruedas por mi barrio"></textarea>
                <button type="submit" class="btn btn-chg-primary btn-round d-flex align-items-center justify-content-center" aria-label="Continuar">
                    <i class="bi bi-arrow-right"></i>
                </button>
            </form>
            <a href="{{ route('pages.crear') }}" class="d-inline-block mt-3 text-white">
                Ya tengo el borrador de mi petición <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </section>

    <section class="container py-5">
        <h2 class="fs-5 text-center mb-4">Conoce a personas reales que están transformando sus comunidades.</h2>
        <div class="story-scroller">
            <a href="{{ route('pages.peticion') }}" class="story text-decoration-none text-white">
                <img src="{{ asset('img/story-1.svg') }}" alt="Vecina sosteniendo un cartel">
                <div><span class="story-badge"><span class="dot me-1"></span>Trending!</span></div>
                <p class="small text-muted-chg mt-2 mb-1">204.519 firmas</p>
                <p class="fw-bold small mb-0">Más pediatras en los centros de salud rurales</p>
            </a>
            <a href="{{ route('pages.peticion') }}" class="story text-decoration-none text-white">
                <img src="{{ asset('img/story-2.svg') }}" alt="Estudiante con un cartel">
                <div><span class="story-badge"><span class="dot bg-warning me-1"></span>Victory!</span></div>
                <p class="small text-muted-chg mt-2 mb-1">157.903 firmas</p>
                <p class="fw-bold small mb-0">Consiguen que la biblioteca abra en época de exámenes</p>
            </a>
            <a href="{{ route('pages.peticion') }}" class="story text-decoration-none text-white">
                <img src="{{ asset('img/story-3.svg') }}" alt="Voluntario en un parque">
                <div><span class="story-badge"><span class="dot bg-warning me-1"></span>Victory!</span></div>
                <p class="small text-muted-chg mt-2 mb-1">96.223 firmas</p>
                <p class="fw-bold small mb-0">El parque del río no se convertirá en aparcamiento</p>
            </a>
            <a href="{{ route('pages.peticion') }}" class="story text-decoration-none text-white">
                <img src="{{ asset('img/story-4.svg') }}" alt="Trabajadora con un cartel">
                <div><span class="story-badge"><span class="dot me-1"></span>Trending!</span></div>
                <p class="small text-muted-chg mt-2 mb-1">67.343 firmas</p>
                <p class="fw-bold small mb-0">Sombra y agua en las paradas de autobús en verano</p>
            </a>
            <a href="{{ route('pages.peticion') }}" class="story text-decoration-none text-white">
                <img src="{{ asset('img/story-5.svg') }}" alt="Madre e hijo con un cartel">
                <div><span class="story-badge"><span class="dot me-1"></span>Trending!</span></div>
                <p class="small text-muted-chg mt-2 mb-1">100.853 firmas</p>
                <p class="fw-bold small mb-0">Carril bici seguro hasta los institutos</p>
            </a>
        </div>
    </section>

    <section class="container py-5 text-center">
        <h2 class="fs-2 mb-5">Usar la plataforma de peticiones n.º 1 es fácil</h2>
        <div class="row justify-content-center">
        <div class="col-lg-9 steps">
        <div class="steps-bar d-none d-md-block"></div>
        <div class="row">
            <div class="col-12 col-md-4 mb-4 mb-md-0">
                <span class="step-number mb-3">1</span>
                <p class="fw-bold mb-1">Crea una petición en dos minutos</p>
                <p class="small text-muted-chg mb-0">Más de 2.000 nuevas cada día</p>
            </div>
            <div class="col-12 col-md-4 mb-4 mb-md-0">
                <span class="step-number mb-3">2</span>
                <p class="fw-bold mb-1">Consigue apoyo gracias a nuestra gran comunidad</p>
                <p class="small text-muted-chg mb-0">Más de 500.000 firmas diarias</p>
            </div>
            <div class="col-12 col-md-4 mb-4 mb-md-0">
                <span class="step-number mb-3">3</span>
                <p class="fw-bold mb-1">Llega hasta los responsables gracias a nuestra red</p>
                <p class="small text-muted-chg mb-0">Más de 1.000 notificados a diario</p>
            </div>
        </div>
        </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-7 col-lg-5">
            <button class="btn btn-chg-outline w-100 d-flex justify-content-between align-items-center text-start"
                type="button" data-bs-toggle="collapse" data-bs-target="#guias" aria-expanded="false"
                aria-controls="guias">
                Lee nuestros consejos y guías sobre cómo crear una petición
                <i class="bi bi-chevron-down ms-2"></i>
            </button>
            <div class="collapse" id="guias">
                <div class="d-grid gap-2 pt-3">
                    <a class="btn btn-chg-outline" href="{{ route('pages.crear') }}">Crea tu petición</a>
                    <a class="btn btn-chg-outline" href="#">Reúne firmas</a>
                    <a class="btn btn-chg-outline" href="#">Contacta a los medios</a>
                    <a class="btn btn-chg-outline" href="#">Involucra al destinatario de la petición</a>
                </div>
            </div>
            </div>
        </div>
    </section>

    <section class="container py-5">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
            <div>
                <h2 class="fs-1 mb-1">Apoya causas que te importan</h2>
                <p class="mb-0">Encuentra peticiones que afecten a tu comunidad.</p>
            </div>
            <a class="btn btn-chg-outline align-self-start align-self-md-center" href="{{ route('pages.peticiones') }}">Ver todos los temas</a>
        </div>

        <div class="d-flex flex-wrap gap-2 mb-4">
            <a class="chip" href="{{ route('pages.peticiones') }}">Sanidad <i class="bi bi-arrow-right"></i></a>
            <a class="chip" href="{{ route('pages.peticiones') }}">Animales <i class="bi bi-arrow-right"></i></a>
            <a class="chip" href="{{ route('pages.peticiones') }}">Medio Ambiente <i class="bi bi-arrow-right"></i></a>
            <a class="chip" href="{{ route('pages.peticiones') }}">Educación <i class="bi bi-arrow-right"></i></a>
            <a class="chip" href="{{ route('pages.peticiones') }}">Justicia Económica <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="row g-3">
            <div class="col-12 col-sm-6 col-lg-3">
                <article class="card card-chg h-100">
                    <img src="{{ asset('img/pet-parque.svg') }}" class="card-img-top" alt="Árboles de un parque">
                    <div class="card-body">
                        <span class="red-bar mb-3"></span>
                        <h3 class="card-title">
                            <a href="{{ route('pages.peticion') }}" class="stretched-link text-white text-decoration-none">
                                Salvemos el parque del barrio: ni un árbol menos
                            </a>
                        </h3>
                        <p class="small text-muted-chg mb-0"><i class="bi bi-vector-pen me-1"></i>55.962 firmas</p>
                    </div>
                </article>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <article class="card card-chg h-100">
                    <img src="{{ asset('img/pet-urgencias.svg') }}" class="card-img-top" alt="Cruz sanitaria">
                    <div class="card-body">
                        <span class="red-bar mb-3"></span>
                        <h3 class="card-title">
                            <a href="{{ route('pages.peticion') }}" class="stretched-link text-white text-decoration-none">
                                Reabrir las urgencias nocturnas del centro de salud
                            </a>
                        </h3>
                        <p class="small text-muted-chg mb-0"><i class="bi bi-vector-pen me-1"></i>33.854 firmas</p>
                    </div>
                </article>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <article class="card card-chg h-100">
                    <img src="{{ asset('img/pet-biblioteca.svg') }}" class="card-img-top" alt="Libro abierto">
                    <div class="card-body">
                        <span class="red-bar mb-3"></span>
                        <h3 class="card-title">
                            <a href="{{ route('pages.peticion') }}" class="stretched-link text-white text-decoration-none">
                                Bibliotecas abiertas 24 horas en época de exámenes
                            </a>
                        </h3>
                        <p class="small text-muted-chg mb-0"><i class="bi bi-vector-pen me-1"></i>66.138 firmas</p>
                    </div>
                </article>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <article class="card card-chg h-100">
                    <img src="{{ asset('img/pet-perros.svg') }}" class="card-img-top" alt="Huella de perro">
                    <div class="card-body">
                        <span class="red-bar mb-3"></span>
                        <h3 class="card-title">
                            <a href="{{ route('pages.peticion') }}" class="stretched-link text-white text-decoration-none">
                                Un refugio municipal digno para los animales abandonados
                            </a>
                        </h3>
                        <p class="small text-muted-chg mb-0"><i class="bi bi-vector-pen me-1"></i>100.853 firmas</p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="container py-5">
        <div class="mission p-4 p-md-5">
            <div class="row align-items-center g-4">
                <div class="col-12 col-md-6 order-2 order-md-1">
                    <h2 class="fs-1 mb-3">Impulsado por<br>personas, no beneficios</h2>
                    <p>Independiente y propiedad de una organización sin ánimo de lucro. Financiada íntegramente
                        por sus miembros: sin anuncios, accionistas ni intereses particulares.</p>
                    <a class="btn btn-chg-outline" href="#">Contribuir</a>
                </div>
                <div class="col-12 col-md-6 order-1 order-md-2 text-center">
                    <img src="{{ asset('img/mission.svg') }}" class="img-fluid" width="330"
                        alt="Ilustración de tres personas bajo una bandera">
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
