<?php
include("conexion.php");
include("funciones.php");

$user=$_POST["user"];
$clave=$_POST["pass"];

$usuario=mysql_real_escape_string($user);
$pass=mysql_real_escape_string($clave);

$query=sprintf("SELECT * FROM qgc_usuario WHERE usuario='$usuario' AND clave='$pass';");
$rst=mysql_query($query, $conexion);
$num_registros=mysql_num_rows($rst);

if($num_registros==1)
{
	$fila=mysql_fetch_array($rst);
	session_start();
	$_SESSION["user-ggc"]=$fila["usuario"];
	$_SESSION["user_nombre-ggc"]=$fila["nombre"];
	$_SESSION["user_apellido-ggc"]=$fila["apellidos"];
	$_SESSION["user_email-ggc"]=$fila["email"];
	header("Location:../principal.php");
} elseif($num_registros==0) {
	mysql_close($conexion);
	header("Location:../index.php?nosesion=2");
}
?>