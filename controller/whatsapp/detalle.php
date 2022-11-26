<?php
require_once '../../model/conexion.php';

$model=new conexion();
$con=$model->conectar();

// en el caso de solo querer determinadas columnas usar esto con el mismo nombre de las columnas...
$columnas=['w.codigo','u.nombre','w.nombre','w.dni','w.telefono','w.producto','w.lineaProcedente','w.operadorCedente','w.modalidad','w.tipo','w.planR','w.equipo','w.formaDePago','w.numeroReferencia','w.sec','w.tipoFija','w.planFija','w.modoFija','w.estado','observaciones','w.promocion','w.ubicacion','w.distrito','w.fechaRegistro','w.fechaActualizacion'];

// tabla a seleccionar
$tabla='whatsapp as w inner join usuarios as u on w.dniAsesor=u.dni';

// posicion de registro
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : 'WP00000001';


// llamamos al registro
$sql = "select ".implode(", ", $columnas)." from $tabla where w.codigo='".$codigo."'";
// para verificar errores en la consulta
// echo $sql;


$resultado=sqlsrv_query($con,$sql, array(), array("Scrollable"=>"buffered"));

// para saber el numero de filas
$filas = sqlsrv_num_rows($resultado);


$output=[];
$output['data']= '';

if ($filas>0) {
    $i=1;
    while ($fila=sqlsrv_fetch_array($resultado)) {

        // variables para la comparacion
        $movil = "Movil";
        $fija = "Fija ";

        // variables asignadas de la base de datos

        $codigo = $fila['codigo'];
        $asesor = $fila[1];
        $nombre = $fila['nombre'];
        $dni = $fila['dni'];
        $telefono = $fila['telefono'];
        $producto = $fila['producto'];
        $lineaProce = $fila['lineaProcedente'];
        $operadorCed = $fila['operadorCedente'];
        $modalidad = $fila['modalidad'];
        $tipo = $fila['tipo'];
        $planR = $fila['planR'];
        $equipo = $fila['equipo'];
        $formaPago = $fila['formaDePago'];
        $telefonoRef = $fila['numeroReferencia'];
        $sec = $fila['sec'];
        $tipoFija = $fila['tipoFija'];
        $planFija = $fila['planFija'];
        $modoFija = $fila['modoFija'];
        $estado = $fila['estado'];
        $observaciones = $fila['observaciones'];
        $promocion = $fila['promocion'];
        $ubicacion = $fila['ubicacion'];
        $distrito = $fila['distrito'];
        $fecha = $fila['fechaRegistro']-> format('l j \of F Y h:i:s A');
        $fechaUdp = $fila['fechaActualizacion']-> format('l j \of F Y h:i:s A');

        // if ($tipoUsuario === "1") 
        // {
            // asesor
            $output['data'].= "<div class='my-3'><h3 class='text-center'>$asesor</h3></div>";

        // }
        
        $output['data'].= "<div class='d-flex flex-column gap-3'>";
        // codigo
        $output['data'].= "<div class='form-floating mb-3 hidden'>";
        $output['data'].= "<input class='form-control' type='text' name='codigoC' id='codigoC' value='$codigo'>";
        $output['data'].= "<label for='codigoC'>Código de Venta</label>";
        $output['data'].= "</div> ";
        
        // nombre
        $output['data'].= "<p class='text-muted'>Nombre</p>";
        $output['data'].= "<div><h1>$nombre</h1></div>";
        
        // dni
        $output['data'].= "<p class='text-muted'>Documento de identidad</p>";
        $output['data'].= "<div><h3>$dni</h3></div>";

        
        // numero de referencia
        $output['data'].= "<p class='text-muted'>Telefono referente</p>";
        $output['data'].= "<h3>$telefonoRef</h3>";
        
        
        // producto
        $output['data'].= "<p class='text-muted'>Producto solicitado</p>";
        $output['data'].= "<h3>$producto</h3>";
        
        // promocion
        $output['data'].= "<p class='text-muted'>Promocion</p>";
        $output['data'].= "<h3 id='promol'>$promocion</h3>";
        
        if ($producto === $fija) 
        {
            // tipo de fija
            $output['data'].= "<p class='text-muted'>Tipo</p>";
            $output['data'].= "<h3>$tipoFija</h3>";
            
            if ($tipoFija === "Portabilidad   ") 
            {
                // telefono
                $output['data'].= "<p class='text-muted'>Telefono</p>";
                $output['data'].= "<h3>$telefono</h3>";
            }        
            
            // plan de fija
            $output['data'].= "<p class='text-muted'>Plan</p>";
            $output['data'].= "<h3>$planFija</h3>";
            
            // modo de fija
            $output['data'].= "<div id='planFijaEdit' class='form-floating mb-3'>";
            $output['data'].= "<input disabled class='form-control' type='text' name='planFijacl' id='planFijacl' value='$modoFija'>";
            $output['data'].= "<label for='planFijacl'>Modo de Fija</label>";
            $output['data'].= "</div> ";
        } 
        elseif ($producto === $movil) 
        {
            // tipo
            $output['data'].= "<div id='typeEditM' class='form-floating mb-3'>";
            $output['data'].= "<input disabled class='form-control' type='text' name='tipeLinecl' id='tipeLinecl' value='$tipo'>";
            $output['data'].= "<label for='tipeLinecl'>Tipo de Linea</label>";
            $output['data'].= "</div> ";
            
            if ($tipo == "Linea Nueva    ") 
            {
                // modalidad
                $output['data'].= "<div id='modalEditM' class='form-floating mb-3'>";
                $output['data'].= "<input disabled class='form-control' type='text' name='modcl' id='modcl' value='$modalidad'>";
                $output['data'].= "<label for='modcl'>Modalidad</label>";
                $output['data'].= "</div> ";
                
                if ($modalidad == "Postpago") 
                {
                    // plan requerido
                    $output['data'].= "<div id='planReEdit' class='form-floating mb-3'>";
                    $output['data'].= "<input disabled class='form-control' type='text' name='planRcl' id='planRcl' value='$planR'>";
                    $output['data'].= "<label for='planRcl'>Plan Requerido</label>";
                    $output['data'].= "</div> ";
                }
                
                // equipo
                $output['data'].= "<div id='equipoEdit' class='form-floating mb-3'>";
                $output['data'].= "<input disabled class='form-control' type='text' name='equipocl' id='equipocl' value='$equipo'>";
                $output['data'].= "<label for='equipocl'>Equipo</label>";
                $output['data'].= "</div> ";
            }
            elseif ($tipo == "Portabilidad   ") 
            {
                // telefono
                $output['data'].= "<div id='telefEditM' class='form-floating mb-3'>";
                $output['data'].= "<input disabled class='form-control' type='text' name='telecl' id='telecl' value='$telefono'>";
                $output['data'].= "<label for='telecl'>Telefono a Portar</label>";
                $output['data'].= "</div> ";

                // linea procedente
                $output['data'].= "<div id='lineProceEditM' class='form-floating mb-3'>";
                $output['data'].= "<input disabled class='form-control' type='text' name='lineProcecl' id='lineProcecl' value='$lineaProce'>";
                $output['data'].= "<label for='lineProcecl'>Linea Procedente</label>";
                $output['data'].= "</div> ";
                
                // operador cedente
                $output['data'].= "<div id='operaCedenEditM' class='form-floating mb-3'>";
                $output['data'].= "<input disabled class='form-control' type='text' name='opeCedcl' id='opeCedcl' value='$operadorCed'>";
                $output['data'].= "<label for='opeCedcl'>Operador Cedente</label>";
                $output['data'].= "</div> ";
                
                // modalidad
                $output['data'].= "<div id='modalEditM' class='form-floating mb-3'>";
                $output['data'].= "<input disabled class='form-control' type='text' name='modcl' id='modcl' value='$modalidad'>";
                $output['data'].= "<label for='modcl'>Modalidad</label>";
                $output['data'].= "</div> ";
                
                if ($modalidad == "Postpago") 
                {
                    // plan requerido
                    $output['data'].= "<div id='planReEdit' class='form-floating mb-3'>";
                    $output['data'].= "<input disabled class='form-control' type='text' name='planRcl' id='planRcl' value='$planR'>";
                    $output['data'].= "<label for='planRcl'>Plan Requerido</label>";
                    $output['data'].= "</div> ";
                }
                
                // equipo
                $output['data'].= "<div id='equipoEdit' class='form-floating mb-3'>";
                $output['data'].= "<input disabled class='form-control' type='text' name='equipocl' id='equipocl' value='$equipo'>";
                $output['data'].= "<label for='equipocl'>Equipo</label>";
                $output['data'].= "</div> ";
            }
            elseif ($tipo == "Renovacion     ") 
            {
                // telefono
                $output['data'].= "<div id='telefEditM' class='form-floating mb-3'>";
                $output['data'].= "<input disabled class='form-control' type='text' name='telecl' id='telecl' value='$telefono'>";
                $output['data'].= "<label for='telecl'>Telefono a Renovar</label>";
                $output['data'].= "</div>";
                
                // linea procedente
                $output['data'].= "<div id='lineProceEditM' class='form-floating mb-3'>";
                $output['data'].= "<input disabled class='form-control' type='text' name='lineProcecl' id='lineProcecl' value='$lineaProce'>";
                $output['data'].= "<label for='lineProcecl'>Linea Procedente</label>";
                $output['data'].= "</div>";
                
                // modalidad
                $output['data'].= "<div id='modalEditM' class='form-floating mb-3'>";
                $output['data'].= "<input disabled class='form-control' type='text' name='modcl' id='modcl' value='$modalidad'>";
                $output['data'].= "<label for='modcl'>Modalidad</label>";
                $output['data'].= "</div>";

                if ($modalidad == "Postpago") 
                {
                    // plan requerido
                    $output['data'].= "<div id='planReEdit' class='form-floating mb-3'>";
                    $output['data'].= "<input disabled class='form-control' type='text' name='planRcl' id='planRcl' value='$planR'>";
                    $output['data'].= "<label for='planRcl'>Plan Requerido</label>";
                    $output['data'].= "</div> ";
                }
                
                // equipo
                $output['data'].= "<div id='equipoEdit' class='form-floating mb-3'>";
                $output['data'].= "<input disabled class='form-control' type='text' name='equipocl' id='equipocl' value='$equipo'>";
                $output['data'].= "<label for='equipocl'>Equipo</label>";
                $output['data'].= "</div>";
            }
        }
        else 
        {
            $output['data'].= "<div class='form-floating mb-3'>";
            $output['data'].= "<div class='col-xs-2'>";
            $output['data'].= "<center><label><em>Elija un producto a vender, actualice y vuelva generar los detalles...</em></label></center>";
            $output['data'].= "</div> ";
            $output['data'].= "</div> ";
        }
        
        //forma de pago
        $output['data'].= "<div id='formaPgEdit' class='form-floating mb-3'>";
        $output['data'].= "<input disabled class='form-control' type='text' name='formPagcl' id='formPagcl' value='$formaPago'>";
        $output['data'].= "<label for='formPagcl'>Forma de Pago</label>";
        $output['data'].= "</div> ";
        
        // sec
        $output['data'].= "<div id='secEdit' class='form-floating mb-3'>";
        $output['data'].= "<input disabled class='form-control' type='text' name='seccl' id='seccl' value='$sec'>";
        $output['data'].= "<label for='seccl'>SEC</label>";
        $output['data'].= "</div> ";
        
        // estado
        $output['data'].= "<div id='estadoEdit' class='form-floating mb-3'>";
        $output['data'].= "<input disabled class='form-control' type='text' name='statecl' id='statecl' value='$estado'>";
        $output['data'].= "<label for='statecl'>Estado</label>";
        $output['data'].= "</div> ";         
        
        // observaciones
        $output['data'].= "<div id='obsEdit' class='form-floating mb-3'>";
        $output['data'].= "<input disabled class='form-control' type='text' name='obsercl' id='obsercl' value='$observaciones'>";
        $output['data'].= "<label for='obsercl'>Observaciones</label>";
        $output['data'].= "</div> ";
        
        // ubicacion
        $output['data'].= "<div id='ubiEdit' class='form-floating mb-3'>";
        $output['data'].= "<input disabled class='form-control' type='text' name='ubicl' id='ubicl' value='$ubicacion'>";
        $output['data'].= "<label for='ubicl'>Ubicacion</label>";
        $output['data'].= "</div> ";
        
        // distrito
        $output['data'].= "<div id='disEdit' class='form-floating mb-3'>";
        $output['data'].= "<input disabled class='form-control' type='text' name='fechacl' id='distrcl' value='$distrito'>";
        $output['data'].= "<label for='distrcl'>Distrito</label>";
        $output['data'].= "</div> ";
        
        // fecha de registro
        $output['data'].= "<div class='form-floating mb-3'>";
        $output['data'].= "<input disabled class='form-control' type='text' name='fechacl' id='fechacl' value='$fecha'>";
        $output['data'].= "<label for='fechacl'>Fecha de Registro</label>";
        $output['data'].= "</div> ";
        
        // fecha de actualizacion
        $output['data'].= "<div class='form-floating mb-3'>";
        $output['data'].= "<input disabled class='form-control' type='text' name='fechaudpcl' id='fechaudpcl' value='$fechaUdp'>";
        $output['data'].= "<label for='fechaudpcl'>Fecha de Actualización</label>";
        $output['data'].= "</div> ";

        $output['data'].= "</div>";
    }
}


echo json_encode($output, JSON_UNESCAPED_UNICODE); //por si viene con 'ñ' o tildes...

?>