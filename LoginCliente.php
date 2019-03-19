<?php
$ID_Cliente = $_POST["ID_Cliente"];
$password = $_POST["password"];

$server= "localhost";
$user= "root";
$pass= "";
$bd= "tienda_online";

$con=new mysqli($server,$user,$pass,$bd);

if(mysqli_connect_errno($con)){
    echo "Failed to connect to MySQL: " .mysqli_connect_error();
}

$sql="SELECT * FROM clientes WHERE ID_Cliente=$ID_Cliente AND Password=$password";

$retval=(mysqli_query($con,$sql));

if(mysqli_num_rows($retval)>0){
    header("Location: menu.php");
}

else{
    echo "El usuario o contraseña esta incorrecta";
}


mysqli_close($con);

?>