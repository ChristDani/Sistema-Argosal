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
            $configNombreUser = trim($u[1]);
            $configClaveUser = $u[2];
            $configTipoUser = $u[3];
            $configFechaUser = $u[4]->format('l j \of F Y h:i:s A');
            $configEstadoUser = $u[5];
            $configfotoUser = trim($u[6]);
        }
    }
} 
?>
<?php include_once "componentes/header.php"; ?>
<?php include_once "componentes/configuraciones/contenidoConfiguracion.php"; ?>
<?php include_once "componentes/footer.php"; ?>