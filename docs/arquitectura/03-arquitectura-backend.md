# Arquitectura del Backend — Patitas Seguras

## 1. Descripción

El backend constituye la lógica principal del sistema y está desarrollado en PHP.

El frontend realiza solicitudes a la API y PHP determina qué operación debe ejecutarse.

Ejemplo conceptual:

```text
Usuario presiona "Enviar solicitud"
          ↓
       JavaScript
          ↓
          PHP
          ↓
       validación
          ↓
      PostgreSQL
```

## 2. Punto de entrada

### `backend/public/index.php`

Es el punto de entrada principal de la API. Las peticiones ingresan por este archivo y luego son dirigidas hacia la ruta y el controller correspondiente.

Ejemplo:

```text
POST /api/mascotas
       ↓
index.php
       ↓
api.php
       ↓
MascotaController
```

## 3. Configuración

`backend/src/config/` contiene configuraciones técnicas.

### `database.php`

Centraliza la conexión con PostgreSQL para evitar que cada módulo implemente su propia conexión.

### `env.php`

Lee las variables del archivo `.env` ubicado en la raíz del proyecto, como:

- `DB_HOST`
- `DB_USER`
- `DB_PASSWORD`

## 4. Controllers

Los controllers reciben las solicitudes y coordinan las operaciones.

Entre ellos se encuentran:

- `UsuarioController.php`
- `MascotaController.php`
- `SaludController.php`
- `SolicitudController.php`
- `AdopcionController.php`
- `TransitoController.php`
- `DonacionController.php`
- `VoluntariadoController.php`

Por ejemplo, `MascotaController.php` puede encargarse de registrar, consultar, modificar o eliminar/deshabilitar una mascota.

Los controllers no deberían concentrar grandes consultas SQL. El acceso a datos corresponde a los repositories.

## 5. Models

Los models representan las principales entidades del sistema.

Por ejemplo, `Mascota.php` representa conceptualmente una mascota y puede manejar datos como:

- id
- nombre
- especie
- raza
- sexo
- tamaño

Los models ayudan a mantener el código organizado y entendible. No deberían encargarse directamente de consultas complejas a PostgreSQL.

## 6. Repositories

Los repositories concentran el acceso a PostgreSQL.

Ejemplo:

```text
MascotaController
       ↓
MascotaRepository
       ↓
PostgreSQL
```

### `BaseRepository.php`

Contiene funciones reutilizables para operaciones comunes de base de datos, como:

- buscar todos
- buscar por ID
- ejecutar consultas
- obtener una fila
- obtener varias filas

Los repositories específicos utilizan esta base común y agregan sus consultas particulares. Entre ellos se contemplan:

- `MascotaRepository`
- `UsuarioRepository`
- `SolicitudRepository`

## 7. Services

Los services se utilizan cuando PHP necesita comunicarse con otro servicio.

### `AuthService.php`

Se comunica con el servicio externo de autenticación para:

- validar login
- verificar tokens
- confirmar identidad

El login no es desarrollado por el grupo.

### `CompatibilityService.php`

Se comunica con el microservicio Python + Flask.

PHP puede enviar información relacionada con:

- mascota
- adoptante
- hogar de tránsito

Flask devuelve un nivel de compatibilidad.

### `NotificationService.php`

Se comunica con Go + Fiber para solicitar acciones relacionadas con notificaciones, por ejemplo recordatorios por WhatsApp.

## 8. Routes

### `api.php`

Define las rutas de la API y especifica qué controller atiende cada una.

Ejemplos:

```text
GET  /api/mascotas
POST /api/mascotas
GET  /api/solicitudes
POST /api/solicitudes
PUT  /api/solicitudes/10
```

## 9. Middleware

Los middleware funcionan como filtros antes de llegar al controller.

### `AuthMiddleware.php`

Comprueba si el usuario está autenticado. Si no lo está, no permite continuar.

### `RoleMiddleware.php`

Comprueba si el usuario tiene permisos para realizar una determinada acción.

Ejemplo:

```text
Usuario común
      ↓
intenta entrar a configuración
      ↓
RoleMiddleware
      ↓
ACCESO DENEGADO
```

El superadministrador puede acceder a las funciones correspondientes a su rol.

## 10. Utils

`utils/` contiene herramientas generales y reutilizables.

### `Request.php`

Lee los datos enviados por el frontend, incluyendo JSON enviado mediante JavaScript.

### `Response.php`

Establece un formato común para las respuestas del backend.

Ejemplo:

```json
{
  "success": true,
  "message": "Mascota registrada correctamente",
  "data": {}
}
```

### `Validator.php`

Centraliza validaciones comunes, como:

- campo obligatorio
- entero positivo
- longitud máxima
- email válido
- booleano

### `HttpClient.php`

Centraliza las peticiones HTTP realizadas por PHP hacia otros servicios. Es utilizado por:

- `AuthService`
- `CompatibilityService`
- `NotificationService`

## 11. Dependencias y contenedor

### `composer.json`

Contiene la configuración y dependencias de PHP y puede utilizarse para configurar el autoload.

### `backend/Dockerfile`

Define cómo construir el contenedor del backend PHP.
