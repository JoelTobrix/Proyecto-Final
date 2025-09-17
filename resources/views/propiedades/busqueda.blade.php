<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('logo.png')}}" type="image/png">
    <title>Búsqueda de Propiedades</title>
    <style>
        .dashboard-container {
    max-width: 1200px;
    margin: 2rem auto;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    padding: 0 1rem;
}

.dashboard-title {
    text-align: center;
    color: #374151;
    font-size: 2rem;
    margin-bottom: 2rem;
}

.search-form {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    justify-content: center;
    margin-bottom: 2rem;
}

.search-form input,
.search-form select {
    padding: 0.5rem 1rem;
    border-radius: 8px;
    border: 1px solid #ccc;
    min-width: 180px;
}

.btn-search {
    background-color: #2563eb;
    color: white;
    padding: 0.5rem 1.5rem;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.2s;
}

.btn-search:hover {
    background-color: #1d4ed8;
}

.propiedades-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
}

.propiedad-card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    padding: 1.5rem;
    text-align: center;
    transition: transform 0.2s;
}

.propiedad-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0,0,0,0.15);
}

.propiedad-card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 1rem;
}

.propiedad-card h3 {
    font-size: 1.2rem;
    color: #111827;
    margin-bottom: 0.5rem;
}

.propiedad-card p {
    margin: 0.25rem 0;
    color: #4b5563;
}

.no-results {
    text-align: center;
    font-size: 1.1rem;
    color: #6b7280;
    margin-top: 2rem;
}
    </style>
</head>
<body>
<div class="container">
    <h1 class="title">Búsqueda de Propiedades 🔎</h1>
    
    <!-- Formulario de búsqueda -->
    <form action="{{ route('propiedades.busqueda') }}" method="GET" class="search-form">
        <input type="text" name="titulo" placeholder="Título" value="{{ request('titulo') }}">
        <input type="text" name="ubicacion" placeholder="Ubicación" value="{{ request('ubicacion') }}">
        <input type="number" name="precio_min" placeholder="Precio mínimo" value="{{ request('precio_min') }}">
        <input type="number" name="precio_max" placeholder="Precio máximo" value="{{ request('precio_max') }}">
        <select name="estado">
            <option value="">-- Estado --</option>
            <option value="disponible" {{ request('estado') == 'disponible' ? 'selected' : '' }}>Disponible</option>
            <option value="reservada" {{ request('estado') == 'reservada' ? 'selected' : '' }}>Reservada</option>
        </select>
        <button type="submit" class="btn-search">Buscar</button>
    </form>

    <!-- Resultados -->
    <div class="results">
        @if(isset($propiedades) && $propiedades->count() > 0)
            <div class="propiedades-grid">
                @foreach($propiedades as $prop)
                    <div class="propiedad-card">
                        <img src="{{ $prop->imagen ? asset('storage/'.$prop->imagen) : asset('images/no-image.png') }}" alt="{{ $prop->titulo }}">
                        <h3>{{ $prop->titulo }}</h3>
                        <p>{{ $prop->ubicacion }}</p>
                        <p><strong>Precio:</strong> ${{ $prop->precio }}</p>
                        <p><strong>Estado:</strong> {{ $prop->estado }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <p>No se encontraron propiedades con los filtros indicados.</p>
        @endif
    </div>
</div>
</body>
</html>
