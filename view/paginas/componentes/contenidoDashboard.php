<h1>DASHBOARD</h1>

<?php if ($tipoUsuario === "1" || $tipoUsuario === "2") { ?>

<h3>Ventas en Generales</h3>
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card mb-4">
            <div class="card-body">
                <ion-icon name="person-circle-outline"></ion-icon>                                  
                <h3>Gestion Total</h3>
                <h1><?php echo $ventasTotales; ?></h1>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mb-4">
            <div class="card-body warning-bg wait">
                <ion-icon name="alert-circle-outline"></ion-icon>
                <h3>Pendientes</h3>
                <h1><?php echo $ventasPendientes; ?></h1>
            </div>    
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mb-4">
            <div class="card-body success-bg income">
                <ion-icon name="arrow-up-circle-outline"></ion-icon>
                <h3>Concretados</h3>
                <h1><?php echo $ventasConcretadas; ?></h1>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mb-4">
            <div class="card-body danger-bg expenses">
                <ion-icon name="arrow-down-circle-outline"></ion-icon>
                <h3>Rechazados</h3>
                <h1><?php echo $ventasRechazadas; ?></h1>
            </div>
        </div>
    </div>                            
</div>

<?php } ?>

<?php
if ($listar != null) 
{
    foreach ($listar as $x) 
    {
        if ($x[0] === $dniUsuario) 
        {
            //ventas totales asesor
            $sqla = "select * from whatsapp where dniAsesor='".$x[0]."' and (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate()))";
            // echo $sqla;
            $resultadoa = sqlsrv_query($consulta,$sqla, array(), array("Scrollable"=>"buffered"));
            $ventasTotalesAsesor = sqlsrv_num_rows($resultadoa);
            // ventas pendientes asesor
            $sql2 = "select * from whatsapp where estado='2' and dniAsesor='".$x[0]."' and (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate()))";
            $resultado2 = sqlsrv_query($consulta,$sql2, array(), array("Scrollable"=>"buffered"));
            $ventasPendientesAsesor = sqlsrv_num_rows($resultado2);
            // ventas concretadas asesor
            $sql1 = "select * from whatsapp where estado='1' and dniAsesor='".$x[0]."' and (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate()))";
            $resultado1 = sqlsrv_query($consulta,$sql1, array(), array("Scrollable"=>"buffered"));
            $ventasConcretadasAsesor = sqlsrv_num_rows($resultado1);
            // ventas rechazadas asesor
            $sql3 = "select * from whatsapp where estado='0' and dniAsesor='".$x[0]."' and (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate()))";
            $resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
            $ventasRechazadasAsesor = sqlsrv_num_rows($resultado3);
?>
            
            <h3>Tus Ventas</h3>
            
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <ion-icon name="person-circle-outline"></ion-icon>                                  
                            <h3>Gestion Total</h3>
                            <h1><?php echo $ventasTotalesAsesor ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card mb-4">
                        <div class="card-body warning-bg wait">
                            <ion-icon name="alert-circle-outline"></ion-icon>
                            <h3>Pendientes</h3>
                            <h1><?php echo $ventasPendientesAsesor ?></h1>
                        </div>    
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card mb-4">
                        <div class="card-body success-bg income">
                            <ion-icon name="arrow-up-circle-outline"></ion-icon>
                            <h3>Concretados</h3>
                            <h1><?php echo $ventasConcretadasAsesor ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card mb-4">
                        <div class="card-body danger-bg expenses">
                            <ion-icon name="arrow-down-circle-outline"></ion-icon>
                            <h3>Rechazados</h3>
                            <h1><?php echo $ventasRechazadasAsesor ?></h1>
                        </div>
                    </div>
                </div>                            
            </div>
<?php
        }
    }
}

