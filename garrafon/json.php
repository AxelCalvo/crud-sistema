<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<?php 
    include("../conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM garrafon";
  
    

    $garrafones = array(); //creamos un array
    if($query=mysqli_query($con,$sql)){
while($row = mysqli_fetch_array($query)) 
{ 	

    $idG=$row['Id_Garrafon'];
    $dato1=$row['costo'];
    $dato2= $row['precio_venta'];
    $dato3= $row['color'];
    $dato4=$row['caducidad'];
    $dato5=$row['cantidad'];
 

	
	$garrafones[] = array('idG'=> $idG, 'costo'=> $dato1, 'precio_venta'=> $dato2,
						'color'=> $dato3, 'caducidad'=> $dato4,'cantidad'=> $dato5);


}
    }
$json_string = json_encode($garrafones);
echo $json_string;
?>
<br>
<a class="btn btn-primary btn-lg btn-block" href="garrafon.php" role="button">Regresar</a>