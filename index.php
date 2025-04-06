<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Personas</title>
    <link rel="icon" href="img/muni.jpg" type="image/jpg">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="stilos.css">
</head>
<body>
    <div class="container-fluid">
        <div id="contenido">
        <div class="row">
            <!-- Menú Lateral -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                     <div class="position-sticky">
                            <h3 class="text-center mt-3">Menú</h3>
                <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=agregar_persona">
                        <img src="img/agregar.png" alt="Icono Agregar" style="width: 25px; height: 25px; margin-right: 5px;">
                        Agregar Persona
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=listar_personas">
                        <img src="img/lista.png" alt="Icono Agregar" style="width: 25px; height: 25px; margin-right: 5px;">
                        Listar Personas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=reporte_persona">
                        <img src="img/listado.png" alt="Icono Agregar" style="width: 25px; height: 25px; margin-right: 5px;">
                        Reporte Personas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <img src="img/listado.png" alt="Icono Agregar" style="width: 25px; height: 25px; margin-right: 5px;">
                        Lista de Personas con Discapacidad
                    </a>
                </li>
                </ul>
                     </div>
            </nav>
            <!-- Área de Trabajo -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="pt-3">
                     <?php
                        // Mostrar la página seleccionada
                            if (isset($_GET['page'])) {
                            if ($_GET['page'] == 'agregar_persona') {
                                include 'agregar_persona.php';
                            } elseif ($_GET['page'] == 'listar_personas') {
                                include 'listar_personas.php';
                            } elseif ($_GET['page'] == 'editar_persona') {
                                include 'editar_persona.php';
                            } elseif ($_GET['page'] == 'reporte_persona') {
                                include 'reporte_persona.php';
                            }
                        }
                        ?>
                </div>
            </div>
            </main>

        </div>
    </div>
    </div>
   <!-- Modal de Nuevo Registro -->
<div class="modal fade" id="modalNuevoRegistro" tabindex="-1" role="dialog" aria-labelledby="modalLabelNuevo" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabelNuevo">Nuevo Registro Agregado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Se ha agregado un nuevo registro exitosamente.
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php?page=listar_personas';">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Actualización -->
<div class="modal fade" id="modalConfirmacion" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Actualización Exitosa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Los datos han sido actualizados exitosamente.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php?page=listar_personas';">Cerrar</button>
            </div>
        </div>
    </div>
</div>

        <script src="jquery/jquery-3.6.0.min.js"></script>
        <script src="js/cargarFormulario.js"></script>
        <script src="js/confirmarEliminacion.js"></script>
        <script src="bootstrap/js/bootstrap5.3.0.min.js"></script>
    </body>
</html>
