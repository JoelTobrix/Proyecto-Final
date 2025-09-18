@extends('layouts.app')

@section('content')
<div class="detalle-propiedad">
    <h1>{{ $propiedad->nombre }}</h1>
    <p><strong>Descripción:</strong> {{ $propiedad->descripcion }}</p>
    <p><strong>Precio:</strong> ${{ number_format($propiedad->precio, 2) }}</p>
    <p><strong>Dirección:</strong> {{ $propiedad->direccion }}</p>
    <p><strong>Estado:</strong> {{ $propiedad->disponible ? 'Disponible' : 'No disponible' }}</p>
    
    <a href="{{ url()->previous() }}" class="btn btn-back">Volver</a>
</div>
@endsection
