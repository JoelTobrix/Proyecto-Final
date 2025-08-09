<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/png">
    <link href="{{ asset('css/register.css') }}" rel="stylesheet"> 
    <title>MJB - Registro</title>
</head>
<body>
    <div class="container">
        <div class="left-section"></div>
        
        <div class="right-section">
            <h2 class="form-title">CREAR CUENTA:</h2>

            @if(session('success'))
                <p style="color: green;">{{ session('success') }}</p>
            @endif

            @if($errors->any())
                <div style="color: red;">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form id="registrationForm" method="POST" action="{{ route('usuario.registrar') }}">
                @csrf
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="nombre">Nombre *</label>
                        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido *</label>
                        <input type="text" id="apellido" name="apellido" value="{{ old('apellido') }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="direccion">Dirección *</label>
                    <textarea id="direccion" name="direccion" required>{{ old('direccion') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono *</label>
                    <input type="tel" id="telefono" name="telefono" value="{{ old('telefono') }}" required>
                </div>

                <div class="form-group">
                    <label for="correo">Correo Electrónico *</label>
                    <input type="email" id="correo" name="correo" value="{{ old('correo') }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña *</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirmar Contraseña *</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>

                <div class="form-group">
                    <label for="rol_id">Seleccionar Rol *</label>
                    <select id="rol_id" name="rol_id" required>
                        <option value="">Seleccione su rol</option>
                        @foreach($roles as $rol)
                            <option value="{{ $rol->RollId }}" {{ old('rol_id') == $rol->RollId ? 'selected' : '' }}>
                                {{ $rol->RoleNombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="terminos" name="terminos" required>
                    <label for="terminos">Acepto los términos y condiciones *</label>
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="newsletter" name="newsletter">
                    <label for="newsletter">Deseo recibir noticias y actualizaciones</label>
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                    <button type="button" class="btn btn-secondary" onclick="limpiarFormulario()">Limpiar</button>
                </div>
            </form>

            <div class="login-link">
                <a href="#" onclick="irALogin()">¿Ya tienes cuenta? Iniciar sesión</a>
            </div>
        </div>
    </div>

    <script>
        function limpiarFormulario() {
            document.getElementById('registrationForm').reset();
        }
        function irALogin() {
            window.location.href = "/login";
        }
    </script>
</body>
</html>
