<?php
session_start();
if ($_SESSION["user-ggc"]=="")
	header("Location:index.php?nosesion=1");
?>