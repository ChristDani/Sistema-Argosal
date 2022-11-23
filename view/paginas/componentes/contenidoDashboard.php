<h1>DASHBOARD</h1>

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
<!-- <div class="row">
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Area Chart Example</div>
            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Bar Chart Example</div>
            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
        </div>
    </div>
</div> -->

<?php
if ($listar != null) 
{
    foreach ($listar as $x) 
    {
        if ($x[0] === $dniUsuario) 
        {
            //ventas totales asesor
            $sqla = "select w.codigo, u.nombre from whatsapp as w inner join usuarios as u on u.nombre=w.asesor where u.dni='".$x[0]."'";
            // echo $sqla;
            $resultadoa = sqlsrv_query($consulta,$sqla, array(), array("Scrollable"=>"buffered"));
            $ventasTotalesAsesor = sqlsrv_num_rows($resultadoa);
            // ventas pendientes asesor
            $sql2 = "select w.codigo, u.nombre from whatsapp as w inner join usuarios as u on u.nombre=w.asesor where w.estado='Pendiente' and u.dni='".$x[0]."'";
            $resultado2 = sqlsrv_query($consulta,$sql2, array(), array("Scrollable"=>"buffered"));
            $ventasPendientesAsesor = sqlsrv_num_rows($resultado2);
            // ventas concretadas asesor
            $sql1 = "select w.codigo, u.nombre from whatsapp as w inner join usuarios as u on u.nombre=w.asesor where w.estado='Concretado' and u.dni='".$x[0]."'";
            $resultado1 = sqlsrv_query($consulta,$sql1, array(), array("Scrollable"=>"buffered"));
            $ventasConcretadasAsesor = sqlsrv_num_rows($resultado1);
            // ventas rechazadas asesor
            $sql3 = "select w.codigo, u.nombre from whatsapp as w inner join usuarios as u on u.nombre=w.asesor where w.estado='No Requiere' and u.dni='".$x[0]."'";
            $resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
            $ventasRechazadasAsesor = sqlsrv_num_rows($resultado3);
?>
            <?php if ($x[3] === "1") { ?>
                <h3>Ventas del Administrador <?php echo $x[1] ?></h3>
            <?php }elseif ($x[3] === "0") { ?>
                <h3>Ventas del Asesor <?php echo $x[1] ?></h3>
            <?php } ?>
            <!-- <h3>Tus Ventas</h3> -->
            
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

if ($listar != null) 
{
    foreach ($listar as $x) 
    {
        if ($x[0] !== $dniUsuario) 
        {
            //ventas totales asesor
            $sqla = "select w.codigo, u.nombre from whatsapp as w inner join usuarios as u on u.nombre=w.asesor where u.dni='".$x[0]."'";
            // echo $sqla;
            $resultadoa = sqlsrv_query($consulta,$sqla, array(), array("Scrollable"=>"buffered"));
            $ventasTotalesAsesor = sqlsrv_num_rows($resultadoa);
            // ventas pendientes asesor
            $sql2 = "select w.codigo, u.nombre from whatsapp as w inner join usuarios as u on u.nombre=w.asesor where w.estado='Pendiente' and u.dni='".$x[0]."'";
            $resultado2 = sqlsrv_query($consulta,$sql2, array(), array("Scrollable"=>"buffered"));
            $ventasPendientesAsesor = sqlsrv_num_rows($resultado2);
            // ventas concretadas asesor
            $sql1 = "select w.codigo, u.nombre from whatsapp as w inner join usuarios as u on u.nombre=w.asesor where w.estado='Concretado' and u.dni='".$x[0]."'";
            $resultado1 = sqlsrv_query($consulta,$sql1, array(), array("Scrollable"=>"buffered"));
            $ventasConcretadasAsesor = sqlsrv_num_rows($resultado1);
            // ventas rechazadas asesor
            $sql3 = "select w.codigo, u.nombre from whatsapp as w inner join usuarios as u on u.nombre=w.asesor where w.estado='No Requiere' and u.dni='".$x[0]."'";
            $resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
            $ventasRechazadasAsesor = sqlsrv_num_rows($resultado3);
?>
            <?php if ($x[3] === "1") { ?>
                <h3>Ventas del Administrador <?php echo $x[1] ?></h3>
            <?php }elseif ($x[3] === "0") { ?>
                <h3>Ventas del Asesor <?php echo $x[1] ?></h3>
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
?>
