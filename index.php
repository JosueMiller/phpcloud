<?php
require_once "config.php";

$sql = "SELECT a.nombres, a.dni, c.nombre AS curso,c.creditos, m.fecha_matricula
        FROM matriculas m
        JOIN alumnos a ON m.alumno_id = a.id
        JOIN cursos c ON m.curso_id = c.id";

$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Lista de Matrículas</title>
    <style>
        body {
            font-family: Arial;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body>

    <h2>Lista alumnos patriculados</h2>

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
                    <td><?= htmlspecialchars($fila['creditos']) ?></td>
                    <td><?= htmlspecialchars($fila['fecha_matricula']) ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No hay registros</td>
            </tr>
        <?php endif; ?>

    </table>

</body>

</html>

<?php
$conexion->close();
?>