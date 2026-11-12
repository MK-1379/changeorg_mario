@extends('layouts.app')

@section('title', 'Empieza una petición · Change Mario')

@section('content')
<main id="contenido" class="py-3 py-md-4">
    <form id="formCrear" class="needs-validation" novalidate>
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-lg-8">
            <div class="create-panel overflow-hidden">
                <div class="create-title-block px-3 px-md-5 pt-5 pb-4">
                    <span class="red-bar mb-3"></span>
                    <label for="titulo" class="form-label small">Título</label>
                    <textarea id="titulo" name="titulo" class="form-control form-control-chg title-input"
                    placeholder="Tu título único" maxlength="90" required></textarea>
                    <div class="invalid-feedback">Escribe un título para tu petición.</div>
                    <small class="d-block text-end text-muted-chg mt-1"><span id="contadorTitulo">0</span>/90</small>
                </div>

                <div class="px-3 px-md-5 py-4">
                    <div class="mb-5">
                        <h2 class="form-section-title mb-1">Añade una imagen</h2>
                        <p class="small text-muted-chg">Las peticiones con imagen consiguen hasta seis veces más firmas.</p>
                        <label for="imagen" class="image-drop d-flex flex-column align-items-center gap-2 p-4 text-center">
                            <i class="bi bi-upload fs-2"></i>
                            <span class="fw-semibold">Usar mi foto</span>
                            <span class="small text-muted-chg">JPG o PNG, mínimo 1200 × 675 px</span>
                        </label>
                        <input type="file" id="imagen" name="imagen" class="visually-hidden" accept="image/png, image/jpeg">
                        <p id="nombreImagen" class="small mt-2 mb-0"></p>
                    </div>

                    <div class="mb-5">
                        <h2 class="form-section-title mb-3"><label for="causa">La causa</label></h2>
                        <div class="editor-toolbar d-flex flex-wrap gap-1 p-1" role="toolbar" aria-label="Formato de texto">
                            <button type="button" aria-label="Negrita"><i class="bi bi-type-bold"></i></button>
                            <button type="button" aria-label="Cursiva"><i class="bi bi-type-italic"></i></button>
                            <span class="vr mx-1"></span>
                            <button type="button" aria-label="Lista numerada"><i class="bi bi-list-ol"></i></button>
                            <button type="button" aria-label="Lista"><i class="bi bi-list-ul"></i></button>
                            <span class="vr mx-1"></span>
                            <button type="button" aria-label="Enlace"><i class="bi bi-link-45deg"></i></button>
                            <button type="button" aria-label="Vídeo"><i class="bi bi-play-btn"></i></button>
                            <button type="button" aria-label="Imagen"><i class="bi bi-image"></i></button>
                            <button type="button" aria-label="Ayuda"><i class="bi bi-question-circle"></i></button>
                        </div>
                        <textarea id="causa" name="causa" class="form-control form-control-chg editor-area"
                            placeholder="Explica el problema, por qué es importante y qué solución propones."
                            minlength="50" required></textarea>
                        <div class="invalid-feedback">Cuenta tu causa con al menos 50 caracteres.</div>
                    </div>

                    <fieldset class="mb-5">
                        <legend class="form-section-title mb-3">¿Dónde quieres lograr el cambio?</legend>
                        <div class="row g-2">
                            <div class="col-12 col-sm-4">
                                <input type="radio" class="btn-check" name="ambito" id="ambitoLocal" value="local" checked>
                                <label class="scope-option d-flex flex-sm-column align-items-center gap-2 p-3 text-sm-center" for="ambitoLocal">
                                    <i class="bi bi-geo-alt"></i><span><strong>Local</strong><br><span class="small text-muted-chg">Mi barrio o ciudad</span></span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-4">
                                <input type="radio" class="btn-check" name="ambito" id="ambitoNacional" value="nacional">
                                <label class="scope-option d-flex flex-sm-column align-items-center gap-2 p-3 text-sm-center" for="ambitoNacional">
                                    <i class="bi bi-flag"></i><span><strong>Nacional</strong><br><span class="small text-muted-chg">Todo el país</span></span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-4">
                                <input type="radio" class="btn-check" name="ambito" id="ambitoGlobal" value="global">
                                <label class="scope-option d-flex flex-sm-column align-items-center gap-2 p-3 text-sm-center" for="ambitoGlobal">
                                    <i class="bi bi-globe2"></i><span><strong>Global</strong><br><span class="small text-muted-chg">Varios países</span></span>
                                </label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="ubicacionCrear" class="form-label">Ubicación</label>
                            <input type="text" id="ubicacionCrear" name="ubicacion" class="form-control form-control-chg"
                                placeholder="Ej.: Logroño, La Rioja" required>
                            <div class="invalid-feedback">Indica la ubicación.</div>
                        </div>
                    </fieldset>

                    <fieldset class="mb-5">
                        <legend class="form-section-title mb-1">¿Sobre qué tema trata?</legend>
                        <p class="small text-muted-chg">Elige uno o varios.</p>
                        <div class="d-flex flex-wrap gap-2">
                            <input type="checkbox" class="btn-check" id="temaSanidad" name="tema" value="sanidad">
                            <label class="chip" for="temaSanidad">Sanidad</label>
                            <input type="checkbox" class="btn-check" id="temaEducacion" name="tema" value="educacion">
                            <label class="chip" for="temaEducacion">Educación</label>
                            <input type="checkbox" class="btn-check" id="temaMedio" name="tema" value="medioambiente">
                            <label class="chip" for="temaMedio">Medio Ambiente</label>
                            <input type="checkbox" class="btn-check" id="temaAnimales" name="tema" value="animales">
                            <label class="chip" for="temaAnimales">Animales</label>
                            <input type="checkbox" class="btn-check" id="temaTransporte" name="tema" value="transporte">
                            <label class="chip" for="temaTransporte">Transporte</label>
                            <input type="checkbox" class="btn-check" id="temaVivienda" name="tema" value="vivienda">
                            <label class="chip" for="temaVivienda">Vivienda</label>
                        </div>
                    </fieldset>

                    <div class="mb-5">
                        <h2 class="form-section-title mb-1"><label for="destinatario">¿Quién puede hacer realidad este cambio?</label></h2>
                        <p class="small text-muted-chg">La persona u organismo con poder para tomar la decisión.</p>
                        <input type="text" id="destinatario" name="destinatario" class="form-control form-control-chg"
                            placeholder="Ej.: Ayuntamiento de Logroño" required>
                        <div class="invalid-feedback">Indica a quién va dirigida la petición.</div>
                    </div>

                    <fieldset class="mb-4">
                        <legend class="form-section-title mb-3">Tus datos</legend>
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label for="nombreCrear" class="form-label">Nombre</label>
                                <input type="text" id="nombreCrear" name="nombre" class="form-control form-control-chg"
                                    autocomplete="given-name" required>
                                <div class="invalid-feedback">Escribe tu nombre.</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="apellidosCrear" class="form-label">Apellidos</label>
                                <input type="text" id="apellidosCrear" name="apellidos" class="form-control form-control-chg"
                                    autocomplete="family-name" required>
                                <div class="invalid-feedback">Escribe tus apellidos.</div>
                            </div>
                            <div class="col-12">
                                <label for="emailCrear" class="form-label">Correo electrónico</label>
                                <input type="email" id="emailCrear" name="email" class="form-control form-control-chg"
                                    autocomplete="email" required>
                                <div class="invalid-feedback">Introduce un correo válido.</div>
                            </div>
                        </div>
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" id="condiciones" name="condiciones" required>
                            <label class="form-check-label small" for="condiciones">Acepto las Condiciones de servicio
                                y la Política de privacidad</label>
                            <div class="invalid-feedback">Debes aceptar las condiciones.</div>
                        </div>
                    </fieldset>

                    <div id="crearOk" class="alert alert-success d-none" role="status">
                        <i class="bi bi-check-circle-fill me-1"></i>¡Petición creada! (simulación: no se guarda ningún dato)
                    </div>
                </div>
            </div>
            </div>
            </div>
        </div>

        <div class="create-bottom-bar mt-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 d-flex justify-content-end gap-2 py-3">
                        <a href="{{ route('home') }}" class="btn btn-chg-outline px-4">Volver</a>
                        <button type="submit" class="btn btn-chg-primary px-4">Publicar petición</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
@endsection
