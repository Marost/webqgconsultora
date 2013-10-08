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
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
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
                        	<h3>Consultoría Gratuita</h3>
                        	<hr />
                       	  <p>&nbsp;</p>
                       	  <p>&nbsp;</p>
                        	<form id="form1" name="form1" method="post" action="formularios/consultoria.php">
                            	<table width="600" border="0" align="center" cellpadding="5" cellspacing="0">
                        	  <tr>
                        	    <td colspan="2" align="center"><p><?php echo $_SESSION["mensaje"]; ?></p></td>
                        	    </tr>
                        	  <tr>
                        	    <td width="140" align="right"><strong>Nombre completo:</strong></td>
                        	    <td width="460"><label for="nombre"></label>
                        	      <span id="sprytextfield1">
                        	      <input type="text" name="nombre" id="nombre" />
                       	        <span class="textfieldRequiredMsg">Ingrese su nombre.</span></span></td>
                      	    </tr>
                        	  <tr>
                        	    <td width="140" align="right"><strong>Empresa:</strong></td>
                        	    <td width="460"><label for="empresa"></label>
                       	        <input type="text" name="empresa" id="empresa" /></td>
                      	    </tr>
                        	  <tr>
                        	    <td width="140" align="right"><strong>Cargo:</strong></td>
                        	    <td width="460"><label for="cargo"></label>
                       	        <input type="text" name="cargo" id="cargo" /></td>
                      	    </tr>
                        	  <tr>
                        	    <td width="140" align="right"><strong>Dirección:</strong></td>
                        	    <td width="460"><label for="direccion"></label>
                       	        <input type="text" name="direccion" id="direccion" /></td>
                      	    </tr>
                        	  <tr>
                        	    <td width="140" align="right"><strong>Teléfono:</strong></td>
                        	    <td width="460"><label for="telefono"></label>
                        	      <span id="sprytextfield2">
                        	      <input type="text" name="telefono" id="telefono" />
                       	        <span class="textfieldRequiredMsg">Ingrese su teléfono.</span></span></td>
                      	    </tr>
                        	  <tr>
                        	    <td width="140" align="right"><strong>Email:</strong></td>
                        	    <td width="460"><label for="email"></label>
                        	      <span id="sprytextfield3">
                                  <input type="text" name="email" id="email" />
                                <span class="textfieldRequiredMsg">Ingrese su email</span><span class="textfieldInvalidFormatMsg">Email no válido.</span></span></td>
                      	    </tr>
                        	  <tr>
                        	    <td width="140" align="right"><strong>Mensaje:</strong></td>
                        	    <td width="460"><label for="mensaje"></label>
                        	      <span id="sprytextarea1">
                        	      <textarea name="mensaje" id="mensaje" cols="35" rows="5"></textarea>
                       	        <span class="textareaRequiredMsg">Ingrese su mensaje.</span></span></td>
                      	    </tr>
                        	  <tr>
                        	    <td width="140" align="right"><strong>Captcha:</strong></td>
                        	    <td width="460">
                                	<img src="captcha/captcha.php" id="captcha" /><br/><!-- CHANGE TEXT LINK -->
<a href="javascript:;" onclick="document.getElementById('captcha').src='captcha/captcha.php?'+Math.random();" id="change-image">Recargar Captcha</a><br/><br/>
<span id="sprytextfield4">
<input type="text" name="captcha" id="captcha-form" />
<span class="textfieldRequiredMsg">Ingrese el captcha</span></span><br /><?php echo $captcha_message; ?>
                                </td>
                      	    </tr>
                        	  <tr>
                        	    <td colspan="2" align="center"><input type="submit" name="button" id="button" value="Enviar" />&nbsp;&nbsp;&nbsp;                        	      <input type="reset" name="button2" id="button2" value="Limpiar Datos" /></td>
                        	    </tr>
                              </table>
                            
                      	  </form>
                        	
            </div><!--FIN item-panel-der-->
                  
                  </div><!--FIN PANEL DERECHA-->
                </div><!--FIN PANEL SUPERIOR-->
                <?php include("list-formularios.php"); ?>
          </div><!--FIN CONTENIDO CUERPO-->
        </div><!--FIN INTERIOR-->
    </div><!--FIN CUERPO-->
    
    <?php include("footer.php"); ?>
    
</div><!--FIN CONTENEDOR-->
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "email");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
</script>
</body>
</html>