# Microservicios e integraciones — Patitas Seguras

## 1. Objetivo

La arquitectura contempla servicios independientes para responsabilidades específicas que no corresponden directamente al backend PHP.

```text
PHP
 ├── PostgreSQL
 ├── Flask — compatibilidad
 ├── Go/Fiber — notificaciones
 └── Auth externo — autenticación
```

## 2. Microservicio de compatibilidad

Ubicación:

```text
microservices/compatibility-service/
```

### Tecnología

- Python
- Flask

### Responsabilidad

Su única responsabilidad es calcular la compatibilidad entre una mascota y un postulante.

Flujo conceptual:

```text
Mascota + formulario
        ↓
      Flask
        ↓
      reglas
        ↓
 compatibilidad
```

No debería administrar usuarios, solicitudes ni toda la base de datos.

### Organización

```text
compatibility-service/
├── app/
│   ├── __init__.py
│   ├── routes.py
│   ├── services.py
│   └── rules.py
├── requirements.txt
├── run.py
└── Dockerfile
```

- `__init__.py`: inicializa Flask.
- `routes.py`: define los endpoints HTTP.
- `services.py`: contiene la lógica principal de evaluación.
- `rules.py`: contiene las reglas de compatibilidad.
- `requirements.txt`: dependencias Python.
- `run.py`: inicia el microservicio.
- `Dockerfile`: construye el contenedor.

Entre las reglas contempladas se encuentran factores como:

- tamaño de la mascota y vivienda;
- horas que permanece sola;
- presencia de otras mascotas;
- condiciones especiales;
- disponibilidad de patio.

## 3. Microservicio de notificaciones

Ubicación:

```text
microservices/notification-service/
```

### Tecnología

- Go
- Fiber

### Responsabilidad

Gestiona notificaciones como:

- correo;
- WhatsApp;
- recordatorios;
- confirmaciones.

### Organización

```text
notification-service/
├── cmd/
│   └── main.go
├── internal/
│   ├── handlers/
│   │   └── notification_handler.go
│   ├── services/
│   │   └── notification_service.go
│   └── routes/
│       └── routes.go
├── go.mod
└── Dockerfile
```

- `cmd/main.go`: punto de entrada.
- `handlers/`: recibe solicitudes HTTP.
- `services/`: contiene la lógica de notificaciones.
- `routes/`: define los endpoints de Fiber.
- `go.mod`: dependencias del proyecto.
- `Dockerfile`: construye el contenedor.

## 4. Servicio externo de autenticación

Ubicación de referencia:

```text
external-services/auth-service/
```

Este servicio no es desarrollado por el grupo.

Su documentación de integración debe contemplar:

- URL;
- puerto;
- endpoints;
- formato JSON;
- autenticación;
- mecanismo de integración.

El backend PHP utiliza `AuthService.php` para comunicarse con este servicio.

## 5. Comunicación entre servicios

PHP funciona como punto de coordinación entre la interfaz y los servicios externos.

```text
Frontend
   │
   │ fetch()
   ▼
PHP
   │
   ├──► PostgreSQL
   │
   ├──► Flask
   │
   ├──► Go + Fiber
   │
   └──► Auth externo
```

Las comunicaciones HTTP hacia servicios externos se centralizan mediante `HttpClient.php`.

## 6. Contenerización

Cada microservicio posee su propio `Dockerfile`, lo que permite construir y ejecutar sus contenedores de forma independiente.

El ecosistema completo se levanta mediante `docker-compose.yml`.
