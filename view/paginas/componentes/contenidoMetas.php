<?php 
require_once "model/conexion.php";
require_once "model/usuarios.php";

$model = new user();
$listar = $model->listar();

$cone = new conexion();
$consulta = $cone->conectar();

// progreso ventas totales
$sql = "select * from whatsapp where estado='Concretado'";
$resultado = sqlsrv_query($consulta,$sql, array(), array("Scrollable"=>"buffered"));
$ventasTotalesPr = sqlsrv_num_rows($resultado);
// progreso portabilidades menores a 69
$sql1 = "select * from whatsapp where producto='movil' and tipo='Portabilidad' and(planR='S/ 29.90 MAX' or planR='S/ 39.90' or planR='S/ 49.90' or planR='S/ 55.90') and estado='Concretado'";
$resultado1 = sqlsrv_query($consulta,$sql1, array(), array("Scrollable"=>"buffered"));
$ventasMen69 = sqlsrv_num_rows($resultado1);
// progreso portabilidades mayores a 69
$sql2 = "select * from whatsapp where producto='movil' and tipo='Portabilidad' and(planR!='S/ 29.90 MAX' and planR!='S/ 39.90' and planR!='S/ 49.90' and planR!='S/ 55.90' and planR!='---') and estado='Concretado'";
$resultado2 = sqlsrv_query($consulta,$sql2, array(), array("Scrollable"=>"buffered"));
$ventasMay69 = sqlsrv_num_rows($resultado2);
// progreso altas postpago
$sql3 = "select * from whatsapp where producto='movil' and tipo='Linea Nueva' and modalidad='Postpago' and estado='Concretado'";
$resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
$ventasAltPost = sqlsrv_num_rows($resultado3);
// progreso altas prepago
$sql3 = "select * from whatsapp where producto='movil' and tipo='Linea Nueva' and modalidad='prepago' and estado='Concretado'";
$resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
$ventasAltPre = sqlsrv_num_rows($resultado3);
// progreso portabilidad prepago
$sql3 = "select * from whatsapp where producto='movil' and tipo='Portabilidad' and modalidad='Prepago' and estado='Concretado'";
$resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
$ventasPortPre = sqlsrv_num_rows($resultado3);
// progreso renovaciones
$sql3 = "select * from whatsapp where producto='movil' and tipo='Renovacion' and estado='Concretado'";
$resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
$ventasReno = sqlsrv_num_rows($resultado3);
// progreso fija ftth
$sql3 = "select * from whatsapp where producto='Fija' and (modoFija='HFC' or modoFija='FTTH') and estado='Concretado'";
$resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
$ventasFijaFtth = sqlsrv_num_rows($resultado3);
// progreso fija ifi
$sql3 = "select * from whatsapp where producto='Fija' and modoFija='IFI' and estado='Concretado'";
$resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
$ventasFijaIfi = sqlsrv_num_rows($resultado3);
?>
<div class="offcanvas offcanvas-end" tabindex="-1" id="Metas" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h1 class="offcanvas-title" id="offcanvasRightLabel">Progreso del Mes</h1>
    <button type="button" class="btn-close bg-danger" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class="row">
        <div class="col-xl-12 col-md-6">
            <div class="card mb-4">
                <div class="card-body">  
                    <h3>Progreso total del mes</h3>                                              
                    <div class="progress my-2">
                        <div class="progress-bar" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" id="BarraProgreTotVen"></div>
                    </div>
                    <p class="text-center text-muted" id="total"><span id="progreTotVen"><?php echo $ventasTotalesPr ?></span> de <span id="totven">75</span></p>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6">
            <div class="card mb-4">
                <div class="card-body">                                                   
                    <h3>Portabilidad menores a 69.90</h3>
                    <div class="progress my-2">
                        <div class="progress-bar" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" id="BarraProgrevenprotmen69"></div>
                    </div>
                    <p class="text-center text-muted"><span id="progrevenprotmen69"><?php echo $ventasMen69 ?></span> de <span id="portmen69">22</span></p>            
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6">
            <div class="card mb-4">
                <div class="card-body">                                                   
                    <h3>Portabilidad mayores a 69.90</h3>
                    <div class="progress my-2">
                        <div class="progress-bar" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" id="BarraProgrevenprotmay69"></div>
                    </div>
                    <p class="text-center text-muted"><span id="progrevenprotmay69"><?php echo $ventasMay69 ?></span> de <span id="portmay69">25</span></p>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6">
            <div class="card mb-4">
                <div class="card-body">                                                   
                    <h3>Alta Postpago</h3>
                    <div class="progress my-2">
                        <div class="progress-bar" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" id="Barraprogrevenaltpost"></div>
                    </div>
                    <p class="text-center text-muted"><span id="progrevenaltpost"><?php echo $ventasAltPost ?></span> de <span id="altpost">5</span></p>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6">
            <div class="card mb-4">
                <div class="card-body">                                                   
                    <h3>Alta Prepago</h3>
                    <div class="progress my-2">
                        <div class="progress-bar" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" id="BarraProgreVenAltPre"></div>
                    </div>
                    <p class="text-center text-muted"><span id="progrevenaltpre"><?php echo $ventasAltPre ?></span> de <span id="altpre">1</span></p>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6">
            <div class="card mb-4">
                <div class="card-body">                                                   
                    <h3>Portabilidad Prepago</h3>
                    <div class="progress my-2">
                        <div class="progress-bar" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" id="BarraProgreportprepa"></div>
                    </div>
                    <p class="text-center text-muted"><span id="progreportprepa"><?php echo $ventasPortPre ?></span> de <span id="portpre">1</span></p>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6">
            <div class="card mb-4">
                <div class="card-body">                                                   
                    <h3>Renovacion</h3>
                    <div class="progress my-2">
                        <div class="progress-bar" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" id="BarraProgrevenrenova"></div>
                    </div>
                    <p class="text-center text-muted"><span id="progrevenrenova"><?php echo $ventasReno ?></span> de <span id="reno">10</span></p>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6">
            <div class="card mb-4">
                <div class="card-body">                                                   
                    <h3>HFC, FTTH</h3>
                    <div class="progress my-2">
                        <div class="progress-bar" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" id="BarraProgrevenfijaftth"></div>
                    </div>
                    <p class="text-center text-muted"><span id="progrevenfijaftth"><?php echo $ventasFijaFtth ?></span> de <span id="ftth">10</span></p>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6">
            <div class="card mb-4">
                <div class="card-body">                                                   
                    <h3>IFI</h3>
                    <div class="progress my-2">
                        <div class="progress-bar" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" id="BarraProgrevenfijaifi"></div>
                    </div>
                    <p class="text-center text-muted"><span id="progrevenfijaifi"><?php echo $ventasFijaIfi ?></span> de <span id="ifi">1</span></p>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<script src="controller/metas/progres.js"></script>