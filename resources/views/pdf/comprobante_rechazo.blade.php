<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Comprobante de Cita Rechazada</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { color: red; }
    </style>
</head>
<body>
    <h1>Cita Rechazada</h1>
    <p>Estimado/a {{ $cita->nombre }},</p>
    <p>Lamentamos informarle que su cita para la propiedad:</p>
    <p><strong>{{ $cita->propiedad->titulo }}</strong></p>
    <p>Ha sido <strong style="color:red;">RECHAZADA</strong>.</p>
    <p>Fecha: {{ $cita->fecha }} | Hora: {{ $cita->hora }}</p>
</body>
</html>
