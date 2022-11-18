<div class="progresoTotal">
    <hgroup>
        Progreso General de la Empresa
    </hgroup>
    <div class="contenidoPT">
        <div class="card" style="width: 15rem;">
            <div class="card-body">
                <h5 class="card-title">Gestión Total</h5>
                <p class="card-text" id="vt"><?php echo $ventasTotales; ?></p>
            </div>
        </div>
        <div class="card" style="width: 15rem;">
            <div class="card-body">
                <h5 class="card-title">Concretadas</h5>
                <p class='card-text' id="vc"><?php echo $ventasConcretadas; ?></p>
                <!-- <div class="contenidoPr">
                    <div class="barrapr">
                        <div class="fuera">
                            <div class="dentro">
                                <div id="number">
                                    
                                </div>
                            </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="160px" height="160px">
                            <defs>
                                <linearGradient id="GradientColor">
                                    <stop offset="0%" stop-color="#e91e63"/>
                                    <stop offset="100%" stop-color="#673ab7"/>
                                </linearGradient>
                            </defs>
                            <circle cx="80" cy="80" r="70" stroke-linecap="round"/>
                        </svg>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="card" style="width: 15rem;">
            <div class="card-body">
                <h5 class="card-title">Pendientes</h5>
                <p class="card-text" id="vp"><?php echo $ventasPendientes; ?></p>
            </div>
        </div>
        <div class="card" style="width: 15rem;">
            <div class="card-body">
                <h5 class="card-title">Rechazadas</h5>
                <p class="card-text" id="vr"><?php echo $ventasRechazadas; ?></p>
            </div>
        </div>
    </div>
</div>
<div class="card grafico">
    <hgroup>
        Gráfica de Ventas
    </hgroup>
    <div class="card-body chart-container" style="position: relative; max-height:40vh;">
        <canvas id="myChart"></canvas>
    </div>
