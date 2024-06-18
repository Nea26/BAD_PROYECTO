@extends('layouts.base')
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
                <li><a href="reservaciones">Reservaciones</a></li>
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
                        <div class="div-table-cell" style="width: 15%;">Nombre de libro</div>
                        <div class="div-table-cell" style="width: 10%;">Nombre de usuario</div>
                        <div class="div-table-cell" style="width: 9%;">F. Solicitud</div>
                        <div class="div-table-cell" style="width: 8%;">F. Entrega</div>
                        <div class="div-table-cell" style="width: 8%;">F. Devuelto</div>
                        <div class="div-table-cell" style="width: 8%;">Eliminar</div>
                        <div class="div-table-cell" style="width: 8%;">Editar</div>
                        <div class="div-table-cell" style="width: 8%;">Ver Ficha</div>
                    </div>
                </div>
            </div>
            @foreach ($prestamos as $prestamo)
            @if($prestamo->devuelto == 1)
            <div class="table-responsive">
                <div class="div-table" style="margin:0 !important;">
                    <div class="div-table-row div-table-row-list">
                        <div class="div-table-cell" style="width: 2%;">{{$prestamo->id}}</div>
                        <div class="div-table-cell" style="width: 20%;">{{$prestamo->libro->titulo}}</div>
                        <div class="div-table-cell" style="width: 12%;">{{$prestamo->carnet_miembro}}</div>
                        <div class="div-table-cell" style="width: 14%;">{{$prestamo->fecha_prestamo}}</div>
                        <div class="div-table-cell" style="width: 9%;">{{$prestamo->fecha_devolucion}}</div>
                        <div class="div-table-cell" style="width: 12%;">{{$prestamo->fecha_devuelto}}</div>
                        <form action="{{route('prestamo.destroy',$prestamo)}}" method="POST">
                            @csrf
                            @method('DELETE')
                        <div class="div-table-cell" style="width: 1%;">
                            <button  class="btn btn-danger"><i class="zmdi zmdi-delete"></i></button>
                        </div>
                        </form>
                        <div class="div-table-cell" style="width: 12%;">
                            <a href="{{route('prestamo.edit', $prestamo)}}">
                            <button class="btn btn-info"><i class="zmdi zmdi-file-text"></i></button>
                        </i></a>
                        </div>
                        <div class="div-table-cell" style="width: 10%;">
                            <a href="{{url('prestamo/'.$prestamo->id)}}">
                            <button class="btn btn-info"><i class="zmdi zmdi-file-text"></i></button>
                        </i></a>
                        </div>

                    </div>
                </div>
            </div>
            @endif
            @endforeach

       @endsection