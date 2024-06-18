@extends('layouts.base')

@section('content')
<div class="container">
            <div class="page-header">
                <h1 class="all-tittles">Sistema bibliotecario <small>Editar libro</small></h1>
            </div>
        </div>
        <div class="container-fluid" style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="/assets/img/flat-book.png" alt="pdf" class="img-responsive center-box"
                        style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido a la sección para editar los libros de la biblioteca, deberas de llenar todos los
                    campos para poder registrar el libro
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form">
                @if (Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{Session::get('success')}}<br>
                   
                </div>
                @endif
                <div class="title-flat-form title-flat-blue">Editar libro</div>
                <form class="form-padding" action="{{route('book.update',$libro->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xs-12">
                            <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información básica</legend><br>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="group-material">
                                <input type="text" name="titulo" class="tooltips-general material-control"
                                    placeholder="Escribe aquí el título o nombre del libro" required="" maxlength="70"
                                    data-toggle="tooltip" data-placement="top"
                                    title="Escribe el título o nombre del libro" value="{{$libro->titulo}}">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Título</label>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="group-material">
                                <input type="text" name="codigo_internacional" class="tooltips-general material-control"
                                    placeholder="Escribe aquí el código correlativo del libro" pattern="[0-9]{1,20}"
                                    required="" maxlength="20" data-toggle="tooltip" data-placement="top"
                                    title="Escribe el código correlativo del libro, solamente números" value="{{$libro->codigo_internacional}}">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Código internacional</label>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="group-material">
                                <span>Autor</span>
                                <select name="id_autor" class="tooltips-general material-control" data-toggle="tooltip" data-placement="top" title="Elige el autor del libro">
                                    <option value="" disabled="">Selecciona un Autor</option>
                                    @foreach($autores as $autor)
                                        <option value="{{ $autor->id }}" {{ $libro->autor->id == $autor->id ? 'selected' : '' }}>{{ $autor->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="group-material">
                                <span>Idioma</span>
                                <select name="id_idioma" class="tooltips-general material-control" data-toggle="tooltip" data-placement="top" title="Elige el idioma del libro">
                                    <option value="" disabled="">Selecciona un idioma</option>
                                    @foreach($idiomas as $idioma)
                                        <option value="{{ $idioma->id }}" {{ $libro->idioma->id == $idioma->id ? 'selected' : '' }}>{{ $idioma->nombre_idioma }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <legend><i class="zmdi zmdi-bookmark-outline"></i> &nbsp; Categoria</legend><br>
                        </div>
                        <div class="col-xs-12">
                            <div class="group-material">
                                <span>Categoria</span>
                                <select name="id_categoria" class="tooltips-general material-control" data-toggle="tooltip" data-placement="top" title="Elige la categoría del libro">
                                    <option value="" disabled="">Selecciona una Categoria</option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" {{ $libro->categoria->id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre_categoria }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <legend><i class="zmdi zmdi-label"></i> &nbsp; Otros datos</legend><br>
                        </div>
                        {{-- <div class="col-xs-12">
                            <div class="group-material">
                                <span>Proveedor</span>
                                <select class="tooltips-general material-control" data-toggle="tooltip"
                                    data-placement="top" title="Elige el proveedor del libro">
                                    <option value="" disabled="" selected="">Selecciona un proveedor</option>
                                    <option value="proveedor">Proveedor</option>
                                    <option value="proveedor">Proveedor</option>
                                    <option value="proveedor">Proveedor</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general"
                                    placeholder="Escribe aquí el año del libro" required="" pattern="[0-9]{1,4}"
                                    maxlength="4" data-toggle="tooltip" data-placement="top"
                                    title="Solamente números, sin espacios">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Año</label>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general"
                                    placeholder="Escribe aquí la editorial del libro" required="" maxlength="70"
                                    data-toggle="tooltip" data-placement="top" title="Editorial del libro">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Editorial</label>
                            </div>
                        </div> --}}
                        <div class="col-xs-12 col-sm-6">
                            <div class="group-material">
                                <input type="text" name="edicion" class="material-control tooltips-general"
                                    placeholder="Escribe aquí la edición del libro" required="" maxlength="50"
                                    data-toggle="tooltip" data-placement="top" title="Edición del libro" value="{{$libro->edicion}}">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Edición</label>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="group-material">
                                <input type="text" name='cantidad_disponible' class="material-control tooltips-general"
                                    placeholder="Escribe aquí la cantidad de libros que registraras" required=" "
                                    pattern="[0-9]{1,7}" maxlength="7" data-toggle="tooltip" data-placement="top" value="{{$libro->cantidad_disponible}}"
                                    title="¿Cuántos libros registraras?">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Ejemplares</label>
                            </div>
                        </div>
                        {{-- <div class="col-xs-12">
                            <legend><i class="zmdi zmdi-map"></i> &nbsp; Estado físico, ubicación y valor</legend><br>
                        </div>

                        <div class="col-xs-12">
                            <div class="group-material">
                                <span>Cargo</span>
                                <select class="tooltips-general material-control" data-toggle="tooltip"
                                    data-placement="top" title="Elige el cargo del libro">
                                    <option value="" disabled="" selected="">Selecciona el cargo del libro</option>
                                    <option value="1-1">Entrega del ministerio</option>
                                    <option value="1-2">Donaciones</option>
                                    <option value="1-3">Compras con fondos propios</option>
                                    <option value="1-4">Presupuesto escolar</option>
                                    <option value="1-5">Otros</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="group-material">
                                <span>Estado</span>
                                <select class="tooltips-general material-control" data-toggle="tooltip"
                                    data-placement="top" title="Elige el estado del libro">
                                    <option value="" disabled="" selected="">Selecciona el estado del libro</option>
                                    <option value="Bueno">Bueno</option>
                                    <option value="Deteriorado">Deteriorado</option>
                                </select>
                            </div>
                        </div> --}}
                        <div class="col-xs-12">
                            <p class="text-center">
                                <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i
                                        class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                                <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i>
                                    &nbsp;&nbsp; Guardar</button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                    </div>
                    <div class="modal-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore dignissimos qui molestias
                        ipsum officiis unde aliquid consequatur, accusamus delectus asperiores sunt. Quibusdam veniam
                        ipsa accusamus error. Animi mollitia corporis iusto.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i
                                class="zmdi zmdi-thumb-up"></i> &nbsp; De acuerdo</button>
                    </div>
                </div>
            </div>
        </div>
@endsection