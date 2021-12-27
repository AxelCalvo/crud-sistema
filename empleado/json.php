<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<?php 
    include("../conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM empleado";
  
    

    $empleados = array(); //creamos un array
    if($query=mysqli_query($con,$sql)){
while($row = mysqli_fetch_array($query)) 
{ 	

    $idE=$row['Id_Empleado'];
    $dato1=$row['curp'];
    $dato2= $row['nombres'];
    $dato3= $row['apellidos'];
    $dato4=$row['Telefono'];

	
	$empleados[] = array('idEmpleado'=> $idE, 'curp'=> $dato1,'nombres'=> $dato2, 'apellidos'=> $dato3,
						'telefono'=> $dato4);


}
    }
$json_string = json_encode($empleados);
echo $json_string;
?>
<br>
<a class="btn btn-primary btn-lg btn-block" href="empleado.php" role="button">Regresar</a>