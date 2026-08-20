<?php

header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

require_once __DIR__ . '/../src/repositories/mascotas.php';

header('Content-Type: application/json; charset=utf-8'); # instruccion q avisa que los datos vienen en formato JSON y usan el alfabeto UTF-8 para leer las letras y símbolos correctamente.

$recurso = $_GET['recurso'] ?? '';
$id = $_GET['id'] ?? null;

if ($recurso === 'mascotas') {

    try {

        // Si viene un ID, buscar una sola mascota
        if ($id !== null) {

            if (!ctype_digit($id)) {
                http_response_code(400);

                echo json_encode([
                    'success' => false,
                    'message' => 'El ID debe ser un número entero.'
                ], JSON_UNESCAPED_UNICODE);

                exit;
            }

            $mascota = obtenerMascotaPorId((int)$id);

            if (!$mascota) {
                http_response_code(404);

                echo json_encode([
                    'success' => false,
                    'message' => 'Mascota no encontrada.'
                ], JSON_UNESCAPED_UNICODE);

                exit;
            }

            echo json_encode([
                'success' => true,
                'data' => $mascota
            ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

            exit;
        }

        // Si NO viene ID, traer todas
        $mascotas = obtenerMascotas();

        echo json_encode([
            'success' => true,
            'data' => $mascotas
        ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    } catch (Exception $e) {

    http_response_code(500);

    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}

    exit;
}

echo json_encode([
    'success' => true,
    'message' => 'API Patitas Seguras funcionando.'
], JSON_UNESCAPED_UNICODE);