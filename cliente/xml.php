<?php 

    include("../conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM cliente";

  $query=mysqli_query($con,$sql);

  header("Content-type: text/xml");
  //con esto se lee como XML
  $contenido = "<information>";

  while($row = mysqli_fetch_array($query))
  {
      $contenido .= "<Datos>";
      $contenido .= "<Nombre>".$row["nombres"]."</Nombre>";
      $contenido .= "<Apellidos>".$row["apellidos"]."</Apellidos>";
      $contenido .= "<Telefono>".$row["telefono"]."</Telefono>";
      $contenido .= "<Calle>".$row["calle"]."</Calle>";
      $contenido .= "<Numero>".$row["numero"]."</Numero>";
      $contenido .= "<Colonia>".$row["colonia"]."</Colonia>";
      $contenido .= "<Municipio>".$row["Municipio"]."</Municipio>";
      $contenido .= "</Datos>";
  }

  $contenido .= "</information>";

  echo $contenido;
  
?>

