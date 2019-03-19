<?php

$ID_Producto = $_POST['ID_Producto'];
$descripcion = $_POST['descripcion'];
$existencia = $_POST['existencia'];
$precio = $_POST['precio'];


$conexion=mysqli_connect("localhost", "root", "", "tienda_online");
$consulta = "UPDATE productos SET Descripcion='$descripcion', Existencia='$existencia', Precio='$precio' WHERE ID_Producto='$ID_Producto'";
$resultado = mysqli_query($conexion, $consulta);

if($resultado){
  echo "Se modifico exitosamente";
}else{
  echo "Error al modificar";
}



 ?>
