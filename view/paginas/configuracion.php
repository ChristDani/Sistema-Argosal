<?php
require_once "model/usuarios.php";

$modal = new user();
$listaUsuarios = $modal->listar();

$diassemana = array("Lunes","Martes","Miercoles","Jueves","Viernes","Sábado","Domingo");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

if ($listaUsuarios != null) 
{
    foreach ($listaUsuarios as $u) 
    { 
        if ($u[0] === $dniUsuario) 
        {

            $dia= $u[4]-> format('N');
            $numerodia= $u[4]-> format('d');
            $mes= $u[4]-> format('m');
            $año= $u[4]-> format('Y');
            $hora= $u[4]-> format('h:i:s A');

            $configdniUser = $u[0];
            $configNombreUser = trim($u[1]);
            $configClaveUser = $u[2];
            $configTipoUser = $u[3];
            $configFechaUser = $diassemana[$dia-1].", ".$numerodia." de ".$meses[$mes-1]." del ".$año." / ".$hora;
            $configEstadoUser = $u[5];
            $configfotoUser = trim($u[6]);
        }
    }
} 
?>
<?php include_once "componentes/header.php"; ?>
<?php include_once "componentes/configuraciones/contenidoConfiguracion.php"; ?>
<?php include_once "componentes/footer.php"; ?>