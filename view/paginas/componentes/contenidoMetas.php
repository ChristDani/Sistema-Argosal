<?php 
require_once "model/conexion.php";
require_once "model/usuarios.php";
require_once "model/metas.php";

$metas = new metas();
if ($tipoUsuario === "1" || $tipoUsuario === "2") 
{
    $listaMetas = $metas->listar();
}
elseif ($tipoUsuario === "0") 
{
    $listaMetas = $metas->listarAsesor($dniUsuario);
}

if ($listaMetas != null) 
{
    foreach ($listaMetas as $m) 
    {
            $portamen69 = trim($m[1]);
            $portamay69 = trim($m[2]);
            $altapost = trim($m[3]);
            $altaprepa = trim($m[4]);
            $portaprepa = trim($m[5]);
            $renovacion = trim($m[6]);
            $hfc_ftth = trim($m[7]);
            $ifi = trim($m[8]);
            $metatotal = intval($m[1])+intval($m[2])+intval($m[3])+intval($m[4])+intval($m[5])+intval($m[6])+intval($m[7])+intval($m[8]);
    }
} 

// $model = new user();
// $listar = $model->listar();

$cone = new conexion();
$consulta = $cone->conectar();

if ($tipoUsuario === "1" || $tipoUsuario === "2") 
{
    // progreso ventas totales
    $sql = "select * from whatsapp where (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate())) and estado='1'";
    $resultado = sqlsrv_query($consulta,$sql, array(), array("Scrollable"=>"buffered"));
    $ventasTotalesPr = sqlsrv_num_rows($resultado);
    // progreso portabilidades menores a 69
    $sql1 = "select * from whatsapp where (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate())) and producto='1' and tipo='1' and(planR='S/ 29.90 MAX' or planR='S/ 39.90' or planR='S/ 49.90' or planR='S/ 55.90') and estado='1'";
    $resultado1 = sqlsrv_query($consulta,$sql1, array(), array("Scrollable"=>"buffered"));
    $ventasMen69 = sqlsrv_num_rows($resultado1);
    // progreso portabilidades mayores a 69
    $sql2 = "select * from whatsapp where (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate())) and producto='1' and tipo='1' and(planR!='S/ 29.90 MAX' and planR!='S/ 39.90' and planR!='S/ 49.90' and planR!='S/ 55.90' and planR!='---') and estado='1'";
    $resultado2 = sqlsrv_query($consulta,$sql2, array(), array("Scrollable"=>"buffered"));
    $ventasMay69 = sqlsrv_num_rows($resultado2);
    // progreso altas postpago
    $sql3 = "select * from whatsapp where (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate())) and producto='1' and tipo='0' and modalidad='1' and estado='1'";
    $resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
    $ventasAltPost = sqlsrv_num_rows($resultado3);
    // progreso altas prepago
    $sql3 = "select * from whatsapp where (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate())) and producto='1' and tipo='0' and modalidad='0' and estado='1'";
    $resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
    $ventasAltPre = sqlsrv_num_rows($resultado3);
    // progreso portabilidad prepago
    $sql3 = "select * from whatsapp where (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate())) and producto='1' and tipo='1' and modalidad='0' and estado='1'";
    $resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
    $ventasPortPre = sqlsrv_num_rows($resultado3);
    // progreso renovaciones
    $sql3 = "select * from whatsapp where (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate())) and producto='1' and tipo='2' and estado='1'";
    $resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
    $ventasReno = sqlsrv_num_rows($resultado3);
    // progreso fija ftth
    $sql3 = "select * from whatsapp where (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate())) and producto='0' and (modoFija='HFC' or modoFija='FTTH') and estado='1'";
    $resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
    $ventasFijaFtth = sqlsrv_num_rows($resultado3);
    // progreso fija ifi
    $sql3 = "select * from whatsapp where (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate())) and producto='0' and modoFija='IFI' and estado='1'";
    $resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
    $ventasFijaIfi = sqlsrv_num_rows($resultado3);
}
elseif ($tipoUsuario === "0") 
{
    // progreso ventas totales
    $sql = "select * from whatsapp where (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate())) and estado='1' and dniAsesor='$dniUsuario'";
    $resultado = sqlsrv_query($consulta,$sql, array(), array("Scrollable"=>"buffered"));
    $ventasTotalesPr = sqlsrv_num_rows($resultado);
    // progreso portabilidades menores a 69
    $sql1 = "select * from whatsapp where (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate())) and producto='1' and tipo='1' and(planR='S/ 29.90 MAX' or planR='S/ 39.90' or planR='S/ 49.90' or planR='S/ 55.90') and estado='1' and dniAsesor='$dniUsuario'";
    $resultado1 = sqlsrv_query($consulta,$sql1, array(), array("Scrollable"=>"buffered"));
    $ventasMen69 = sqlsrv_num_rows($resultado1);
    // progreso portabilidades mayores a 69
    $sql2 = "select * from whatsapp where (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate())) and producto='1' and tipo='1' and(planR!='S/ 29.90 MAX' and planR!='S/ 39.90' and planR!='S/ 49.90' and planR!='S/ 55.90' and planR!='---') and estado='1' and dniAsesor='$dniUsuario'";
    $resultado2 = sqlsrv_query($consulta,$sql2, array(), array("Scrollable"=>"buffered"));
    $ventasMay69 = sqlsrv_num_rows($resultado2);
    // progreso altas postpago
    $sql3 = "select * from whatsapp where (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate())) and producto='1' and tipo='0' and modalidad='1' and estado='1' and dniAsesor='$dniUsuario'";
    $resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
    $ventasAltPost = sqlsrv_num_rows($resultado3);
    // progreso altas prepago
    $sql3 = "select * from whatsapp where (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate())) and producto='1' and tipo='0' and modalidad='0' and estado='1' and dniAsesor='$dniUsuario'";
    $resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
    $ventasAltPre = sqlsrv_num_rows($resultado3);
    // progreso portabilidad prepago
    $sql3 = "select * from whatsapp where (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate())) and producto='1' and tipo='1' and modalidad='0' and estado='1' and dniAsesor='$dniUsuario'";
    $resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
    $ventasPortPre = sqlsrv_num_rows($resultado3);
    // progreso renovaciones
    $sql3 = "select * from whatsapp where (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate())) and producto='1' and tipo='2' and estado='1' and dniAsesor='$dniUsuario'";
    $resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
    $ventasReno = sqlsrv_num_rows($resultado3);
    // progreso fija ftth
    $sql3 = "select * from whatsapp where (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate())) and producto='0' and (modoFija='HFC' or modoFija='FTTH') and estado='1' and dniAsesor='$dniUsuario'";
    $resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
    $ventasFijaFtth = sqlsrv_num_rows($resultado3);
    // progreso fija ifi
    $sql3 = "select * from whatsapp where (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate())) and producto='0' and modoFija='IFI' and estado='1' and dniAsesor='$dniUsuario'";
    $resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
    $ventasFijaIfi = sqlsrv_num_rows($resultado3);
}
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
                    <p class="text-center text-muted" id="total"><span id="progreTotVen"><?php echo $ventasTotalesPr ?></span> de <span id="totven"><?php echo $metatotal ?></span></p>
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
                    <p class="text-center text-muted"><span id="progrevenprotmen69"><?php echo $ventasMen69 ?></span> de <span id="portmen69"><?php echo $portamen69 ?></span></p>            
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
                    <p class="text-center text-muted"><span id="progrevenprotmay69"><?php echo $ventasMay69 ?></span> de <span id="portmay69"><?php echo $portamay69 ?></span></p>
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
                    <p class="text-center text-muted"><span id="progrevenaltpost"><?php echo $ventasAltPost ?></span> de <span id="altpost"><?php echo $altapost ?></span></p>
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
                    <p class="text-center text-muted"><span id="progrevenaltpre"><?php echo $ventasAltPre ?></span> de <span id="altpre"><?php echo $altaprepa ?></span></p>
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
                    <p class="text-center text-muted"><span id="progreportprepa"><?php echo $ventasPortPre ?></span> de <span id="portpre"><?php echo $portaprepa ?></span></p>
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
                    <p class="text-center text-muted"><span id="progrevenrenova"><?php echo $ventasReno ?></span> de <span id="reno"><?php echo $renovacion ?></span></p>
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
                    <p class="text-center text-muted"><span id="progrevenfijaftth"><?php echo $ventasFijaFtth ?></span> de <span id="ftth"><?php echo $hfc_ftth ?></span></p>
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
                    <p class="text-center text-muted"><span id="progrevenfijaifi"><?php echo $ventasFijaIfi ?></span> de <span id="ifi"><?php echo $ifi ?></span></p>
                </div>
            </div>
        </div>
    </div>
  </div>
    <?php if ($tipoUsuario === "1") {?>
        <div class="offcanvas-footer">
            <button type="submit" class="btn btn-primary my-3 ml-4" data-bs-toggle="modal" data-bs-target="#editarMetas">Editar Metas</button>
        </div>
    <?php } ?>
</div>
<?php include_once "configuraciones/contenidoModalEditarMetas.php"; ?>
<script src="controller/metas/progres.js"></script>
