<?php
session_start();
include("../../conexion/conexion.php");
include("../../conexion/funciones.php");
include("../../conexion/funcion-paginacion.php");
header("Content-Type: text/html; charset=utf-8");
	
	$user=$_SESSION["user-ggc"];
	$cebra=1;
	$url="listar.php";
	$buscar=$_REQUEST["busqueda"];

	if ($_REQUEST["btnbuscar"]=="")
	{
		$rst_query=mysql_query("SELECT * FROM qgc_cursos WHERE id>0 ORDER BY id DESC;", $conexion);
		$num_registros=mysql_num_rows($rst_query);
			
		$registros=20;	
		$pagina=$_GET["pag"];
		if (is_numeric($pagina))
		$inicio=(($pagina-1)*$registros);
		else
		$inicio=0;
		
		$rst_query=mysql_query("SELECT * FROM qgc_cursos WHERE id>0 ORDER BY id DESC LIMIT $inicio, $registros;", $conexion);
		$paginas=ceil($num_registros/$registros);
	}
	//----------------------------------------------------------------------------------------------------------------------------
	//BUSQUEDA

	if ($_REQUEST["btnbuscar"]!="" || $_REQUEST["busqueda"]!="")
	{
		$rst_query=mysql_query("SELECT * FROM qgc_cursos WHERE titulo LIKE '%$buscar%' ORDER BY id DESC;", $conexion);
		$num_registros=mysql_num_rows($rst_query);
		
		$registros=10;	
		$pagina=$_GET["pag"];
		if (is_numeric($pagina))
			$inicio=(($pagina-1)*$registros);
		else
			$inicio=0;
		
		$rst_query=mysql_query("SELECT * FROM qgc_cursos WHERE titulo LIKE '%$buscar%' ORDER BY id DESC LIMIT $inicio, $registros;", $conexion);
		$paginas=ceil($num_registros/$registros);
		
	}
	
	if ($num_registros==0)
	{
		if ($buscar!="")		
			$mensaje2="No hay registros con el nombre: <b>$buscar</b>";
		else
			$mensaje2="No hay registros en la base de datos";
	}
	
	
	//------- MENSAJE DE ERROR
	if($_REQUEST["mensaje"]==1)
	{
		$mensaje="El registro fue agregado exitosamente";
	}elseif($_REQUEST["mensaje"]==2)
			$mensaje="El registro fue modificado exitosamente";
	elseif($_REQUEST["mensaje"]==3)
			$mensaje="El registro fue eliminado exitosamente";
	elseif($_REQUEST["mensaje"]==4)
			$mensaje="Se ha producido un error al ingresar el nuevo registro";
	elseif($_REQUEST["mensaje"]==5)
			$mensaje="Se ha producido un error al modificar el registro";
	elseif($_REQUEST["mensaje"]==6)
			$mensaje="Se ha producido un error al eliminar el registro";	
	
	//PRIVILEGIOS USUARIO
	$rst_query2=mysql_query("SELECT * FROM qgc_usuario_priv WHERE usuario='$user';", $conexion);
	$fila_query2=mysql_fetch_array($rst_query2);
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="../../css/style-listas.css">
<script type="text/javascript">
function eliminarRegistro(registro, nombre) {
if(confirm("¿Está seguro de borrar este registro?\n"+nombre)) {
	document.location.href="eliminar.php?id="+registro;
	}
}
</script>
</head>
<body>
<div id="contenido">
    <div id="titulo_principal">
      <h2>Lista - Cursos</h2></div><!-- FIN TITULO PRINCIPAL -->
    <div id="contenido_total">
    	<div id="mensaje" >
        	<form id="form1" name="form1" method="get" action="listar.php">
                        <p><strong>Buscar:
                          </strong>
                          <input name="busqueda" type="text" id="busqueda" value="<?php echo $_GET["busqueda"]; ?>" size="40" /> 
                          &nbsp;&nbsp;
                          <input type="submit" name="btnbuscar" id="btnbuscar" value="Buscar" />
                        </p>
                  </form>
        
        	<p class="mensaje"><?php echo $mensaje; ?></p>
        </div>
        <div id="contenido">
              <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td colspan="2"><p><a href="form-agregar.php"><strong>AGREGAR CURSOS</strong></a></p></td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <table width="700" align="center" cellpadding="5" cellspacing="0" id="cebreado-php">
                        <thead>
                          <tr class="titulo-campo">
                            <th width="85%" height="22" align="left">cursos</th>
                            <th width="15%" height="22" align="center">acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php while ($fila=mysql_fetch_array($rst_query)){ ?>
                          <tr<?php echo alt($zebra); $zebra++; ?>>
                            <td width="85%">
                           	  <p class="texto-azul12-Arial"><strong class="up"><?php echo stripslashes($fila["titulo"]) ?></strong></p></td>
                            <td width="15%" align="center">
                            <?php if($fila_query2["noticias_eliminar"]==1){ ?>
                                <a onclick="eliminarRegistro(<?php echo $fila["id"] ?>, '<?php echo stripslashes(htmlspecialchars($fila["titulo"])) ?>');" href="javascript:;">
                                    <img src="../../images/eliminar_16.png" width="16" height="16" title="Eliminar registro" /></a>
                            <?php } ?>
                            &nbsp;
                            <?php if($fila_query2["noticias_modificar"]==1){ ?>
                           		<a href="form-modificar.php?id=<?php echo $fila["id"] ?>">
                                	<img src="../../images/editar_16.png" width="16" height="16" title="Modiciar registro" /></a>
                            <?php } ?>
                                </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td height="30" colspan="2" align="center">
                    <?php 
                    if ($_REQUEST["btnbuscar"]=="")
                    {
                    if (!isset($_GET["pag"]))
                    $pag = 1;
                    else
                    $pag = $_GET["pag"];
                    echo paginar($pag, $num_registros, $registros, "$url?pag=", 10);
                    }
                    ?>
                    </td>
                  </tr>
                  <tr>
                    <td height="30" colspan="2" align="center"><p><?php echo $mensaje2; ?></p></td>
                  </tr>
                  </table>
      </div><!-- FIN CONTENIDO -->
  </div>
</div>
</body>
</html>