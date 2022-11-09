<?php
require_once '../../model/conexion.php';

$model=new conexion();
$con=$model->conectar();

// en el caso de solo querer determinadas columnas usar esto con el mismo nombre de las columnas...
$columnas=['codigo','asesor','nombre','dni','telefono','producto','lineaProcedente','operadorCedente','modalidad','tipo','planR','equipo','formaDePago','numeroReferencia','sec','tipoFija','planFija','estado','observaciones','promocion','ubicacion','distrito','fechaRegistro','fechaActualizacion'];

// tabla a seleccionar
$tabla='whatsapp';

// posicion de registro
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : 'WP00000001';


// llamamos al registro
$sql = "select ".implode(", ", $columnas)." from $tabla where codigo='".$codigo."'";
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

        $asesor = $fila['asesor'];
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
        $estado = $fila['estado'];
        $observaciones = $fila['observaciones'];
        $promocion = $fila['promocion'];
        $ubicacion = $fila['ubicacion'];
        $distrito = $fila['distrito'];
        // $fecha = $fila['fechaRegistro']-> format('d/m/Y');
        $fecha = $fila['fechaRegistro']-> format('l j \of F Y h:i:s A');
        $fechaUdp = $fila['fechaActualizacion']-> format('l j \of F Y h:i:s A');

        // encabezado

        $output['data'].= "<div class='arribaModal'>";
        $output['data'].= "<h4>Detalles de Venta Concluida</h4>";
        $output['data'].= "<span id='cerrar' class='cerrar material-symbols-outlined' onclick='cerrarModalDetalle();'>close</span>";
        $output['data'].= "</div>";

        // inicio del cuerpo

        $output['data'].= "<div class='centroModal'>";

        // asesor
        $output['data'].= "<hgroup>";
        $output['data'].= "<div class='form-floating mb-3'>";
        $output['data'].= "<div class='col-xs-2'>";
        $output['data'].= "<center><label>Venta Registrada por <b><em>$asesor</em></b></label></center>";
        $output['data'].= "</div> ";
        $output['data'].= "</div> ";
        $output['data'].= "</hgroup>";
        
        $output['data'].= "<div class='detallitos'>";

        // nombre
        $output['data'].= "<div class='form-floating mb-3'>";
        $output['data'].= "<input disabled class='form-control' type='text' name='namecl' id='namecl' value='$nombre'>";
        $output['data'].= "<label for='namecl'>Nombre</label>";
        $output['data'].= "</div> ";
        
        // dni
        $output['data'].= "<div class='form-floating mb-3'>";
        $output['data'].= "<input disabled class='form-control' type='text' name='dnicl' id='dnicl' value='$dni'>";
        $output['data'].= "<label for='dnicl'>DNI</label>";
        $output['data'].= "</div> ";

        // numero de referencia
        $output['data'].= "<div id='telefRefEdit' class='form-floating mb-3'>";
        $output['data'].= "<input disabled class='form-control' type='text' name='teleRefecl' id='teleRefecl' value='$telefonoRef'>";
        $output['data'].= "<label for='teleRefecl'>Número de Referencia</label>";
        $output['data'].= "</div> ";
        
        // producto
        $output['data'].= "<div class='form-floating mb-3'>";
        $output['data'].= "<input disabled class='form-control' type='text' name='prodcl' id='prodcl' value='$producto'>";
        $output['data'].= "<label for='prodcl'>Producto</label>";
        $output['data'].= "</div> ";

        if ($producto === $fija) 
        {
            // forma de pago
            $output['data'].= "<div class='form-floating mb-3'>";
            $output['data'].= "<input disabled class='form-control' type='text' name='formPagcl' id='formPagcl' value='$formaPago'>";
            $output['data'].= "<label for='formPagcl'>Forma de Pago</label>";
            $output['data'].= "</div> ";

            // tipo de fija
            $output['data'].= "<div class='form-floating mb-3'>";
            $output['data'].= "<input disabled class='form-control' type='text' name='typecl' id='typecl' value='$tipoFija'>";
            $output['data'].= "<label for='typecl'>Tipo</label>";
            $output['data'].= "</div> ";

            // plan de fija
            $output['data'].= "<div id='planFijaEdit' class='form-floating mb-3'>";
            $output['data'].= "<input disabled class='form-control' type='text' name='planFijacl' id='planFijacl' value='$planFija'>";
            $output['data'].= "<label for='planFijacl'>Plan</label>";
            $output['data'].= "</div> ";
        } 
        elseif ($producto === $movil) 
        {
            // tipo
            $output['data'].= "<div class='form-floating mb-3'>";
            $output['data'].= "<input disabled class='form-control' type='text' name='tipeLinecl' id='tipeLinecl' value='$tipo'>";
            $output['data'].= "<label for='tipeLinecl'>Tipo</label>";
            $output['data'].= "</div> ";

            // linea procedente
            $output['data'].= "<div class='form-floating mb-3'>";
            $output['data'].= "<input disabled class='form-control' type='text' name='lineProcecl' id='lineProcecl' value='$lineaProce'>";
            $output['data'].= "<label for='lineProcecl'>Linea Procedente</label>";
            $output['data'].= "</div> ";

            // operador cedente
            $output['data'].= "<div class='form-floating mb-3'>";
            $output['data'].= "<input disabled class='form-control' type='text' name='opeCedcl' id='opeCedcl' value='$operadorCed'>";
            $output['data'].= "<label for='opeCedcl'>Operador Cedente</label>";
            $output['data'].= "</div> ";

            // modalidad
            $output['data'].= "<div class='form-floating mb-3'>";
            $output['data'].= "<input disabled class='form-control' type='text' name='modcl' id='modcl' value='$modalidad'>";
            $output['data'].= "<label for='modcl'>Modalidad</label>";
            $output['data'].= "</div> ";

            // plan requerido
            $output['data'].= "<div id='planReEdit' class='form-floating mb-3'>";
            $output['data'].= "<input disabled class='form-control' type='text' name='planRcl' id='planRcl' value='$planR'>";
            $output['data'].= "<label for='planRcl'>Plan Requerido</label>";
            $output['data'].= "</div> ";

            // equipo
            $output['data'].= "<div id='equipoEdit' class='form-floating mb-3'>";
            $output['data'].= "<input disabled class='form-control' type='text' name='equipocl' id='equipocl' value='$equipo'>";
            $output['data'].= "<label for='equipocl'>Equipo</label>";
            $output['data'].= "</div> ";

            //forma de pago
            $output['data'].= "<div id='formaPgEdit' class='form-floating mb-3'>";
            $output['data'].= "<input disabled class='form-control' type='text' name='formPagcl' id='formPagcl' value='$formaPago'>";
            $output['data'].= "<label for='formPagcl'>Forma de Pago</label>";
            $output['data'].= "</div> ";
        }
        else {
            $output['data'].= "<div class='form-floating mb-3'>";
            $output['data'].= "<div class='col-xs-2'>";
            $output['data'].= "<center><label><em>Elija un producto a vender, actualice y vuelva generar los detalles...</em></label></center>";
            $output['data'].= "</div> ";
            $output['data'].= "</div> ";
        }
        
        // telefono
        $output['data'].= "<div class='form-floating mb-3'>";
        $output['data'].= "<input disabled class='form-control' type='text' name='telecl' id='telecl' value='$telefono'>";
        $output['data'].= "<label for='telecl'>Telefono</label>";
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
        $output['data'].= "<div class='form-floating mb-3'>";
        $output['data'].= "<input disabled class='form-control' type='text' name='obsercl' id='obsercl' value='$observaciones'>";
        $output['data'].= "<label for='obsercl'>Observaciones</label>";
        $output['data'].= "</div> ";

        // promocion
        $output['data'].= "<div class='form-floating mb-3'>";
        $output['data'].= "<input disabled class='form-control' type='text' name='promocl' id='promocl' value='$promocion'>";
        $output['data'].= "<label for='promocl'>Promocion</label>";
        $output['data'].= "</div> ";

        // ubicacion
        $output['data'].= "<div class='form-floating mb-3'>";
        $output['data'].= "<input disabled class='form-control' type='text' name='ubicl' id='ubicl' value='$ubicacion'>";
        $output['data'].= "<label for='ubicl'>Ubicacion</label>";
        $output['data'].= "</div> ";

        // distrito
        $output['data'].= "<div class='form-floating mb-3'>";
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
        $output['data'].= "</div>";

        // inicio foother

        $output['data'].= "<div class='abajoModal'>";
        $output['data'].= "</div>";

    }
}


echo json_encode($output, JSON_UNESCAPED_UNICODE); //por si viene con 'ñ' o tildes...

?>