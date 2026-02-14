<?php
declare(strict_types=1);

$host = "/cloudsql/proyecto-demo-cloudsql-487413:us-east1:mi73710420";
$dbname = "db_cloud";
$username = "usermysql";
$password = "Jm2026*+";

try {
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

    $conexion = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);

    echo "Conexión exitosa";

} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

