<?php

header('Content-Type: application/json; charset=utf-8');

// Datos según database/seeds/datos_pruebas.sql
$mascotas = [
    [
        'id' => 1,
        'nombre' => 'Luna',
        'nombre_especie' => 'Perro',
        'nombre_raza' => 'Mestizo',
        'sexo' => 'hembra',
        'tamaño' => 'mediano',
        'fecha_nacimiento_estimada' => '2023-05-10',
        'historial' => 'Fue rescatada de la vía pública. Es tranquila, cariñosa y sociable.',
        'foto_url' => 'https://images.unsplash.com/photo-1552053831-71594a27632d',
        'estado' => true,
    ],
    [
        'id' => 2,
        'nombre' => 'Toby',
        'nombre_especie' => 'Perro',
        'nombre_raza' => 'Labrador',
        'sexo' => 'macho',
        'tamaño' => 'grande',
        'fecha_nacimiento_estimada' => '2022-08-15',
        'historial' => 'Es un perro activo y muy cariñoso. Disfruta de los paseos y del contacto con personas.',
        'foto_url' => 'https://images.unsplash.com/photo-1558788353-f76d92427f16',
        'estado' => true,
    ],
    [
        'id' => 3,
        'nombre' => 'Mía',
        'nombre_especie' => 'Gato',
        'nombre_raza' => 'Mestizo',
        'sexo' => 'hembra',
        'tamaño' => 'pequeño',
        'fecha_nacimiento_estimada' => '2024-01-20',
        'historial' => 'Es una gata tranquila y curiosa. Está acostumbrada a vivir dentro del hogar.',
        'foto_url' => 'https://images.unsplash.com/photo-1573865526739-10659fec78a5',
        'estado' => true,
    ],
    [
        'id' => 4,
        'nombre' => 'Simón',
        'nombre_especie' => 'Gato',
        'nombre_raza' => 'Siamés',
        'sexo' => 'macho',
        'tamaño' => 'pequeño',
        'fecha_nacimiento_estimada' => '2023-11-05',
        'historial' => 'Es sociable, juguetón y disfruta de los espacios tranquilos.',
        'foto_url' => 'https://images.unsplash.com/photo-1592194996308-7b43878e84a6',
        'estado' => true,
    ],
];

echo json_encode([
    'success' => true,
    'data' => $mascotas,
], JSON_UNESCAPED_UNICODE);
