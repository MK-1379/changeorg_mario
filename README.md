# Change.org Mario – Plataforma de peticiones con Laravel

Réplica de [Change.org](https://www.change.org) hecha con **Laravel 12** para el módulo de Desarrollo Web en Entorno Servidor (DWES) de 2º de DAW. Los usuarios pueden crear peticiones, clasificarlas por categorías y firmar las peticiones de otros.

> **Proyecto en desarrollo.** La base de datos, los modelos y la API de usuarios y categorías ya funcionan. La parte web (vistas Blade) y la gestión completa de peticiones están en construcción. Consulta el [estado del proyecto](#estado-del-proyecto).

## Modelo de datos

| Relación | Modelos | Cómo se implementa |
| --- | --- | --- |
| Uno a muchos (1:N) | `User` – `Peticione` | Un usuario crea muchas peticiones. Clave foránea `user_id` en `peticiones` |
| Uno a muchos (1:N) | `Categoria` – `Peticione` | Una categoría agrupa muchas peticiones. Clave foránea `categoria_id` en `peticiones` |
| Muchos a muchos (N:M) | `User` – `Peticione` | Un usuario firma muchas peticiones y una petición tiene muchos firmantes. Tabla pivote `peticione_user` con clave primaria compuesta |
| Uno a muchos (1:N) | `Peticione` – `File` | Una petición puede tener varios archivos. Se borran en cascada con la petición |

**¿Por qué `Peticione` y no `Peticion`?** Laravel deduce el nombre de la tabla poniendo el modelo en plural inglés (añadiendo una `s`). Con `Peticion` buscaría la tabla `peticions`; con `Peticione` busca `peticiones`, que es la tabla real. Lo mismo ocurre con la clave foránea (`peticione_id`) y la tabla pivote (`peticione_user`).

## Tecnologías

- PHP 8.2+
- Laravel 12
- MySQL / MariaDB (XAMPP)
- Laravel Sanctum
- Bootstrap 5 (vistas públicas)
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

La aplicación queda disponible en `http://localhost:8000` y la API en `http://localhost:8000/api`.

## API

Todas las peticiones deben llevar la cabecera `Accept: application/json`.

### Usuarios

| Método | Ruta | Descripción |
| --- | --- | --- |
| POST | `/api/register` | Registra un usuario (`name`, `email`, `password`, `c_password`) |
| GET | `/api/users` | Lista todos los usuarios |
| GET | `/api/user/{user}` | Muestra un usuario |

### Categorías

| Método | Ruta | Descripción |
| --- | --- | --- |
| POST | `/api/categoria` | Crea una categoría (`nombre`, único) |
| GET | `/api/categorias` | Lista todas las categorías |
| GET | `/api/categoria/{categoria}` | Muestra una categoría |

Si la validación falla, la API responde `422` con los errores de cada campo. Si el recurso no existe, responde `404`.

### Ejemplo

```http
POST /api/register
Content-Type: application/json
Accept: application/json

{
    "name": "Mario",
    "email": "mario@test.com",
    "password": "123456",
    "c_password": "123456"
}
```

La contraseña se guarda cifrada con `Hash::make` y nunca aparece en las respuestas.

## Rutas web (en desarrollo)

Definidas en `routes/web.php`:

| Ruta | Nombre | Descripción |
| --- | --- | --- |
| `/` | `home` | Página de inicio |
| `/peticiones/index` | `peticiones.index` | Listado de peticiones |
| `/peticiones/{id}` | `peticiones.show` | Detalle de una petición |
| `/peticion/add` | `peticiones.create` | Formulario para crear una petición |
| `/mispeticiones` | `peticiones.mine` | Peticiones del usuario autenticado |
| `/peticionesfirmadas` | `peticiones.peticionesfirmadas` | Peticiones firmadas por el usuario |
| `/peticiones/firmar/{id}` | `peticiones.firmar` | Firmar una petición |

## Estado del proyecto

- [x] Migraciones: `peticiones`, `categorias`, `peticione_user`, `files`
- [x] Modelos con sus relaciones: `User`, `Peticione`, `Categoria`, `File`
- [x] API de usuarios: registro, listado y detalle
- [x] API de categorías: creación, listado y detalle
- [x] Rutas web definidas
- [ ] Layout público y página de inicio con Bootstrap
- [ ] Listado de peticiones (`index.blade.php`)
- [ ] Crear, editar, borrar y firmar peticiones
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
resources/views/
routes/
├── api.php
└── web.php
```

## Autor

Mario Díaz González – 2º DAW, CSC Jesuitas Logroño
[GitHub](https://github.com/MK-1379) · [Portfolio](https://mk-1379.github.io)
