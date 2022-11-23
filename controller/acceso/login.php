<?php

require_once("../../model/usuarios.php");
	
$dni = $_POST['dni'];
$clave = sha1($_POST['clave']);

$consultas=new user();
$filas2=$consultas->buscarUser($dni);

if ($filas2 != null) 
{
	foreach($filas2 as $columna) 
	{

		$tdni = $columna[0];
		$tusu=$columna[1];
		$tclave = sha1($columna[2]);
		$ttipo = $columna[3];
			
	}
}
else{
	header("location:../../index.php");
}

if(($dni==$tdni) && ($clave == $tclave))
{
	session_start();
	$_SESSION["dni"]=$tdni;
	$_SESSION["user"]=$tusu;
	$_SESSION["tipo"]=$ttipo;
	// // $activarEstado = $consultas->activarEstado($dni);
	header("location:../../index.php?pagina=Dashboard");


}
else
{
	header("location:../../index.php");
}

?>
