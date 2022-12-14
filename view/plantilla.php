<?php
    require_once "model/conexion.php";
    error_reporting(0);
    session_start();
    if (!isset($_SESSION["user"])) 
    {
        $modelconelogin = new conexion();
        $conexionpruebalogin = $modelconelogin->conectar();
        if ($conexionpruebalogin) 
        {
            include_once "paginas/login.php";
        } 
        elseif (!$conexionpruebalogin) 
        {
            include_once "paginas/500.php";
        }
    }
    elseif (isset($_SESSION["user"]) && !isset($_GET["pagina"])) 
    {
        $modelconelogin = new conexion();
        $conexionpruebalogin = $modelconelogin->conectar();
        if ($conexionpruebalogin) 
        {
            $dniUsuario = $_SESSION["dni"];
            $nombreUsuario = $_SESSION["user"];
            $tipoUsuario = $_SESSION["tipo"];

            include_once "paginas/dashboard.php";
        } 
        elseif (!$conexionpruebalogin) 
        {
            include_once "paginas/500.php";
        }
    }
    elseif (isset($_SESSION["user"]) && isset($_GET["pagina"])) 
    {
        $modelconelogin = new conexion();
        $conexionpruebalogin = $modelconelogin->conectar();
        if ($conexionpruebalogin) 
        {
            $dniUsuario = $_SESSION["dni"];
            $nombreUsuario = $_SESSION["user"];
            $tipoUsuario = $_SESSION["tipo"];

            if($tipoUsuario === "1") 
            {
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
                elseif ($_GET["pagina"]==="Herramientas") 
                {
                    include_once "paginas/herramientas.php";
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
            elseif ($tipoUsuario === "0" || $tipoUsuario === "2") 
            {
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
                    include_once "paginas/401.php";
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
                    include_once "paginas/401.php";
                }
                elseif ($_GET["pagina"]==="Herramientas") 
                {
                    include_once "paginas/herramientas.php";
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
        } 
        elseif (!$conexionpruebalogin) 
        {
            include_once "paginas/500.php";
        }
    }
?>