@extends('layouts.app') <!-- o tu layout principal -->

@section('content')
<div id="realestate-section" class="content-section">
    <div class="breadcrumb">
        <i class="fas fa-home"></i>
        <span>Escritorio</span>
        <i class="fas fa-chevron-right"></i>
        <span>Propiedades Reservadas</span>
    </div>
    <div class="section-header">
        <h1><i class="fas fa-building"></i> Propiedades Reservadas</h1>
        <p>Administra todas las propiedades que han sido reservadas por clientes</p>
    </div>

    @if(isset($reservadas) && $reservadas->count() > 0)
        <div class="propiedades-grid">
            @foreach($reservadas as $prop)
                <div class="propiedad-card">
                    <img src="{{ asset('storage/' . $prop->imagen) }}" alt="{{ $prop->titulo }}">
                    <h4>{{ $prop->titulo }}</h4>
                    <p>Ubicación: {{ $prop->ubicacion }}</p>
                    <p>Precio: ${{ number_format($prop->precio, 2) }}</p>
                    <p>Estado: {{ ucfirst($prop->estado) }}</p>
                    <!-- Opcional: mostrar quién reservó y fecha -->
                    @foreach($prop->citas as $cita)
                        @if($cita->estado == 'aceptada')
                            <p>Reservado por: {{ $cita->nombre }} ({{ $cita->correo }})</p>
                            <p>Fecha: {{ $cita->fecha }} - Hora: {{ $cita->hora }}</p>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    @else
        <p>No hay propiedades reservadas actualmente.</p>
    @endif
</div>
@endsection
