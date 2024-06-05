@extends('appEditarPrestamo')
@section('title', 'Prestamos')
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
                                <input name="fechaPrestamo" type="date" readonly value="{{old('fechaPrestamo',$prestamo->fecha_prestamo)}}" class="tooltips-general material-control" placeholder="Escribe aquí la fecha en el que se realizo el prestamo" required="" maxlength="70" data-toggle="tooltip" data-placement="top" title="Escribe aquí la fecha en el que se realizo el prestamo">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label>Fecha de devolución</label>
                            <div class="group-material">
                                <input name="fechaDevolucion" type="date" readonly value="{{old('fechaDevolucion',$prestamo->fecha_devolucion)}}" class="tooltips-general material-control" placeholder="Escribe aquí el dia en que se devolvera el libro" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe aquí el dia en que se devolvera el libro">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="group-material">
                        <input name="devuelto" type="checkbox" checked='checked'  onchange="javascript:showContent()" id="check"  placeholder="Marca si el libro ha sido devuelto" value="first_checkbox" title="Marca si el libro ha sido devuelto" />
                            ¿Devuelto?
                        <br />
                        </div>
                        </div>
                        <div class="col-xs-12 col-sm-6" id="content">
                            <div class="group-material">
                                <input name="fechaDevuelto" type="date" id="date"  class="tooltips-general material-control" placeholder="Escribe aquí el dia en que el libro ha sido devuelto" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe aquí el dia en que el libro ha sido devuelto">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Fecha de devuelto</label>
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

        <script type="text/javascript">
            function showContent() {
                element = document.getElementById("content");
                check = document.getElementById("check");
                if (check.checked) {
                    element.style.display='block';
                }
                else {
                    element.style.display='none';
                    document.getElementById("date").value = "mm/dd/yyyy";
                }
            }
        </script>
                <script type="text/javascript">
                    function DateReset() {
                        date = document.getElementById("date");
                        check = document.getElementById("check");
                        if (check.checked) {
                            
                        }
                        else{
                            date.value = "mm/dd/yyyy";
                        }
                    
                    }
                </script>