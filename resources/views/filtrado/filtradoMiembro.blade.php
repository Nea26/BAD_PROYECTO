<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    // Objetivo: Filtrar los datos de la tabla de Miembro
    $(document).ready(function() {

        $(document).on('keyup', function(e) {
            e.preventDefault();
            let buscar_Miembro = $('#search_Miembro').val();


            $.ajax({
                url: "{{ route('miembro/home/buscar') }}",
                method: 'GET',
                data: {
                    buscar_Miembro: buscar_Miembro
                },
                success: function(response) {
                    // Crea un elemento temporal para cargar la respuesta HTML
                    var tempDiv = $('<div>').html(response);

                    // Extrae solo el contenido del elemento específico
                    var filteredContent = tempDiv.find('#datos-buscador').html();

                    // Asume que la respuesta es HTML y actualiza el contenido
                    $('#datos-buscador').html(filteredContent);
                    if (response.status == 'error') {
                        $('#datos-buscador').html(
                            '<span class="text-danger" style="text-align: center"> <h1>No se encontraron resultados. </h2></span>'
                        );
                    }
                }
            });
        })
        //Paginar los datos de la tabla de miembro
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            miembros(page);
        });

        function miembros(page) {
            $.ajax({
                url: "/miembro/pagination?page=" + page,
                method: 'GET',
                data: {
                    page: page
                },
                success: function(res) {
                    

                    // Asume que la respuesta es HTML y actualiza el contenido
                    $('#datos-buscador').html(res);
                }
            });
        }
    });
</script>
