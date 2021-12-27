<?php 

    include("../conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM empleado";

  $query=mysqli_query($con,$sql);

  header("Content-type: text/xml");
  //con esto se lee como XML
  $contenido = "<information>";

  while($row = mysqli_fetch_array($query))
  {
      $contenido .= "<Datos>";
      $contenido .= "<curp>".$row["curp"]."</curp>";
      $contenido .= "<Nombre>".$row["nombres"]."</Nombre>";
      $contenido .= "<Apellidos>".$row["apellidos"]."</Apellidos>";
      $contenido .= "<Telefono>".$row["Telefono"]."</Telefono>";
    
      $contenido .= "</Datos>";
  }

  $contenido .= "</information>";

  echo $contenido;
  
?>

