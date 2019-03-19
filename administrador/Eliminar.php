<?php

$producto = $_POST['ID_Producto'];


$conexion=mysqli_connect("localhost", "root", "", "tienda_online");
$consulta="DELETE FROM productos WHERE ID_Producto='$producto'";

$resultado=mysqli_query($conexion, $consulta);

if($resultado){
  echo "Eliminado correctamente!";
}
else{
  echo "No se pudo eliminar";
}

mysqli_close($conexion);

 ?>
