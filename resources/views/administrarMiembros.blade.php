<!DOCTYPE html>
<html lang="es">

<head>
    <title>Bibliotecario</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="/assets/icons/book.ico" />
    @include('includes.estilos')
</head>

<body>

    @include('includes.sidebar')
    <div class="content-page-container full-reset custom-scroll-containers">
        @include('includes.navbar')
        <div class="container">
            <div class="page-header">
                <h1 class="all-tittles">Sistema Bibliotecario <small> Administracion de Usuarios</small></h1>
            </div>
        </div>
        @if (session('success'))
            <div id="success-alert" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
    <div id="error-alert" class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div id="registrarMiembro">
            <br>
            <div class="container-fluid" id="cabeceraMiembro" style="margin: 50px 0;">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        <img src="../assets/img/user03.png" alt="user" class="img-responsive center-box"
                            style="max-width: 110px;">
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                        Bienvenido a la sección para registrar nuevos miembros, para poder registrar deberás de llenar
                        todos los campos del siguiente formulario
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 lead">
                        <ol class="breadcrumb">
                            <li role="presentation" class="active"><a id="nuevoMiembro">Nuevo Miembro</a></li>
                            <li role="presentation"><a id="verMiembros">Listado de miembros</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="container-fluid" id="formMiembro">
                <div class="container-flat-form">
                    <div class="title-flat-form title-flat-blue">Registrar un nuevo Miembro</div>
                    <form class="form-padding" action="{{ route('register-user') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-xs-12">
                                <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Datos básicos</legend><br>
                            </div>
                            {{-- <div class="col-xs-12">
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el NIE del alumno" required="" maxlength="20" data-toggle="tooltip" data-placement="top" title="NIE de estudiante">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Carnet</label>
                            </div>
                        </div> --}}
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input name="nombre" type="text" class="material-control tooltips-general"
                                        placeholder="Escribe tu nombre" required=""
                                        pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,70}" maxlength="70" data-toggle="tooltip"
                                        data-placement="top" title="Escribe tu nombre">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Nombres</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input name="apellido" type="text" class="material-control tooltips-general"
                                        placeholder="Escribe tus apellidos" required=""
                                        pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,70}" maxlength="70" data-toggle="tooltip"
                                        data-placement="top" title="Escribe tus Apellidos">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Apellidos</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input name="fecha_nac" type="date" class="material-control tooltips-general"
                                        placeholder="Fecha de nacimiento" required="" data-toggle="tooltip"
                                        data-placement="top" title="Fecha de nacimiento">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Fecha de nacimiento</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input name="telefono" type="tel" class="material-control tooltips-general"
                                        placeholder="Teléfono" required="" maxlength="15" data-toggle="tooltip" pattern="[0-9\-]+$"
                                        data-placement="top" title="Ingrese su numero de telefono">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Teléfono</label>
                                </div>
                            </div>
                            <input type="hidden" name="role_id" value="2">
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <select name="tipo_identificacion" class="material-control tooltips-general" required="" data-toggle="tooltip" data-placement="top" >
                                        <option value="">-- Selecciona el tipo de identificación --</option>
                                        <option value="dui">DUI</option>
                                        <option value="pasaporte">Pasaporte</option>
                                        <option value="licencia">Licencia</option>
                                        <option value="otro">Otro</option>
                                    </select>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input name="num_identificacion" type="text"
                                        class="material-control tooltips-general"
                                        placeholder="Número de identificación" required="" data-toggle="tooltip" pattern="[0-9\-]+$"
                                        data-placement="top" title="Ingresa el número de identificación">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Número de identificación</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input name="email" type="email" class="material-control tooltips-general"
                                        placeholder="E-mail" required="" maxlength="50" data-toggle="tooltip"
                                        data-placement="top" title="Escribe el Email del miembro">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Email</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <legend><i class="zmdi zmdi-lock"></i> &nbsp; Datos de la cuenta</legend><br>
                            </div>
                            <div class="col-xs-12">
                                <div class="group-material">
                                    <input name="name" type="text"
                                        class="material-control tooltips-general input-check-user"
                                        placeholder="Nombre de usuario" required="" maxlength="20"
                                        pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,20}" data-toggle="tooltip"
                                        data-placement="top"
                                        title="Escribe un nombre de usuario sin espacios, que servira para iniciar sesión">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Nombre de usuario</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input name="password" type="password" class="material-control tooltips-general" placeholder="Contraseña" required="" maxlength="200" data-toggle="tooltip" pattern="^(?=.*[A-Z])(?=.*[!@#$&*])[A-Za-z].{7,199}$" data-placement="top" title="Escribe una contraseña de minimo 8 digitos, incluyendo una mayuscula, un simbolo , una minuscula y empezando con una letra.">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Contraseña</label>
                                </div>
                            </div>
                            <input type="hidden" name="tipo" value="miembro">
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input name="password_confirmation" type="password"
                                        class="material-control tooltips-general" placeholder="Repite la contraseña"
                                        required="" maxlength="200" data-toggle="tooltip" data-placement="top" pattern="^(?=.*[A-Z])(?=.*[!@#$&*])[A-Za-z].{7,199}$"
                                        title="Repite la contraseña">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Repetir contraseña</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <p class="text-center">
                                    <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i
                                            class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                                    <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i>
                                        &nbsp;&nbsp; Guardar</button>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            {{-- Listado de miembros --}}
            <div class="container-fluid" id="listadoMiembros" style="display: none;">
                <div class="container-fluid" style="margin: 50px 0;">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <img src="../assets/img/user03.png" alt="user" class="img-responsive center-box"
                                style="max-width: 110px;">
                        </div>
                        <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                            Bienvenido a la sección donde se encuentra el listado de miembros del sistema bibliotecario,
                            podrás buscar los miembros por nombre,apellido o carnet. Puedes actualizar o eliminar los
                            datos
                            del miembro.<br>
                            <strong class="text-danger"><i class="zmdi zmdi-alert-triangle"></i> &nbsp; ¡Importante!
                            </strong>Si eliminas el miembro del sistema se borrarán todos los datos relacionados con
                            él.
                        </div>
                    </div>
                </div>
                <div class="container-fluid" style="margin: 0 0 50px 0;">

                </div>
                <div class="container-fluid">
                    <h2 class="text-center all-tittles">Listado de Miembros</h2>
                    <input type="text" name="search_Miembro" class="mb-3 form-control" id="search_Miembro"
                        placeholder="Buscar Miembro...">
                    <br>
                    <div class="table-data" id="datos-buscador">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Carnet</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Telefono</th>
                                    <th>Correo</th>
                                    <th>Membresia</th>
                                    <th>Vigencia</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($miembros as $miembro)
                                    <tr>
                                        <td>{{ $miembro->CARNET_MIEMBRO }}</td>
                                        <td>{{ $miembro->NOMBRE }}</td>
                                        <td>{{ $miembro->APELLIDO }}</td>
                                        <td>{{ $miembro->TELEFONO }}</td>
                                        <td>{{ $miembro->CORREO }}</td>
                                        <td>{{ $miembro->FECHA_MEMBRESIA }}</td>
                                        <td>{{ $miembro->VIGENCIA }}</td>
                                        <td>{{ $miembro->activo ? 'Activo' : 'Inactivo' }}</td>
                                        <td>
                                            <div style="display: flex; justify-content: space-between;">
                                                <form method="POST"
                                                    action="{{ route('miembro/home/estado/', $miembro->user_id) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-secondary"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Cambia el estado"><i
                                                            class="zmdi zmdi-swap"></i></button>
                                                </form>
                                                <a href="{{ url('miembro/home/edit/' . $miembro->user_id) }}"
                                                    class="btn btn-info"><i class="zmdi zmdi-edit"></i></a>
                                                <form action="{{ url('miembro/home/' . $miembro->user_id) }}"
                                                    method="post" id="deleteFormM{{ $miembro->user_id }}">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button onclick="confirmDeleteM(event, {{ $miembro->user_id }})"
                                                        class=" btn btn-danger" type="submit"><i
                                                            class="zmdi zmdi-delete"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $miembros->links() }}
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                    </div>
                    <div class="modal-body">
                        En este espacio puedes administrar los miembros del sistema bibliotecario, puedes registrar nuevos miembros y ver el listado de miembros registrados en el sistema.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i
                                class="zmdi zmdi-thumb-up"></i> &nbsp; De acuerdo</button>
                    </div>
                </div>
            </div>
        </div>
        @include('includes.footer')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="/js/bibliotecario/miembroCrud.js"></script>
        @include('filtrado.filtradoMiembro')

</body>

</html>
