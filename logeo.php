
<?php
session_start();
include 'conexion.php';
$con=conectar();
// Validar si el usuario ya inicio sesión
if (!empty($_SESSION['active'])) {
  // redirecciona al usuario a la pantalla de bienvenida
  header("location: menu.php");
}
else {
  // para evitar caracteres especiales
$nombre=mysqli_real_escape_string($con,$_POST['nombre']);
$contrasena=mysqli_real_escape_string($con,$_POST['clave']);

if ($nombre==""||$contrasena=="") {
    echo'
    <script>
    alert ("Campos vacios");
    window.location="index.php";
    </script>
    ';
    echo '$nombre';
    exit();
}

if (strlen($contrasena)<8) {
    echo'
    <script>
    alert ("La contraseña no debe ser menor a 8 caracteres");
    window.location="index.php";
    </script>
    ';
    exit();
}
$validar_login= mysqli_query($con,"SELECT * FROM usuario WHERE nombre='$nombre' and clave='$contrasena'");
if (mysqli_num_rows($validar_login) >0) {

    $sesion = mysqli_fetch_array($validar_login);
    // Esta variable va a servir para determinar si la sesión esta activa
    $_SESSION['active'] = true;
    // Estas son tomadas del array y comparadas con la del inicio de sesion
    $_SESSION['Id_Usuario']= $sesion['Id_Usuario'];
    $_SESSION['nombre'] = $sesion['nombre'];
    $_SESSION['clave'] = $sesion['clave'];
 

    header("location:menu.php");
    exit();
} else{


    echo'
    <script>
    alert ("# El usuario no existe.");
    window.location="index.php";
    </script>
    ';
    session_destroy();
    exit();
}
}
?>
