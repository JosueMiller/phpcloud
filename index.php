<?php
declare(strict_types=1);

require_once "config.php";

// Activar excepciones en mysqli (si no está en config.php)
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $sql = "SELECT a.nombres, a.dni, c.nombre AS curso, c.creditos, m.fecha_matricula
            FROM matriculas m
            JOIN alumnos a ON m.alumno_id = a.id
            JOIN cursos c ON m.curso_id = c.id";

    $resultado = $conexion->query($sql);

} catch (mysqli_sql_exception $e) {
    die("Error en la consulta: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Matrículas</title>
    <style>
        body { font-family: Arial; }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
    </style>
</head>
<body>

<h2>Lista de alumnos matriculados</h2>

<table>
    <tr>
        <th>DNI</th>
        <th>Alumno</th>
        <th>Curso</th>
        <th>Créditos</th>
        <th>Fecha Matrícula</th>
    </tr>

    <?php if ($resultado->num_rows > 0): ?>
        <?php while ($fila = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($fila['dni']) ?></td>
                <td><?= htmlspecialchars($fila['nombres']) ?></td>
                <td><?= htmlspecialchars($fila['curso']) ?></td>
                <td><?= htmlspecialchars((string)$fila['creditos']) ?></td>
                <td><?= htmlspecialchars($fila['fecha_matricula']) ?></td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="5">No hay registros</td>
        </tr>
    <?php endif; ?>
</table>

</body>
</html>

<?php
$conexion->close();
?>
