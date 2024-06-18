<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function() {
                $(document).on('keyup', '#search_Libro', function(e) {
                        e.preventDefault();
                        let buscar_Libro = $('#search_Libro').val();

                        $.ajax({
                                url: "{{ route('catalogo/buscar') }}", // Ruta donde se encuentra la función de búsqueda
                                method: 'GET',
                                data: {
                                    buscar_Libro: buscar_Libro
                                },
                                success: function(response) {
                                    // Crea un elemento temporal para cargar la respuesta HTML
                                    var tempDiv = $('<div>').html(response);

                                    // Extrae solo el contenido del elemento específico
                                    var filteredContent = tempDiv.find('#datos-libros').html();

                                    // Asume que la respuesta es HTML y actualiza el contenido
                                    $('#datos-libros').html(filteredContent);
                                    if (response.status == 'error') {
                                        $('#datos-libros').html(
                                            '<span class="text-danger" style="text-align: center"> <h1>No se encontraron resultados. </h2></span>'
                                        );
                                    }
                                }
                                });
                        });

                   
                });
</script>
<script>
    $(document).ready(function() {
        var cantidad = {{ $cantidad ?? '0' }};
        if(cantidad > 0) {
            $('#prestamosModal').modal('show');
            setTimeout(function() {
                $('#prestamosModal').modal('hide');
                // Verifica si hay mensajes para mostrar después de cerrar prestamosModal
                @if(!empty($mensajes))
                    setTimeout(function() {
                        $('#notificacionesModal').modal('show');
                        // Cierra notificacionesModal después de 7 segundos
                        setTimeout(function() {
                            $('#notificacionesModal').modal('hide');
                        }, 7000);
                    }, 500); // Pequeño retraso para asegurar una transición suave
                @endif
            }, 7000);
        }
    });
</script>
<script>
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Siempre evita el envío del formulario inicialmente
            const form = this; // Guarda el formulario para usarlo después en el callback de SweetAlert
            Swal.fire({
                title: '¿Estás seguro de eliminar este libro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Solo envía el formulario si el usuario confirma
                }
            });
        });
    });
</script>