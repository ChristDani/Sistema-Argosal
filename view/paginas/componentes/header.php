<?php
require_once "model/conexion.php";
require_once "model/usuarios.php";

$model = new user();
$listar = $model->listar();

$cone = new conexion();
$consulta = $cone->conectar();

// ventas totales
$sql = "select * from whatsapp";
$resultado = sqlsrv_query($consulta,$sql, array(), array("Scrollable"=>"buffered"));
$totalClientesMenu = sqlsrv_num_rows($resultado);
?>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand">
        <div class="navbar-nav mr-0 ml-md-3 my-2 my-md-0">
            <button class="mx-2 btn btn-link btn-sm d-flex justify-content-center" id="sidebarToggle">
                <ion-icon name="menu-outline"></ion-icon>
            </button>
            <button class="almrda Buttone mx-2 btn btn-link btn-sm d-flex justify-content-center">
                <div class="color d-flex justify-content-center align-items-center">
                    <ion-icon name="moon-outline"></ion-icon>
                </div>
            </button>
        </div>
        <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">

            <button class="mx-2 btn btn-link btn-sm d-flex justify-content-center" data-bs-toggle="offcanvas" data-bs-target="#Metas" aria-controls="offcanvasRight">
                <ion-icon name="analytics-outline"></ion-icon>
            </button>  
        </ul>       
    </nav>
    <?php require_once 'contenidoMetas.php'; ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="top mb-4">
                            <h2>AR<span class="danger">GO</span></h2>
                        </div>
                        <a class="nav-link" href="index.php?pagina=Dashboard">
                            <div class="sb-nav-link-icon"><ion-icon name="speedometer-outline"></ion-icon></div>
                            Dashboard
                        </a>							
                        <?php //if($tipo_usuario == 1) { ?>
                            <a class="nav-link" href="index.php?pagina=Clientes">
                                <div class="sb-nav-link-icon"><ion-icon name="people-outline"></ion-icon></div>
                                Clientes	<span class="badge danger-bg"><?php echo $totalClientesMenu; ?></span>							
                            </a>
                            <a class="nav-link" href="index.php?pagina=Datos">
                                <div class="sb-nav-link-icon"><ion-icon name="document-text-outline"></ion-icon></div>
                                Datos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>										
                        <?php //} ?>			
                        <a class="nav-link" href="index.php?pagina=Productos">
                            <div class="sb-nav-link-icon"><ion-icon name="phone-portrait-outline"></ion-icon></div>
                            Productos
                        </a>
                        <a class="nav-link" href="index.php?pagina=Ubicaciones">
                            <div class="sb-nav-link-icon"><ion-icon name="map-outline"></ion-icon></div>
                                Ubicaciones
                        </a>
                        <a class="nav-link" href="index.php?pagina=Reportes">
                            <div class="sb-nav-link-icon"><ion-icon name="newspaper-outline"></ion-icon></div>
                                Reportes
                        </a>
                        <a class="nav-link" href="index.php?pagina=Configuracion">
                            <div class="sb-nav-link-icon"> <ion-icon name="cog-outline"></ion-icon></div>
                                Configuracion
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="row">
                        <h2>Un Usuario<?php //echo $nombreu ; ?></h2>
                    </div>
                    <div class="row"> 
                        <div class="col d-flex justify-content-start">
                            <p>Administrador<?php //echo $nombre ; ?></p>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <a class="danger" href="controller/acceso/logout.php">
                                <ion-icon name="log-out-outline"></ion-icon>
                            </a>
                        </div>                            
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">              
