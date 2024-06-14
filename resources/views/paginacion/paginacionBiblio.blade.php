<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Username</th>
            <th>Estado</th>
            <th style="width: 10%;">Acciones</th>
        </tr>
    </thead>
    <tbody id="bibliotecariosTableBody">
        @foreach ($bibliotecarios as $bibliotecario)
            <tr>
                <td>{{ $bibliotecario->ID_BIBLIOTECARIO }}</td>
                <td>{{ $bibliotecario->NOMBRE }}</td>
                <td>{{ $bibliotecario->APELLIDO }}</td>
                <td>{{ $bibliotecario->USER_NAME }}</td>
                <td>{{ $bibliotecario->activo ? 'Activo' : 'Inactivo' }}</td>
                <td>
                    <div style="display: flex; justify-content: space-between;">
                        <form method="POST"
                            action="{{ route('bibliotecario/home/estado/', $bibliotecario->user_id) }}">
                            @csrf
                            <button type="submit" class="btn btn-secondary"
                                data-toggle="tooltip" data-placement="top"
                                title="Cambia el estado"><i
                                    class="zmdi zmdi-swap"></i></button>
                        </form>
                        <a href="{{ url('bibliotecario/home/edit/' . $bibliotecario->ID_BIBLIOTECARIO) }}"
                            class="btn btn-info"><i class="zmdi zmdi-edit"></i></a>
                        <form
                            action="{{ url('bibliotecario/home/' . $bibliotecario->user_id) }}"
                            method="post" id="deleteFormB{{ $bibliotecario->user_id }}">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button
                                onclick="confirmDeleteB(event, {{ $bibliotecario->user_id }})"
                                class=" btn btn-danger" type="submit"><i
                                    class="zmdi zmdi-delete"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<!-- Paginación -->
{!! $bibliotecarios->links() !!} 