const formularios = document.querySelectorAll('.needs-validation');

formularios.forEach((formulario) => {
    formulario.addEventListener('submit', (e) => {
        e.preventDefault();
        formulario.classList.add('was-validated');

        if (formulario.checkValidity()) {
            mostrarMensajeOk(formulario);
        }
    });
});

const mostrarMensajeOk = (formulario) => {
    if (formulario.id === 'formFirma') {
        formulario.classList.add('d-none');
        document.getElementById('firmaOk').classList.remove('d-none');
    }

    if (formulario.id === 'formCrear') {
        document.getElementById('crearOk').classList.remove('d-none');
    }
}

const titulo = document.getElementById('titulo');
const contador = document.getElementById('contadorTitulo');

if (titulo) {
    titulo.addEventListener('input', () => {
        contador.textContent = titulo.value.length;
    });
}

const imagen = document.getElementById('imagen');
const nombreImagen = document.getElementById('nombreImagen');

if (imagen) {
    imagen.addEventListener('change', () => {
        if (imagen.files.length > 0) {
            nombreImagen.textContent = 'Imagen seleccionada: ' + imagen.files[0].name;
        }
    });
}