if ($tipoUsuario === "1") 
{ 

    if ($listar != null) 
    {
        foreach ($listar as $x) 
        {
            if ($x[0] !== $dniUsuario) 
            {
                //ventas totales asesor
                $sqla = "select * from whatsapp where dniAsesor='".$x[0]."' and (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate()))";
                // echo $sqla;
                $resultadoa = sqlsrv_query($consulta,$sqla, array(), array("Scrollable"=>"buffered"));
                $ventasTotalesAsesor = sqlsrv_num_rows($resultadoa);
                // ventas pendientes asesor
                $sql2 = "select * from whatsapp where estado='2' and dniAsesor='".$x[0]."' and (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate()))";
                $resultado2 = sqlsrv_query($consulta,$sql2, array(), array("Scrollable"=>"buffered"));
                $ventasPendientesAsesor = sqlsrv_num_rows($resultado2);
                // ventas concretadas asesor
                $sql1 = "select * from whatsapp where estado='1' and dniAsesor='".$x[0]."' and (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate()))";
                $resultado1 = sqlsrv_query($consulta,$sql1, array(), array("Scrollable"=>"buffered"));
                $ventasConcretadasAsesor = sqlsrv_num_rows($resultado1);
                // ventas rechazadas asesor
                $sql3 = "select * from whatsapp where estado='0' and dniAsesor='".$x[0]."' and (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate()))";
                $resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
                $ventasRechazadasAsesor = sqlsrv_num_rows($resultado3);
?>
                <?php if ($x[3] === "1") { ?>
                    <h3>Ventas del Administrador <?php echo $x[1] ?></h3>
                <?php }elseif ($x[3] === "0") { ?>
                    <h3>Ventas del Asesor <?php echo $x[1] ?></h3>
                <?php }elseif ($x[3] === "2") { ?>
                    <h3>Ventas del Moderador <?php echo $x[1] ?></h3>
                <?php } ?>
                
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <ion-icon name="person-circle-outline"></ion-icon>                                  
                                <h3>Gestion Total</h3>
                                <h1><?php echo $ventasTotalesAsesor ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mb-4">
                            <div class="card-body warning-bg wait">
                                <ion-icon name="alert-circle-outline"></ion-icon>
                                <h3>Pendientes</h3>
                                <h1><?php echo $ventasPendientesAsesor ?></h1>
                            </div>    
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mb-4">
                            <div class="card-body success-bg income">
                                <ion-icon name="arrow-up-circle-outline"></ion-icon>
                                <h3>Concretados</h3>
                                <h1><?php echo $ventasConcretadasAsesor ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mb-4">
                            <div class="card-body danger-bg expenses">
                                <ion-icon name="arrow-down-circle-outline"></ion-icon>
                                <h3>Rechazados</h3>
                                <h1><?php echo $ventasRechazadasAsesor ?></h1>
                            </div>
                        </div>
                    </div>                            
                </div>
<?php
            }
        }
    }
}
if ($tipoUsuario === "2") 
{ 
    if ($listar != null) 
    {
        foreach ($listar as $x) 
        {
            if ($x[0] !== $dniUsuario && $x[3] === "0") 
            {
                //ventas totales asesor
                $sqla = "select * from whatsapp where dniAsesor='".$x[0]."' and (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate()))";
                // echo $sqla;
                $resultadoa = sqlsrv_query($consulta,$sqla, array(), array("Scrollable"=>"buffered"));
                $ventasTotalesAsesor = sqlsrv_num_rows($resultadoa);
                // ventas pendientes asesor
                $sql2 = "select * from whatsapp where estado='2' and dniAsesor='".$x[0]."' and (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate()))";
                $resultado2 = sqlsrv_query($consulta,$sql2, array(), array("Scrollable"=>"buffered"));
                $ventasPendientesAsesor = sqlsrv_num_rows($resultado2);
                // ventas concretadas asesor
                $sql1 = "select * from whatsapp where estado='1' and dniAsesor='".$x[0]."' and (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate()))";
                $resultado1 = sqlsrv_query($consulta,$sql1, array(), array("Scrollable"=>"buffered"));
                $ventasConcretadasAsesor = sqlsrv_num_rows($resultado1);
                // ventas rechazadas asesor
                $sql3 = "select * from whatsapp where estado='0' and dniAsesor='".$x[0]."' and (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate()))";
                $resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
                $ventasRechazadasAsesor = sqlsrv_num_rows($resultado3);
?>
                <?php if ($x[3] === "1") { ?>
                    <h3>Ventas del Administrador <?php echo $x[1] ?></h3>
                <?php }elseif ($x[3] === "0") { ?>
                    <h3>Ventas del Asesor <?php echo $x[1] ?></h3>
                <?php }elseif ($x[3] === "2") { ?>
                    <h3>Ventas del Moderador <?php echo $x[1] ?></h3>
                <?php } ?>
                
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <ion-icon name="person-circle-outline"></ion-icon>                                  
                                <h3>Gestion Total</h3>
                                <h1><?php echo $ventasTotalesAsesor ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mb-4">
                            <div class="card-body warning-bg wait">
                                <ion-icon name="alert-circle-outline"></ion-icon>
                                <h3>Pendientes</h3>
                                <h1><?php echo $ventasPendientesAsesor ?></h1>
                            </div>    
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mb-4">
                            <div class="card-body success-bg income">
                                <ion-icon name="arrow-up-circle-outline"></ion-icon>
                                <h3>Concretados</h3>
                                <h1><?php echo $ventasConcretadasAsesor ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mb-4">
                            <div class="card-body danger-bg expenses">
                                <ion-icon name="arrow-down-circle-outline"></ion-icon>
                                <h3>Rechazados</h3>
                                <h1><?php echo $ventasRechazadasAsesor ?></h1>
                            </div>
                        </div>
                    </div>                            
                </div>
<?php
            }
        }
    }
}
