-- =====================================================
-- DATOS DE PRUEBA - PATITAS SEGURAS
-- =====================================================


-- =====================================================
-- ESPECIES
-- =====================================================

INSERT INTO especies (nombre_especie, estado)
VALUES
    ('Perro', TRUE),
    ('Gato', TRUE)
ON CONFLICT (nombre_especie) DO NOTHING;


-- =====================================================
-- RAZAS
-- =====================================================

-- Razas de perros

INSERT INTO razas (id_especie, nombre_raza, estado)
VALUES
(
    (SELECT id FROM especies WHERE nombre_especie = 'Perro'),
    'Mestizo',
    TRUE
),
(
    (SELECT id FROM especies WHERE nombre_especie = 'Perro'),
    'Labrador',
    TRUE
),
(
    (SELECT id FROM especies WHERE nombre_especie = 'Perro'),
    'Ovejero Alemán',
    TRUE
)
ON CONFLICT (id_especie, nombre_raza) DO NOTHING;


-- Razas de gatos

INSERT INTO razas (id_especie, nombre_raza, estado)
VALUES
(
    (SELECT id FROM especies WHERE nombre_especie = 'Gato'),
    'Mestizo',
    TRUE
),
(
    (SELECT id FROM especies WHERE nombre_especie = 'Gato'),
    'Siamés',
    TRUE
)
ON CONFLICT (id_especie, nombre_raza) DO NOTHING;


-- =====================================================
-- MASCOTAS
-- =====================================================

-- LUNA

INSERT INTO mascotas (
    id_especie,
    id_raza,
    nombre,
    sexo,
    tamaño,
    fecha_nacimiento_estimada,
    historial,
    foto_url,
    estado
)
SELECT
    e.id,
    r.id,
    'Luna',
    'hembra',
    'mediano',
    '2023-05-10',
    'Fue rescatada de la vía pública. Es tranquila, cariñosa y sociable.',
    'https://images.unsplash.com/photo-1552053831-71594a27632d',
    TRUE
FROM especies e
JOIN razas r
    ON r.id_especie = e.id
WHERE e.nombre_especie = 'Perro'
  AND r.nombre_raza = 'Mestizo'
  AND NOT EXISTS (
      SELECT 1
      FROM mascotas
      WHERE nombre = 'Luna'
  );


-- TOBY

INSERT INTO mascotas (
    id_especie,
    id_raza,
    nombre,
    sexo,
    tamaño,
    fecha_nacimiento_estimada,
    historial,
    foto_url,
    estado
)
SELECT
    e.id,
    r.id,
    'Toby',
    'macho',
    'grande',
    '2022-08-15',
    'Es un perro activo y muy cariñoso. Disfruta de los paseos y del contacto con personas.',
    'https://images.unsplash.com/photo-1558788353-f76d92427f16',
    TRUE
FROM especies e
JOIN razas r
    ON r.id_especie = e.id
WHERE e.nombre_especie = 'Perro'
  AND r.nombre_raza = 'Labrador'
  AND NOT EXISTS (
      SELECT 1
      FROM mascotas
      WHERE nombre = 'Toby'
  );


-- MÍA

INSERT INTO mascotas (
    id_especie,
    id_raza,
    nombre,
    sexo,
    tamaño,
    fecha_nacimiento_estimada,
    historial,
    foto_url,
    estado
)
SELECT
    e.id,
    r.id,
    'Mía',
    'hembra',
    'pequeño',
    '2024-01-20',
    'Es una gata tranquila y curiosa. Está acostumbrada a vivir dentro del hogar.',
    'https://images.unsplash.com/photo-1573865526739-10659fec78a5',
    TRUE
FROM especies e
JOIN razas r
    ON r.id_especie = e.id
WHERE e.nombre_especie = 'Gato'
  AND r.nombre_raza = 'Mestizo'
  AND NOT EXISTS (
      SELECT 1
      FROM mascotas
      WHERE nombre = 'Mía'
  );


-- SIMÓN

INSERT INTO mascotas (
    id_especie,
    id_raza,
    nombre,
    sexo,
    tamaño,
    fecha_nacimiento_estimada,
    historial,
    foto_url,
    estado
)
SELECT
    e.id,
    r.id,
    'Simón',
    'macho',
    'pequeño',
    '2023-11-05',
    'Es sociable, juguetón y disfruta de los espacios tranquilos.',
    'https://images.unsplash.com/photo-1592194996308-7b43878e84a6',
    TRUE
FROM especies e
JOIN razas r
    ON r.id_especie = e.id
WHERE e.nombre_especie = 'Gato'
  AND r.nombre_raza = 'Siamés'
  AND NOT EXISTS (
      SELECT 1
      FROM mascotas
      WHERE nombre = 'Simón'
  );