# Change.org Mario – Peticiones con Laravel

Réplica de [Change.org](https://www.change.org) hecha con **Laravel 12** para el módulo de Desarrollo Web en Entorno Servidor (DWES) de 2º de DAW. Tiene una API REST para registrar usuarios, crear peticiones clasificadas por categorías, firmarlas, cambiar su estado y borrarlas mientras no tengan firmas, y una parte web con vistas Blade maquetadas con Bootstrap 5.

El proyecto se puede ejecutar con **XAMPP** o desplegar con **Docker** (Apache + PHP y MariaDB en contenedores).

> **Estado:** la API REST está completa. Las vistas web están maquetadas pero todavía muestran contenido de ejemplo; falta conectarlas con la base de datos y añadir la autenticación. Consulta el [estado del proyecto](#estado-del-proyecto).

## Modelo de datos

| Relación | Modelos | Cómo se implementa |
| --- | --- | --- |
| Uno a muchos (1:N) | `User` – `Peticione` | Un usuario crea muchas peticiones. FK `user_id` en `peticiones` |
| Uno a muchos (1:N) | `Categoria` – `Peticione` | Una categoría agrupa muchas peticiones. FK `categoria_id` en `peticiones` |
| Muchos a muchos (N:M) | `User` – `Peticione` | Un usuario firma muchas peticiones y una petición tiene muchos firmantes. Tabla pivote `peticione_user` con clave primaria compuesta |
| Uno a muchos (1:N) | `Peticione` – `File` | Una petición puede tener varios archivos, que se borran en cascada con ella |

Las claves foráneas existen en MySQL (`foreignId()->constrained()`), no solo en Eloquent. Por eso la migración de `categorias` se ejecuta antes que la de `peticiones`.

**¿Por qué `Peticione` y no `Peticion`?** Laravel deduce el nombre de la tabla poniendo el modelo en plural inglés (añadiendo una `s`). Con `Peticion` buscaría la tabla `peticions`; con `Peticione` busca `peticiones`, que es la tabla real. Lo mismo ocurre con la clave foránea (`peticione_id`) y la tabla pivote (`peticione_user`).

## Tecnologías

- PHP 8.2+ (8.3 en la imagen de Docker)
- Laravel 12
- MySQL / MariaDB
- Laravel Sanctum
- Blade + Bootstrap 5.3 y Bootstrap Icons (desde CDN)
- Docker y Docker Compose
- Insomnia / Postman para probar la API

## Instalación con XAMPP

```bash
git clone https://github.com/MK-1379/changeorg_mario.git
cd changeorg_mario
composer install
cp .env.example .env
php artisan key:generate
```

Configura la base de datos en el `.env` (ajusta el puerto si tu MySQL no usa el 3306):

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_change_mario
DB_USERNAME=root
DB_PASSWORD=
```

Crea la base de datos vacía `laravel_change_mario` y ejecuta:

```bash
php artisan migrate
php artisan serve
```

La web queda en `http://localhost:8000` y la API en `http://localhost:8000/api`.

## Despliegue con Docker

La aplicación se despliega en dos contenedores conectados:

```
Navegador / Insomnia  →  localhost:8000  →  change-app (Apache + PHP 8.3 + Laravel)
                                                   ↓  DB_HOST=db
                                            change-db (MariaDB 11) + volumen datos-change
```

### Ficheros

| Fichero | Para qué sirve |
| --- | --- |
| `Dockerfile` | Construye la imagen de la aplicación a partir de `php:8.3-apache`: instala `pdo_mysql`, activa `mod_rewrite`, apunta Apache a `public/` y ejecuta `composer install --no-dev` |
| `docker-compose.yml` | Define los servicios `app` y `db`, el puerto `8000:80` y el volumen `datos-change` para la base de datos |
| `.dockerignore` | Excluye `vendor`, `node_modules`, `.git` y los ficheros `.env` de la imagen |
| `.env.docker` | Configuración de Laravel y credenciales de MariaDB para Docker. **No se sube a Git** |

### Configuración

Crea en la raíz del proyecto un fichero `.env.docker` con este contenido (cambia las contraseñas):

```env
APP_NAME=ChangeMario
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel_change_mario
DB_USERNAME=mario
DB_PASSWORD=cambia_esta_password

MARIADB_ROOT_PASSWORD=cambia_esta_password_root
MARIADB_DATABASE=laravel_change_mario
MARIADB_USER=mario
MARIADB_PASSWORD=cambia_esta_password

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
LOG_CHANNEL=stderr
```

- `DB_HOST=db` es el nombre del servicio de MariaDB en `docker-compose.yml`. Docker lo resuelve por DNS dentro de la red del proyecto.
- `LOG_CHANNEL=stderr` hace que los errores de Laravel aparezcan en `docker compose logs app`.
- Las variables `MARIADB_*` solo se aplican la primera vez que se crea el volumen.

### Puesta en marcha

Con Docker Desktop abierto, desde la raíz del proyecto:

```bash
# 1. Construir la imagen
docker compose build

# 2. Generar la clave y pegarla en APP_KEY del .env.docker
docker compose run --rm app php artisan key:generate --show

# 3. Levantar los contenedores
docker compose up -d

# 4. Crear las tablas (cuando MariaDB haya arrancado)
docker compose exec app php artisan migrate
```

La web queda en `http://localhost:8000` y la API en `http://localhost:8000/api`. Los datos se guardan en el volumen `datos-change`, así que se conservan aunque se borren los contenedores.

### Comandos habituales

| Para | Comando |
| --- | --- |
| Arrancar | `docker compose up -d` |
| Parar y borrar los contenedores (los datos se mantienen) | `docker compose down` |
| Aplicar cambios en el código | `docker compose up -d --build` |
| Ver los errores de Laravel | `docker compose logs app` |
| Ejecutar un comando de Artisan | `docker compose exec app php artisan ...` |
| Borrar también la base de datos | `docker compose down -v` |

El código se copia dentro de la imagen al construirla. Por eso, después de cambiar cualquier fichero hay que reconstruir con `--build`.

## Vistas web

La maquetación viene de un ejercicio previo de Bootstrap, convertido a Blade con un layout común:

| URL | Ruta | Vista | Contenido |
| --- | --- | --- | --- |
| `/` | `home` | `pages/home.blade.php` | Portada con historias destacadas, pasos y peticiones por tema |
| `/descubre` | `pages.peticiones` | `pages/peticiones.blade.php` | Buscador, temas y peticiones populares |
| `/peticion-ejemplo` | `pages.peticion` | `pages/peticion.blade.php` | Detalle de una petición con formulario de firma |
| `/crear` | `pages.crear` | `pages/crear.blade.php` | Formulario para iniciar una petición |

Todas heredan de `layouts/app.blade.php`, que incluye la barra de navegación (`partials/nav.blade.php`) y el pie (`partials/footer.blade.php`). Los enlaces se generan con `route()` y los recursos con `asset()`; el CSS, el JS y las imágenes están en `public/`.

Por ahora las vistas muestran peticiones de ejemplo y los formularios solo se validan en el navegador con `public/js/main.js`; todavía no guardan datos.

## API

Todas las peticiones deben llevar la cabecera `Accept: application/json`. En las peticiones `PUT`, el body tiene que ir en **JSON** o **x-www-form-urlencoded** (PHP no lee `multipart/form-data` en `PUT`).

### Usuarios

| Método | Ruta | Descripción |
| --- | --- | --- |
| POST | `/api/user` | Registra un usuario (`name`, `email` único, `password`, `c_password`) |
| GET | `/api/users` | Lista todos los usuarios |
| GET | `/api/user/{id}` | Muestra un usuario |
| GET | `/api/user/{id}/peticiones` | Peticiones creadas por el usuario |

### Categorías

| Método | Ruta | Descripción |
| --- | --- | --- |
| POST | `/api/categoria` | Crea una categoría (`nombre` único) |
| GET | `/api/categorias` | Lista todas las categorías |
| GET | `/api/categoria/{id}` | Muestra una categoría |
| GET | `/api/categoria/{id}/peticiones` | Peticiones de la categoría y cuántas son (`total`) |

### Peticiones

| Método | Ruta | Descripción |
| --- | --- | --- |
| POST | `/api/peticion` | Crea una petición (`titulo`, `descripcion`, `destinatario`, `firmantes`, `estado`, `categoria_id`) |
| GET | `/api/peticiones` | Lista todas las peticiones |
| GET | `/api/peticion/{id}` | Muestra una petición |
| GET | `/api/peticiones/{id}/categoria` | Categoría de la petición |
| GET | `/api/peticiones/{id}/firmantes` | Usuarios que han firmado la petición |
| POST | `/api/peticiones/firmar/{id}/user/{user_id}` | El usuario firma la petición. `409` si ya la había firmado |
| PUT | `/api/peticion/{id}` | Actualiza solo los campos enviados (`titulo`, `descripcion`, `destinatario`, `categoria_id`) |
| PUT | `/api/peticion/{id}/estado` | Cambia el estado (`aceptada` o `pendiente`) |
| DELETE | `/api/peticion/{id}` | Borra la petición. `409` si ya tiene firmas |

### Códigos de respuesta

| Código | Cuándo |
| --- | --- |
| `200` | Operación correcta |
| `400` / `422` | Error de validación, con el mensaje de cada campo |
| `404` | El recurso no existe |
| `409` | Conflicto: firma duplicada o petición con firmas que no se puede borrar |

### Ejemplos

Firmar la petición 1 con el usuario 2:

```http
POST /api/peticiones/firmar/1/user/2
Accept: application/json
```

Cambiar solo el título de una petición:

```http
PUT /api/peticion/1
Content-Type: application/json
Accept: application/json

{
    "titulo": "Reducir las listas de espera en los centros de salud"
}
```

## Detalles de implementación

- **Firmas:** se guardan en la tabla pivote con `attach()`. Antes se comprueba con `exists()` que el usuario no haya firmado ya, y el contador `firmantes` se incrementa en cada firma.
- **Actualización parcial:** las reglas usan `sometimes` y se guarda con `update($validator->validated())`, así que solo cambian los campos enviados.
- **Borrado protegido:** no se puede borrar una petición con firmas. Se devuelve `409` en lugar de dejar que MySQL rechace el borrado por la clave foránea.
- **Contraseñas:** se guardan cifradas con `Hash::make` y nunca aparecen en las respuestas (`$hidden` en el modelo `User`).
- **Usuario creador:** mientras no haya autenticación, las peticiones se crean con el usuario 1.

## Estado del proyecto

- [x] Migraciones con claves foráneas: `peticiones`, `categorias`, `peticione_user`, `files`
- [x] Modelos con sus relaciones: `User`, `Peticione`, `Categoria`, `File`
- [x] API de usuarios: registro, listado, detalle y sus peticiones
- [x] API de categorías: creación, listado, detalle y sus peticiones con total
- [x] API de peticiones: crear, listar, ver, actualizar, cambiar estado y borrar
- [x] Firmas: firmar con control de duplicados y listar firmantes
- [x] Despliegue con Docker: imagen propia de la aplicación y MariaDB con Docker Compose
- [x] Vistas Blade: layout, navegación, pie e inicio, listado, detalle y creación de peticiones (maquetación)
- [ ] Conectar las vistas con la base de datos (listado, detalle, crear y firmar)
- [ ] Autenticación (login y registro web)
- [ ] Subida de archivos

## Estructura principal

```
app/
├── Http/Controllers/
│   ├── CategoriaController.php
│   ├── FileController.php
│   ├── PagesController.php
│   ├── PeticioneController.php
│   └── UserController.php
└── Models/
    ├── Categoria.php
    ├── File.php
    ├── Peticione.php
    └── User.php
database/migrations/
public/
├── css/styles.css
├── img/
└── js/main.js
resources/views/
├── layouts/app.blade.php
├── partials/
│   ├── footer.blade.php
│   └── nav.blade.php
└── pages/
    ├── crear.blade.php
    ├── home.blade.php
    ├── peticion.blade.php
    └── peticiones.blade.php
routes/
├── api.php
└── web.php
.dockerignore
docker-compose.yml
Dockerfile
```

## Autor

Mario Díaz González – 2º DAW, CSC Jesuitas Logroño
[GitHub](https://github.com/MK-1379) · [Portfolio](https://mk-1379.github.io)