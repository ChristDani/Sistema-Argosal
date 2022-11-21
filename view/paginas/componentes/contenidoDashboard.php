<h1>DASHBOARD</h1>

<h3>Venta en General</h3>
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
// if ($listar != null) 
// {
//     foreach ($listar as $x) 
//     {
//         if ($x[0] === $dni) 
//         {
//             echo "<div class='progresoAsesor'>";
//             echo "<hgroup>";
//                 echo "<b>$x[3]</b> <em>$x[1]</em>";
//             echo "</hgroup>";
//             // ventas totales asesor
//             $sqla = "select * from whatsapp where asesor='".$x[1]."'";
//             $resultadoa = sqlsrv_query($consulta,$sqla, array(), array("Scrollable"=>"buffered"));
//             $ventasTotalesAsesor = sqlsrv_num_rows($resultadoa);

//             echo "<div class='card' style='width: 20rem;'>";
//                 echo "<div class='card-body'>";
//                     echo "<h5 class='card-title'>Ventas Totales</h5>";
//                     echo "<p class='card-text'>$ventasTotalesAsesor</p>";
//                     // echo "<div class='contenidoPr'>";
//                     //     echo "<p class='card-text'>$ventasTotalesAsesor</p>";
//                     // echo "</div>";
//                 echo "</div>";
//             echo "</div>";
//             // ventas concretadas asesor
//             $sql1 = "select * from whatsapp where estado='Concretado' and asesor='".$x[1]."'";
//             $resultado1 = sqlsrv_query($consulta,$sql1, array(), array("Scrollable"=>"buffered"));
//             $ventasConcretadasAsesor = sqlsrv_num_rows($resultado1);

//             echo "<div class='card' style='width: 20rem;'>";
//                 echo "<div class='card-body'>";
//                     echo "<h5 class='card-title'>Ventas Concretadas</h5>";
//                     echo "<p class='card-text'>$ventasConcretadasAsesor</p>";
//                 echo "</div>";
//             echo "</div>";
//             // ventas pendientes asesor
//             $sql2 = "select * from whatsapp where estado='Pendiente' and asesor='".$x[1]."'";
//             $resultado2 = sqlsrv_query($consulta,$sql2, array(), array("Scrollable"=>"buffered"));
//             $ventasPendientesAsesor = sqlsrv_num_rows($resultado2);

//             echo "<div class='card' style='width: 20rem;'>";
//                 echo "<div class='card-body'>";
//                     echo "<h5 class='card-title'>Ventas Pendientes</h5>";
//                     echo "<p class='card-text'>$ventasPendientesAsesor</p>";
//                 echo "</div>";
//             echo "</div>";
//             // ventas rechazadas asesor
//             $sql3 = "select * from whatsapp where estado='No Requiere' and asesor='".$x[1]."'";
//             $resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
//             $ventasRechazadasAsesor = sqlsrv_num_rows($resultado3);

//             echo "<div class='card' style='width: 20rem;'>";
//                 echo "<div class='card-body'>";
//                     echo "<h5 class='card-title'>Ventas Rechazadas</h5>";
//                     echo "<p class='card-text'>$ventasRechazadasAsesor</p>";
//                 echo "</div>";
//             echo "</div>";
//             echo "</div>";
//         }
//     }
// }
if ($listar != null) 
{
    foreach ($listar as $x) 
    {
        // if ($x[0] !== $dni) 
        // {
            //ventas totales asesor
            $sqla = "select * from whatsapp where asesor='".$x[1]."'";
            $resultadoa = sqlsrv_query($consulta,$sqla, array(), array("Scrollable"=>"buffered"));
            $ventasTotalesAsesor = sqlsrv_num_rows($resultadoa);
            // ventas pendientes asesor
            $sql2 = "select * from whatsapp where estado='Pendiente' and asesor='".$x[1]."'";
            $resultado2 = sqlsrv_query($consulta,$sql2, array(), array("Scrollable"=>"buffered"));
            $ventasPendientesAsesor = sqlsrv_num_rows($resultado2);
            // ventas concretadas asesor
            $sql1 = "select * from whatsapp where estado='Concretado' and asesor='".$x[1]."'";
            $resultado1 = sqlsrv_query($consulta,$sql1, array(), array("Scrollable"=>"buffered"));
            $ventasConcretadasAsesor = sqlsrv_num_rows($resultado1);
            // ventas rechazadas asesor
            $sql3 = "select * from whatsapp where estado='No Requiere' and asesor='".$x[1]."'";
            $resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
            $ventasRechazadasAsesor = sqlsrv_num_rows($resultado3);
?>

            <h3>Venta de <?php echo $x[1] ?></h3>
            
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

        //     echo "<div class='progresoAsesor'>";
        //     echo "<hgroup>";
        //         echo "<b>$x[3]</b> <em>$x[1]</em>";
        //     echo "</hgroup>";
        //     // ventas totales asesor
        //     $sqla = "select * from whatsapp where asesor='".$x[1]."'";
        //     $resultadoa = sqlsrv_query($consulta,$sqla, array(), array("Scrollable"=>"buffered"));
        //     $ventasTotalesAsesor = sqlsrv_num_rows($resultadoa);
    
        //     echo "<div class='card' style='width: 20rem;'>";
        //         echo "<div class='card-body'>";
        //             echo "<h5 class='card-title'>Ventas Totales</h5>";
        //             echo "<p class='card-text'>$ventasTotalesAsesor</p>";
        //         echo "</div>";
        //     echo "</div>";
        //     // ventas concretadas asesor
        //     $sql1 = "select * from whatsapp where estado='Concretado' and asesor='".$x[1]."'";
        //     $resultado1 = sqlsrv_query($consulta,$sql1, array(), array("Scrollable"=>"buffered"));
        //     $ventasConcretadasAsesor = sqlsrv_num_rows($resultado1);
    
        //     echo "<div class='card' style='width: 20rem;'>";
        //         echo "<div class='card-body'>";
        //             echo "<h5 class='card-title'>Ventas Concretadas</h5>";
        //             echo "<p class='card-text'>$ventasConcretadasAsesor</p>";
        //         echo "</div>";
        //     echo "</div>";
        //     // ventas pendientes asesor
        //     $sql2 = "select * from whatsapp where estado='Pendiente' and asesor='".$x[1]."'";
        //     $resultado2 = sqlsrv_query($consulta,$sql2, array(), array("Scrollable"=>"buffered"));
        //     $ventasPendientesAsesor = sqlsrv_num_rows($resultado2);
    
        //     echo "<div class='card' style='width: 20rem;'>";
        //         echo "<div class='card-body'>";
        //             echo "<h5 class='card-title'>Ventas Pendientes</h5>";
        //             echo "<p class='card-text'>$ventasPendientesAsesor</p>";
        //         echo "</div>";
        //     echo "</div>";
        //     // ventas rechazadas asesor
        //     $sql3 = "select * from whatsapp where estado='No Requiere' and asesor='".$x[1]."'";
        //     $resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
        //     $ventasRechazadasAsesor = sqlsrv_num_rows($resultado3);
    
        //     echo "<div class='card' style='width: 20rem;'>";
        //         echo "<div class='card-body'>";
        //             echo "<h5 class='card-title'>Ventas Rechazadas</h5>";
        //             echo "<p class='card-text'>$ventasRechazadasAsesor</p>";
        //         echo "</div>";
        //     echo "</div>";
        // echo "</div>";
        // }
    }
}
?>
