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
		$tclave = $columna[2];
		$ttipo = $columna[3];
		$tactivo = $columna[7];
	}
	if(($dni == $tdni) && ($clave == $tclave) && ($tactivo == "1"))
	{
		session_start();
		$_SESSION["dni"] = $tdni;
		$_SESSION["user"] = $tusu;
		$_SESSION["tipo"] = $ttipo;
		$_SESSION["Mensaje"] = null;
		$consultas->activarEstado($dni);
		header("location:../../index.php?pagina=Dashboard");
	}
	else
	{
		session_start();
		$_SESSION["Mensaje"]="<p class='text-danger'>Usuario y/o Dni Incorrecto.</p>";
		if (!isset($_SESSION["intentos"])) 
		{
			$_SESSION["intentos"] = 1;
		}	
		elseif ($_SESSION['intentos'] > 0 && $_SESSION["intentos"] < 3) 
		{
			$_SESSION["intentos"] = $_SESSION["intentos"]+1;
		}
		header("location:../../");
	}
}
else
{
	session_start();
	$_SESSION["Mensaje"]="<p class='text-danger'>Usuario y/o Dni Incorrecto.</p>";
	if (!isset($_SESSION["intentos"])) 
	{
		$_SESSION["intentos"] = 1;
	}	
	elseif ($_SESSION['intentos'] > 0 && $_SESSION["intentos"] < 3) 
	{
		$_SESSION["intentos"] = $_SESSION["intentos"]+1;
	}	
	header("location:../../");
}
?>
