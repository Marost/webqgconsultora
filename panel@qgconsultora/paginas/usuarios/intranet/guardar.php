<?php
include ("../../../conexion/conexion.php");

//SUBIDA DE IMAGEN
if(is_uploaded_file($_FILES['file']['tmp_name']))
{ 
	$fileName=$_FILES['file']['name'];
	$uploadDir="../../../../imagenes/upload/";
	$uploadFile=$uploadDir.$fileName;
	$num = 0;
	$name = $fileName;
	$extension = end(explode('.',$fileName));     
	$onlyName = substr($fileName,0,strlen($fileName)-(strlen($extension)+1));
	while(file_exists($uploadDir.$name))
	{
		$num++;         
		$name = $onlyName."".$num.".".$extension; 
	}
	$uploadFile = $uploadDir.$name; 
	move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile);  
	$name;
}

//DATOS USUARIO
$nombre=$_POST["nombre"];
$apellidos=$_POST["apellidos"];
$usuario=$_POST["usuario"];
$email=$_POST["email"];
$clave=$_POST["clave"];

//FORO
$asesores_legales=$_POST["asesores_legales"];
$auditores=$_POST["auditores"];
$consejo_directivo=$_POST["consejo_directivo"];
$contadores=$_POST["contadores"];
$defensa_gremial=$_POST["defensa_gremial"];
$gerencia_general=$_POST["gerencia_general"];
$oficiales_atencion=$_POST["oficiales_atencion"];
$oficiales_cumplimiento=$_POST["oficiales_cumplimiento"];
$rrhh=$_POST["rrhh"];
$ti=$_POST["ti"];
$unidades_riesgos=$_POST["unidades_riesgos"];

//PRIVILEGIOS USUARIO
$confidencial=$_POST["confidencial"];

mysql_query("INSERT INTO ap_usuario_intranet (usuario, clave, nombre, apellidos, email, foto) VALUES ('$usuario', '$clave', '$nombre', '$apellidos', '$email', '$name');",$conexion);

//PRIVILEGIO DE USUARIO CONFIDENCIAL
mysql_query("INSERT INTO ap_privilegio_user_intranet (usuario, confidencial) VALUES ('$usuario', $confidencial);", $conexion);

//INSERTAR USUARIO PARA ACTIVAIDAD
mysql_query("INSERT INTO ap_usuario_online (usuario) VALUES ('$usuario')", $conexion);


//PRIVILEGIOS DE FORO
mysql_query("INSERT INTO ap_foro_permiso_usuario_intranet (usuario, asesores_legales, auditores, consejo_directivo, contadores, defensa_gremial, gerencia_general, oficiales_atencion, oficiales_cumplimiento, rrhh, ti, unidades_riesgos) VALUES('$usuario', $asesores_legales, $auditores, $consejo_directivo, $contadores, $defensa_gremial, $gerencia_general, $oficiales_atencion, $oficiales_cumplimiento, $rrhh, $ti, $unidades_riesgos)", $conexion);

if (mysql_errno()!=0)
{
	echo "error al insertar los datos ". mysql_errno() . " - ". mysql_error();
	mysql_close($conexion);
	//header("Location:listar.php?mensaje=4");
} else {
	mysql_close($conexion);
	header("Location:listar.php?mensaje=1");
}

?>