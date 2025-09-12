<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprobante de Cita</title>
   <!-- <link rel="stylesheet" href="{{asset('img/logo.png')}}"-->
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .content { margin: 0 30px; }
        .footer { text-align: center; margin-top: 30px; font-size: 12px; color: #555; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        td { padding: 8px; border: 1px solid #ccc; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Comprobante de Cita</h2>
        <p>Inmobiliaria MJB</p>
    </div>
    <div class="content">
        <table>
            <tr>
                <td><strong>Cliente:</strong></td>
                <td>{{ $cita->nombre }}</td>
            </tr>
            <tr>
                <td><strong>Correo:</strong></td>
                <td>{{ $cita->correo }}</td>
            </tr>
            <tr>
                <td><strong>Propiedad:</strong></td>
                <td>{{ $cita->propiedad->titulo ?? 'Sin propiedad' }}</td>
            </tr>
            <tr>
                <td><strong>Ubicación:</strong></td>
                <td>{{ $cita->propiedad->ubicacion ?? '' }}</td>
            </tr>
            <tr>
                <td><strong>Fecha:</strong></td>
                <td>{{ $cita->fecha }}</td>
            </tr>
            <tr>
                <td><strong>Hora:</strong></td>
                <td>{{ $cita->hora }}</td>
            </tr>
            <tr>
                <td><strong>Estado:</strong></td>
                <td>{{ ucfirst($cita->estado) }}</td>
            </tr>
        </table>
    </div>
    <div class="footer">
        Presenta este comprobante el día de tu cita para acceder a la propiedad.
    </div>
</body>
</html>
