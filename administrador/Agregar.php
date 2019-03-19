<?php
$descripcion=$_POST['descripcion'];
$existencia=$_POST['existencia'];
$precio=$_POST['precio'];

//Nos conectamos a la base de datos
$conexion=mysqli_connect("localhost", "root", "", "tienda_online");
$consulta="INSERT INTO productos(Descripcion, Existencia, Precio) VALUES('$descripcion', '$existencia', '$precio')";
$resultado=mysqli_query($conexion, $consulta);

if($resultado){
  echo "Se inserto correctamente!";
}
else{
  echo "No se pudo insertar";
}

mysqli_close($conexion);
 ?>
