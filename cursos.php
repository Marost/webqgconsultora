<?php
include("panel@qgconsultora/conexion/conexion.php");
include("panel@qgconsultora/conexion/funciones.php");

$rst_query=mysql_query("SELECT * FROM qgc_empresa WHERE id=1", $conexion);
$fila_query=mysql_fetch_array($rst_query);

$rst_query2=mysql_query("SELECT * FROM qgc_cursos WHERE id=1;", $conexion);
$fila_query2=mysql_fetch_array($rst_query2);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="<?php echo $fila_query["web"] ?>/imagenes/favicon.ico" type="image/x-icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>QG Consultora</title>
<base href="<?php echo $fila_query["web"] ?>" />
<link rel="stylesheet" type="text/css" href="css/estilos.css"/>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20229980-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body>
<div id="contenedor">

	<?php include("cabecera.php"); ?>

<div id="cuerpo">
    	<div class="interior">
          <?php include("menu.php"); ?>            
<div id="contenido-cuerpo">
          		<div id="panel-sup">
                    <div id="panel-izq">
                    	<?php include("items_izq.php"); ?>
                    </div><!--FIN PANEL IZQUIERDA-->
    				<div id="panel-der">
                    	<div id="item-panel-der">
                        	<h3><?php echo $fila_query2["titulo"] ?></h3>
                        	<hr />
                            <?php echo $fila_query2["contenido"] ?>
   		  				</div><!--FIN item-panel-der-->
		
                  </div><!--FIN PANEL DERECHA-->
                </div><!--FIN PANEL SUPERIOR-->
                <?php include("list-formularios.php"); ?>
          </div><!--FIN CONTENIDO CUERPO-->
        </div><!--FIN INTERIOR-->
    </div><!--FIN CUERPO-->
    
    <?php include("footer.php"); ?>
    
</div><!--FIN CONTENEDOR-->
</body>
</html>