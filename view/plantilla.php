<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title id="tituloPagina">Argosal</title>
    <link rel="icon" href="view/static/img/icono.png">
    <link rel="stylesheet" href="view/static/css/styles.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="view/static/css/style.css">
</head>

<?php
    session_start();
    if (!isset($_SESSION["user"])) 
    {
        include_once "paginas/login.php";
    }
    elseif (isset($_SESSION["user"]) && !isset($_GET["pagina"])) 
    {
        $dniUsuario = $_SESSION["dni"];
        $nombreUsuario = $_SESSION["user"];
        $tipoUsuario = $_SESSION["tipo"];

        include_once "paginas/dashboard.php";
    }
    elseif (isset($_SESSION["user"]) && isset($_GET["pagina"])) 
    {
        $dniUsuario = $_SESSION["dni"];
        $nombreUsuario = $_SESSION["user"];
        $tipoUsuario = $_SESSION["tipo"];

        if($_GET["pagina"]==="Dashboard")
        {
            include_once "paginas/dashboard.php";
        }
        elseif ($_GET["pagina"]==="Clientes") 
        {
            include_once "paginas/clientes.php";
        }
        elseif ($_GET["pagina"]==="Datos") 
        {
            include_once "paginas/datos.php";
        }
        elseif ($_GET["pagina"]==="Productos") 
        {
            include_once "paginas/productos.php";
        }
        elseif ($_GET["pagina"]==="Ubicaciones") 
        {
            include_once "paginas/ubicaciones.php";
        }
        elseif ($_GET["pagina"]==="Reportes") 
        {
            include_once "paginas/reportes.php";
        }
        elseif ($_GET["pagina"]==="Configuracion") 
        {
            include_once "paginas/configuracion.php";
        }
        else 
        {
            include_once "paginas/404.php";
        }
    }
?>