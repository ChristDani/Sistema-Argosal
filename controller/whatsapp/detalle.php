<?php
require_once '../../model/conexion.php';

$model=new conexion();
$con=$model->conectar();

// en el caso de solo querer determinadas columnas usar esto con el mismo nombre de las columnas...
$columnas=['codigo','asesor','nombre','dni','telefono','producto','lineaProcedente','operadorCedente','modalidad','tipo','planR','equipo','formaDePago','numeroReferencia','sec','tipoFija','planFija','estado','fechaRegistro'];

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
        // $fecha = $fila['fechaRegistro']-> format('d/m/Y');
        $fecha = $fila['fechaRegistro']-> format('l j \of F Y h:i:s A');

        // encabezado

        $output['data'].= "<div class='arribaModal'>";
        $output['data'].= "<h4>Detalles de Venta Whatsapp</h4>";
        $output['data'].= "<span id='cerrar' class='cerrar material-symbols-outlined' onclick='cerrarModalDetalle();'>close</span>";
        $output['data'].= "</div>";

        // inicio del cuerpo

        $output['data'].= "<div class='centroModal'>";

        // asesor
        $output['data'].= "<div class='form-floating mb-3'>";
        $output['data'].= "<div class='col-xs-2'>";
        $output['data'].= "<center><label>Venta Registrada por <b><em>$asesor</em></b></label></center>";
        $output['data'].= "</div> ";
        $output['data'].= "</div> ";

        // codigo
        // dato para mostrar
        // $output['data'].= "<div class='form-floating mb-3'>";
        // $output['data'].= "<input disabled class='form-control' type='text' name='codigoC' id='codigoC' value='$codigo'>";
        // $output['data'].= "<label for='codigoC'>Código de Venta</label>";
        // $output['data'].= "</div> ";
        // dato para llevar
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
        
        // telefono
        $output['data'].= "<div class='form-floating mb-3'>";
        $output['data'].= "<input disabled class='form-control' type='text' name='telecl' id='telecl' value='$telefono'>";
        $output['data'].= "<label for='telecl'>Telefono</label>";
        $output['data'].= "</div> ";
        
        // producto
        // dato para llevar
        $output['data'].= "<div class='form-floating mb-3 hidden'>";
        $output['data'].= "<input class='form-control' type='text' name='productoEdit' id='productoEdit' value='$producto'>";
        $output['data'].= "<label for='productoEdit'>Producto</label>";
        $output['data'].= "</div> ";
        //dato para mostrar
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

        // sec
        //dato para mostrar
        $output['data'].= "<div id='secEdit' class='form-floating mb-3'>";
        $output['data'].= "<input disabled class='form-control' type='text' name='seccl' id='seccl' value='$sec'>";
        $output['data'].= "<label for='seccl'>SEC</label>";
        $output['data'].= "</div> ";
        // dato para llevar
        $output['data'].= "<div id='secEditM' class='form-floating mb-3 hidden'>";
        $output['data'].= "<input class='form-control' type='text' name='sec' id='sec' value='$sec'>";
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

        // fecha
        $output['data'].= "<div class='form-floating mb-3'>";
        $output['data'].= "<input disabled class='form-control' type='text' name='fechacl' id='fechacl' value='$fecha'>";
        $output['data'].= "<label for='fechacl'>Fecha</label>";
        $output['data'].= "</div> ";

        $output['data'].= "</div>";

        // inicio foother

        $output['data'].= "<div class='abajoModal'>";
        $output['data'].= "<div id='cancel' class='btnCancel hidden'>";
        $output['data'].= "<label onclick='cancel()';>Cancelar</label>";
        $output['data'].= "</div>";
        $output['data'].= "<div id='edit' class='btnEdit'>";
        $output['data'].= "<label onclick='editar()';>Editar</label>";
        $output['data'].= "</div>";
        $output['data'].= "<div id='dsave' class='btnSave hidden'>";
        $output['data'].= "<button type='submit' id='bsave'>Guardar</button>";
        $output['data'].= "</div>";
        $output['data'].= "</div>";

    }
}


echo json_encode($output, JSON_UNESCAPED_UNICODE); //por si viene con 'ñ' o tildes...

?>