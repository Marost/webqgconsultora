<?php
session_start();
include("../panel@qgconsultora/conexion/conexion.php");
include("../panel@qgconsultora/conexion/funciones.php");

if (!empty($_POST['captcha'])) {
	//VARIABLES DE ENVIO	
	$nombre=$_POST["nombre"];
	$telefono=$_POST["telefono"];
	$email=$_POST["email"];
	$comentario=eliminarTexto($_POST["mensaje"]);
	
	if (empty($_SESSION['captcha']) || trim(strtolower($_POST['captcha'])) != $_SESSION['captcha']) {
		header ("Location:../contactenos");
	} else {
		mysql_query("INSERT INTO qgc_contacto (nombre_completo, telefono, email, mensaje) VALUES ('$nombre', '$telefono', '$email', '$comentario')", $conexion);
		
		//ENVIAR A CORREO ELECTRONICO
		$msg.="Contactenos";
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
		mail('sistemas@qgconsultora.com', $subject, $msg, "FROM: $remitente");
		
		$remitente = "$email";
		$subject = "QG Consultora - Mensaje enviado por: '$nombre'";
		mail('devmarost@hotmail.com', $subject, $msg, "FROM: $remitente");
		
		header ("Location:../home");
	}
	$request_captcha = htmlspecialchars($_POST['captcha']);		
	unset($_SESSION['captcha']);
}
?>