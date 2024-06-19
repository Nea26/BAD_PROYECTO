@extends('layouts.base')
@section('content')

        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Sistema bibliotecario <small>Editar prestamo</small></h1>
            </div>
        </div>
        <div class="container-fluid"  style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="{{asset('assets/img/flat-book.png')}}" alt="pdf" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido a la sección para editar un prestamo creado, deberas de llenar todos los campos para poder registrar el prestamo
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
                <div class="title-flat-form title-flat-blue">Editar Prestamo</div>
                <form method="POST" action="{{route('prestamoPendiente.update', $prestamo)}}" class="form-padding">
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
                                <input name="carnet" type="text" value="{{old('carnet',$prestamo->carnet_miembro)}}" class="tooltips-general material-control" placeholder="Escribe aquí el carnet del que solicita el prestamo" required="" maxlength="70" data-toggle="tooltip" data-placement="top" title="Escribe aquí el carnet del que solicita el prestamo">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Carnet</label>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6" id="fPrestamo">
                            <label>Fecha de prestamo</label>
                            <div class="group-material">
                                <input name="fechaPrestamo" type="date" value="{{old('fechaPrestamo',$prestamo->fecha_prestamo)}}" readonly class="tooltips-general material-control" placeholder="Escribe aquí la fecha en el que se realizo el prestamo" required="" maxlength="70" data-toggle="tooltip" data-placement="top" title="Fecha en el que se realizo el prestamo">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6" id="fDevolucion">
                            <label>Fecha de devolución</label>
                            <div class="group-material" >
                                <input name="fechaDevolucion" type="date" value="{{old('fechaDevolucion',$prestamo->fecha_devolucion)}}" readonly class="tooltips-general material-control" placeholder="Escribe aquí el dia en que se devolvera el libro" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Fecha en que se devolvera el libro">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="group-material">
                        <input name="devuelto" type="checkbox"  id="check" checked="checked" onchange="javascript:showContent()"  placeholder="Marca si el libro ha sido devuelto" value="first_checkbox" title="Marca si el libro ha sido devuelto" />
                            ¿Aprobado?
                        <br />
                        </div>
                        </div>
                        <div class="col-xs-12 col-sm-6" id="extender">
                            <div class="group-material">
                        <input name="extenso" type="checkbox" id="prorroga"  placeholder="Marca si el libro ha sido devuelto" value="first_checkbox" title="Marca si el libro ha sido devuelto" />
                            ¿Extender prestamo 5 dias?
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
        <script type="text/javascript">
            function showContent() {
                element2 = document.getElementById("fPrestamo");
                element3 = document.getElementById("fDevolucion");
                element4 = document.getElementById("extender");
                check = document.getElementById("check");
                
                if (check.checked) {
                    element2.style.display='block';
                    element3.style.display='block';
                    element4.style.display='block';
                }
                else {
                    element2.style.display='none';
                    element3.style.display='none';
                    element4.style.display='none';
                    document.getElementById("prorroga").checked = false;
                    
                }
            }
        </script>
               