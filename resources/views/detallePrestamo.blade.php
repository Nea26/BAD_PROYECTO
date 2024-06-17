@extends('layouts.base')
@section('content')


<div class="container">
    <div class="page-header">
      <h1 class="all-tittles">Sistema bibliotecario <small>Detalle de Prestamo</small></h1>
    </div>
</div>

<h2 class="text-center all-tittles">Ejemplar: {{$prestamo->id_ejemplar}}</h2>
<h2 class="text-center all-tittles">Carnet del miembro: {{$prestamo->carnet_miembro}}</h2>
<h2 class="text-center all-tittles">Fecha del prestamo: {{$prestamo->fecha_prestamo}}</h2>
<h2 class="text-center all-tittles">Fecha de devolución:  {{$prestamo->fecha_devolucion}}</h2>
<h2 class="text-center all-tittles">Devuelto: {{$prestamo->fecha_devuelto}}</h2> 
<h2 class="text-center all-tittles">Devuelto: {{$prestamo->devuelto}}</h2> 


@endsection