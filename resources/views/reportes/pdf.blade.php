<!doctype html>
<html lang="en">

<head>
    <title>PDF</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            /* Cambiado a una fuente estándar */
            color: #333;

            margin: 20px;
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 40px;
            background-color: #f8f9fa;
        }

        .header img {
            height: 100px;
            margin-right: 20px;
            float: left;
        }

        .header h1 {
            margin: 20;
            font-size: 28px;
            color: black;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
            margin-bottom: 30px;
            color: rgb(6, 39, 203);
        }

        .table-custom {
            width: 90%;
            /* Ancho personalizado de la tabla */
            margin: auto;
            /* Centra la tabla horizontalmente */
        }

        .table-custom thead {
            background-color: #000;
            /* Fondo negro para el thead */
        }

        .table-custom thead th {
            color: #fff;
            /* Texto blanco para mayor contraste */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table,
        th,
        td {
            border: 1px solid #dee2e6;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #030304;
            color: #ffffff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .text-center {
            text-align: center;
        }

        .lead {
            font-size: 16px;
            text-align: center;
            margin-top: 20px;
            color: #6c757d;
        }
    </style>
</head>

<body>

    <div class="header">
        <img src="assets/img/logo.png" alt="Biblioteca" />
        <h1>Sistema Bibliotecario - Reportes</h1>
        <p style="text-align: left">Fecha y Hora de Creación: {{ date('Y-m-d H:i:s') }}</p>
        <p style="text-align: center">Realizado por: {{ $usuario }}</p>
    </div>
    <h2>Total de Préstamos por Usuarios de la Biblioteca</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-hover text-center table-custom">
                        <thead>
                            <tr class="success">
                                <th class="text-center">Tipo usuario</th>
                                <th class="text-center">N. Préstamos</th>
                                <th class="text-center">Porcentaje</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center"><img src="assets/img/user03.png" alt="Descripción" width="30" height="25"> Miembros</td>
                                <td class="text-center">{{ $totalPrestamosMiembros }}</td>
                                <td class="text-center">
                                    {{ $totalPrestamosUsuarios != 0 ? number_format(($totalPrestamosMiembros / $totalPrestamosUsuarios) * 100, 2) : 0 }}%
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><img src="assets/img/user02.png" alt="Descripción" width="30" height="25"> Profesores</td>
                                <td class="text-center">{{ $totalPrestamosProfesores }}</td>
                                <td class="text-center">
                                    {{ $totalPrestamosUsuarios != 0 ? number_format(($totalPrestamosProfesores / $totalPrestamosUsuarios) * 100, 2) : 0 }}%
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
        </div>
    </div>
    <div class="page-header">
        <h2>Estadísticas de Préstamos</h2>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="table-responsive">
                <table class="table table-hover text-center table-custom">
                    <thead>
                        <tr class="success">
                            <th class="text-center">Estadística</th>
                            <th class="text-center">N. Préstamos</th>
                            <th class="text-center">Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center"><img src="assets/img/user03.png" alt="Descripción" width="30" height="25"> Miembro con mayor préstamos realizados</td>
                            <td class="text-center">{{ $mayorPrestamoMiembro->total_prestamos }}</td>
                            <td class="text-center">{{ explode(' ', $mayorPrestamoMiembro->nombre)[0] }}
                                {{ explode(' ', $mayorPrestamoMiembro->apellido)[0] }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><img src="assets/img/user02.png" alt="Descripción" width="30" height="25"> Profesor con mayor préstamos realizados</td>
                            <td class="text-center">{{ $mayorPrestamoProfesor->total_prestamos }}</td>
                            <td class="text-center">{{ explode(' ', $mayorPrestamoProfesor->nombre)[0] }}
                                {{ explode(' ', $mayorPrestamoProfesor->apellido)[0] }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><img src="assets/img/book.png" alt="Descripción" width="30" height="25"> Libro más prestado</td>
                            <td class="text-center">{{ $libroMasPrestado->total_prestamos }}</td>
                            <td class="text-center">{{ $libroMasPrestado->titulo }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
