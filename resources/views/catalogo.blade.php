@extends('layouts.base')


@section('content')

<div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Sistema bibliotecario <small>Catalago de Libros</small></h1>
            </div>
        </div>
         <div class="container-fluid"  style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="assets/img/calendar_book.png" alt="calendar" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido a esta sección, aquí se muestran todos libros que se encuentran registrados en el sistema hasta la fecha.
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <h2 class="text-center all-tittles">Listado de Libros</h2>
            <br> 
            <div class="search-container">
                <input type="text" class="mb-3 form-control" id="search_Libro" placeholder="Buscar libros...">
            </div>
            <br>

            <div id="datos-libros">
            <div class="table-responsive">
                <div class="div-table" style="margin:0 !important;">
                    <div class="div-table-row div-table-row-list" style="background-color:#DFF0D8; font-weight:bold;">
                        <div class="div-table-cell" style="width: 6%;">Codigo</div>
                        <div class="div-table-cell" style="width: 22%;">Titulo</div>
                        <div class="div-table-cell" style="width: 22%;">Autor</div>
                        <div class="div-table-cell" style="width: 10%;">Idioma</div>
                        <div class="div-table-cell" style="width: 10%;">Edicion</div>
                        <div class="div-table-cell" style="width: 10%;">Disponibles</div>
                        <div class="div-table-cell" style="width: 8%;">Actualizar</div>
                        <div class="div-table-cell" style="width: 8%;">Eliminar</div>
                        
                    </div>
                </div>
            </div>
            <div class="table-responsive">
            	@foreach ($libros as $libro)
                <div class="div-table" style="margin:0 !important;">
                    <div class="div-table-row div-table-row-list">
                    	
                        <div class="div-table-cell" style="width: 6%;">{{ $libro->codigo_internacional}}</div>
                        <div class="div-table-cell" style="width: 22%;">{{ $libro->titulo}}</div>
                        <div class="div-table-cell" style="width: 22%;"></div>
                        <div class="div-table-cell" style="width: 10%;">{{ $libro->idioma}}</div>
                        <div class="div-table-cell" style="width: 10%;">{{ $libro->edicion}}</div>
                        <div class="div-table-cell" style="width: 10%;">{{ $libro->cantidad_disponible}}</div>
                        <div class="div-table-cell" style="width: 8%;">
                            <button class="btn btn-info"><i class="zmdi zmdi-file-text"></i></button>
                        </div>
                        <div class="div-table-cell" style="width: 8%;">
                            <button class="btn btn-danger"><i class="zmdi zmdi-delete"></i></button>
                        </div> 
                                               
                    </div>
                </div>
                @endforeach 
            </div>
            {{$libros->links()}}
        </div>
        
        </div>
<!-- Modal -->
<div class="modal fade" id="prestamosModal" tabindex="-1" aria-labelledby="prestamosModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="prestamosModalLabel"><strong>Notificación de Préstamos</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Tienes <strong>{{ $cantidad ?? '0' }}</strong> préstamos pendientes de devolver.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<style>
    .modal-header {
        background-color: #007bff; /* Color de fondo azul */
        color: #fff; /* Texto blanco */
        font-size: 24;
    }
    .modal-body ul {
        padding-left: 20px; /* Ajusta el padding para la lista */
    }
    .modal-body ul li {
        margin-bottom: 10px; /* Espacio entre ítems de la lista */
    }
    .modal-footer .btn-secondary {
        background-color: #6c757d; /* Color de fondo para el botón */
        border-color: #6c757d; /* Color del borde para el botón */
    }
    .modal-footer .btn-secondary:hover {
        background-color: #5a6268; /* Color de fondo al pasar el mouse */
        border-color: #545b62; /* Color del borde al pasar el mouse */
    }
</style>

<div class="modal fade" id="notificacionesModal" tabindex="-1" aria-labelledby="notificacionesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="notificacionesModalLabel">Libros a devolver pronto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if(!empty($mensajes))
                    <ul>
                        @foreach($mensajes as $mensaje)
                            <li>{{ $mensaje }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>No hay Libros pendientes ha devolver.</p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
        
        @include('filtrado.busquedaLibros')
@endsection