<div class="container">
    <div class="table-wrapper">
        <div class="table-header">
            <h2>
                ⭐ Propiedades Destacadas
            </h2>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Ubicación</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Disponible</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($propiedades as $prop)
                    <tr>
                        <td>{{ $prop->idPropiedad }}</td>
                        <td>{{ $prop->titulo }}</td>
                        <td>{{ $prop->ubicacion }}</td>
                        <td>${{ number_format($prop->precio, 2) }}</td>
                        <td>{{ $prop->descripcion }}</td>
                        <td>
                            @if($prop->imagen)
                                <img src="{{ asset('storage/'.$prop->imagen) }}" width="80" />
                            @else
                                <span>Sin imagen</span>
                            @endif
                        </td>
                        <td>{{ $prop->disponible ? 'Sí' : 'No' }}</td>
                        <td>{{ $prop->estado }}</td>
                        <td>
                            <a href="{{ route('propiedades.editar', $prop->idPropiedad) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('propiedades.eliminar', $prop->idPropiedad) }}" method="POST" class="actions-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Desea eliminar esta propiedad?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" style="text-align:center; padding:1rem;">
                            No hay propiedades destacadas actualmente.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
