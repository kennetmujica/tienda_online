<?php
  $ID_Producto = $_POST['ID_Producto'];

  $conexion=mysqli_connect("localhost", "root", "", "tienda_online");
  $consulta="SELECT * FROM productos WHERE ID_Producto='$ID_Producto'";;

  $resultado=mysqli_query($conexion, $consulta);
  if ($resultado) {
      $row = mysqli_fetch_assoc($resultado);
  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <form class="" action="Cambios2.php" method="post">
        <fieldset>
            <legend>Cambios</legend>
            <label for="ID_Producto">ID del Producto:</label>
            <input type="text" name="ID_Producto" value="<?php echo $row['ID_Producto'] ?>" readonly> <br><br>
            <label for="descripcion">Descripcion: </label>
            <input type="text" name="descripcion" value="<?php echo $row['Descripcion'] ?>"> <br><br>
            <label for="existencia">Existencia: :</label>
            <input type="text" name="existencia"  value="<?php echo $row['Existencia'] ?>">  <br><br>
            <label for="precio">Precio: </label>
            <input type="text" name="precio" value="<?php echo $row['Precio'] ?>"><br><br>

            <input type="submit" value="Modificar">
        </fieldset> <br><br>
    </form>

  </body>
</html>
