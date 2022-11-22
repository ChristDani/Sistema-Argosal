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

        $codigo = $fila['codigo'];
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
        $fecha = $fila['fechaRegistro']-> format('l j \of F Y h:i:s A');
        $fechaUdp = $fila['fechaActualizacion']-> format('l j \of F Y h:i:s A');

        // encabezado

        $output['data'].= "<div class='arribaModal'>";
        $output['data'].= "<h4>Detalles de Venta Whatsapp</h4>";
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
        
        // codigo
        $output['data'].= "<div class='form-floating mb-3 hidden'>";
        $output['data'].= "<input class='form-control' type='text' name='codigoC' id='codigoC' value='$codigo'>";
        $output['data'].= "<label for='codigoC'>Código de Venta</label>";
        $output['data'].= "</div> ";

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
        //dato para mostrar
        $output['data'].= "<div id='telefRefEdit' class='form-floating mb-3'>";
        $output['data'].= "<input disabled class='form-control' type='text' name='teleRefecl' id='teleRefecl' value='$telefonoRef'>";
        $output['data'].= "<label for='teleRefecl'>Número de Referencia</label>";
        $output['data'].= "</div> ";
        // dato para llevar
        $output['data'].= "<div id='telefRefEditM' class='form-floating mb-3 hidden'>";
        $output['data'].= "<input class='form-control' type='tel' name='telref' id='telref' value='$telefonoRef' maxlength=9 oninput="."this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');".">";
        $output['data'].= "<label for='telref'>Número de Referencia</label>";
        $output['data'].= "</div>";
        
        // producto
        // dato para llevar
        $output['data'].= "<div id='producEdit' class='form-floating mb-3 hidden'>";
        $output['data'].= "<select class='form-select form-select-sm' name='productoEdit' id='productoEdit'> <option hidden value='$producto'>$producto</option> <option value='Movil'>Movil</option>
        <option value='Fija'>Fija</option> </select>";
        $output['data'].= "<label for='productoEdit'>Producto</label>";
        $output['data'].= "</div> ";
        //dato para mostrar
        $output['data'].= "<div id='producEditM' class='form-floating mb-3'>";
        $output['data'].= "<input disabled class='form-control' type='text' name='prodcl' id='prodcl' value='$producto'>";
        $output['data'].= "<label for='prodcl'>Producto</label>";
        $output['data'].= "</div> ";

        // promocion
        // dato para llevar
        $output['data'].= "<div id='promocionEdit' class='form-floating mb-3 hidden'>";
        $output['data'].= "<select class='form-select form-select-sm' name='promoEdit' id='promoEdit'> <option hidden value='$promocion'>$promocion</option> <option value='50% de Descuento con Lineas Adicionales'>50% de Descuento con Lineas Adicionales</option>
        <option value='20% de Descuento en Portabilidad Movil'>20% de Descuento en Portabilidad Movil</option>
        <option value='50% de Descuento en Planes Fija'>50% de Descuento en Planes Fija</option> </select>";
        $output['data'].= "<label for='promoEdit'>Promoción</label>";
        $output['data'].= "</div> ";
        //dato para mostrar
        $output['data'].= "<div id='promocionEditM' class='form-floating mb-3'>";
        $output['data'].= "<input disabled class='form-control' type='text' name='promocl' id='promocl' value='$promocion'>";
        $output['data'].= "<label for='promocl'>Promoción</label>";
        $output['data'].= "</div> ";

        if ($producto === $fija) 
        {
            // tipo de fija
            // dato para llevar
            $output['data'].= "<div id='typeFijaEdit' class='form-floating mb-3 hidden'>";
            $output['data'].= "<select class='form-select form-select-sm' name='tipoFijaEdit' id='tipoFijaEdit'> <option hidden value='$tipoFija'>$tipoFija</option> <option value='Portabilidad'>Portabilidad</option>
            <option value='Alta'>Alta</option> </select>";
            $output['data'].= "<label for='tipoFijaEdit'>Tipo</label>";
            $output['data'].= "</div> ";
            //dato para mostrar
            $output['data'].= "<div id='typeFijaEditM' class='form-floating mb-3'>";
            $output['data'].= "<input disabled class='form-control' type='text' name='typecl' id='typecl' value='$tipoFija'>";
            $output['data'].= "<label for='typecl'>Tipo</label>";
            $output['data'].= "</div> ";
        
            // telefono
            // dato para mostrar
            $output['data'].= "<div id='telefFijaEditM' class='form-floating mb-3'>";
            $output['data'].= "<input disabled class='form-control' type='text' name='telecl' id='telecl' value='$telefono'>";
            $output['data'].= "<label for='telecl'>Telefono</label>";
            $output['data'].= "</div> ";
            // dato para llevar
            $output['data'].= "<div id='telefFijaEdit' class='form-floating mb-3 hidden'>";
            $output['data'].= "<input class='form-control' type='tel' name='telefon' id='telefon' value='$telefono' maxlength=9 oninput="."this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');".">";
            $output['data'].= "<label for='telefon'>Telefono</label>";
            $output['data'].= "</div>";

            // plan de fija
            // dato para mostrar 
            $output['data'].= "<div id='planFijaEdit' class='form-floating mb-3'>";
            $output['data'].= "<input disabled class='form-control' type='text' name='planFijacl' id='planFijacl' value='$planFija'>";
            $output['data'].= "<label for='planFijacl'>Plan</label>";
            $output['data'].= "</div> ";
            // dato para llevar
            $output['data'].= "<div id='planFijaEditM' class='form-floating mb-3 hidden'>";
            $output['data'].= "<select class='form-select form-select-sm' name='planFija' id='planFija'> <option hidden value='$planFija'>$planFija</option> <option value='1 Play - Telefonia'>1 Play - Telefonia</option>
            <option value='1 Play - Television'>1 Play - Television</option>
            <option value='1 Play - Internet'>1 Play - Internet</option>
            <option value='2 Play - Telefonia + Internet'>2 Play - Telefonia + Internet</option>
            <option value='2 Play - Internet + Cable Avanzado'>2 Play - Internet + Cable Avanzado</option>
            <option value='2 Play - Internet + Cable Superior'>2 Play - Internet + Cable Superior</option>
            <option value='3 Play - Telefonia + Internet + Cable Avanzado'>3 Play - Telefonia + Internet + Cable Avanzado</option>
            <option value='3 Play - Telefonia + Internet + Cable Superior'>3 Play - Telefonia + Internet + Cable Superior</option> </select> </span>";
            $output['data'].= "<label for='planFija'>Plan</label>"; 
            $output['data'].= "</div> ";

            // forma de pago
            // dato para mostrar
            $output['data'].= "<div  id='formaPgEditM' class='form-floating mb-3'>";
            $output['data'].= "<input disabled class='form-control' type='text' name='formPagcl' id='formPagcl' value='$formaPago'>";
            $output['data'].= "<label for='formPagcl'>Forma de Pago</label>";
            $output['data'].= "</div> ";
            // dato para llevar
            $output['data'].= "<div id='formaPgEdit' class='form-floating mb-3 hidden'>";
            $output['data'].= "<select class='form-select form-select-sm' name='formaPago' id='formaPago'> <option hidden value='$formaPago'>$formaPago</option> <option value='Contado'>Contado</option></select>";
            $output['data'].= "<label for='formaPago'>Forma de Pago</label>";            
            $output['data'].= "</div>";
        } 
        elseif ($producto === $movil) 
        {
            // tipo
            // dato para llevar
            $output['data'].= "<div id='typeEdit' class='form-floating mb-3 hidden'>";
            $output['data'].= "<select class='form-select form-select-sm' name='tipolinea' id='tipolinea'> <option hidden value='$tipo'>$tipo</option> <option value='Linea Nueva'>Linea Nueva</option>
            <option value='Portabilidad'>Portabilidad</option>
            <option value='Renovacion'>Renovacion</option> </select>";
            $output['data'].= "<label for='tipolinea'>Tipo de Linea</label>";
            $output['data'].= "</div> ";
            //dato para mostrar
            $output['data'].= "<div id='typeEditM' class='form-floating mb-3'>";
            $output['data'].= "<input disabled class='form-control' type='text' name='tipeLinecl' id='tipeLinecl' value='$tipo'>";
            $output['data'].= "<label for='tipeLinecl'>Tipo de Linea</label>";
            $output['data'].= "</div> ";
        
            // telefono
            // dato para mostrar
            $output['data'].= "<div id='telefEditM' class='form-floating mb-3'>";
            $output['data'].= "<input disabled class='form-control' type='text' name='telecl' id='telecl' value='$telefono'>";
            $output['data'].= "<label for='telecl'>Telefono</label>";
            $output['data'].= "</div> ";
            // dato para llevar
            $output['data'].= "<div id='telefEdit' class='form-floating mb-3 hidden'>";
            $output['data'].= "<input class='form-control' type='tel' name='telefon' id='telefon' value='$telefono' maxlength=9 oninput="."this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');".">";
            $output['data'].= "<label for='telefon'>Telefono</label>";
            $output['data'].= "</div>";

            // linea procedente
            // dato para mostrar
            $output['data'].= "<div id='lineProceEditM' class='form-floating mb-3'>";
            $output['data'].= "<input disabled class='form-control' type='text' name='lineProcecl' id='lineProcecl' value='$lineaProce'>";
            $output['data'].= "<label for='lineProcecl'>Linea Procedente</label>";
            $output['data'].= "</div> ";
            // dato para llevar
            $output['data'].= "<div id='lineProceEdit' class='form-floating mb-3 hidden'>";
            $output['data'].= "<select class='form-select form-select-sm' name='lineaProcedenteEdit' id='lineaProcedenteEdit'> <option hidden value='$lineaProce'>$lineaProce</option> <option value='Postpago'>Postpago</option>
            <option value='Prepago'>Prepago</option> </select>";
            $output['data'].= "<label for='lineaProcedenteEdit'>Linea Procedente</label>";
            $output['data'].= "</div> ";

            // operador cedente
            // dato para mostrar
            $output['data'].= "<div id='operaCedenEditM' class='form-floating mb-3'>";
            $output['data'].= "<input disabled class='form-control' type='text' name='opeCedcl' id='opeCedcl' value='$operadorCed'>";
            $output['data'].= "<label for='opeCedcl'>Operador Cedente</label>";
            $output['data'].= "</div> ";
            // dato para llevar
            $output['data'].= "<div id='operaCedenEdit' class='form-floating mb-3 hidden'>";
            $output['data'].= "<select class='form-select form-select-sm' name='operadorCedenteEdit' id='operadorCedenteEdit'> <option hidden value='$operadorCed'>$operadorCed</option> <option value='Movistar'>Movistar</option>
            <option value='Entel'>Entel</option>
            <option value='Bitel'>Bitel</option> </select>";
            $output['data'].= "<label for='operadorCedenteEdit'>Operador Cedente</label>";
            $output['data'].= "</div> ";

            // modalidad
            // dato para mostrar
            $output['data'].= "<div id='modalEditM' class='form-floating mb-3'>";
            $output['data'].= "<input disabled class='form-control' type='text' name='modcl' id='modcl' value='$modalidad'>";
            $output['data'].= "<label for='modcl'>Modalidad</label>";
            $output['data'].= "</div> ";
            // dato para llevar
            $output['data'].= "<div id='modalEdit' class='form-floating mb-3 hidden'>";
            $output['data'].= "<select class='form-select form-select-sm' name='modalidadEdit' id='modalidadEdit'> <option hidden value='$modalidad'>$modalidad</option> <option value='Postpago'>Postpago</option>
            <option value='Prepago'>Prepago</option> </select>";
            $output['data'].= "<label for='modalidadEdit'>Modalidad</label>";
            $output['data'].= "</div> ";

            // plan requerido
            // dato para mostrar
            $output['data'].= "<div id='planReEdit' class='form-floating mb-3'>";
            $output['data'].= "<input disabled class='form-control' type='text' name='planRcl' id='planRcl' value='$planR'>";
            $output['data'].= "<label for='planRcl'>Plan Requerido</label>";
            $output['data'].= "</div> ";
            // dato para llevar
            $output['data'].= "<div id='planReEditM' class='form-floating mb-3 hidden'>";
            $output['data'].= "<select class='form-select form-select-sm' name='plan' id='plan'> <option hidden value='$planR'>$planR</option> <option value='S/ 29.90 MAX'>S/ 29.90 MAX</option> 
            <option value='S/ 39.90'>S/ 39.90</option>
            <option value='S/ 49.90'>S/ 49.90</option>
            <option value='S/ 55.90'>S/ 55.90</option>
            <option value='S/ 69.90 MAX ILIMITADO'>S/ 69.90 MAX ILIMITADO</option>
            <option value='S/ 79.90 MAX ILIMITADO'>S/ 79.90 MAX ILIMITADO</option>
            <option value='S/ 95.90 MAX ILIMITADO'>S/ 95.90 MAX ILIMITADO</option>
            <option value='S/ 109.90 MAX ILIMITADO'>S/ 109.90 MAX ILIMITADO</option>
            <option value='S/ 159.90 MAX ILIMITADO'>S/ 159.90 MAX ILIMITADO</option>
            <option value='S/ 189.90 MAX ILIMITADO'>S/ 189.90 MAX ILIMITADO</option>
            <option value='S/ 289.90 MAX ILIMITADO'>S/ 289.90 MAX ILIMITADO</option>
            <option value='S/ 95.00 MAX PLAY - NETFLIX'>S/ 95.00 MAX PLAY - NETFLIX</option>
            <option value='S/ 115.00 MAX PLAY - NETFLIX'>S/ 115.00 MAX PLAY - NETFLIX</option>
            <option value='S/ 145.00 MAX PLAY - NETFLIX'>S/ 145.00 MAX PLAY - NETFLIX</option> </select> </span>";
            $output['data'].= "<label for='plan'>Plan Requerido</label>";
            $output['data'].= "</div> ";

            // equipo
            // dato para mostrar
            $output['data'].= "<div id='equipoEdit' class='form-floating mb-3'>";
            $output['data'].= "<input disabled class='form-control' type='text' name='equipocl' id='equipocl' value='$equipo'>";
            $output['data'].= "<label for='equipocl'>Equipo</label>";
            $output['data'].= "</div> ";
            // dato para llevar
            $output['data'].= "<div id='equipoEditM' class='form-floating mb-3 hidden'>";
            $output['data'].= "<select class='form-select form-select-sm' name='equipo' id='equipo'> <option hidden value='$equipo'>$equipo</option>
            <option value='Chip'>Chip</option> </select>";
            $output['data'].= "<label for='equipo'>Equipo</label>";
            $output['data'].= "</div>";

            //forma de pago
            // dato para mostrar
            $output['data'].= "<div id='formaPgEdit' class='form-floating mb-3'>";
            $output['data'].= "<input disabled class='form-control' type='text' name='formPagcl' id='formPagcl' value='$formaPago'>";
            $output['data'].= "<label for='formPagcl'>Forma de Pago</label>";
            $output['data'].= "</div> ";
            // dato para llevar
            $output['data'].= "<div id='formaPgEditM' class='form-floating mb-3 hidden'>";
            $output['data'].= "<select class='form-select form-select-sm' name='formaPago' id='formaPago'> <option hidden value='$formaPago'>$formaPago</option> <option value='Contado'>Contado</option>
            <option value='Cuotas'>Cuotas</option></select>";
            $output['data'].= "<label for='formaPago'>Forma de Pago</label>";            
            $output['data'].= "</div>";
        }
        else {
            $output['data'].= "<div class='form-floating mb-3'>";
            $output['data'].= "<div class='col-xs-2'>";
            $output['data'].= "<center><label><em>Elija un producto a vender, actualice y vuelva generar los detalles...</em></label></center>";
            $output['data'].= "</div> ";
            $output['data'].= "</div> ";
        }

        // sec
        //dato para mostrar
        $output['data'].= "<div id='secEdit' class='form-floating mb-3'>";
        $output['data'].= "<input disabled class='form-control' type='text' name='seccl' id='seccl' value='$sec'>";
        $output['data'].= "<label for='seccl'>SEC</label>";
        $output['data'].= "</div> ";
        // dato para llevar
        $output['data'].= "<div id='secEditM' class='form-floating mb-3 hidden'>";
        $output['data'].= "<input class='form-control' maxlength=15 type='text' name='sec' id='sec' value='$sec'>";
        $output['data'].= "<label for='sec'>SEC</label>";
        $output['data'].= "</div>";

        // estado
        // dato para mostrar
        $output['data'].= "<div id='estadoEdit' class='form-floating mb-3'>";
        $output['data'].= "<input disabled class='form-control' type='text' name='statecl' id='statecl' value='$estado'>";
        $output['data'].= "<label for='statecl'>Estado</label>";
        $output['data'].= "</div> ";
        // dato para llevar
        $output['data'].= "<div id='estadoEditM' class='form-floating mb-3 hidden'>";
        $output['data'].= "<select class='form-select form-select-sm' name='estado' id='estado'> <option hidden value='$estado'>$estado</option> <option value='Pendiente'>Pendiente</option>
        <option value='Concretado'>Concretado</option>
        <option value='No Requiere'>No Requiere</option> </select>";
        $output['data'].= "<label for='estado'>Estado</label>";            
        $output['data'].= "</div>";            

        // observaciones
        // dato para mostrar
        $output['data'].= "<div id='obsEdit' class='form-floating mb-3'>";
        $output['data'].= "<input disabled class='form-control' type='text' name='obsercl' id='obsercl' value='$observaciones'>";
        $output['data'].= "<label for='obsercl'>Observaciones</label>";
        $output['data'].= "</div> ";
        // dato para llevar
        $output['data'].= "<div id='obsEditM' class='form-floating mb-3 hidden'>";
        $output['data'].= "<input class='form-control' maxlength=15 type='text' name='observaciones' id='observaciones' value='$observaciones'>";
        $output['data'].= "<label for='observaciones'>Observaciones</label>";
        $output['data'].= "</div>";

        // ubicacion
        // dato para mostrar
        $output['data'].= "<div id='ubiEdit' class='form-floating mb-3'>";
        $output['data'].= "<input disabled class='form-control' type='text' name='ubicl' id='ubicl' value='$ubicacion'>";
        $output['data'].= "<label for='ubicl'>Ubicacion</label>";
        $output['data'].= "</div> ";
        // dato para llevar
        $output['data'].= "<div id='ubiEditM' class='form-floating mb-3 hidden'>";
        $output['data'].= "<input class='form-control' maxlength=15 type='text' name='ubicacion' id='ubicacion' value='$ubicacion'>";
        $output['data'].= "<label for='ubicacion'>Ubicacion</label>";
        $output['data'].= "</div>";

        // distrito
        //dato para mostrar
        $output['data'].= "<div id='disEdit' class='form-floating mb-3'>";
        $output['data'].= "<input disabled class='form-control' type='text' name='fechacl' id='distrcl' value='$distrito'>";
        $output['data'].= "<label for='distrcl'>Distrito</label>";
        $output['data'].= "</div> ";
        // dato para llevar
        $output['data'].= "<div id='disEditM' class='form-floating mb-3 hidden'>";
        $output['data'].= "<input class='form-control' maxlength=15 type='text' name='distrito' id='distrito' value='$distrito'>";
        $output['data'].= "<label for='distrito'>Distrito</label>";
        $output['data'].= "</div>";

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
        $output['data'].= "<div id='dsave' class='btnSave hidden'>";
        $output['data'].= "<button type='submit' id='bsave'>Guardar</button>";
        $output['data'].= "</div>";
        $output['data'].= "<div id='edit' class='btnEdit'>";
        $output['data'].= "<label onclick='editar()';>Editar</label>";
        $output['data'].= "</div>";
        $output['data'].= "</div>";

    }
}


echo json_encode($output, JSON_UNESCAPED_UNICODE); //por si viene con 'ñ' o tildes...

?>