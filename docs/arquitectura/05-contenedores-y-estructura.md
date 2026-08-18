# Contenedores y estructura del sistema — Patitas Seguras

## 1. Estructura general

El proyecto contempla los siguientes componentes principales:

```text
patitas-seguras/
├── frontend/
├── backend/
├── microservices/
│   ├── compatibility-service/
│   └── notification-service/
├── external-services/
│   └── auth-service/
├── database/
│   ├── init/
│   └── seeds/
├── docs/
├── tests/
├── docker-compose.yml
├── .env
├── .gitignore
└── README.md
```

## 2. Base de datos

`database/` contiene los recursos relacionados con PostgreSQL.

### `database/init/`

Contiene `01_patitas_seguras.sql`, definido como el SQL de la base.

Contempla:

- tablas;
- ENUM;
- claves primarias;
- claves foráneas;
- restricciones UNIQUE;
- restricciones CHECK;
- índices.

Docker puede utilizar este script para crear la base al levantar PostgreSQL por primera vez.

### `database/seeds/`

Contiene `datos_prueba.sql`, con datos ficticios destinados a testing.

Entre los datos contemplados se encuentran:

- usuarios;
- especies;
- razas;
- mascotas;
- solicitudes.

No son datos reales de producción.

## 3. Tests

La estructura contempla:

```text
tests/
├── backend/
├── microservices/
│   ├── compatibility/
│   └── notifications/
└── integration/
```

- `backend/`: pruebas del backend PHP.
- `microservices/compatibility/`: pruebas del servicio Flask.
- `microservices/notifications/`: pruebas del servicio Go.
- `integration/`: pruebas entre diferentes componentes.

Entre las integraciones contempladas se encuentran:

```text
PHP → PostgreSQL
PHP → Flask
PHP → Go
PHP → Auth externo
```

## 4. Docker Compose

`docker-compose.yml` permite levantar el ecosistema completo del proyecto.

Los componentes se organizan como servicios independientes y pueden comunicarse entre sí según las responsabilidades definidas en la arquitectura.

## 5. Variables de entorno

El proyecto contempla un único archivo `.env` en la raíz.

Este archivo contiene credenciales y configuración real y no debe subirse al repositorio.

`backend/src/config/env.php` se encarga de leer las variables necesarias.

## 6. Control de versiones

`.gitignore` define los archivos y carpetas que Git debe ignorar, incluyendo la configuración sensible que no debe publicarse.

## 7. Documentación

La documentación formal se organiza dentro de `docs/`:

- `arquitectura/`: arquitectura y flujo entre servicios.
- `api/`: endpoints y contratos JSON.
- `database/`: DER, modelo relacional y diccionario de datos.
- `diagramas/`: UML, casos de uso, secuencia y otros diagramas.
- `proyecto/`: alcance, objetivos, convenio, fases, sprints y requerimientos.
