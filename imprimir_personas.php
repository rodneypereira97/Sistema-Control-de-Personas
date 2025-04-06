<?php
// Asegúrate de incluir la conexión a la base de datos
include 'conexion.php';

// Recuperar los datos desde la base de datos (puedes aplicar un límite si es necesario)
$sql = "SELECT id, nombre, apellido, ci, direccion, telefono, discapacidad, estado, 
                DATE_FORMAT(fecha_creacion, '%d-%m-%Y %H:%i:%s') AS fecha_creacion, 
                DATE_FORMAT(fecha_actualizacion, '%d-%m-%Y %H:%i:%s') AS fecha_actualizacion 
        FROM personas ORDER BY id ASC"; // Limita a 10 registros, si es necesario

$result = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Accion Social</title>
    <link rel="stylesheet" href="estilos_impresion.css">
</head>
<body>
    <h2>Listado de Personas Registradas</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cédula</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Fecha de Registro</th>
                <th>Discapacidad</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Mostrar cada fila de resultados
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nombre"] . "</td>";
                    echo "<td>" . $row["apellido"] . "</td>";
                    echo "<td>" . $row["ci"] . "</td>";
                    echo "<td>" . $row["direccion"] . "</td>";
                    echo "<td>" . $row["telefono"] . "</td>";
                    echo "<td>" . $row["fecha_creacion"] . "</td>";
                    echo "<td>" . $row["discapacidad"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No hay personas registradas</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <script>
        window.print(); // Esta línea imprimirá automáticamente la página cuando se cargue
    </script>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conexion->close();
?>
