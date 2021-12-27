<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<?php 
    include("../conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM venta";
  
    

    $ventas = array(); //creamos un array
    if($query=mysqli_query($con,$sql)){
while($row = mysqli_fetch_array($query)) 
{ 	

    $folio=$row['folio'];
    $dato1=$row['fecha'];
    $dato2= $row['cantidad'];
    $dato3= $row['Id_Garrafon'];
    $dato4=$row['Id_Empleado'];
    $dato5=$row['Id_Cliente'];
    $dato6=$row['importe_total'];

	
	$ventas[] = array('folio'=> $folio, 'fecha'=> $dato1,'cantidad'=> $dato2, 'id_garrafon'=> $dato3,
						'id_empleado'=> $dato4, 'id_cliente'=> $dato5,'total'=> $dato6);

}
    }
$json_string = json_encode($ventas);
echo $json_string;
?>
<br>
<a class="btn btn-primary btn-lg btn-block" href="venta.php" role="button">Regresar</a>