@extends('layouts.base')
@section('content')

        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Sistema bibliotecario <small>Devolución de Prestamo</small></h1>
            </div>
        </div>
        <div class="container-fluid"  style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="{{asset('assets/img/flat-book.png')}}" alt="pdf" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido a la sección para devolver un prestamo, deberas seleccionar la fecha y marcar el prestamo como devuelto para poder avanzar
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Devolver Prestamo</div>
                <form method="POST" action="{{route('prestamoPendiente.devolucion', $prestamo)}}" class="form-padding">
                    @csrf @method('PATCH')
                    <div class="row">
                        <div class="col-xs-12">
                            <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información</legend><br>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label>Código correlativo</label>
                            <div class="group-material">
                                <input name="codigo" type="text" readonly value="{{old('codigo',$prestamo->id_ejemplar)}}" class="tooltips-general material-control" placeholder="Escribe aquí el código correlativo del libro" pattern="[0-9]{1,20}" required="" maxlength="20" data-toggle="tooltip" data-placement="top" title="Escribe el código correlativo del libro, solamente números">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label>Carnet</label>
                            <div class="group-material">
                                <input name="carnet" type="text" readonly value="{{old('carnet',$prestamo->carnet_miembro)}}" class="tooltips-general material-control" placeholder="Escribe aquí el carnet del que solicita el prestamo" required="" maxlength="70" data-toggle="tooltip" data-placement="top" title="Escribe aquí el carnet del que solicita el prestamo">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label>Fecha de prestamo</label>
                            <div class="group-material">
                                <input name="fechaPrestamo" type="date" readonly value="{{old('fechaPrestamo',$prestamo->fecha_prestamo)}}" class="tooltips-general material-control" placeholder="Fecha en el que se realizó el prestamo" required="" maxlength="70" data-toggle="tooltip" data-placement="top" title="Fecha en el que se realizó el prestamo">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label>Fecha de devolución</label>
                            <div class="group-material">
                                <input name="fechaDevolucion" type="date" readonly value="{{old('fechaDevolucion',$prestamo->fecha_devolucion)}}" class="tooltips-general material-control" placeholder="Dia en que se acordó la devolución del libro" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Dia en que se acordó la devolución el libro">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6" id="content">
                            <label>Fecha en que se devolvio</label>
                            <div class="group-material">
                                <input name="fechaDevuelto" type="date" id="date" readonly  class="tooltips-general material-control" value={{$hoy}} placeholder="Dia en que el libro ha sido devuelto" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Dia en que el libro ha sido devuelto">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                               
                            </div>
                        </div>
                         <div class="col-xs-12 col-sm-6">
                            <label>Multa</label>
                            <div class="group-material">
                                <input name="multa" type="text" readonly value="{{ $multa }}" class="tooltips-general material-control" required="" maxlength="70" data-toggle="tooltip" data-placement="top" title="Escribe aquí el carnet del que solicita el prestamo">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="group-material">
                        <input name="devuelto" type="checkbox"   id="check"  placeholder="Marca si el libro ha sido devuelto" required="" value="first_checkbox" title="Marca si el libro ha sido devuelto" />
                            ¿Devuelto?
                        <br />
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
