$(document).ready(function() {
    // Evento para escuchar cambios en el campo de búsqueda
    $('#ci').on('input', function() {
        var ci = $(this).val();  // Obtener el valor de la cédula ingresada

        // Hacer una solicitud AJAX
        $.ajax({
            url: 'listar_personas.php',  // La misma página PHP que maneja la búsqueda
            type: 'GET',
            data: { ci: ci },  // Enviar el valor de la cédula
            success: function(response) {
                // Cuando la respuesta llega, reemplazar el contenido de la tabla
                $('#resultados').html(response);  // Insertar la tabla actualizada
            },
            error: function() {
                alert('Hubo un error al realizar la búsqueda.');
            }
        });
    });
});

$(document).ready(function() {
    // Función que verifica si el CI existe
    function verificarCI() {
        var ci = $('#ci').val(); // Obtener el valor del campo CI

        if (ci.length > 0) {
            $.ajax({
                url: 'verificar_ci.php', // Archivo PHP para verificar el CI
                type: 'GET',
                data: { ci: ci }, // Enviar el CI al servidor
                success: function(response) {
                    if (response == 'existe') {
                        // Si el CI ya existe
                        $('#ci-error').text('El CI ya está registrado.');
                        $('#btn-submit').prop('disabled', true); // Deshabilitar el botón de envío
                        // Borrar todos los campos del formulario
                        $('#nombre').val('');
                        $('#apellido').val('');
                        $('#ci').val('');
                        $('#direccion').val('');
                        $('#telefono').val('');
                        $('#discapacidad').val('');
                    } else {
                        // Si el CI no existe
                        $('#ci-error').text('');
                        $('#btn-submit').prop('disabled', false); // Habilitar el botón de envío
                    }
                },
                error: function() {
                    $('#ci-error').text('Error al verificar el CI.');
                }
            });
        } else {
            // Si el campo CI está vacío, se limpia el mensaje de error y se habilita el botón
            $('#ci-error').text('');
            $('#btn-submit').prop('disabled', false); // Habilitar el botón de envío
        }
    }
    // Llamar a la función verificarCI() cada vez que se escriba en el campo CI
    $('#ci').on('keyup', verificarCI);
});
