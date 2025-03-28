$(document).ready(function() {
    // Crear alumno
    $('#createAlumnoForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'), // Obtiene la URL del formulario
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                window.location.href = "{{ route('alumnos.index') }}";
            },
            error: function(error) {
                console.error(error);
                alert('Error al crear el alumno.');
            }
        });
    });

    // Actualizar alumno
    $('#updateAlumnoForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'), // Obtiene la URL del formulario
            type: "PUT",
            data: $(this).serialize(),
            success: function(response) {
                window.location.href = "{{ route('alumnos.index') }}";
            },
            error: function(error) {
                console.error(error);
                alert('Error al actualizar el alumno.');
            }
        });
    });

    $(document).on('click', '.deleteAlumno', function () {
        var alumnoId = $(this).data('id');
        var boton = $(this); // Guarda la referencia al botón
    
        if (confirm('¿Estás seguro de eliminar este alumno?')) {
            $.ajax({
                url: "/alumnos/" + alumnoId,
                type: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.success) {
                        alert(response.message);
                        boton.closest('tr').remove();
                    } else {
                        alert("Error: " + response.message);
                    }
                },
                error: function (xhr) {
                    console.error("Error en la petición AJAX:", xhr.responseText);
                    alert("Error al eliminar el alumno. Revisa la consola.");
                }
            });
        }
    });
    
});