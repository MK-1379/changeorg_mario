@extends('layouts.app')

@section('title', 'Petición · Carril bici seguro hasta los institutos · Change Mario')

@section('content')
<main id="contenido">
    <div class="container-lg px-0 px-md-3 py-md-4">
        <div class="row g-0 g-lg-4">
            <div class="col-12 col-lg-8">
                <header class="petition-hero d-flex align-items-end">
                    <div class="p-3 p-md-4">
                        <span class="red-bar mb-3"></span>
                        <h1 class="petition-title mb-0">Pido un carril bici seguro hasta los institutos de mi ciudad</h1>
                    </div>
                </header>

                <div class="px-3 px-md-0">
                    <div class="d-lg-none py-4 border-bottom">
                        <p class="mb-1"><span class="sign-count">100.853</span>
                            <i class="bi bi-patch-check-fill text-info ms-1"></i></p>
                        <div class="progress progress-chg mb-2" role="progressbar" aria-label="Progreso de firmas"
                            aria-valuenow="67" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar" style="width: 67%"></div>
                        </div>
                        <p class="small text-muted-chg mb-0">Firmas verificadas · Próximo objetivo: 150.000</p>
                    </div>

                    <div class="d-flex flex-column flex-sm-row gap-3 py-4">
                        <div class="d-flex align-items-center gap-2">
                            <img src="{{ asset('img/story-2.svg') }}" alt="" width="40" height="40" class="rounded-circle">
                            <div class="small">
                                <span class="text-muted-chg">Iniciada por</span><br>
                                <strong>Lucía Martínez</strong>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <span class="update-icon"><i class="bi bi-bank"></i></span>
                            <div class="small">
                                <span class="text-muted-chg">Dirigida a</span><br>
                                <strong>Ayuntamiento · Concejalía de Movilidad</strong>
                            </div>
                        </div>
                    </div>

                    <section class="pb-4">
                        <h2 class="fs-1 mb-3">El problema</h2>
                        <p>Cada día cientos de estudiantes vamos en bici al instituto compartiendo carril con coches y
                            autobuses. El curso pasado hubo varios accidentes en la avenida principal y muchas familias
                            ya no dejan a sus hijos ir en bici por miedo.</p>
                        <p>Pedimos al Ayuntamiento que construya un <strong>carril bici segregado y continuo</strong>
                            que conecte los barrios con los institutos, con aparcabicis cubiertos en cada centro.</p>
                        <p>Ir en bici es más sano, más barato y contamina menos. Solo necesitamos poder hacerlo sin
                            jugarnos la vida. <strong>Firma y comparte esta petición</strong> para que nos escuchen.</p>
                        <p class="small text-muted-chg mb-0"><i class="bi bi-calendar3 me-1"></i>Creada el 3 de
                            octubre de 2026</p>
                    </section>
                </div>

                <section class="py-4 border-top border-bottom mx-3 mx-md-0">
                    <h2 class="fs-3 mb-4">Opiniones de firmantes</h2>
                    <div class="d-flex gap-3 overflow-auto pb-3">
                        <article class="opinion-card p-4 d-flex flex-column">
                            <i class="bi bi-quote fs-2"></i>
                            <blockquote class="mb-3">Mi hija va en bici todos los días y cada mañana salgo con el
                                corazón en un puño. Necesitamos este carril ya.</blockquote>
                            <p class="small text-end mb-3"><strong>Marta,</strong> Logroño</p>
                            <div class="mt-auto d-flex gap-3">
                                <button class="btn btn-sm text-white p-0" type="button" aria-label="Me gusta">
                                    <i class="bi bi-heart me-1"></i>9</button>
                                <button class="btn btn-sm text-white p-0" type="button" aria-label="Más opciones">
                                    <i class="bi bi-three-dots"></i></button>
                            </div>
                        </article>
                        <article class="opinion-card p-4 d-flex flex-column">
                            <i class="bi bi-quote fs-2"></i>
                            <blockquote class="mb-3">Soy profesor y veo cómo los alumnos llegan esquivando coches.
                                Una ciudad que cuida a sus jóvenes tiene carriles seguros.</blockquote>
                            <p class="small text-end mb-3"><strong>Javier,</strong> Haro</p>
                            <div class="mt-auto d-flex gap-3">
                                <button class="btn btn-sm text-white p-0" type="button" aria-label="Me gusta">
                                    <i class="bi bi-heart me-1"></i>6</button>
                                <button class="btn btn-sm text-white p-0" type="button" aria-label="Más opciones">
                                    <i class="bi bi-three-dots"></i></button>
                            </div>
                        </article>
                        <article class="opinion-card p-4 d-flex flex-column">
                            <i class="bi bi-quote fs-2"></i>
                            <blockquote class="mb-3">Firmo porque yo también tuve un susto con un autobús. No
                                puede volver a pasar.</blockquote>
                            <p class="small text-end mb-3"><strong>Iker,</strong> Calahorra</p>
                            <div class="mt-auto d-flex gap-3">
                                <button class="btn btn-sm text-white p-0" type="button" aria-label="Me gusta">
                                    <i class="bi bi-heart me-1"></i>2</button>
                                <button class="btn btn-sm text-white p-0" type="button" aria-label="Más opciones">
                                    <i class="bi bi-three-dots"></i></button>
                            </div>
                        </article>
                    </div>
                    <div class="text-center mt-3">
                        <a href="#" class="btn btn-chg-outline">Consulta la opinión de todos los firmantes</a>
                    </div>
                </section>

                <section class="py-4 px-3 px-md-0">
                    <h2 class="fs-3 mb-4">Actualizaciones de la petición</h2>
                    <ul class="list-unstyled d-grid gap-2 mb-0">
                        <li class="update-item d-flex align-items-center gap-3 p-3">
                            <span class="update-icon"><i class="bi bi-vector-pen"></i></span>
                            <div><strong>¡100.000 firmantes!</strong><br><span class="small text-muted-chg">hace 2 días</span></div>
                        </li>
                        <li class="update-item d-flex align-items-center gap-3 p-3">
                            <span class="update-icon"><i class="bi bi-megaphone"></i></span>
                            <div><strong>El pleno municipal debatirá la propuesta</strong><br><span class="small text-muted-chg">hace 1 semana</span></div>
                        </li>
                        <li class="update-item d-flex align-items-center gap-3 p-3">
                            <span class="update-icon"><i class="bi bi-vector-pen"></i></span>
                            <div><strong>¡50.000 firmantes!</strong><br><span class="small text-muted-chg">hace 3 semanas</span></div>
                        </li>
                    </ul>
                </section>

                <section class="py-4 px-3 px-md-0">
                    <h2 class="fs-3 mb-3">Compartir esta petición</h2>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="#" class="btn btn-chg-outline"><i class="bi bi-whatsapp me-2"></i>WhatsApp</a>
                        <a href="#" class="btn btn-chg-outline"><i class="bi bi-facebook me-2"></i>Facebook</a>
                        <a href="#" class="btn btn-chg-outline"><i class="bi bi-twitter-x me-2"></i>X</a>
                        <a href="#" class="btn btn-chg-outline"><i class="bi bi-link-45deg me-2"></i>Copiar enlace</a>
                    </div>
                </section>
            </div>

            <aside class="col-12 col-lg-4 px-3 px-md-0" id="firmar">
                <div class="sign-card sign-card-sticky p-4 my-4 my-lg-0">
                    <div class="text-center border-bottom pb-3 mb-3 d-none d-lg-block">
                        <p class="mb-0"><span class="sign-count">100.853</span>
                            <i class="bi bi-patch-check-fill text-info ms-1"></i></p>
                        <p class="small mb-2">Firmas verificadas</p>
                        <div class="progress progress-chg" role="progressbar" aria-label="Progreso de firmas"
                            aria-valuenow="67" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar" style="width: 67%"></div>
                        </div>
                    </div>

                    <h2 class="fs-4 mb-3">Firma esta petición</h2>
                    <form id="formFirma" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control form-control-chg"
                                autocomplete="given-name" required>
                            <div class="invalid-feedback">Escribe tu nombre.</div>
                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" id="apellidos" name="apellidos" class="form-control form-control-chg"
                                autocomplete="family-name" required>
                            <div class="invalid-feedback">Escribe tus apellidos.</div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" id="email" name="email" class="form-control form-control-chg"
                                autocomplete="email" required>
                            <div class="invalid-feedback">Introduce un correo válido.</div>
                        </div>
                        <div class="mb-3">
                            <label for="ubicacion" class="form-label">Ubicación</label>
                            <input type="text" id="ubicacion" name="ubicacion" class="form-control form-control-chg"
                                value="Logroño, 26007 España" autocomplete="address-level2">
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="avisos" id="avisosSi" value="si" required>
                            <label class="form-check-label" for="avisosSi">Quiero saber si esta petición gana y cómo
                                puedo ayudar a otras peticiones ciudadanas</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="avisos" id="avisosNo" value="no" required>
                            <label class="form-check-label" for="avisosNo">No quiero saber cómo avanza esta petición
                                ni otras peticiones importantes</label>
                            <div class="invalid-feedback">Elige una opción.</div>
                        </div>

                        <button type="submit" class="btn btn-chg-primary w-100 py-3">
                            <i class="bi bi-vector-pen d-block fs-5"></i>Firma la petición
                        </button>
                        <p class="small text-muted-chg mt-3 mb-0">Al firmar, aceptas las Condiciones de servicio y
                            la Política de privacidad. (Réplica: no se envía ningún dato.)</p>
                    </form>

                    <div id="firmaOk" class="alert alert-success d-none mb-0" role="status">
                        <i class="bi bi-check-circle-fill me-1"></i>¡Gracias por firmar!
                    </div>
                </div>
            </aside>
        </div>
    </div>

    <div class="mobile-sign-bar d-lg-none p-3">
        <a href="#firmar" class="btn btn-chg-primary w-100">Firma la petición</a>
    </div>
</main>
@endsection
