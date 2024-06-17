@extends('layouts.base')
@section('content')
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Sistema bibliotecario <small>préstamos y reservaciones</small></h1>
            </div>
        </div>
        <div class="conteiner-fluid">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
                <li><a href="prestamo.html">Todos los préstamos</a></li>
                <li class="active"><a href="prestamospendientes.html">Devoluciones pendientes</a></li>
                <li><a href="reservaciones">Reservaciones</a></li>
            </ul>
        </div>
        <div class="container-fluid"  style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="assets/img/clock.png" alt="calendar" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido a esta sección, aquí se muestran todos los préstamos de libros que no han sido devueltos por los docentes y estudiantes
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <h2 class="text-center all-tittles">Listado de devoluciones pendientes</h2>
            <div class="table-responsive">
                <div class="div-table" style="margin:0 !important;">
                    <div class="div-table-row div-table-row-list" style="background-color:#DFF0D8; font-weight:bold;">
                        <div class="div-table-cell" style="width: 1%;">#</div>
                        <div class="div-table-cell" style="width: 15%;">Nombre de libro</div>
                        <div class="div-table-cell" style="width: 10%;">Nombre de usuario</div>
                        <div class="div-table-cell" style="width: 13%;">F. Solicitud</div>
                        <div class="div-table-cell" style="width: 10%;">F. Entrega</div>
                        <div class="div-table-cell" style="width: 8%;">Eliminar</div>
                        <div class="div-table-cell" style="width: 8%;">Recibir</div>
                        <div class="div-table-cell" style="width: 8%;">Editar/Extender prestamo</div>
                        <div class="div-table-cell" style="width: 8%;">Ver Ficha</div>
                    </div>
                </div>
            </div>
            @foreach ($prestamos as $prestamo)
            @if($prestamo->devuelto == 0 && $prestamo->aprobado == 1)
            <div class="table-responsive">
                <div class="div-table" style="margin:0 !important;">
                    <div class="div-table-row div-table-row-list">
                        <div class="div-table-cell" style="width: 1%;">{{$prestamo->id}}</div>
                        <div class="div-table-cell" style="width: 19%;">{{$prestamo->id_ejemplar}}</div>
                        <div class="div-table-cell" style="width: 10%;">{{$prestamo->carnet_miembro}}</div>
                        <div class="div-table-cell" style="width: 20%;">{{$prestamo->fecha_prestamo}}</div>
                        <div class="div-table-cell" style="width: 8%;">{{$prestamo->fecha_devolucion}}</div>
                        <form action="{{route('prestamoPendiente.destroy',$prestamo)}}" method="POST">
                            @csrf
                            @method('DELETE')
                        <div class="div-table-cell" style="width: 5%;">
                            <button  class="btn btn-danger"><i class="zmdi zmdi-delete"></i></button>
                        </div>
                        </form>
                            <div class="div-table-cell" style="width: 10%;">
                                <a href="{{route('prestamoPendiente.devolver', $prestamo)}}">
                                <button class="btn btn-success"><i class="zmdi zmdi-time-restore"></i></button>
                                </a>
                            </div>
                        <div class="div-table-cell" style="width: 10%;">
                            <a href="{{route('prestamoPendiente.edit', $prestamo)}}">
                            <button class="btn btn-info"><i class="zmdi zmdi-file-text"></i></button>
                        </i></a>
                        </div>
                        <div class="div-table-cell" style="width: 9%;">
                            <a href="{{url('prestamo/'.$prestamo->id)}}">
                            <button class="btn btn-info" ><i class="zmdi zmdi-file-text"></i></button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        @endsection