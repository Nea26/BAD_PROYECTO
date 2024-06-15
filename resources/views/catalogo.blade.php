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
                    Bienvenido a esta sección, aquí se muestran todos los préstamos de libros realizados hasta la fecha y que ya se entregaron satisfactoriamente
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <h2 class="text-center all-tittles">Listado de Libros</h2>
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
@endsection