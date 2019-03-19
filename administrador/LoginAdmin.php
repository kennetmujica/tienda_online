<?php
$usuario=$_POST['usuario'];
$contrasenia=$_POST['contrasenia'];

$usuarioComparar = 'admin';
$contraseniaComparar = 'admin123';

if($usuario==$usuarioComparar && $contrasenia==$contraseniaComparar){
  header('location:Administracion.html');
}else{
  header('Location:index.html');
}

 ?>
