<?
/**
* @Infocid version 2.0  feb-2005
* @Copyright (C) 2005 SPHERA5, C.A. <sphera5@gmail.com>
* *
* @Obra basada en el Programa Infocid
* @Copyright (C) 2003 CIDTEL <cidtel@inictel.gob.pe>
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* *
* @Powered by Autentificator
* @PHP-Script  de Gestión de Usuarios basado en sesiones
* @by Pedro Noves V. (Cluster) <clus@hotpop.com>
*/
?>
<?php require ("../usuarios/aut_verifica.inc.php");
$nivel_acceso=0; 
if ($nivel_acceso < $_SESSION['usuario_nivel']){
	header ("Location: $redir?error_login=5");
exit;
}?>
<!--		Fin Autentificacion	-->

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">
<HTML><HEAD>
<STYLE>	<!--		A:visited { color: #0000ff }	-->	</STYLE>
<?php include('../includes/head.php'); ?>
<?php include('../includes/menu.php'); ?>
<div id="pagecell1"> 
<!--pagecell1--> 
<? include("../Plantilla.rn");
        logo(); ?>
		
		<?php 
			if($_SESSION['usuario_login']){

			}
			else{
				echo "<!-- Formulario HTML-->";
				echo "<form action=\"$path/administracion/xlibro.php\" method=\"post\">";
				echo "Usuario: <input type=\"text\" name=\"user\">";
				echo "Password: <input type=\"password\" name=\"pass\">";
				echo "<input name=submit type=submit value=\"  Entrar  \">";
				echo "</form>";
						
				// Mostrar error de Autentificación.
				include ("../usuarios/aut_mensaje_error.inc.php");
				if (isset($_GET['error_login'])){
				$error=$_GET['error_login']; 
				echo "Error: $error_login_ms[$error]";
				}
			} 
				 
 pie(); ?>
  <!--end content --> 
</div>
</CENTER>
</BODY>
</HTML>