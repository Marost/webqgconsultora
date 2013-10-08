<?php
include("panel@qgconsultora/conexion/conexion.php");
include("panel@qgconsultora/conexion/funciones.php");

$rst_query=mysql_query("SELECT * FROM qgc_empresa WHERE id=1", $conexion);
$fila_query=mysql_fetch_array($rst_query);

$rst_query2=mysql_query("SELECT * FROM qgc_noticia WHERE id>0 ORDER BY id DESC LIMIT 2;", $conexion);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="imagenes/favicon.ico" type="image/x-icon">
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
                            <h3>Bienvenidos</h3>
                            <hr />
                            <p><strong>QUALITY  GLOBAL CONSULTORA</strong>, fue creada en febrero del 2008, por la iniciativa de un  grupo de profesionales calificados, con la finalidad de fomentar e implementar  los sistemas de gestión según normas internacionales y la cultura de calidad a  las empresas emprendedoras que sustentan el progreso de nuestro país.</p></div><!--FIN item-panel-der-->
                            
                        <div class="separacion15"></div>
                        
                        <div id="item-panel-der">
                            <h3>Política de Calidad</h3>
                            <hr />
                            <p><strong>QUALITY GLOBAL</strong> tiene el compromiso de acompañar a las diferentes empresas con el fin de alcanzar <br />
                              un alto nivel de calidad en todas las actividades desarrolladas en la organización, para mejorar  sus <br />
                    productos o servicios haciendo de la calidad seguridad y medio ambiente una solida fortaleza.</p>
                    </div><!--FIN item-panel-der-->
                    
                        <div class="separacion15"></div>
                    
                        <div id="item-panel-der">
                        <h3>Noticias</h3>
                        <hr />
                        
                        <?php while($fila_query2=mysql_fetch_array($rst_query2)){ ?>
                        <div class="item-noticias">
                            <div class="item-noticias-imagen">
                                <img src="imagenes/upload/<?php echo $fila_query2["imagen"] ?>" alt="<?php echo $fila_query2["titulo"] ?>" width="150" />
                    </div>
                            <div class="item-noticias-descripcion">
                                <p class="texto16negroVerdana">
                                    <a href="noticia/<?php echo $fila_query2["id"] ?>/<?php echo $fila_query2["url"] ?>" title="<?php echo $fila_query2["titulo"] ?>">
                                    <?php echo $fila_query2["titulo"] ?>
                                    </a></p>
                              <p><strong><?php echo $fila_query2["fecha"] ?></strong></p>
                                  <p>&nbsp;</p>
                              <p><?php echo cortarTexto($fila_query2["contenido"],1,0); ?></p>
                                  <p>
                                  <a href="noticia/<?php echo $fila_query2["id"] ?>/<?php echo $fila_query2["url"] ?>" title="<?php echo $fila_query2["titulo"] ?>">
                              <img src="imagenes/seguir-leyendo.png" width="150" height="30" alt="Seguir Leyendo" /></a></p>
                            </div>
                        </div>
                        <?php } ?>
                        
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