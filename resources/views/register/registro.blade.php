<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('logo.png')}}" type="image/png">
    <link href="{{asset('css/register.css')}}" rel="stylesheet"> 
    <title>MJB - Registro</title>
    
</head>
<body>
    <div class="container">
        <div class="left-section">
            
        </div>
        
        <div class="right-section">
            <h2 class="form-title">CREAR CUENTA:</h2>
            
            <form id="registrationForm">
                <div class="form-row">
                    <div class="form-group">
                        <label for="nombre">Nombre *</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido *</label>
                        <input type="text" id="apellido" name="apellido" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="direccion">Dirección *</label>
                    <textarea id="direccion" name="direccion" placeholder="Ingrese su dirección completa" required></textarea>
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono *</label>
                    <input type="tel" id="telefono" name="telefono" placeholder="+1 (555) 123-4567" required>
                </div>

                <div class="form-group">
                    <label for="email">Correo Electrónico *</label>
                    <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" required>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña *</label>
                    <input type="password" id="password" name="password" placeholder="Mínimo 8 caracteres" required>
                </div>

                <div class="form-group">
                    <label for="confirmPassword">Confirmar Contraseña *</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Repita su contraseña" required>
                </div>

                <div class="form-group">
                    <label for="rol">Seleccionar Rol *</label>
                    <select id="rol" name="rol" required>
                        <option value="">Seleccione su rol</option>
                        <option value="propietario">Propietario</option>
                        
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
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            if (password !== confirmPassword) {
                alert('Las contraseñas no coinciden');
                return;
            }
            
            if (password.length < 8) {
                alert('La contraseña debe tener al menos 8 caracteres');
                return;
            }
            
            // Aquí iría la lógica para enviar los datos al servidor
            alert('Registro exitoso! (En una aplicación real, aquí se enviarían los datos al servidor)');
        });

        function limpiarFormulario() {
            document.getElementById('registrationForm').reset();
        }

        function irALogin() {
            // Aquí iría la lógica para redirigir al login
            alert('Redirigiendo al login...');
        }
    </script>
</body>
</html>
