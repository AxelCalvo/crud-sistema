<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Registro</title>
    <link rel="stylesheet" href="estilos.css?wwew2">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
   

<main>
<div class="contenedor_todo">
    <div class="caja_trasera">
        <div class="caja_trasera_login">
            <h3>¿Ya tienes una cuenta?</h3>
            <p>Inicia sesion para entrar a la pagina</p>
            <button id="btn_iniciar_sesion">Iniciar Sesión</button>

        </div>
        <div class="caja_trasera_registrar">
            <h3>¿Aun no tienes cuenta?</h3>
            <p>Registrate para que puedas iniciar sesión</p>
            <button id="btn_registrar">Registrarse</button>

        </div>

    </div>

    <div class="contenedor_login_registrar">
        <form action="logeo.php" method="POST" class="formulario_login">
            <h2>Iniciar Sesión</h2>
            <input type="text" placeholder="Nombre de Usuario"required name=nombre>
            <input type="password"placeholder="Contraseña(maximo 8 caracteres)"required name=clave  maxlength="8">
            <button formnovalidate>Acceder</button>
        </form>
        <form action="registro.php" method="POST" class="formulario_registrar">
            <h2>Registrarse</h2>
            <input type="text" placeholder="Nombre de usuario" name="usuario">
            
            <input type="password"placeholder="Contraseña(maximo 8 caracteres)"name="contrasena" maxlength="8">
            <button>Registrar</button>
        </form>
    </div>
</div>
</main>
<script src="script.js"></script>
</body>
</html>