<?php
require_once "model/usuarios.php";

$modal = new user();
$listaUsuarios = $modal->listar();

if ($listaUsuarios != null) 
{
    foreach ($listaUsuarios as $u) 
    { 
        if ($u[0] === $dniUsuario) 
        {
            $configdniUser = $u[0];
            $configNombreUser = strtoupper($u[1]);
            $configTipoUser = $u[3];
            $configFechaUser = $u[5]->format('l j \of F Y h:i:s A');
            $configEstadoUser = $u[6];
            $configfotoUser = $u[7];
        }
    }
} 
?>
<?php include_once "componentes/header.php"; ?>
<?php include_once "componentes/configuraciones/contenidoConfiguracion.php"; ?>
<?php include_once "componentes/footer.php"; ?>