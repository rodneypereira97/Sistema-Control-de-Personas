<?php
// Conectar a la base de datos
include 'conexion.php';

// Consultar todas las personas
$sql = "SELECT * FROM personas";
$result = $conexion->query($sql);

// Comprobar si hay registros
if ($result->num_rows > 0) {
    // Si hay registros, generar la tabla
    echo "<h2>Reporte de Personas</h2>";
    echo "<table border='1' cellpadding='10'>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cédula</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Discapacidad</th>
                <th>Estado</th>
            </tr>";

    // Mostrar cada persona en una fila de la tabla
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["nombre"] . "</td>
                <td>" . $row["apellido"] . "</td>
                <td>" . $row["ci"] . "</td>
                <td>" . $row["direccion"] . "</td>
                <td>" . $row["telefono"] . "</td>
                <td>" . $row["discapacidad"] . "</td>
                <td>" . $row["estado"] . "</td>
              </tr>";
    }

    echo "</table>";

} else {
    echo "No se encontraron personas en la base de datos.";
}

$conexion->close();
?>

<!-- Botón para imprimir el reporte -->
<button onclick="window.print();" class="btn btn-primary">Imprimir Reporte</button>
