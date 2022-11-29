<?php
require_once '../../model/conexion.php';
require_once '../../model/usuarios.php';

$model=new conexion();
$con=$model->conectar();

// usuarios
$user = new user();
$listUser = $user->listar();

// productos
$const = "select descripcion from productos GROUP BY descripcion HAVING COUNT(*)>=1 order by descripcion asc";
$rs=sqlsrv_query($con,$const);
$productsMov=null;
while($row=sqlsrv_fetch_array($rs))
{
    $productsMov[]=$row;
}

// en el caso de solo querer determinadas columnas usar esto con el mismo nombre de las columnas...
$columnas=['codigo','dniAsesor','nombre','dni','telefono','producto','lineaProcedente','operadorCedente','modalidad','tipo','planR','equipo','formaDePago','numeroReferencia','sec','tipoFija','planFija','modoFija','estado','observaciones','promocion','ubicacion','distrito','fechaRegistro','fechaActualizacion'];

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
        $asesor = $fila['dniAsesor'];
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

        // $output['data'].= "<hgroup>";
        // $output['data'].= "</hgroup>";
        // asesor
        $output['data'].= "<div id='asesorEdit' class='form-floating mb-3'>";
        $output['data'].= "<select class='form-select form-select-sm' name='asesor' id='asesor'>";
        if ($listUser != null) 
        {
            foreach ($listUser as $x) 
            {
                if ($x[0] === $asesor)
                {
                    $output['data'] .= "<option selected hidden value='".$x[0]."'>".$x[1]."</option>";
                }
                elseif ($x[0] != $asesor)
                {
                    $output['data'] .= "<option value='".$x[0]."'>".$x[1]."</option>";
                }
            }
        }
        $output['data'] .= "</select>";
        $output['data'] .= "<label for='asesor'>Asesor</label>";
        $output['data'] .= "</div> ";
        // $output['data'].= "<div class='form-floating mb-3'>";
        // $output['data'].= "<div class='col-xs-2'>";
        // $output['data'].= "<center><label>Venta Registrada por <b><em>$asesor</em></b></label></center>";
        // $output['data'].= "</div> ";
        // $output['data'].= "</div> ";
        
        // codigo
        $output['data'].= "<div class='form-floating mb-3 d-none'>";
        $output['data'].= "<input class='form-control' type='text' name='codigoC' id='codigoC' value='$codigo'>";
        $output['data'].= "<label for='codigoC'>Código de Venta</label>";
        $output['data'].= "</div> ";

        // nombre
        $output['data'].= "<div class='form-floating mb-3'>";
        $output['data'].= "<input class='form-control' type='text' name='namecl' id='namecl' value='$nombre'>";
        $output['data'].= "<label for='namecl'>Nombre</label>";
        $output['data'].= "</div> ";
        
        // dni
        $output['data'].= "<div class='form-floating mb-3'>";
        $output['data'].= "<input class='form-control' type='text' name='dnicl' id='dnicl' value='$dni'>";
        $output['data'].= "<label for='dnicl'>DNI</label>";
        $output['data'].= "</div> ";

        // numero de referencia
        $output['data'].= "<div id='telefRefEditM' class='form-floating mb-3'>";
        $output['data'].= "<input class='form-control' type='tel' name='telref' id='telref' value='$telefonoRef' maxlength=11 oninput="."this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');".">";
        $output['data'].= "<label for='telref'>Número de Referencia</label>";
        $output['data'].= "</div>";
        
        // producto
        $output['data'].= "<div id='producEdit' class='form-floating mb-3'>";
        $output['data'].= "<select class='form-select form-select-sm' name='productoEdit' id='productoEdit'> <option value='$producto'>$producto</option></select>";
        $output['data'].= "<label for='productoEdit'>Producto</label>";
        $output['data'].= "</div> ";

        // promocion
        $output['data'].= "<div id='promocionEdit' class='form-floating mb-3'>";
        $output['data'].= "<select class='form-select form-select-sm' name='promoEdit' id='promoEdit'> <option hidden value='$promocion'>$promocion</option> <option value='50% de Descuento con Lineas Adicionales'>50% de Descuento con Lineas Adicionales</option>
        <option value='20% de Descuento en Portabilidad Movil'>20% de Descuento en Portabilidad Movil</option>
        <option value='50% de Descuento en Planes Fija'>50% de Descuento en Planes Fija</option> </select>";
        $output['data'].= "<label for='promoEdit'>Promoción</label>";
        $output['data'].= "</div> ";

        if ($producto === $fija) 
        {
            // tipo de fija
            $output['data'].= "<div id='typeFijaEdit' class='form-floating mb-3'>";
            $output['data'].= "<select class='form-select form-select-sm' name='tipoFijaEdit' id='tipoFijaEdit'> <option hidden value='$tipoFija'>$tipoFija</option> <option value='Portabilidad'>Portabilidad</option>
            <option value='Alta'>Alta</option> </select>";
            $output['data'].= "<label for='tipoFijaEdit'>Tipo</label>";
            $output['data'].= "</div> ";

            if ($tipoFija === "Portabilidad   ") 
            {
                // telefono
                $output['data'].= "<div id='telefFijaEdit' class='form-floating mb-3'>";
                $output['data'].= "<input class='form-control' type='tel' name='telefon' id='telefon' value='$telefono' maxlength=9 oninput="."this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');".">";
                $output['data'].= "<label for='telefon'>Telefono</label>";
                $output['data'].= "</div>";
            }

            // plan de fija
            $output['data'].= "<div id='planFijaEditM' class='form-floating mb-3'>";
            $output['data'].= "<select class='form-select form-select-sm' name='planFija' id='planFija'> <option hidden value='$planFija'>$planFija</option> <option value='1 Play - Telefonia'>1 Play - Telefonia</option>
            <option value='1 Play - Television'>1 Play - Television</option>
            <option value='1 Play - Internet'>1 Play - Internet</option>
            <option value='2 Play - Telefonia + Internet'>2 Play - Telefonia + Internet</option>
            <option value='2 Play - Internet + Cable Avanzado'>2 Play - Internet + Cable Avanzado</option>
            <option value='2 Play - Internet + Cable Superior'>2 Play - Internet + Cable Superior</option>
            <option value='3 Play - Telefonia + Internet + Cable Avanzado'>3 Play - Telefonia + Internet + Cable Avanzado</option>
            <option value='3 Play - Telefonia + Internet + Cable Superior'>3 Play - Telefonia + Internet + Cable Superior</option> </select>";
            $output['data'].= "<label for='planFija'>Plan</label>"; 
            $output['data'].= "</div> ";

            // modo de fija
            $output['data'].= "<div id='planFijaEditM' class='form-floating mb-3'>";
            $output['data'].= "<select class='form-select form-select-sm' name='modoFija' id='modoFija'> <option hidden value='$modoFija'>$modoFija</option> <option value='HFC'>HFC</option>
            <option value='FTTH'>FTTH</option>
            <option value='IFI'>IFI</option></select>";
            $output['data'].= "<label for='modoFija'>Modo de Fija</label>"; 
            $output['data'].= "</div> ";

            // forma de pago
            $output['data'].= "<div id='formaPgEdit' class='form-floating mb-3'>";
            $output['data'].= "<select class='form-select form-select-sm' name='formaPago' id='formaPago'> <option hidden value='$formaPago'>$formaPago</option> <option value='Contado'>Contado</option></select>";
            $output['data'].= "<label for='formaPago'>Forma de Pago</label>";            
            $output['data'].= "</div>";
        } 
        elseif ($producto === $movil) 
        {
            // tipo
            $output['data'].= "<div id='typeEdit' class='form-floating mb-3'>";
            $output['data'].= "<select class='form-select form-select-sm' name='tipolinea' id='tipolinea'> <option hidden value='$tipo'>$tipo</option> <option value='Linea Nueva'>Linea Nueva</option>
            <option value='Portabilidad'>Portabilidad</option>
            <option value='Renovacion'>Renovacion</option> </select>";
            $output['data'].= "<label for='tipolinea'>Tipo de Linea</label>";
            $output['data'].= "</div> ";
        
            if ($tipo == "Linea Nueva    ") 
            {
                // modalidad
                $output['data'].= "<div id='modalEdit' class='form-floating mb-3'>";
                $output['data'].= "<select class='form-select form-select-sm' name='modalidadEdit' id='modalidadEdit'> <option hidden value='$modalidad'>$modalidad</option> <option value='Postpago'>Postpago</option>
                <option value='Prepago'>Prepago</option> </select>";
                $output['data'].= "<label for='modalidadEdit'>Modalidad</label>";
                $output['data'].= "</div> ";

                if ($modalidad == "Postpago") 
                {
                    // plan requerido
                    $output['data'].= "<div id='planReEditM' class='form-floating mb-3'>";
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
                }

                // equipo
                $output['data'].= "<div id='equipoEditM' class='form-floating mb-3'>";
                $output['data'].= "<select class='form-select form-select-sm' name='equipo' id='equipo'> <option hidden value='$equipo'>$equipo</option><option value='Chip'>Chip</option>";
                if ($productsMov != null) 
                {
                    foreach ($productsMov as $pr) 
                    {
                        $output['data'] .= "<option value='".$pr[0]."'>".$pr[0]."</option>";
                    }
                }
                $output['data'].= "</select>";
                $output['data'].= "<label for='equipo'>Equipo</label>";
                $output['data'].= "</div>";

                //forma de pago
                $output['data'].= "<div id='formaPgEditM' class='form-floating mb-3'>";
                $output['data'].= "<select class='form-select form-select-sm' name='formaPago' id='formaPago'> <option hidden value='$formaPago'>$formaPago</option> <option value='Contado'>Contado</option></select>";
                $output['data'].= "<label for='formaPago'>Forma de Pago</label>";            
                $output['data'].= "</div>";
            }
            elseif ($tipo == "Portabilidad   ") 
            {
                // telefono
                $output['data'].= "<div id='telefEdit' class='form-floating mb-3'>";
                $output['data'].= "<input class='form-control' type='tel' name='telefon' id='telefon' value='$telefono' maxlength=9 oninput="."this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');".">";
                $output['data'].= "<label for='telefon'>Telefono</label>";
                $output['data'].= "</div>";

                // linea procedente
                $output['data'].= "<div id='lineProceEdit' class='form-floating mb-3'>";
                $output['data'].= "<select class='form-select form-select-sm' name='lineaProcedenteEdit' id='lineaProcedenteEdit'> <option hidden value='$lineaProce'>$lineaProce</option> <option value='Postpago'>Postpago</option>
                <option value='Prepago'>Prepago</option> </select>";
                $output['data'].= "<label for='lineaProcedenteEdit'>Linea Procedente</label>";
                $output['data'].= "</div> ";

                // operador cedente
                $output['data'].= "<div id='operaCedenEdit' class='form-floating mb-3'>";
                $output['data'].= "<select class='form-select form-select-sm' name='operadorCedenteEdit' id='operadorCedenteEdit'> <option hidden value='$operadorCed'>$operadorCed</option> <option value='Movistar'>Movistar</option>
                <option value='Entel'>Entel</option>
                <option value='Bitel'>Bitel</option> </select>";
                $output['data'].= "<label for='operadorCedenteEdit'>Operador Cedente</label>";
                $output['data'].= "</div> ";

                // modalidad
                $output['data'].= "<div id='modalEdit' class='form-floating mb-3'>";
                $output['data'].= "<select class='form-select form-select-sm' name='modalidadEdit' id='modalidadEdit'> <option hidden value='$modalidad'>$modalidad</option> <option value='Postpago'>Postpago</option>
                <option value='Prepago'>Prepago</option> </select>";
                $output['data'].= "<label for='modalidadEdit'>Modalidad</label>";
                $output['data'].= "</div> ";

                if ($modalidad == "Postpago") 
                {
                    // plan requerido
                    $output['data'].= "<div id='planReEditM' class='form-floating mb-3'>";
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
                }

                // equipo
                $output['data'].= "<div id='equipoEditM' class='form-floating mb-3'>";
                $output['data'].= "<select class='form-select form-select-sm' name='equipo' id='equipo'> <option hidden value='$equipo'>$equipo</option>
                <option value='Chip'>Chip</option> </select>";
                $output['data'].= "<label for='equipo'>Equipo</label>";
                $output['data'].= "</div>";

                if ($modalidad == "Postpago") 
                {
                    //forma de pago
                    $output['data'].= "<div id='formaPgEditM' class='form-floating mb-3'>";
                    $output['data'].= "<select class='form-select form-select-sm' name='formaPago' id='formaPago'> <option hidden value='$formaPago'>$formaPago</option> <option value='Contado'>Contado</option>
                    <option value='Cuotas'>Cuotas</option></select>";
                    $output['data'].= "<label for='formaPago'>Forma de Pago</label>";            
                    $output['data'].= "</div>";
                }

                elseif ($modalidad == "Prepago ") 
                {
                    //forma de pago
                    $output['data'].= "<div id='formaPgEditM' class='form-floating mb-3'>";
                    $output['data'].= "<select class='form-select form-select-sm' name='formaPago' id='formaPago'> <option hidden value='$formaPago'>$formaPago</option> <option value='Contado'>Contado</option></select>";
                    $output['data'].= "<label for='formaPago'>Forma de Pago</label>";            
                    $output['data'].= "</div>";
                }
            }
            elseif ($tipo == "Renovacion     ") 
            {
                // telefono
                $output['data'].= "<div id='telefEdit' class='form-floating mb-3'>";
                $output['data'].= "<input class='form-control' type='tel' name='telefon' id='telefon' value='$telefono' maxlength=9 oninput="."this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');".">";
                $output['data'].= "<label for='telefon'>Telefono</label>";
                $output['data'].= "</div>";

                // linea procedente
                $output['data'].= "<div id='lineProceEdit' class='form-floating mb-3'>";
                $output['data'].= "<select class='form-select form-select-sm' name='lineaProcedenteEdit' id='lineaProcedenteEdit'> <option hidden value='$lineaProce'>$lineaProce</option> <option value='Postpago'>Postpago</option>
                <option value='Prepago'>Prepago</option> </select>";
                $output['data'].= "<label for='lineaProcedenteEdit'>Linea Procedente</label>";
                $output['data'].= "</div> ";
    
                // modalidad
                $output['data'].= "<div id='modalEdit' class='form-floating mb-3'>";
                $output['data'].= "<select class='form-select form-select-sm' name='modalidadEdit' id='modalidadEdit'> <option hidden value='$modalidad'>$modalidad</option> <option value='Postpago'>Postpago</option>
                <option value='Prepago'>Prepago</option> </select>";
                $output['data'].= "<label for='modalidadEdit'>Modalidad</label>";
                $output['data'].= "</div> ";

                if ($modalidad == "Postpago") 
                {
        
                    // plan requerido
                    $output['data'].= "<div id='planReEditM' class='form-floating mb-3'>";
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
                }
    
                // equipo
                $output['data'].= "<div id='equipoEditM' class='form-floating mb-3'>";
                $output['data'].= "<select class='form-select form-select-sm' name='equipo' id='equipo'> <option hidden value='$equipo'>$equipo</option>
                <option value='Chip'>Chip</option> </select>";
                $output['data'].= "<label for='equipo'>Equipo</label>";
                $output['data'].= "</div>";
                
                if ($modalidad == "Postpago") 
                {
                    //forma de pago
                    $output['data'].= "<div id='formaPgEditM' class='form-floating mb-3'>";
                    $output['data'].= "<select class='form-select form-select-sm' name='formaPago' id='formaPago'> <option hidden value='$formaPago'>$formaPago</option> <option value='Contado'>Contado</option>
                    <option value='Cuotas'>Cuotas</option></select>";
                    $output['data'].= "<label for='formaPago'>Forma de Pago</label>";            
                    $output['data'].= "</div>";
                }

                elseif ($modalidad == "Prepago ") 
                {
                    //forma de pago
                    $output['data'].= "<div id='formaPgEditM' class='form-floating mb-3'>";
                    $output['data'].= "<select class='form-select form-select-sm' name='formaPago' id='formaPago'> <option hidden value='$formaPago'>$formaPago</option> <option value='Contado'>Contado</option></select>";
                    $output['data'].= "<label for='formaPago'>Forma de Pago</label>";            
                    $output['data'].= "</div>";
                }
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

        // sec
        $output['data'].= "<div id='secEditM' class='form-floating mb-3'>";
        $output['data'].= "<input class='form-control' maxlength=15 type='text' name='sec' id='sec' value='$sec'>";
        $output['data'].= "<label for='sec'>SEC</label>";
        $output['data'].= "</div>";

        // estado
        $output['data'].= "<div id='estadoEditM' class='form-floating mb-3'>";
        $output['data'].= "<select class='form-select form-select-sm' name='estado' id='estado'> <option hidden value='$estado'>$estado</option> <option value='Pendiente'>Pendiente</option>
        <option value='Concretado'>Concretado</option>
        <option value='No Requiere'>No Requiere</option> </select>";
        $output['data'].= "<label for='estado'>Estado</label>";            
        $output['data'].= "</div>";            

        // observaciones
        $output['data'].= "<div id='obsEditM' class='form-floating mb-3'>";
        $output['data'].= "<input class='form-control' maxlength=15 type='text' name='observaciones' id='observaciones' value='$observaciones'>";
        $output['data'].= "<label for='observaciones'>Observaciones</label>";
        $output['data'].= "</div>";

        // ubicacion
        $output['data'].= "<div id='ubiEditM' class='form-floating mb-3'>";
        $output['data'].= "<input class='form-control' maxlength=15 type='text' name='ubicacion' id='ubicacion' value='$ubicacion'>";
        $output['data'].= "<label for='ubicacion'>Ubicacion</label>";
        $output['data'].= "</div>";

        // distrito
        $output['data'].= "<div id='disEditM' class='form-floating mb-3'>";
        $output['data'].= "<input class='form-control' maxlength=15 type='text' name='distrito' id='distrito' value='$distrito'>";
        $output['data'].= "<label for='distrito'>Distrito</label>";
        $output['data'].= "</div>";
    }
}


echo json_encode($output, JSON_UNESCAPED_UNICODE); //por si viene con 'ñ' o tildes...

?>