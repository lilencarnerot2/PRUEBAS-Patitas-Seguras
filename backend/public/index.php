<?php

require_once __DIR__ . '/../src/repositories/mascotas.php';

header('Content-Type: application/json; charset=utf-8');

$recurso = $_GET['recurso'] ?? '';

if ($recurso === 'mascotas') {

    try {

        $mascotas = obtenerMascotas();

        echo json_encode([
            'success' => true,
            'data' => $mascotas
        ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    } catch (Exception $e) {

        http_response_code(500);

        echo json_encode([
            'success' => false,
            'message' => 'Error al obtener las mascotas.'
        ], JSON_UNESCAPED_UNICODE);
    }

    exit;
}

echo json_encode([
    'success' => true,
    'message' => 'API Patitas Seguras funcionando.'
], JSON_UNESCAPED_UNICODE);