<table class="table">
    <thead>
        <tr>
            <th>Carnet</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>DUI</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($profesores as $profesor)
            <tr>
                <td>{{ $profesor->CARNET_PROFESOR }}</td>
                <td>{{ $profesor->NOMBRE }}</td>
                <td>{{ $profesor->APELLIDO }}</td>
                <td>{{ $profesor->DUI }}</td>
                <td>{{ $profesor->CORREO }}</td>
                <td>{{ $profesor->TELEFONO }}</td>
                <td>
                    <div style="display: flex; justify-content: space-between;">
                        <a href="{{ url('profesor/home/edit/' . $profesor->user_id) }}"
                            class="btn btn-info"><i class="zmdi zmdi-edit"></i></a>
                        <form action="{{ url('profesor/home/' . $profesor->user_id) }}"
                            method="post" id="deleteFormP{{ $profesor->user_id }}">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button onclick="confirmDeleteP(event, {{ $profesor->user_id }})"
                                class=" btn btn-danger" type="submit"><i
                                    class="zmdi zmdi-delete"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $profesores->links() }}