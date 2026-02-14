<?php
$host = "34.23.27.151";
$dbname = "db_cloud";
$username = "usermysql";
$password = "Jm2026*+"; // Cambiar si tienes contraseña

$conexion = new mysqli($host, $username, $password, $dbname);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Forzar UTF8
$conexion->set_charset("utf8");
