<?php
// Conexión a la base de datos
include 'conexion.php'; // Incluir archivo de conexión

// Establecer encabezados para descargar el archivo en formato Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=personas.xls");
header("Pragma: no-cache");
header("Expires: 0");

// Inicia la tabla en formato HTML con algunos estilos básicos
echo "<html xmlns:x='urn:schemas-microsoft-com:office:excel'>
        <head>
          <meta charset='UTF-8'> <!-- Especificamos que la codificación del archivo es UTF-8 -->
            <style>
              table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 10px;
    text-align: left;
    border: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
    font-weight: bold;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

body {
    font-family: Arial, sans-serif;
}
h2 {
    text-align: center;
}
            </style>
        </head>
        <body>
            <table border='1'>";  // Cambié el 'border' para que se vea en Excel

// Agregar los encabezados de la tabla
echo "<tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th>Fecha de Registro</th>
        <th>Fecha de Modificación</th>        
        <th>Discapacidad</th>
        <th>Estado</th>
      </tr>";

// Consulta a la base de datos para obtener los datos
$consulta = "SELECT id, nombre, apellido, ci, direccion, telefono, discapacidad, estado, 
    DATE_FORMAT(fecha_creacion, '%d-%m-%Y %H:%i:%s') AS fecha_creacion, 
    DATE_FORMAT(fecha_actualizacion, '%d-%m-%Y %H:%i:%s') AS fecha_actualizacion 
    FROM personas 
    ORDER BY id ASC";
$resultado = $conexion->query($consulta);

// Rellena la tabla con los datos obtenidos
while ($row = $resultado->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
    echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
    echo "<td>" . htmlspecialchars($row['apellido']) . "</td>";
    echo "<td>" . htmlspecialchars($row['direccion']) . "</td>";
    echo "<td>" . htmlspecialchars($row['telefono']) . "</td>";
    echo "<td>" . htmlspecialchars($row['fecha_creacion']) . "</td>";
    echo "<td>" . htmlspecialchars($row['fecha_actualizacion']) . "</td>";
    echo "<td>" . htmlspecialchars($row['discapacidad']) . "</td>";
    echo "<td>" . htmlspecialchars($row['estado']) . "</td>";
    echo "</tr>";
}

echo "</table>
      </body>
      </html>";

// Cerrar la conexión
$conexion->close();
?>
