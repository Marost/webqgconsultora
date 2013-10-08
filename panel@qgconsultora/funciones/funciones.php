<?php
function fecha(){
	$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	$dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
	$dia = date(j); // devuelve el día del mes
	$dia2 = date(w); // devuelve el número de día de la semana
	$mes = date(n)-1; // devuelve el número del mes
	$ano = date(Y); // devuelve el año
	$fecha = $dia." de ".$meses[$mes]." de ".$ano;
	return $fecha;
}

function getUrlAmigable($s){

    $s = strtolower($s);
    $s = ereg_replace("[áàâãäª@]","a",$s);
    $s = ereg_replace("[éèêë]","e",$s);
    $s = ereg_replace("[íìîï]","i",$s);
    $s = ereg_replace("[óòôõºö]","o",$s);
    $s = ereg_replace("[úùûü]","u",$s);
    $s = ereg_replace("[ç]","c",$s);
    $s = ereg_replace("[ñ]","n",$s);
    $s = preg_replace( "/[^a-zA-Z0-9\-]/", "-", $s );
    $s = preg_replace( array("`[^a-z0-9]`i","`[-]+`") , "-", $s);

    return trim($s, '-');
}

if(isset($_GET['title'])){
    $url = getUrlAmigable(utf8_decode($_GET['title']));
    echo $url;exit;
}

?>