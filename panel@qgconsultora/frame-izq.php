<?php
session_start();
include("conexion/verificar_sesion.php");
include("conexion/conexion.php");

$user=$_SESSION["user-ggc"];

$rst_query=mysql_query("SELECT * FROM qgc_usuario_priv WHERE usuario='$user';", $conexion);
$fila_query=mysql_fetch_array($rst_query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex" />
<title>Administración de Contenido</title>

<link rel="stylesheet" type="text/css" media="all" href="css/style.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

	//Menu desplegable
	$("#menu ul li ul").hide();	
	$("#menu ul li span.current").addClass("open").next("ul").show();
	$("#menu ul li span").click(function(){	
		$(this).next("ul").slideToggle("slow").parent("li").siblings("li").find("ul:visible").slideUp("slow");
		$("#menu ul li").find("span").removeClass("open");
		$(this).addClass("open");
	});

});
</script>
</head>

<body>
<div id="menu">
        <h3>Administrar</h3>
  <div id="datos-usuario">
        	Usuario: <strong><?php echo $_SESSION["user-ggc"]; ?></strong><br />
        	Nombre: <strong><?php echo $_SESSION["user_nombre-ggc"]; ?> <?php echo $_SESSION["user_apellido-ggc"]; ?></strong><br /><br />
	  <a href="conexion/salir.php" target="_top"><strong>Cerrar sesión</strong></a>
    </div>
        <ul>
            <li><span <?php if($p == "categorias"){echo 'class="current"';} ?>><a href="javascript:void(0);" id="link-info">Noticias</a></span>
                <ul>
                    <li><a href="paginas/noticias/form-agregar.php" target="mainFrame" class="add">Agregar</a></li>
                    <li><a href="paginas/noticias/listar.php" target="mainFrame" class="list">Listar</a></li>
                </ul>
            </li>
            
            <li><span <?php if($p == "categorias"){echo 'class="current"';} ?>><a href="javascript:void(0);" id="link-info">Cursos</a></span>
                <ul>
                    <li><a href="paginas/cursos/form-agregar.php" target="mainFrame" class="add">Agregar</a></li>
                    <li><a href="paginas/cursos/listar.php" target="mainFrame" class="list">Listar</a></li>
                </ul>
            </li>
            
            <?php if($fila_query["usuarios"]==1){ ?>
            <li><span <?php if($p == "opciones"){echo 'class="current"';} ?>><a href="javascript:void(0);" id="link-usuarios">Usuarios</a></span>
                <ul>
                    <li><a href="paginas/usuarios/intranet/listar.php" target="mainFrame" class="list">Intranet</a></li>
                    <li><a href="paginas/usuarios/administracion/listar.php" target="mainFrame" class="list">Panel de Administración</a></li>
                    <li><a href="http://webstats.motigo.com/s?id=4788021" target="mainFrame" class="list">Contador de Visitas</a></li>
                </ul>
            </li>
            <?php } ?>
        </ul>
</div>
    <!--/menu-->
</body>
</html>
