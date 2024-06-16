<!DOCTYPE html>
<html lang="es">
<head>
    <title>Editar Miembro</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="assets/icons/book.ico" />
    @include('includes.estilos')
</head>
<body>
    @include('includes.sidebar')
    <div class="content-page-container full-reset custom-scroll-containers">
        @include('includes.navbar')
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Sistema bibliotecario <small>Editar Miembro</small></h1>
            </div>
        </div>
            <div id="registrarMiembro">
                <br>
                <div class="container-fluid" id="cabeceraMiembro" style="margin: 50px 0;">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <img src="/assets/img/user03.png" alt="user" class="img-responsive center-box"
                                style="max-width: 110px;">
                        </div>
                        <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                            Bienvenido a la sección para actualizar los datos del miembro.
                        </div>
                    </div>
                </div>
                <div class="container-fluid" id="formMiembro">
                    <div class="container-flat-form">
                        <div class="title-flat-form title-flat-blue">Editar Miembro</div>
                        <form class="form-padding" action="{{url('miembro/home/'. $miembro->user_id)}}" method="POST">
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
                                            data-placement="top" title="Escribe tu nombre" value="{{$miembro->NOMBRE}}">
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
                                            data-placement="top" title="Escribe tus Apellidos" value="{{$miembro->APELLIDO}}">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Apellidos</label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="group-material">
                                        <input name="fecha_nac" type="date" class="material-control tooltips-general"
                                            placeholder="Fecha de nacimiento" required="" data-toggle="tooltip"
                                            data-placement="top" title="Fecha de nacimiento" value="{{ date('Y-m-d', strtotime($miembro->FECHA_NACIMIENTO)) }}">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Fecha de nacimiento</label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="group-material">
                                        <input name="telefono" type="tel" class="material-control tooltips-general"
                                            placeholder="Teléfono" required="" maxlength="15" data-toggle="tooltip" pattern="[0-9\-]+$"
                                            data-placement="top" title="Ingrese su numero de telefono" value="{{$miembro->TELEFONO}}">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Teléfono</label>
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-6">
                                    <div class="group-material">
                                        <select name="tipo_identificacion" class="material-control tooltips-general" required="" data-toggle="tooltip" data-placement="top">
                                            <option value="">-- Selecciona el tipo de identificación --</option>
                                            <option value="dui" {{ $miembro->DOC_IDENTIFICACION == 'dui' ? 'selected' : '' }}>DUI</option>
                                            <option value="pasaporte" {{ $miembro->DOC_IDENTIFICACION == 'pasaporte' ? 'selected' : '' }}>Pasaporte</option>
                                            <option value="licencia" {{ $miembro->DOC_IDENTIFICACION == 'licencia' ? 'selected' : '' }}>Licencia</option>
                                            <option value="otro" {{ $miembro->DOC_IDENTIFICACION == 'otro' ? 'selected' : '' }}>Otro</option>
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
                                            data-placement="top" title="Ingresa el número de identificación" value="{{$miembro->NUM_DOC_IDENTIFICACION}}">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Número de identificación</label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="group-material">
                                        <input name="email" type="email" class="material-control tooltips-general"
                                            placeholder="E-mail" required="" maxlength="50" data-toggle="tooltip"
                                            data-placement="top" title="Escribe el Email del miembro" value="{{$miembro->CORREO}}">
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
                                            title="Escribe un nombre de usuario sin espacios, que servira para iniciar sesión" value="{{$user->name}}">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Nombre de usuario</label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="group-material">
                                        <input name="password" type="password" class="material-control tooltips-general"
                                            placeholder="Contraseña" required="" maxlength="200"
                                            data-toggle="tooltip" data-placement="top" title="Escribe una contraseña">
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
                                            required="" maxlength="200" data-toggle="tooltip" data-placement="top"
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
                @include('includes.footer')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="js/bibliotecario/bibliotecarioCrud.js"></script>
</body>
</html>