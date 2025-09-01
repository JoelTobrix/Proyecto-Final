<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propiedades y terrenos.</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f8fafc;
            padding: 2rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .table-wrapper {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .table-header {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            padding: 1.5rem;
            color: white;
        }

        .table-header h2 {
            font-size: 1.25rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .table-header .icon {
            color: #bfdbfe;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead tr {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        }

        th {
            padding: 1rem;
            text-align: left;
            font-weight: 500;
            color: white;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        tbody tr {
            border-bottom: 1px solid #f1f5f9;
            transition: background-color 0.2s ease;
        }

        tbody tr:hover {
            background-color: #f8fafc;
        }

        td {
            padding: 1rem;
            color: #374151;
            font-size: 0.875rem;
        }

        td img {
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-size: 0.875rem;
            font-weight: 500;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            display: inline-block;
            margin-right: 0.5rem;
        }

        .btn-warning {
            background-color: #f59e0b;
            color: white;
        }

        .btn-warning:hover {
            background-color: #d97706;
        }

        .btn-danger {
            background-color: #ef4444;
            color: white;
        }

        .btn-danger:hover {
            background-color: #dc2626;
        }

        .actions-form {
            display: inline;
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }
            
            .table-wrapper {
                overflow-x: auto;
            }
            
            table {
                min-width: 800px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-header">
                <h2>
                    
                    Sección de Propiedades y terrenos
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
                    @foreach($propiedades as $prop)
                    <tr>
                        <td>{{ $prop->idPropiedad }}</td>
                        <td>{{ $prop->titulo }}</td>
                        <td>{{ $prop->ubicacion }}</td>
                        <td>{{ $prop->precio }}</td>
                        <td>{{ $prop->descripcion }}</td>
                        <td>
                            @if($prop->imagen)
                                <img src="{{ asset('storage/'.$prop->imagen) }}" width="80" />
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
