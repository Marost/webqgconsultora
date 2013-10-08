<?php
function fecha(){
	$meses = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
	$dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
	$dia = date(j); // devuelve el día del mes
	$dia2 = date(w); // devuelve el número de día de la semana
	$mes = date(n)-1; // devuelve el número del mes
	$ano = date(Y); // devuelve el año
	$fecha = $dias[$dia2]." ".$dia.".".$meses[$mes].".".$ano;
	return $fecha;
}

function fechaPost(){
	$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	$dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
	$dia = date(j); // devuelve el día del mes
	$dia2 = date(w); // devuelve el número de día de la semana
	$mes = date(n)-1; // devuelve el número del mes
	$ano = date(Y); // devuelve el año
	$fechaPost = $meses[$mes]." ".$dia.", ".$ano;
	return $fechaPost;
}
	
function alt ($cebra)
{
	if($cebra/2 == floor($cebra/2)) {
		return ' class="alt"';
	}else{
		return '';
	}
}

function codigoAleatorio($length=10,$uc=TRUE,$n=TRUE,$sc=FALSE)
{
	$source = 'abcdefghijklmnopqrstuvwxyz';
	if($uc==1) $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	if($n==1) $source .= '1234567890';
	if($sc==1) $source .= '|@#~$%()=^*+[]{}-_';
	if($length>0){
		$rstr = "";
		$source = str_split($source,1);
		for($i=1; $i<=$length; $i++){
			mt_srand((double)microtime() * 1000000);
			$num = mt_rand(1,count($source));
			$rstr .= $source[$num-1];
		}

	}
	return $rstr;
}

function nombreMes($numero_mes)
{
	switch($numero_mes){
   		case 1: print "Enero"; break;
		case 2: print "Febrero"; break;
		case 3: print "Marzo"; break;
		case 4: print "Abril"; break;
		case 5: print "Mayo"; break;
		case 6: print "Junio"; break;
		case 7: print "Julio"; break;
		case 8: print "Agosto"; break;
		case 9: print "Septiembre"; break;
		case 10: print "Octubre"; break;
		case 11: print "Noviembre"; break;
		case 12: print "Diciembre"; break;
	}
}

function eliminarTexto($cadena){
	$palabras = '<, >, script, /, ?,<?php,?>, while, if, else, alert, {, }, [, ], mierda, carajo, conchasumare, cojudo';
	$palabra = explode(', ',$palabras);
	$palabras = count($palabra);
	$base = 0;
	while($base<$palabras){
		$cadena = str_ireplace($palabra[$base],'',$cadena);
		$base++;
	}
	return $cadena;
}

function UserPass($cadena){
	$palabras = "',=,-,<,>";
	$palabra = explode(', ',$palabras);
	$palabras = count($palabra);
	$base = 0;
	while($base<$palabras){
		$cadena = str_ireplace($palabra[$base],'',$cadena);
		$base++;
	}
	return $cadena;
}

function nombreFecha($anio, $mes, $dia)
{
	$tmeses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	$nombrefecha = $tmeses[$mes-1]." ".$dia.", ".$anio;
	return $nombrefecha;
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

function cortarTexto($texto, $superior, $inferior){
	$b_superior='<div style="page-break-after: always;">';
	$b_inferior='<span style="display: none;">&nbsp;</span></div>';
	if(ereg($b_superior, $texto) || ereg($b_inferior, $texto)){
		if($superior==1){
			$total=explode($b_superior, $texto);
			return $total[0];}
		if($inferior==1){
			$total=explode($b_inferior, $texto);
			return $total[1];}
	}else{
		$total=substr($texto, 0, 400);
		return $total;}
}

?>