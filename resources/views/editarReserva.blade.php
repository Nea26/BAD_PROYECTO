@extends('layouts.base')
@section('content')

        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Sistema bibliotecario <small>Editar Reserva</small></h1>
            </div>
        </div>
        <div class="container-fluid"  style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="{{asset('assets/img/flat-book.png')}}" alt="pdf" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido a la sección para editar una reserva creada, deberas de llenar todos los campos para poder registrar la reserva
                </div>
            </div>
        </div>
        <div class="container-fluid">
            @if('session'('error'))
            <div class="alert alert-danger text-center">
                {{session('error')}}
            </div>
            @endif
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Nuevo Prestamo</div>
                <form method="POST" action="{{route('reserva.update', $prestamo)}}" class="form-padding">
                    @csrf @method('PATCH')
                    <div class="row">
                        <div class="col-xs-12">
                            <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información</legend><br>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="group-material">
                                <input name="codigo" type="text" value="{{old('codigo',$prestamo->libro->codigo_internacional)}}" class="tooltips-general material-control" placeholder="Escribe aquí el código correlativo del libro" pattern="[0-9]{1,20}" required="" maxlength="20" data-toggle="tooltip" data-placement="top" title="Escribe el código correlativo del libro, solamente números">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Código correlativo</label>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="group-material">
                                <input name="carnet" type="text" value="{{old('carnet',$prestamo->carnet_miembro)}}" class="tooltips-general material-control" placeholder="Escribe aquí el carnet del que solicita el prestamo"  required="" maxlength="70" data-toggle="tooltip" data-placement="top" title="Escribe el carnet del que solicita el prestamo">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Carnet</label>
                            </div>
                        </div>


                       <div class="col-xs-12">
                            <p class="text-center">
                                <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                                <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                            </p>
                       </div>
                    </div>
               </form>
            </div>
        </div>
        @endsection