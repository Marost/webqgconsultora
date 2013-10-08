<?php
include("panel@qgconsultora/conexion/conexion.php");
include("panel@qgconsultora/conexion/funciones.php");

$rst_query=mysql_query("SELECT * FROM qgc_empresa WHERE id=1", $conexion);
$fila_query=mysql_fetch_array($rst_query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="imagenes/favicon.ico" type="image/x-icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>QG Consultora</title>
<base href="<?php echo $fila_query["web"] ?>" />
<link rel="stylesheet" type="text/css" href="css/estilos.css"/>
<link rel="stylesheet" href="css/slider.css" type="text/css" media="screen" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.2.js"></script>
<script src="js/jquery.anythingslider.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
	function formatText(index, panel) {
		  return index + "";
	  };

	$(function () {
	
		$('.anythingSlider').anythingSlider({
			easing: "easeInOutExpo",
			autoPlay: true,
			delay: 3000,
			startStopped: false,
			animationTime: 600,
			hashTags: true,
			buildNavigation: true,
				pauseOnHover: true,
				startText: "Play",
				stopText: "Stop",
				navigationFormatter: formatText
		});
		
		$("#slide-jump").click(function(){
			$('.anythingSlider').anythingSlider(6);
		});
		
	});
	
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
                        	<h4>Registro fotográfico de implementación de los sistemas de gestión, auditoría interna y certificaciones internacionales de las diferentes empresas.</h4>
                            <hr />
                       		<div class="anythingSlider">
                              <div class="wrapper">
                                <ul>
                                   <li><img src="imagenes/galeria/img1.jpg" alt="" width="570" height="324" /></li>
                                   <li><img src="imagenes/galeria/img2.jpg" alt="" width="570" height="324" /></li>
                                   <li><img src="imagenes/galeria/img3.jpg" alt="" width="570" height="324" /></li>
                                   <li><img src="imagenes/galeria/img4.jpg" alt="" width="570" height="324" /></li>
                                   <li><img src="imagenes/galeria/img5.jpg" alt="" width="570" height="324" /></li>
                                   <li><img src="imagenes/galeria/img7.jpg" alt="" width="570" height="324" /></li>
                                   <li><img src="imagenes/galeria/img8.jpg" alt="" width="570" height="324" /></li>
                                   <li><img src="imagenes/galeria/img9.jpg" alt="" width="570" height="324" /></li>
                                </ul>        
                              </div>
                            </div> <!-- FIN AnythingSlider -->
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