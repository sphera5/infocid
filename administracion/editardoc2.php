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
* @PHP-Script  de Gesti�n de Usuarios basado en sesiones
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
<?php include('../includes/head.php'); ?>
<?php include('../includes/menu.php'); ?>
<div id="pagecell1"> 
<!--pagecell1--> 
<? include("../Plantilla.rn");
        logo(); ?>
<BR>

<FORM ACTION="editdoc.php">
<h1> Documento Editado </h1>
<?php
 $char = strlen($reg1);
 //$coneccion = pg_connect("","","","","Biblio");
 include('../includes/connection.php');
 if ($char == 0){
 echo "No se puede realizar esta operaci�n<br>";
 echo "No se ha ingresado un n�mero de registro v�lido para resolver la operaci�n";
 }else{
 $desc=$des;
 $sql = "update documento set codigo = upper('$cod'), autor = upper('$aut'), titulo = upper('$tit'), descriptor = upper('$desc'),
	idioma = upper('$idi'), pieimprenta = upper('$pie'), paginacion = upper('$pag'), ingreso = upper('$fec'),observaciones = upper('$obs') WHERE codigo = upper('$reg1')";

 $exec = pg_exec($coneccion,$sql);
 echo "Usted ha editado exitosamente el documento:<br>";
 echo "<b>".strtoupper($reg1)."</b>";
 echo "<BR><BR>";
 echo "<table border=0>";
 echo "<tr><td>�Desea editar otro documento?<INPUT TYPE=SUBMIT VALUE='SI'></td></form>";
 echo "<td><form action='administracion.php'><INPUT TYPE=SUBMIT VALUE='NO'></td></tr>";
 echo "</form></table>";
 }
?>
<br><br><br>
  <? pie(); ?>
  <!--end content --> 
</div>
</CENTER>
</BODY>
</HTML>

