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
		$tactivo = $columna[8];
	}
	if(($dni == $tdni) && ($clave == $tclave) && ($tactivo == "1"))
	{
		session_start();
		$_SESSION["dni"]=$tdni;
		$_SESSION["user"]=$tusu;
		$_SESSION["tipo"]=$ttipo;
		$consultas->activarEstado($dni);
		header("location:../../index.php?pagina=Dashboard");
	}
	elseif ($tactivo == "0") {?>
		<script>
			alert("Tu usuario fue eliminado ):");
			window.history.back();
		</script>
	<?php }
	else
	{
		header("location:../../");
	}
}
else
{
	header("location:../../");
}
?>
