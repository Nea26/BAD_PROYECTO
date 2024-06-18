<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar', // Tipo de gráfico, puede ser 'line', 'bar', 'radar', etc.
        data: {
            labels: ['Miembros', 'Profesores'], // Las categorías
            datasets: [{
                label: 'Cantidad de prestamos ', // La leyenda
                data: [{{$totalPrestamosMiembros}}, {{$totalPrestamosProfesores}}], // Los datos
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)', // Color de fondo para 'Miembros'
                    'rgba(54, 162, 235, 0.2)' // Color de fondo para 'Profesores'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)', // Color del borde para 'Miembros'
                    'rgba(54, 162, 235, 1)' // Color del borde para 'Profesores'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    stepSize: 10 // Escala de 10 en 10
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Numero de Prestamos por tipo de Usuario' // Título del gráfico
                }
            }
        }
    });
</script>
<script>
    var ctx = document.getElementById('estadisticasUsuarios').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                'Miembro con más préstamos:', 
                'Profesor con más préstamos: ', 
                'Libro más prestado:'
            ],
            datasets: [{
                label: 'Número de Préstamos',
                data: [{{ $mayorPrestamoMiembro->total_prestamos }}, {{ $mayorPrestamoProfesor->total_prestamos }}, {{ $libroMasPrestado->total_prestamos }}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    stepSize: 10 // Escala de 10 en 10
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Estadísticas de Préstamos' // Título del gráfico
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            var dataset = tooltipItem.dataset;
                            var index = tooltipItem.dataIndex;
                            var label = dataset.label || '';
                            var value = dataset.data[index];

                            // Datos adicionales para mostrar en los tooltips
                            var additionalData = [
                                'Miembro con más préstamos: {{explode(" ", $mayorPrestamoMiembro->nombre)[0] }} {{explode(" ", $mayorPrestamoMiembro->apellido)[0]}}',
                                'Profesor con más préstamos: {{ explode(' ', $mayorPrestamoProfesor->nombre)[0] }} {{ explode(' ', $mayorPrestamoProfesor->apellido)[0] }}',
                                'Libro más prestado: {{ $libroMasPrestado->titulo }}'
                            ];

                            // Crea el tooltip con los datos adicionales
                            return [
                                label + ': ' + value,
                                additionalData[index]
                            ];
                        }
                    }
                }
            }
        }
    });
</script>
