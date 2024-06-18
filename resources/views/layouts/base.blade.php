<!DOCTYPE html>
<html lang="es">

<head>
    <title>Bibliotecario</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="assets/icons/book.ico" />
    @include('includes.estilos')
    
</head>

<body>
    @include('includes.sidebar')
    <div class="content-page-container full-reset custom-scroll-containers">
        @include('includes.navbar')
        
        <div>
        @yield('content')
        </div>
       
        
        
        
       @include('includes.footer') 
    </div>  
    <script src="{{ asset('js/registro/registroUsuarios.js') }}"></script>
    <script src="{{ asset('js/bibliotecario/profesorCrud.js') }}"></script>
    <script src="{{ asset('js/bibliotecario/bibliotecarioCrud.js') }}"></script>
    <script src="{{ asset('js/bibliotecario/miembroCrud.js') }}"></script>
</body>

</html>