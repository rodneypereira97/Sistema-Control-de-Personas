<?php
include 'conexion.php'; // Conectar a la base de datos

// Recibir los datos del formulario
$nombre = $_POST['nombre']; 
$apellido = $_POST['apellido'];
$ci = $_POST['ci'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$discapacidad = $_POST['discapacidad'];
$estado = $_POST['estado'];

// Verificar si el `ci` ya existe en la base de datos
$sql_check_ci = "SELECT COUNT(*) AS total FROM personas WHERE ci = '$ci'";
$result_check_ci = $conexion->query($sql_check_ci);
$row = $result_check_ci->fetch_assoc();

if ($row['total'] > 0) {
    // El `ci` ya existe, redirigir de vuelta al listado y mostrar mensaje de error
    header("Location: index.php?page=agregar_persona&error=ci_duplicado");
    exit();
} else {
    // Si no existe el `ci`, insertar el nuevo registro
    $sql_insert = "INSERT INTO personas (nombre, apellido, ci, direccion, telefono, discapacidad, estado) 
                   VALUES ('$nombre', '$apellido', '$ci', '$direccion', '$telefono', '$discapacidad', '$estado')";

    if ($conexion->query($sql_insert) === TRUE) {
        // Si la inserción es exitosa, redirigir a la página de listado con mensaje de éxito
        header("Location: index.php?page=listar_personas&success=registro_creado");
        exit();
    } else {
        // Si hay un error en la inserción
        echo "Error: " . $sql_insert . "<br>" . $conexion->error;
    }
}

$conexion->close();
?>

