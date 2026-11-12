# Change.org Mario – API REST de peticiones con Laravel

Réplica de [Change.org](https://www.change.org) hecha con **Laravel 12** para el módulo de Desarrollo Web en Entorno Servidor (DWES) de 2º de DAW. La API permite registrar usuarios, crear peticiones clasificadas por categorías, firmarlas, cambiar su estado y borrarlas mientras no tengan firmas.

> **Estado:** la API REST está completa (CRUD de peticiones, firmas, categorías y usuarios). La parte web con vistas Blade y la autenticación están pendientes. Consulta el [estado del proyecto](#estado-del-proyecto).

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

- PHP 8.2+
- Laravel 12
- MySQL / MariaDB (XAMPP)
- Laravel Sanctum
- Insomnia / Postman para probar la API

## Instalación

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

La API queda disponible en `http://localhost:8000/api`.

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
- [ ] Vistas Blade: layout, inicio y listado de peticiones
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
routes/
├── api.php
└── web.php
```

## Autor

Mario Díaz González – 2º DAW, CSC Jesuitas Logroño
[GitHub](https://github.com/MK-1379) · [Portfolio](https://mk-1379.github.io)
