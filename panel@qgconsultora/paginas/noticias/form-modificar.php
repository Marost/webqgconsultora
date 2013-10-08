<?php
include("../../conexion/conexion.php");
header("Content-Type: text/html; charset=utf-8");
	
	$rst_query=mysql_query("SELECT * FROM qgc_noticia WHERE id=". $_REQUEST["id"].";", $conexion);
	$fila_query=mysql_fetch_array($rst_query);
?>
<link rel="stylesheet" type="text/css" href="../../css/style-listas.css" />
<script src="../../js/ckeditor.js" type="text/javascript"></script>
<div id="contenido">
  <div id="titulo_principal">
   	<h2>Modificar - Noticia</h2>
</div><!-- FIN TITULO PRINCIPAL -->
    <div id="contenido_total">
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
            	<td>
                <form action="actualizar.php?id=<?php echo $_REQUEST["id"]; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
            	  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
            	    <tr>
            	      <td colspan="2" align="center">&nbsp;</td>
          	      </tr>
            	    <tr>
            	      <td height="30" align="right" class="texto_izq"><p><strong>Titulo:</strong></p></td>
            	      <td height="30" align="left" class="texto_der"><input name="titulo" type="text" id="titulo" value='<?php echo $fila_query["titulo"] ?>' size="50" /></td>
          	      </tr>
            	    <tr>
            	      <td height="30" align="right" class="texto_izq"><p><strong>Contenido:</strong></p></td>
            	      <td height="30" align="left" class="texto_der">&nbsp;</td>
          	      </tr>
            	    <tr>
            	      <td height="35" colspan="2" align="center"><p>
            	        <label>
            	          <textarea class="ckeditor" name="contenido" id="contenido2"><?php echo $fila_query["contenido"] ?></textarea>
          	          </label>
          	        </p></td>
          	      </tr>
            	    <tr>
            	      <td align="right"><p><strong>Imagen:</strong></p></td>
            	      <td align="left"><p>
            	        <label for="archivo"></label>
            	        <input type="file" name="archivo" id="archivo" />
          	        </p></td>
          	      </tr>
            	    <tr>
            	      <td width="20%" align="right"><p><strong>Imagen actual:</strong></p></td>
            	      <td width="80%" align="left"><img src="../../../imagenes/upload/escala-140.php?imagen=<?php echo $fila_query["imagen"] ?>" />
           	          <input name="logo-actual" type="hidden" id="logo-actual" value="<?php echo $fila_query["imagen"] ?>" /></td>
          	      </tr>
                <tr>
                  <td colspan="2" align="center" class="texto_negro16-MyriadPro"><label>
                    <input type="submit" name="guardar" id="guardar" value="Guardar" />
                    &nbsp;
                    <input type="reset" name="button2" id="button2" value="Limpiar Datos" />
                  </label></td>
                  </tr>
              </table>
                </form>
              </td>
            </tr>
        </table>
    </div><!-- FIN CONTENIDO TOTAL -->
</div><!-- FIN PANEL DERECHA -->
