<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmación de Cita</title>
</head>
<body>
    <p>Hola {{ $cita->nombre }},</p>
    <p>Tu cita para la propiedad <strong>{{ $cita->propiedad->titulo ?? '' }}</strong> ha sido <strong>{{ ucfirst($cita->estado) }}</strong>.</p>
    <p>Adjuntamos tu comprobante de cita en PDF.</p>
    <p>Gracias por confiar en Inmobiliaria MJB.</p>
</body>
</html>
