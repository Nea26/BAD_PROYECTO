@extends('layouts.base')
@section('content')


<div class="container">
    <div class="page-header">
      <h1 class="all-tittles">Sistema bibliotecario <small>Detalle de Reserva</small></h1>
    </div>
</div>

<h2 class="text-center all-tittles">Ejemplar: {{$prestamo->id_ejemplar}}</h2>
<h2 class="text-center all-tittles">Carnet del miembro: {{$prestamo->carnet_miembro}}</h2>
<h2 class="text-center all-tittles">Fecha de Solicitud: {{$prestamo->created_at->format('Y-m-d')}}</h2>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

@endsection