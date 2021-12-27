<?php 

    include("../conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM venta";

  $query=mysqli_query($con,$sql);

  header("Content-type: text/xml");
  //con esto se lee como XML
  $contenido = "<information>";

  while($row = mysqli_fetch_array($query))
  {
      $contenido .= "<Datos>";
      $contenido .= "<Folio>".$row["folio"]."</Folio>";
      $contenido .= "<Fecha>".$row["fecha"]."</Fecha>";
      $contenido .= "<Cantidad>".$row["cantidad"]."</Cantidad>";
      $contenido .= "<Id_Garrafon>".$row["Id_Garrafon"]."</Id_Garrafon>";
      $contenido .= "<Id_Empleado>".$row["Id_Empleado"]."</Id_Empleado>";
      $contenido .= "<Id_Cliente>".$row["Id_Cliente"]."</Id_Cliente>";
      $contenido .= "<Total>".$row["importe_total"]."</Total>";
      $contenido .= "</Datos>";
  }

  $contenido .= "</information>";

  echo $contenido;
  
?>

