<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Ejemplo de HTML5">
	<meta name="keywords" content="HTML5, CSS3, JavaScript">

	<title>Tienda Playeras</title>

	<link rel="stylesheet" href="css/misestilos.css">
</head>

<body>
	<div id="agrupar">
		<header id="cabecera">
			<h1>Venta de playeras</h1>
		</header>

		<nav id="menu">
			<ul>
				<button><a href="menu.php"><li>Principal</li></a></button>
				<li>Items</li>
				<button><li>Carrito</li></button>
				<button><a href="contacto.html"><li>Contacto</li></a></button>
			</ul>
		</nav>

		<section id="seccion">
			<article>
				<?php
				$server= "localhost";
				$user= "root";
				$pass= "";
				$bd= "tienda_online";

				$con=new mysqli($server,$user,$pass,$bd);

				if(mysqli_connect_errno($con)){
				    echo "Failed to connect to MySQL: " .mysqli_connect_error();
				}

				$sql = "SELECT * FROM productos";
				$resultado = $con -> query($sql);
				        
				while($row = mysqli_fetch_array($resultado)){
				?>
				<div style="padding: auto; display: inline-block; background: #2E64FE;">
				 <table>
			          <td style="margin:auto;">
			        <ul>
			          <center>
			          <li><p><?php echo "ID_Producto: ", $row['ID_Producto'];?><p></li>
			          <li><?php echo "Descripcion: ", $row['Descripcion'];?></li> 
			          <li><?php echo "Existencia: ", $row['Existencia'];?></li>
			          <li><?php echo "Precio: ", $row['Precio'];?></li>
			          <br>
			          </center>
			          <center><button type="button" class="btn btn-primary btn-lg">Comprar</button></center>
			        </ul>
			        </td>
			       </table>
			       </div>
			       <?php
					 }
					?>
			</article>
		</section>

		<footer id="pie">
			<a class="boton_salir" href="index.html">Salir</a>
		</footer>
	</div>
</body>
</html>