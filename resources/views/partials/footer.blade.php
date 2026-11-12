<footer class="footer-chg mt-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-6 col-md-4 col-lg">
                <h2>Participa</h2>
                <ul class="list-unstyled d-grid gap-2 mb-0">
                    <li><a href="{{ route('pages.crear') }}">Inicia una petición</a></li>
                    <li><a href="{{ route('pages.peticiones') }}">Busca por tema</a></li>
                    <li><a href="{{ route('pages.peticiones') }}">Busca peticiones</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-4 col-lg">
                <h2>Aprende</h2>
                <ul class="list-unstyled d-grid gap-2 mb-0">
                    <li><a href="#">Guías para peticiones</a></li>
                    <li><a href="{{ route('pages.crear') }}">Crea tu petición</a></li>
                    <li><a href="#">Reúne firmas</a></li>
                    <li><a href="#">Contacta a los medios</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-4 col-lg">
                <h2>Sobre nosotros</h2>
                <ul class="list-unstyled d-grid gap-2 mb-0">
                    <li><a href="#">Sobre Change.org</a></li>
                    <li><a href="#">Visión</a></li>
                    <li><a href="#">Equipo</a></li>
                    <li><a href="#">Prensa</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-4 col-lg">
                <h2>Ayuda y aspectos legales</h2>
                <ul class="list-unstyled d-grid gap-2 mb-0">
                    <li><a href="#">Centro de ayuda</a></li>
                    <li><a href="#">Normas de la comunidad</a></li>
                    <li><a href="#">Política de privacidad</a></li>
                    <li><a href="#">Política de cookies</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-4 col-lg">
                <h2>Síguenos</h2>
                <ul class="list-unstyled d-grid gap-2 mb-0">
                    <li><a href="#"><i class="bi bi-instagram me-1"></i>Instagram</a></li>
                    <li><a href="#"><i class="bi bi-twitter-x me-1"></i>X</a></li>
                    <li><a href="#"><i class="bi bi-facebook me-1"></i>Facebook</a></li>
                    <li><a href="#"><i class="bi bi-tiktok me-1"></i>TikTok</a></li>
                </ul>
            </div>
        </div>

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mt-5 pt-4 border-top">
            <p class="small text-muted-chg mb-0">© 2026 Réplica académica (2º DAW). No afiliada a Change.org.</p>
            <div>
                <label for="idioma" class="visually-hidden">Idioma</label>
                <select id="idioma" class="form-select form-select-sm">
                    <option selected>Español (España)</option>
                    <option>English (United States)</option>
                    <option>Português (Brasil)</option>
                </select>
            </div>
        </div>
    </div>
</footer>
