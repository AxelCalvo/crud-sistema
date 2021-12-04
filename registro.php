
<?php
include 'conexion.php';
$con=conectar();
$usuario=$_POST['usuario'];

$clave=$_POST['contrasena'];


if ($usuario==""||$clave=="") {
    echo'
    <script>
    alert ("Campos vacios");
    window.location="index.php";
    </script>
    ';
    exit();
}

if (strlen($clave)<8) {
    echo'
    <script>
    alert ("La contraseña no debe ser menor a 8 caracteres");
    window.location="index.php";
    </script>
    ';
    exit();
}

$query="INSERT INTO usuario 
VALUES(default,'$usuario','$clave')";
//verificar que los  nombres de usuario no se repitan

$verificar_Usuario=mysqli_query($con, "SELECT * FROM usuario WHERE nombre='$usuario'");
if(mysqli_num_rows($verificar_Usuario) > 0) {
    echo'
    <script>
    alert ("Este Usuario ya fue registrado, Intenta con otro");
    window.location="index.php";
    </script>
    ';
    exit();
}
$ejecutar=mysqli_query($con,$query);

if($ejecutar){

    echo'
    <script>
    alert("usuario almacenado exitosamente");
    window.location="index.php";
    </script>
    ';
}else{
    echo'
    <script>
    alert("usuario no almacenado,pruebe de nuevo");
    window.location="index.php";
    </script>
    ';
}

?>
