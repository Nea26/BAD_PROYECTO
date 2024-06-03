@extends('app')
@section('title', 'Prestamos')
@section('content')


        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Sistema bibliotecario <small>préstamos y reservaciones</small></h1>
            </div>
        </div>
        <div class="conteiner-fluid">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
                <li class="active"><a href="prestamo.html">Todos los préstamos</a></li>
                <li><a href="prestamospendientes.html">Devoluciones pendientes</a></li>
                <li><a href="reservaciones.html">Reservaciones</a></li>
            </ul>
        </div>
        <div class="container-fluid"  style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="{{asset('assets/img/calendar_book.png')}}" alt="calendar" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido a esta sección, aquí se muestran todos los préstamos de libros realizados hasta la fecha y que ya se entregaron satisfactoriamente
                </div>
            </div>
        </div>
        <div class="div-table-cell" style="width: 8%;">
            <a href="CrearPrestamo.html">
            <button class="btn btn-info"><i class="zmdi zmdi-file-text"> Agregar Nuevo Prestamo</i></button>
        </i></a>
        <div class="container-fluid">
            <h2 class="text-center all-tittles">Listado de préstamos</h2>
            <div class="table-responsive">
                <div class="div-table" style="margin:0 !important;">
                    <div class="div-table-row div-table-row-list" style="background-color:#DFF0D8; font-weight:bold;">
                        <div class="div-table-cell" style="width: 2%;">#</div>
                        <div class="div-table-cell" style="width: 19%;">Nombre de libro</div>
                        <div class="div-table-cell" style="width: 19%;">Nombre de usuario</div>
                        <div class="div-table-cell" style="width: 10%;">Devuelto</div>
                        <div class="div-table-cell" style="width: 10%;">F. Solicitud</div>
                        <div class="div-table-cell" style="width: 10%;">F. Entrega</div>
                        <div class="div-table-cell" style="width: 10%;">F. Devuelto</div>
                        <div class="div-table-cell" style="width: 8%;">Eliminar</div>
                        <div class="div-table-cell" style="width: 8%;">Editar</div>
                        <div class="div-table-cell" style="width: 8%;">Ver Ficha</div>
                    </div>
                </div>
            </div>
            @foreach ($prestamos as $prestamo)
            <div class="table-responsive">
                <div class="div-table" style="margin:0 !important;">
                    <div class="div-table-row div-table-row-list">
                        <div class="div-table-cell" style="width: 2%;">{{$prestamo->id}}</div>
                        <div class="div-table-cell" style="width: 19%;">{{$prestamo->id_ejemplar}}</div>
                        <div class="div-table-cell" style="width: 19%;">{{$prestamo->carnet_miembro}}</div>
                        <div class="div-table-cell" style="width: 10%;">{{$prestamo->devuelto}}</div>
                        <div class="div-table-cell" style="width: 10%;">{{$prestamo->fecha_prestamo}}</div>
                        <div class="div-table-cell" style="width: 10%;">{{$prestamo->fecha_devolucion}}</div>
                        <div class="div-table-cell" style="width: 10%;">{{$prestamo->fecha_devuelto}}</div>
                        <div class="div-table-cell" style="width: 8%;">
                            <button  class="btn btn-danger"><i class="zmdi zmdi-delete"></i></button>
                        </div>
                        <div class="div-table-cell" style="width: 8%;">
                            <a href="{{route('prestamo.edit', $prestamo)}}">
                            <button class="btn btn-info"><i class="zmdi zmdi-file-text"></i></button>
                        </i></a>
                        </div>
                        <div class="div-table-cell" style="width: 8%;">
                            <a href="{{url('prestamo/'.$prestamo->id)}}">
                            <button class="btn btn-info"><i class="zmdi zmdi-file-text"></i></button>
                        </i></a>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach

       @endsection