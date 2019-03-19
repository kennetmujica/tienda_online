<?php

$operacion = $_REQUEST['operacion'];

switch ($operacion) {
  case 'mostrar1': MostrarProductoPorId();
    break;
  case 'mostrar2': MostrarProductoPorNombre();
    break;
  case 'mostrar3': MostrarProductoPorPrecio();
    break;
  case 'mostrar4': MostrarClientePorId();
    break;
  case 'mostrar5': MostrarClientePorNombre();
    break;
  case 'mostrar6': MostrarClientePorEmail();
    break;

  default:

    break;
}

function MostrarProductoPorId(){
$idProducto = $_POST['idProducto'];

$conexion=mysqli_connect("localhost", "root", "", "tienda_online");
$consulta = "CALL MostrarProductos('$idProducto')";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
  $row = mysqli_fetch_assoc($resultado);
}


  echo "<table>";
        echo "<tr>";
            echo "<thead>";
                echo "<th>ID Producto</th>";
                echo "<th>Descripcion</th>";
                echo "<th>Existencias</th>";
                echo "<th>Precio</th>";
            echo "</thead>";
        echo "</tr>";
            echo "<tr>";
                echo "<td>"; echo $row['ID_Producto']; echo "</td>";
                echo "<td>"; echo $row['Descripcion']; echo "</td>";
                echo "<td>"; echo $row['Existencia']; echo "</td>";
                echo "<td>"; echo $row['Precio']; echo "</td>";
            echo "</tr>";
   echo "</table>";
}

function MostrarProductoPorNombre(){
$nombreProducto = $_POST['nombreProducto'];

  $conexion=mysqli_connect("localhost", "root", "", "tienda_online");
  $consulta = "CALL MostrarProductosPorNombre('$nombreProducto')";
  $resultado = mysqli_query($conexion, $consulta);

  if ($resultado) {
    $row = mysqli_fetch_assoc($resultado);
  }

  echo "<table>";
        echo "<tr>";
            echo "<thead>";
                echo "<th>ID Producto</th>";
                echo "<th>Descripcion</th>";
                echo "<th>Existencias</th>";
                echo "<th>Precio</th>";
            echo "</thead>";
        echo "</tr>";
            echo "<tr>";
                echo "<td>"; echo $row['ID_Producto']; echo "</td>";
                echo "<td>"; echo $row['Descripcion']; echo "</td>";
                echo "<td>"; echo $row['Existencia']; echo "</td>";
                echo "<td>"; echo $row['Precio']; echo "</td>";
            echo "</tr>";
   echo "</table>";
}

function MostrarProductoPorPrecio(){
  $precioProducto = $_POST['precioProducto'];

  $conexion=mysqli_connect("localhost", "root", "", "tienda_online");
  $consulta = "CALL MostrarProductosPorPrecio('$precioProducto')";
  $resultado = mysqli_query($conexion, $consulta);

  if ($resultado) {
    $row = mysqli_fetch_assoc($resultado);
  }

  echo "<table>";
        echo "<tr>";
            echo "<thead>";
                echo "<th>ID Producto</th>";
                echo "<th>Descripcion</th>";
                echo "<th>Existencias</th>";
                echo "<th>Precio</th>";
            echo "</thead>";
        echo "</tr>";
            echo "<tr>";
                echo "<td>"; echo $row['ID_Producto']; echo "</td>";
                echo "<td>"; echo $row['Descripcion']; echo "</td>";
                echo "<td>"; echo $row['Existencia']; echo "</td>";
                echo "<td>"; echo $row['Precio']; echo "</td>";
            echo "</tr>";
   echo "</table>";

}

function MostrarClientePorId(){
  $idCliente = $_POST['idCliente'];

  $conexion=mysqli_connect("localhost", "root", "", "tienda_online");
  $consulta = "CALL MostrarClientesPorId('$idCliente')";
  $resultado = mysqli_query($conexion, $consulta);

  if ($resultado) {
    $row = mysqli_fetch_assoc($resultado);
  }

  echo "<table>";
        echo "<tr>";
            echo "<thead>";
                echo "<th>ID Cliente</th>";
                echo "<th>Nombre</th>";
                echo "<th>Password</th>";
                echo "<th>Telefono</th>";
                echo "<th>Email</th>";
            echo "</thead>";
        echo "</tr>";
            echo "<tr>";
                echo "<td>"; echo $row['ID_Cliente']; echo "</td>";
                echo "<td>"; echo $row['Nombre']; echo "</td>";
                echo "<td>"; echo $row['Password']; echo "</td>";
                echo "<td>"; echo $row['Telefono']; echo "</td>";
                echo "<td>"; echo $row['Email']; echo "</td>";
            echo "</tr>";
   echo "</table>";
}

function MostrarClientePorNombre(){
  $nombreCliente = $_POST['nombreCliente'];

  $conexion=mysqli_connect("localhost", "root", "", "tienda_online");
  $consulta = "CALL MostrarClientesPorNombre('$nombreCliente')";
  $resultado = mysqli_query($conexion, $consulta);

  if ($resultado) {
    $row = mysqli_fetch_assoc($resultado);
  }

  echo "<table>";
        echo "<tr>";
            echo "<thead>";
                echo "<th>ID Cliente</th>";
                echo "<th>Nombre</th>";
                echo "<th>Password</th>";
                echo "<th>Telefono</th>";
                echo "<th>Email</th>";
            echo "</thead>";
        echo "</tr>";
            echo "<tr>";
                echo "<td>"; echo $row['ID_Cliente']; echo "</td>";
                echo "<td>"; echo $row['Nombre']; echo "</td>";
                echo "<td>"; echo $row['Password']; echo "</td>";
                echo "<td>"; echo $row['Telefono']; echo "</td>";
                echo "<td>"; echo $row['Email']; echo "</td>";
            echo "</tr>";
   echo "</table>";
}

function MostrarClientePorEmail(){
  $emailCliente = $_POST['emailCliente'];

  $conexion=mysqli_connect("localhost", "root", "", "tienda_online");
  $consulta = "CALL MostrarClientesPorEmail('$emailCliente')";
  $resultado = mysqli_query($conexion, $consulta);

  if ($resultado) {
    $row = mysqli_fetch_assoc($resultado);
  }

  echo "<table>";
        echo "<tr>";
            echo "<thead>";
                echo "<th>ID Cliente</th>";
                echo "<th>Nombre</th>";
                echo "<th>Password</th>";
                echo "<th>Telefono</th>";
                echo "<th>Email</th>";
            echo "</thead>";
        echo "</tr>";
            echo "<tr>";
                echo "<td>"; echo $row['ID_Cliente']; echo "</td>";
                echo "<td>"; echo $row['Nombre']; echo "</td>";
                echo "<td>"; echo $row['Password']; echo "</td>";
                echo "<td>"; echo $row['Telefono']; echo "</td>";
                echo "<td>"; echo $row['Email']; echo "</td>";
            echo "</tr>";
   echo "</table>";
}
?>
