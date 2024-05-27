<!doctype html>
<html lang="en">

<head>
    <title>Inicio de sesión</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="{{ asset('assets/icons/book.ico') }}" />
    <link rel="Shortcut Icon" type="image/x-icon" href="assets/icons/book.ico" />
    <script src="js/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="css/sweet-alert.css">
    <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css"
        rel="stylesheet">
    <script>
        window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')
    </script>
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/main.js"></script>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="login-container full-cover-background">
        <div class="form-container">
            <p class="text-center" style="margin-top: 17px;">
                <i class="zmdi zmdi-account-circle zmdi-hc-5x"></i>
            </p>
            <h4 class="text-center all-tittles" style="margin-bottom: 30px;">inicia sesión con tu cuenta</h4>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="group-material-login">
                    <input name="email" type="text" class="material-login-control" required="" maxlength="70">
                    <span class="highlight-login"></span>
                    <span class="bar-login"></span>
                    <label><i class="zmdi zmdi-email"></i> &nbsp; Correo</label>
                </div><br>
                <div class="group-material-login">
                    <input name="password" type="password" class="material-login-control" required="" maxlength="70">
                    <span class="highlight-login"></span>
                    <span class="bar-login"></span>
                    <label><i class="zmdi zmdi-lock"></i> &nbsp; Contraseña</label>
                </div>
                {{-- <div class="group-material">
                    <select class="material-control-login">
                        <option value="" disabled="" selected="">Tipo de usuario</option>
                        <option value="Student">Estudiante</option>
                        <option value="Teacher">Docente</option>
                        <option value="Personal">Personal administrativo</option>
                        <option value="Admin">Administrador</option>
                    </select>
                </div> --}}
                <button  name="login" class="btn-login" type="submit">Ingresar al sistema &nbsp; <i
                        class="zmdi zmdi-arrow-right"></i></button>
                <a class="btn-registro btn-left" type="button" href="{{route("register")}}" style="color: white;">Registrarse &nbsp; <i class="zmdi zmdi-account-add"></i></a>
            </form>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
