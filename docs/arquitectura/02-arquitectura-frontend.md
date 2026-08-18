# Arquitectura del Frontend — Patitas Seguras

## 1. Tecnologías

El frontend utiliza:

- HTML
- Bootstrap
- CSS
- JavaScript

Su función es proporcionar la interfaz visual y comunicarse con la API PHP mediante `fetch()`.

## 2. Organización

```text
frontend/
├── public/
├── user/
├── admin/
├── assets/
│   ├── css/
│   ├── bootstrap/
│   ├── js/
│   └── img/
└── Dockerfile
```

## 3. Área pública

`frontend/public/` contiene páginas accesibles sin iniciar sesión.

Incluye:

- `index.html`: landing page principal.
- `mascotas.html`: catálogo público de mascotas.
- `mascota-detalle.html`: información detallada de una mascota.
- `adopcion-info.html`: información sobre adopciones.
- `transito-info.html`: información sobre hogares de tránsito.
- `voluntariado.html`: información y formulario de voluntariado.
- `donaciones.html`: información y acceso a donaciones.

La finalidad es permitir que una persona conozca la plataforma y consulte los animales disponibles antes de registrarse.

## 4. Área de usuario autenticado

`frontend/user/` contiene las pantallas disponibles para usuarios que iniciaron sesión.

Incluye:

- `mi-perfil.html`: consulta y modificación de datos personales.
- `solicitar-adopcion.html`: formulario de adopción.
- `solicitar-transito.html`: formulario para solicitar ser hogar de tránsito.
- `mis-solicitudes.html`: consulta del estado de las solicitudes.

Estas páginas requieren autenticación.

## 5. Panel administrativo

`frontend/admin/` contiene el panel utilizado por administradores y superadministradores.

No se plantean dos paneles completamente separados. El mismo panel habilita o bloquea opciones según el rol del usuario.

Incluye:

- `dashboard.html`: pantalla principal.
- `mascotas.html`: listado y administración de mascotas.
- `mascota-form.html`: alta y modificación de mascotas.
- `salud.html`: gestión de información médica, controles, vacunas, castraciones y desparasitaciones.
- `solicitudes.html`: gestión general de solicitudes.
- `solicitud-detalle.html`: evaluación de una solicitud.
- `hogares-transito.html`: gestión de solicitudes de tránsito.
- `donaciones.html`: consulta y administración de aportes.
- `usuarios.html`: administración de usuarios.
- `configuracion.html`: configuración y tablas maestras para el superadministrador.

## 6. Recursos reutilizables

### CSS

`assets/css/styles.css` contiene los estilos propios de Patitas Seguras, incluyendo colores, fuentes, márgenes, botones personalizados e identidad visual.

Bootstrap proporciona componentes y estructura general, mientras que `styles.css` permite personalizar la interfaz.

### JavaScript

Los archivos de `assets/js/` concentran la lógica reutilizable del frontend:

- `app.js`: funciones generales.
- `api.js`: llamadas GET, POST, PUT y DELETE reutilizables.
- `auth.js`: integración con el servicio externo de autenticación.
- `mascotas.js`: dinamismo del catálogo y pantallas de mascotas.
- `solicitudes.js`: acciones relacionadas con solicitudes.
- `adopcion.js`: dinamismo del formulario de adopción.
- `transito.js`: dinamismo del formulario de tránsito.
- `voluntariado.js`: envío del formulario de voluntariado.
- `donaciones.js`: interacciones relacionadas con donaciones.

JavaScript se utiliza para dinamismo, validaciones visuales, mostrar u ocultar campos y consumir la API mediante `fetch()`.

### Imágenes

`assets/img/` contiene recursos visuales como logo, fotografías, íconos e imágenes locales.

## 7. Contenerización

`frontend/Dockerfile` define cómo construir el contenedor utilizado para servir el frontend.
