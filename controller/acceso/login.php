<?php

$_SESSION["user"]=null;

require_once("../../model/usuarios.php");
	
$dni=$_POST['dni'];
$clave=$_POST['clave'];

$consultas=new user();
$filas2=$consultas->buscarUser($dni);

if ($filas2 != null) 
{
	foreach($filas2 as $columna) 
	{

		$tdni = $columna[0];
		$tusu=$columna[1];
		$tclave = $columna[2];
			
	}
}
else{
	$tdni = '00000000';
	$tclave = '000000';
}

if(($dni==$tdni) && ($clave == $tclave))
{

	session_start();
	$_SESSION["user"]=$tusu;
	header("location:../../index.php?pagina=clientes&dni=$tdni");
	session_destroy();

}

else
{
	header("location:../../index.php");
}

?>
