

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Persona</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="jquery/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container 5">
        <h2>Agregar Persona</h2>
        <form action="procesar_persona.php" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required>
            </div>
            <div class="mb-3">
                <label for="ci" class="form-label">Cédula</label>
                <input type="text" class="form-control" id="ci" name="ci" required>
                <small id="ci-error" style="color: red;"></small>   
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required>
            </div>
            <div class="mb-3">
                <label for="discapacidad" class="form-label">Discapacidad</label>
                <input type="text" class="form-control" id="discapacidad" name="discapacidad" required>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
            </div>
            <button type="submit" id="btn-submit" class="btn btn-primary">Agregar Persona</button>
        </form>
    </div>
    <!-- Enlace al script externo -->
    <script src="js/ajax.js"></script>
</body>
</html>

