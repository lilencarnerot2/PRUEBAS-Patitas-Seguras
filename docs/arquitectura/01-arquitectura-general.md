# Arquitectura general — Patitas Seguras

## 1. Descripción

Patitas Seguras se organiza como una plataforma web compuesta por un frontend, un backend principal en PHP, una base de datos PostgreSQL, microservicios desarrollados por el grupo y un servicio externo de autenticación.

La comunicación general sigue el flujo:

```text
Usuario
  │
  ▼
Frontend
HTML + Bootstrap + CSS + JavaScript
  │
  │ fetch()
  ▼
API PHP
  │
  ├──────────────► PostgreSQL
  │
  ├──────────────► Flask
  │
  ├──────────────► Go + Fiber
  │
  └──────────────► Servicio externo de autenticación
```

## 2. Componentes principales

### Frontend

Es la interfaz visual de la plataforma. Utiliza HTML, Bootstrap, CSS y JavaScript.

Se divide en:

- `public/`: páginas accesibles sin iniciar sesión.
- `user/`: páginas para usuarios autenticados.
- `admin/`: panel administrativo para administradores y superadministradores.
- `assets/`: recursos reutilizables como estilos, JavaScript e imágenes.

### Backend

Es la lógica principal del sistema y está desarrollado en PHP.

El backend recibe las solicitudes provenientes del frontend, valida los datos, coordina las operaciones y determina si debe acceder a PostgreSQL o comunicarse con otro servicio.

### PostgreSQL

Es la base de datos principal del sistema. El acceso se centraliza mediante repositories.

### Microservicio de compatibilidad

Está desarrollado con Python + Flask. Su responsabilidad es evaluar la compatibilidad entre una mascota y un postulante.

### Microservicio de notificaciones

Está desarrollado con Go + Fiber. Su responsabilidad es gestionar notificaciones, como correos, WhatsApp, recordatorios y confirmaciones.

### Servicio externo de autenticación

Es desarrollado fuera del grupo. El backend se integra con este servicio para login, validación de tokens y verificación de identidad.

## 3. Flujo interno del backend

Las solicitudes siguen conceptualmente este flujo:

```text
REQUEST
   ↓
ROUTE
   ↓
MIDDLEWARE
   ↓
CONTROLLER
   ↓
VALIDATOR / REPOSITORY / SERVICE
   ↓
PostgreSQL / Flask / Go / Auth externo
```

Los controllers coordinan las operaciones. Los repositories concentran el acceso a PostgreSQL y los services permiten que PHP se comunique con otros servicios.

## 4. Regla de separación de responsabilidades

- Si es visual → `frontend`.
- Si es lógica principal → `backend`.
- Si consulta PostgreSQL → `repository`.
- Si recibe una petición → `controller`.
- Si se reutiliza en muchos módulos → `utils`.
- Si PHP habla con otro servicio → `services`.
- Si es compatibilidad → Flask.
- Si es notificación → Go/Fiber.
- Si es login o verificación → servicio externo.
- Si es SQL → `database`.
- Si es explicación o diagrama → `docs`.
- Si comprueba que algo funciona → `tests`.
