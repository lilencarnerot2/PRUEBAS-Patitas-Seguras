<?php

require_once __DIR__ . '/../config/database.php';

function obtenerMascotas()
{
    $conexion = conectarDB();

    $sql = "
        SELECT
            m.id,
            m.nombre,
            m.fecha_nacimiento_estimada,
            m.historial,
            m.foto_url,
            e.nombre_especie AS especie,
            r.nombre_raza AS raza,
            m.sexo,
            m.tamaño
        FROM mascotas m
        INNER JOIN especies e
            ON e.id = m.id_especie
        INNER JOIN razas r
            ON r.id = m.id_raza
        WHERE m.estado = TRUE
        ORDER BY m.id
    ";

    $consulta = $conexion->prepare($sql);
    $consulta->execute();

    return $consulta->fetchAll(PDO::FETCH_ASSOC);
}

function obtenerMascotaPorId($id)
{
    $conexion = conectarDB();

    $sql = "
        SELECT
            m.id,
            m.nombre,
            e.nombre_especie AS especie,
            r.nombre_raza AS raza,
            m.sexo,
            m.tamaño,
            m.fecha_nacimiento_estimada,
            m.foto_url,
            m.historial
        FROM mascotas m
        INNER JOIN especies e ON m.id_especie = e.id
        INNER JOIN razas r ON m.id_raza = r.id
        WHERE m.id = :id
        AND m.estado = TRUE;
    ";

    $stmt = $conexion->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

