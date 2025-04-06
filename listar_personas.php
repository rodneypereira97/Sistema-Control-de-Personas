<?php
include 'conexion.php'; // Incluir archivo de conexión

// Obtener el parámetro de búsqueda y orden
$ci_busqueda = isset($_GET['ci']) ? $_GET['ci'] : '';
$order = isset($_GET['order']) ? $_GET['order'] : 'DESC'; // Parámetro de orden, por defecto DESC

// Validar que el parámetro 'order' sea válido
if ($order != 'ASC' && $order != 'DESC') {
    $order = 'DESC'; // Si el parámetro no es válido, se establece DESC por defecto
}

// Modificar la consulta para filtrar si se proporciona un valor de búsqueda
if ($ci_busqueda != '') {
    // Si se proporciona un valor de búsqueda, filtrar por cédula
    $sql = "SELECT id, nombre, apellido, ci, direccion, telefono, discapacidad, estado, 
    DATE_FORMAT(fecha_creacion, '%d-%m-%Y %H:%i:%s') AS fecha_creacion, 
    DATE_FORMAT(fecha_actualizacion, '%d-%m-%Y %H:%i:%s') AS fecha_actualizacion 
    FROM personas WHERE ci LIKE '%$ci_busqueda%' 
    ORDER BY id $order";
} else {
    // Si no se proporciona un valor de búsqueda, mostrar todos los registros
    $sql = "SELECT id, nombre, apellido, ci, direccion, telefono, discapacidad, estado, 
    DATE_FORMAT(fecha_creacion, '%d-%m-%Y %H:%i:%s') AS fecha_creacion, 
    DATE_FORMAT(fecha_actualizacion, '%d-%m-%Y %H:%i:%s') AS fecha_actualizacion 
    FROM personas 
    ORDER BY id $order";
}

$result = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Personas</title>
    <script src="jquery/jquery-3.6.0.min.js"></script>
    <script src="js/ajax.js"></script>  <!-- Incluir el archivo AJAX -->
    <script src="js/cargarFormulario.js"></script> <!-- Asegúrate de que esta línea esté después de jQuery -->
    <link rel="stylesheet" href="stilos.css">

</head>
<body>
    <div class="container mt-5">
        <div id="contenido">
            <div id="contenidoImpresion">
                <h2>Listado de Personas</h2> 
                 <div class="mb-3">
                     <input type="text" id="ci" class="form-control" placeholder="Buscar por Cédula" />
                 </div>
                 <div class="mb-6">
                    <button class="btn btn-primary" onclick="window.location.href='index.php?page=agregar_persona'"><img src="img/mas.png" alt="Icono Agregar" style="width: 23px; height: 23px; margin-right: 5px;">Agregar Nueva Persona</button>
                </div>
            </div>
        </div>
        <div id="resultados"><!-- Los resultados se cargarán aquí mediante AJAX -->
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
                        <th>Fecha de Modificacion</th>
                        <th>Discapacidad</th>
                        <th>Estado</th>
                        <th>Opciones</th>
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
                        echo "<td>" . $row["fecha_actualizacion"] . "</td>";
                        echo "<td>" . $row["discapacidad"] . "</td>";
                        echo "<td>" . $row["estado"] . "</td>";
                        echo "<td>";
                        echo '<button class="btn btn-warning" onclick="cargarFormulario(\'editar\', ' . $row['id'] . ')"><img src="img/editar.png" alt="Icono Editar" style="width: 23px; height: 23px; margin-right: 5px;"></button>';
                        echo '<button class="btn btn-danger" onclick="confirmarEliminacion(' . $row['id'] . ')"><img src="img/eliminar1.png" alt="Icono Eliminar" style="width: 23px; height: 23px; margin-right: 5px;"></button>';
                        echo "<td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No hay personas registradas</td></tr>";
                }
                $conexion ->close(); // Cerrar conexión
                ?>
            </tbody>
            </table>
            <button onclick="window.open('imprimir_personas.php', '_blank')" class="btn btn-primary">Imprimir</button>
            <button onclick="window.location.href='exportar_excel.php'" class="btn btn-success">Exportar a Excel</button>
        </div>
    </div>

</body>
</html>