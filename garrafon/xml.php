<?php 

    include("../conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM garrafon";

  $query=mysqli_query($con,$sql);

  header("Content-type: text/xml");
  //con esto se lee como XML
  $contenido = "<information>";

  while($row = mysqli_fetch_array($query))
  {
      $contenido .= "<Datos>";
      $contenido .= "<Costo>".$row["costo"]."</Costo>";
      $contenido .= "<Precio>".$row["precio_venta"]."</Precio>";
      $contenido .= "<Color>".$row["color"]."</Color>";
      $contenido .= "<Caducidad>".$row["caducidad"]."</Caducidad>";
      $contenido .= "<Cantidad>".$row["cantidad"]."</Cantidad>";
      $contenido .= "</Datos>";
  }

  $contenido .= "</information>";

  echo $contenido;
  
?>

