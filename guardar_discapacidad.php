<?php
include 'conexion.php'; // Asegúrate de que este archivo contiene la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $ci = $_POST['ci'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $observacion = $_POST['observacion'];
    $estado = $_POST['estado'];

    // Verificar si el CI ya existe en la base de datos
    $sql_check_ci = "SELECT COUNT(*) AS total FROM discapacidad WHERE ci = '$ci'";
    $result_check_ci = $conexion->query($sql_check_ci);
    $row = $result_check_ci->fetch_assoc();

    if ($row['total'] > 0) {
        echo "<script>alert('Error: La cédula ya está registrada.'); window.location.href='agregar_discapacidad.php';</script>";
        exit();
    } else {
        // Insertar en la base de datos
        $sql = "INSERT INTO discapacidad (nombre, apellido, ci, direccion, telefono, observacion, estado) 
                VALUES ('$nombre', '$apellido', '$ci', '$direccion', '$telefono', '$observacion', '$estado')";

        if ($conexion->query($sql) === TRUE) {
            echo "<script>alert('Registro guardado con éxito!'); window.location.href='agregar_discapacidad.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    }
    $conexion->close();
}
?>
