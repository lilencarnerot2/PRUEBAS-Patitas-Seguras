<?php

require_once __DIR__ . '/../src/config/database.php';

$stmt = $conexion->query("SELECT current_database()");
$nombreBase = $stmt->fetchColumn();

echo "Backend funcionando correctamente.<br>";
echo "Conexión a PostgreSQL exitosa.<br>";
echo "Base de datos conectada: " . htmlspecialchars($nombreBase);