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
            m.estado,
            e.nombre_especie,
            r.nombre_raza,
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