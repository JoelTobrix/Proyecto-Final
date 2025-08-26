
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verificar Código de Recuperación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="icon" href="logo.png" type="image/png">
</head>
<body>
    <div class="container mt-5">
        <h2>Verificar Código de Recuperación</h2>
        <p>Ingresa el código que recibiste en tu correo electrónico.</p>
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form method="POST" action="{{ route('codigo.verificar') }}">
            @csrf
            <div class="mb-3">
                <input type="text" name="codigo" class="form-control" placeholder="Código de recuperación" required maxlength="6">
            </div>
            <button type="submit" class="btn btn-primary">Verificar código</button>
        </form>
    </div>
</body>
</html>