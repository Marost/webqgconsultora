<?php
session_start();
include("../panel@qgconsultora/conexion/conexion.php");
include("../panel@qgconsultora/conexion/funciones.php");

if (!empty($_POST['captcha'])) {
	//VARIABLES DE ENVIO	
	$nombre=$_POST["nombre"];
	$empresa=$_POST["empresa"];
	$cargo=$_POST["cargo"];
	$direccion=$_POST["direccion"];
	$telefono=$_POST["telefono"];
	$email=$_POST["email"];
	$comentario=eliminarTexto($_POST["mensaje"]);
	
	if (empty($_SESSION['captcha']) || trim(strtolower($_POST['captcha'])) != $_SESSION['captcha']) {
		header ("Location:../consultoria");
	} else {
		mysql_query("INSERT INTO qgc_consultoria (nombre_completo, empresa, cargo, direccion, telefono, email, mensaje) VALUES ('$nombre', '$empresa', '$cargo', '$direccion', '$telefono', '$email', '$comentario')", $conexion);
		
		//ENVIAR A CORREO ELECTRONICO
		$msg.="Consultoría Gratuita";
		$msg.="\n\nNombre completo: $nombre";
		$msg.="\nEmpresa: $empresa";
		$msg.="\nCargo: $cargo";
		$msg.="\nDireccion: $direccion";
		$msg.="\nTelefono: $telefono";
		$msg.="\nEmail: $email";
		$msg.="\n\nMensaje";
		$msg.="\n$comentario";
		
		$remitente = "$email";
		$subject = "QG Consultora - Mensaje enviado por: '$nombre'";
		mail('slopez@qgconsultora.com', $subject, $msg, "FROM: $remitente");
		
		$remitente = "$email";
		$subject = "QG Consultora - Mensaje enviado por: '$nombre'";
		mail('devmarost@hotmail.com', $subject, $msg, "FROM: $remitente");
		
		header ("Location:../home");
	}
	$request_captcha = htmlspecialchars($_POST['captcha']);		
	unset($_SESSION['captcha']);
}
?>