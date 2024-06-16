<!DOCTYPE html>
<html lang="es">
<head>
    <title>Editar Bibliotecario</title>
    <meta charset="UTF-8">
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
              <h1 class="all-tittles">Sistema bibliotecario <small>Editar Bibliotecario</small></h1>
            </div>
        </div>
        <div id="registrarBibliotecario" >
            <br>
            <div class="container-fluid" style="margin: 50px 0;" id="cabeceraBibliotecario">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        <img src="/assets/img/user01.png" alt="user" class="img-responsive center-box"
                            style="max-width: 110px;">
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                        Bienvenido a la sección para editar la información de el bibliotecario.
                    </div>
                </div>
            </div>
            </div>
            <div class="container-fluid" id="formBibliotecario">
                <div class="container-flat-form">
                    <div class="title-flat-form title-flat-blue">Registrar un nuevo bibliotecario</div>
                    <form class="form-padding" action="{{url('bibliotecario/home/'. $bibliotecario->user_id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12">
                                <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Datos básicos</legend><br>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="group-material">
                                    <input name="nombre" type="text" class="material-control tooltips-general"
                                        placeholder="Nombres" required="" maxlength="70"
                                        pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,70}" data-toggle="tooltip"
                                        data-placement="top" title="Escribe tu nombre" value="{{$bibliotecario->NOMBRE}}">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Nombres</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="group-material">
                                    <input name="apellido" type="text" class="material-control tooltips-general"
                                        placeholder="Apellidos" required="" maxlength="70"
                                        pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,70}" data-toggle="tooltip"
                                        data-placement="top" title="Escribe tus apellidos" value="{{$bibliotecario->APELLIDO}}">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Apellidos</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input name="email" type="email" class="material-control tooltips-general"
                                        placeholder="E-mail" maxlength="50" data-toggle="tooltip"
                                        data-placement="top" title="Escribe tu email" value="{{$user->email}}">
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
                                    <input name="name" type="text" value="{{$user->name}}"
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
                                    <input name="password"  type="password" class="material-control tooltips-general"
                                        placeholder="Contraseña" required="" maxlength="200"
                                        data-toggle="tooltip" data-placement="top" title="Escribe una contraseña">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Contraseña</label>
                                </div>
                            </div>
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
                            <input type="hidden" name="tipo" value="bibliotecario">
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

    <script src="/js/bibliotecario/bibliotecarioCrud.js"></script>
</body>
</html>