<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verificación PIN</title>
    <link rel="icon" href="logo.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   
</head>

<body class="d-flex align-items-center justify-content-center vh-100 bg-light">

<div class="text-center">
    <img src="{{asset('img/logo.png')}}" alt="Logo" width="80" class="mb-3">

<div class="card shadow p-4" style="width: 400px;">
    <h4 class="mb-3">Verificacion de acceso con PIN</h4>

    @if(session('success'))
        <div class="alert alert-info">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('usuario.verificarPin') }}">
        @csrf
        <div class="form-group mb-3">
            <label for="pin">Ingrese su PIN temporal:</label>
            <input type="password" name="pin" id="pin" class="form-control" maxlength="4" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Verificar PIN</button>
    </form>
</div>
</div>

</body>
</html>
