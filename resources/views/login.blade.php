<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmobiliaria MJB Quito - Iniciar Sesión</title>
    <link rel="icon" href="{{asset('logo.png')}}" type="image/png">
    <link href="{{asset('css/login.css')}}" rel="stylesheet"> 
</head>
<body>
    <div class="login-container">
        <!-- Background Section -->
        <div class="background-section">
            <div class="brand-info">
                <h1 class="brand-title">MJB - RENTA O VENTA</h1>
                <p class="brand-subtitle">Copyright 2025 © MJB - Version 1.0</p>
            </div>
        </div>

        <!-- Login Form Section -->
        <div class="login-section">
            <div class="login-header">
                <h2 class="login-title">Iniciar Sesión:</h2>
            </div>

            <form id="loginForm" onsubmit="handleLogin(event)">
                <div class="form-group">
                    <input 
                        type="text" 
                        id="username" 
                        class="form-input" 
                        placeholder="Correo electrónico / nombre de usuario"
                        required
                        autocomplete="username"
                    >
                </div>

                <div class="form-group">
                    <input 
                        type="password" 
                        id="password" 
                        class="form-input" 
                        placeholder="Contraseña"
                        required
                        autocomplete="current-password"
                    >
                </div>

                <div class="checkbox-group">
                    <input 
                        type="checkbox" 
                        id="remember" 
                        class="checkbox-input"
                    >
                    <label for="remember" class="checkbox-label">¿Recuérdame?</label>
                </div>

                <button type="submit" class="login-button" id="loginBtn">
                    Acceso
                </button>
            </form>

            <div class="forgot-password">
                <a href="#" onclick="handleForgotPassword()">¿Perdiste tu contraseña?</a>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>