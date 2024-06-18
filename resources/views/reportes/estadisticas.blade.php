@extends('layouts.base')
@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="all-tittles">Sistema bibliotecario <small>Reportes y estadísticas</small></h1>
        </div>
    </div>
    <div class="container-fluid">
        
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="statistics">
                <div class="container-fluid" style="margin: 50px 0;">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <img src="assets/img/chart.png" alt="chart" class="img-responsive center-box"
                                style="max-width: 120px;">
                        </div>
                        <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                            Bienvenido al área de estadísticas, aquí puedes ver las diferentes estadísticas de los préstamos
                            y libros.
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="page-header">
                        <h2 class="all-tittles">préstamos <small>en general</small></h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="text-center all-tittles">total de préstamos</h3>
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <thead>
                                        <tr class="success">
                                            <th class="text-center">Tipo usuario</th>
                                            <th class="text-center">N. Préstamos</th>
                                            <th class="text-center">Porcentaje</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Miembros</td>
                                            <td>{{ $totalPrestamosMiembros }}</td>
                                            <td> {{ $totalPrestamosUsuarios != 0 ? number_format(($totalPrestamosMiembros / $totalPrestamosUsuarios) * 100, 2) : 0 }}%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Profesores</td>
                                            <td>{{ $totalPrestamosProfesores }}</td>
                                            <td>{{ $totalPrestamosUsuarios != 0 ? number_format(($totalPrestamosProfesores / $totalPrestamosUsuarios) * 100, 2) : 0 }}%
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="info">
                                            <th class="text-center">Total</th>
                                            <th class="text-center">{{ $totalPrestamosUsuarios }}</th>
                                            <th class="text-center">
                                                {{ $totalPrestamosUsuarios != 0 ? number_format(($totalPrestamosMiembros / $totalPrestamosUsuarios) * 100 + ($totalPrestamosProfesores / $totalPrestamosUsuarios) * 100, 2) : 0 }}%
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="chart-container" style="position: relative; height:40vh; width:80vw">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                    
                    <div class="page-header">
                        <h2 class="all-tittles">Estadisticas de préstamos <small></small></h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="text-center all-tittles">préstamos de Usuarios</h3>
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <thead>
                                        <tr class="success">
                                            <th class="text-center">Estadistica </th>
                                            <th class="text-center">N. Préstamos</th>
                                            <th class="text-center">Nombre</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Miembro con mayor prestamos realizados</td>
                                            <td>{{ $mayorPrestamoMiembro->total_prestamos }}</td>
                                            <td>{{ explode(' ', $mayorPrestamoMiembro->nombre)[0] }}
                                                {{ explode(' ', $mayorPrestamoMiembro->apellido)[0] }}</td>
                                        </tr>

                                        <tr>
                                            <td>Profesor con mayor prestamos realizados</td>
                                            <td>{{ $mayorPrestamoProfesor->total_prestamos }}</td>
                                            <td>{{ explode(' ', $mayorPrestamoProfesor->nombre)[0] }}
                                                {{ explode(' ', $mayorPrestamoProfesor->apellido)[0] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Libro más prestado</td>
                                            <td>{{ $libroMasPrestado->total_prestamos }}</td>
                                            <td>{{ $libroMasPrestado->titulo }}</td>
                                        </tr>
                                    </tbody>

                                </table>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="chart-container" style="position: relative; height:40vh; width:80vw">
                                <canvas id="estadisticasUsuarios"></canvas>
                            </div>
                        </div>

                    </div>
                    
                    
                </div>
                <a class="btn btn-primary" href="{{route('reportes.pdf')}}">
                    <i class="zmdi zmdi-file-text"></i> Generar Reporte
                </a>
            </div>
            
        </div>
        @include('reportes.graficas')
    </div>
    @include('includes.footer')
@endsection