</div>
<div class="progresoIndividual">
    <hgroup>
        Progreso Individual por Asesor
    </hgroup>
    <div class="contenidoPI">
        <?php
        if ($listar != null) 
        {
            foreach ($listar as $x) 
            {
                if ($x[0] === $dni) 
                {
                    echo "<div class='progresoAsesor'>";
                    echo "<hgroup>";
                        echo "<b>$x[3]</b> <em>$x[1]</em>";
                    echo "</hgroup>";
                    // ventas totales asesor
                    $sqla = "select * from whatsapp where asesor='".$x[1]."'";
                    $resultadoa = sqlsrv_query($consulta,$sqla, array(), array("Scrollable"=>"buffered"));
                    $ventasTotalesAsesor = sqlsrv_num_rows($resultadoa);

                    echo "<div class='card' style='width: 20rem;'>";
                        echo "<div class='card-body'>";
                            echo "<h5 class='card-title'>Ventas Totales</h5>";
                            echo "<p class='card-text'>$ventasTotalesAsesor</p>";
                            // echo "<div class='contenidoPr'>";
                            //     echo "<p class='card-text'>$ventasTotalesAsesor</p>";
                            // echo "</div>";
                        echo "</div>";
                    echo "</div>";
                    // ventas concretadas asesor
                    $sql1 = "select * from whatsapp where estado='Concretado' and asesor='".$x[1]."'";
                    $resultado1 = sqlsrv_query($consulta,$sql1, array(), array("Scrollable"=>"buffered"));
                    $ventasConcretadasAsesor = sqlsrv_num_rows($resultado1);

                    echo "<div class='card' style='width: 20rem;'>";
                        echo "<div class='card-body'>";
                            echo "<h5 class='card-title'>Ventas Concretadas</h5>";
                            echo "<p class='card-text'>$ventasConcretadasAsesor</p>";
                        echo "</div>";
                    echo "</div>";
                    // ventas pendientes asesor
                    $sql2 = "select * from whatsapp where estado='Pendiente' and asesor='".$x[1]."'";
                    $resultado2 = sqlsrv_query($consulta,$sql2, array(), array("Scrollable"=>"buffered"));
                    $ventasPendientesAsesor = sqlsrv_num_rows($resultado2);

                    echo "<div class='card' style='width: 20rem;'>";
                        echo "<div class='card-body'>";
                            echo "<h5 class='card-title'>Ventas Pendientes</h5>";
                            echo "<p class='card-text'>$ventasPendientesAsesor</p>";
                        echo "</div>";
                    echo "</div>";
                    // ventas rechazadas asesor
                    $sql3 = "select * from whatsapp where estado='No Requiere' and asesor='".$x[1]."'";
                    $resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
                    $ventasRechazadasAsesor = sqlsrv_num_rows($resultado3);

                    echo "<div class='card' style='width: 20rem;'>";
                        echo "<div class='card-body'>";
                            echo "<h5 class='card-title'>Ventas Rechazadas</h5>";
                            echo "<p class='card-text'>$ventasRechazadasAsesor</p>";
                        echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            }
        }
        if ($listar != null) 
        {
            foreach ($listar as $x) 
            {
                if ($x[0] !== $dni) 
                {
                    echo "<div class='progresoAsesor'>";
                    echo "<hgroup>";
                        echo "<b>$x[3]</b> <em>$x[1]</em>";
                    echo "</hgroup>";
                    // ventas totales asesor
                    $sqla = "select * from whatsapp where asesor='".$x[1]."'";
                    $resultadoa = sqlsrv_query($consulta,$sqla, array(), array("Scrollable"=>"buffered"));
                    $ventasTotalesAsesor = sqlsrv_num_rows($resultadoa);
            
                    echo "<div class='card' style='width: 20rem;'>";
                        echo "<div class='card-body'>";
                            echo "<h5 class='card-title'>Ventas Totales</h5>";
                            echo "<p class='card-text'>$ventasTotalesAsesor</p>";
                        echo "</div>";
                    echo "</div>";
                    // ventas concretadas asesor
                    $sql1 = "select * from whatsapp where estado='Concretado' and asesor='".$x[1]."'";
                    $resultado1 = sqlsrv_query($consulta,$sql1, array(), array("Scrollable"=>"buffered"));
                    $ventasConcretadasAsesor = sqlsrv_num_rows($resultado1);
            
                    echo "<div class='card' style='width: 20rem;'>";
                        echo "<div class='card-body'>";
                            echo "<h5 class='card-title'>Ventas Concretadas</h5>";
                            echo "<p class='card-text'>$ventasConcretadasAsesor</p>";
                        echo "</div>";
                    echo "</div>";
                    // ventas pendientes asesor
                    $sql2 = "select * from whatsapp where estado='Pendiente' and asesor='".$x[1]."'";
                    $resultado2 = sqlsrv_query($consulta,$sql2, array(), array("Scrollable"=>"buffered"));
                    $ventasPendientesAsesor = sqlsrv_num_rows($resultado2);
            
                    echo "<div class='card' style='width: 20rem;'>";
                        echo "<div class='card-body'>";
                            echo "<h5 class='card-title'>Ventas Pendientes</h5>";
                            echo "<p class='card-text'>$ventasPendientesAsesor</p>";
                        echo "</div>";
                    echo "</div>";
                    // ventas rechazadas asesor
                    $sql3 = "select * from whatsapp where estado='No Requiere' and asesor='".$x[1]."'";
                    $resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
                    $ventasRechazadasAsesor = sqlsrv_num_rows($resultado3);
            
                    echo "<div class='card' style='width: 20rem;'>";
                        echo "<div class='card-body'>";
                            echo "<h5 class='card-title'>Ventas Rechazadas</h5>";
                            echo "<p class='card-text'>$ventasRechazadasAsesor</p>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
                }
            }
        }
        ?>
    </div>
</div>

<script src="view/static/grafico.js"></script>