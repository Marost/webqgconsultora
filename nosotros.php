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
                        	<h3>Misión</h3>
                        	<hr />
                        	<p>Somos una empresa que brinda soluciones integrales y  estratégicas para mejorar la calidad, seguridad y medio ambiente  en sus procesos, productos o servicios con un  óptimo resultado en el aumento de la productividad y rentabilidad a través de  una cultura de calidad</p>
</div><!--FIN item-panel-der-->
       		<div class="separacion15"></div>
            <div id="item-panel-der">
                        	<h3>Visión</h3>
                        	<hr />
                        	<p>Ser líderes en   sistemas integrados de gestión y apoyo estratégico en el desarrollo  empresarial haciendo de la calidad, seguridad y medio ambiente una solida fortaleza.</p>
</div><!--FIN item-panel-der-->
                  
                <div class="separacion15"></div>
                  
                  <div id="item-panel-der">
                        <h3>Equipo</h3>
                        <hr />
                    <p><strong>QUALITY GLOBAL CONSULTORA</strong> cuenta con un grupo de  profesionales, de alto nivel, enfocados en la implementación de sistemas de  gestión y cultura de calidad en las diferentes áreas.</p>
                        <blockquote>
                          <p>- Gestión de Calidad</p>
                          <p>- Gerencia General</p>
                          <p>- Comercial  y Post venta</p>
                          <p>- Planeamiento y Control</p>
                          <p> - Ingeniería </p>
                          <p>- Logística y Almacén</p>
                          <p> - Producción</p>
                          <p>- Aseguramiento de   Calidad</p>
                          <p>- Gestión de Personal </p>
                          <p>- Seguridad Industrial</p>
                          <p>- Sistemas informáticos</p>
                          <p>- Administración</p><!--FIN item-panel-der-->            	</blockquote>
            </div>
                  <div class="separacion15"></div>
            <div id="item-panel-der">
                        	<h3>Experiencia</h3>
                        	<hr />
                        	<p><strong>QUALITY GLOBAL CONSULTORA</strong> con sus profesionales suman una  experiencia de 20 años implementando los  sistemas de gestión en diferentes empresas.     Sus profesionales han desarrollado con éxito las siguientes  responsabilidades: </p>
                            <blockquote>
                              <p>- Jefe de Sistemas de Gestión de Calidad.</p>
                              <p>- Jefe de Seguridad Industrial, Salud y Medio Ambiente.</p>
                              <p>- Auditores Líderes.</p>
                              <p>- Auditores Internos.</p>
                            </blockquote>
            </div><!--FIN item-panel-der-->

                <div class="separacion15"></div>
                <div id="item-panel-der">
                    <h3>Filosofía</h3>
                    <hr />
                    <p>Superar las expectativas de nuestros clientes</p>
                </div><!--FIN item-panel-der-->

                <div class="separacion15"></div>
            <div id="item-panel-der">
                <h3>Valores</h3>
                    <hr />
                <p>Nuestros consultores se caracterizan, por su alto grado de  compromiso, profesionalismo y trabajo en equipo, en cada actividad que hacemos  en beneficio de nuestros clientes.</p>
                <blockquote>
                  <p>- LIDERAZGO;   como cualidad personal.</p>
                  <p>- INNOVACION;   mejorando constantemente nuestros procesos.</p>
                  <p>- MEJORA CONTINUA;   buscamos optimizar nuestros procesos.</p>
                  <p>- RESPONSABILIDAD SOCIAL;  contribuimos de manera activa y voluntaria al  mejoramiento social.</p>
                  <p>- TRABAJO EN EQUIPO;  la fuerza del grupo se expresa en la  solidaridad.</p>
                  <p>- INTEGRIDAD;   transparencia, honestidad, responsabilidad.                </p>
                </blockquote>
              <p>&nbsp;</p>
            </div>
            <!--FIN item-panel-der-->
                  
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