
<?php 
session_start();

if (isset($_SESSION['Id_Usuario']) && isset($_SESSION['nombre'])) {

 ?>
<?php 
    include("../conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM venta";
    $query=mysqli_query($con,$sql);
   
?>
<?php 
   

    $consulta="SELECT *  FROM garrafon";
    $qy=mysqli_query($con,$consulta);

    $consulta2="SELECT *  FROM empleado";
    $qy2=mysqli_query($con,$consulta2);

    $consulta3="SELECT *  FROM cliente";
    $qy3=mysqli_query($con,$consulta3);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Venta</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
            <div class="container mt-5">
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h1>Venta</h1>
                                <form action="insertar.php" method="POST">

                    
                                    <input type="text" class="form-control mb-3" name="fecha" placeholder="dia/mes/año">
                                    <input type="text" class="form-control mb-3" name="cantidad" placeholder="Cantidad">
                                    
                                    <label for="">
                                     <select name="id_g" id=""class="form-select mb-3">
                                        
                                     <option value="">Seleccione un Id_Garrafon</option>
                                            <?php foreach ($qy as $value):?>
                                                
                                                <option value="<?php echo $value['Id_Garrafon']?>">Id_Garrafon:<?php echo $value['Id_Garrafon']?> Precio:$<?php echo $value['precio_venta']?></option>
                                                 
                                            <?php endforeach ?>
                                     </select>

                                    </label>
                                    <label for="">
                                     <select name="id_e" id=""class="form-select mb-3">
                                        
                                     <option value="">Seleccione un Empleado</option>
                                            <?php foreach ($qy2 as $value2):?>
                                                
                                                <option value="<?php echo $value2['Id_Empleado']?>">Nombre:<?php echo $value2['nombres']?> <?php echo $value2['apellidos']?></option>
                                                 
                                            <?php endforeach ?>
                                     </select>

                                    </label>
                                    <label for="">
                                     <select name="id_c" id=""class="form-select mb-3">
                                        
                                     <option value="">Seleccione un Cliente</option>
                                            <?php foreach ($qy3 as $value3):?>
                                                
                                                <option value="<?php echo $value3['Id_Cliente']?>">Nombre:<?php echo $value3['nombres']?> <?php echo $value3['apellidos']?></option>
                                                 
                                            <?php endforeach ?>
                                     </select>

                                    </label>
                                    <input type="text" class="form-control mb-3" name="id_cliente" placeholder="Id_cliente">
                                    <input type="text" class="form-control mb-3" name="importe_total" placeholder="Total">
                                    <input type="submit" class="btn btn-primary">
                                    <a href="../menu.php" class="btn btn-info">Regresar</a>
                                    <a href="../logout.php" class="btn btn-danger">Salir</a>
                                </form>

                        </div>

                        

                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                    <th>Folio</th>
                                        <th>Fecha</th>
                                        <th>Cantidad</th>
                                        <th>Id_Garrafon</th>
                                        <th>Id_Empleado</th>
                                     
                                        <th>Id_Cliente</th>
                                        
                                        <th>Importe total</th>
                                        <th>Operaciones</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                            <th><?php  echo $row['folio']?></th>
                                                <th><?php  echo $row['fecha']?></th>
                                                <th><?php  echo $row['cantidad']?></th>
                                                <th><?php  echo $row['Id_Garrafon']?></th>
                                                <th><?php  echo $row['Id_Empleado']?></th>  
                                               
                                                <th><?php  echo $row['Id_Cliente']?></th>
                                                
                                                <th><?php  echo $row['importe_total']?></th>   
                                                <th><a href="actualizar.php?id=<?php echo $row['folio'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="delete.php?id=<?php echo $row['folio'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            </div>
    </body>
</html>

<?php 
}else{
     header("Location: ../index.php");
     exit();
}
 ?>