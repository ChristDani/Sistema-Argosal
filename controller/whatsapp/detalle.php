<?php
require_once '../../model/conexion.php';

$model=new conexion();
$con=$model->conectar();

// en el caso de solo querer determinadas columnas usar esto con el mismo nombre de las columnas...
$columnas=['asesor','nombre','dni','telefono','producto','lineaProcedente','operadorCedente','modalidad','tipo','planR','equipo','formaDePago','sec','tipoFija','planFija','estado','fechaRegistro'];

// tabla a seleccionar
$tabla='whatsapp';

// posicion de registro
$posicion = isset($_POST['posicion']) ? $_POST['posicion'] : 0;

$sPosicion = " offset $posicion rows fetch next 1 rows only ";

// llamamos a la posicion
$sql = "select ".implode(", ", $columnas)." from $tabla order by fechaRegistro $sPosicion";
// para verificar errores en la consulta
// echo $sql;


$resultado=sqlsrv_query($con,$sql, array(), array("Scrollable"=>"buffered"));

// para saber el numero de filas
$filas = sqlsrv_num_rows($resultado);


$output=[];
$output['data']= '';

if ($filas>0) {
    $i=$posicion+1;
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
        $sec = $fila['sec'];
        $tipoFija = $fila['tipoFija'];
        $planFija = $fila['planFija'];
        $estado = $fila['estado'];
        // $fecha = $fila['fechaRegistro']-> format('d/m/Y');
        $fecha = $fila['fechaRegistro']-> format('l j \of F Y h:i:s A');

        if ($producto === $fija) 
        {
            $output['data'].= "<div class='arribaModal'>";
            $output['data'].= "<h4>Detalles de Venta Whatsapp</h4>";
            $output['data'].= "<span id='cerrar' class='cerrar material-symbols-outlined' onclick='cerrarModalDetalle();'>close</span>";
            $output['data'].= "</div>";
            // $output['data'].= "<form action='controller/whatsapp/editar.php' method='post'>";
            $output['data'].= "<div class='centroModal'>";
            $output['data'].= "<span> <strong>Asesor</strong> <label>$asesor</label></span>";
            $output['data'].= "<span> <strong>Nombre</strong> <label>$nombre</label></span>";
            // $output['data'].= "<span> <strong>DNI</strong> <label>".$fila['dni']."</label></span>";
            $output['data'].= "<input hidden type='text' name='dniC' id='dniC' value='$dni'> <span> <strong>DNI</strong> <label>$dni</label></span>";
            $output['data'].= "<span> <strong>Telefono</strong> <label>$telefono</label></span>";
            // $output['data'].= "<span> <strong>Producto</strong> <label>".$fila['producto']."</label></span>";
            $output['data'].= "<input hidden type='text' name='producto' id='producto' value='$producto'> <span> <strong>Producto</strong> <label>$producto</label></span>";
            $output['data'].= "<span> <strong>Tipo</strong> <label>$tipoFija</label></span>";
            // $output['data'].= "<span> <strong>Plan</strong> <label>".$fila['planFija']."</label></span>";
            $output['data'].= "<span><strong>Plan</strong> <select name='planFija' id='planFija'> <option hidden value='$planFija'>$planFija</option> <option value='1 Play - Telefonia'>1 Play - Telefonia</option>
            <option value='1 Play - Television'>1 Play - Television</option>
            <option value='1 Play - Internet'>1 Play - Internet</option>
            <option value='2 Play - Telefonia + Internet'>2 Play - Telefonia + Internet</option>
            <option value='2 Play - Internet + Cable Avanzado'>2 Play - Internet + Cable Avanzado</option>
            <option value='2 Play - Internet + Cable Superior'>2 Play - Internet + Cable Superior</option>
            <option value='3 Play - Telefonia + Internet + Cable Avanzado'>3 Play - Telefonia + Internet + Cable Avanzado</option>
            <option value='3 Play - Telefonia + Internet + Cable Superior'>3 Play - Telefonia + Internet + Cable Superior</option> </select> </span>";
            // $output['data'].= "<span id='sec'> <strong>SEC</strong> <label>".$fila['sec']."</label></span>";
            $output['data'].= "<span> <strong>SEC</strong><input type='text' name='sec' id='sec' value='$sec'></span>";
            // $output['data'].= "<span> <strong>Estado</strong> <label>".$fila['estado']."</label></span>";
            $output['data'].= "<span><strong>Estado</strong><select name='estado' id='estado'> <option hidden value='$estado'>$estado</option> <option value='Pendiente'>Pendiente</option>
            <option value='Concretado'>Concretado</option>
            <option value='No Requiere'>No Requiere</option> </select> </span>";
            
            $output['data'].= "<span> <strong>Fecha</strong> <label>$fecha</label></span>";
            $output['data'].= "</div>";
            $output['data'].= "<div class='abajoModal'>";
            $output['data'].= "<button id='edit'>Editar</button>";
            $output['data'].= "<button type='submit' id='save'>Guardar</button>";
            $output['data'].= "</div>";
            // $output['data'].= "</form>";
        } 
        elseif ($producto === $movil) 
        {
            $output['data'].= "<div class='arribaModal'>";
            $output['data'].= "<h4>Detalles de Venta Whatsapp</h4>";
            $output['data'].= "<span id='cerrar' class='cerrar material-symbols-outlined' onclick='cerrarModalDetalle();'>close</span>";
            $output['data'].= "</div>";
            $output['data'].= "<div class='centroModal'>";
            $output['data'].= "<span> <strong>Asesor</strong> <label>$asesor</label></span>";
            $output['data'].= "<span> <strong>Nombre</strong> <label>$nombre</label></span>";
            // $output['data'].= "<span> <strong>DNI</strong> <label>".$fila['dni']."</label></span>";
            $output['data'].= "<input hidden type='text' name='dniC' id='dniC' value='$dni'> <span><strong>DNI</strong> <label>$dni</label></span>";
            $output['data'].= "<span> <strong>Telefono</strong> <label>$telefono</label></span>";
            // $output['data'].= "<span> <strong>Producto</strong> <label>".$fila['producto']."</label></span>";
            $output['data'].= "<input hidden type='text' name='producto' id='producto' value='$producto'> <span> <strong>Producto</strong> <label>$producto</label></span>";
            $output['data'].= "<span> <strong>Linea Procedente</strong> <label>$lineaProce</label></span>";
            $output['data'].= "<span> <strong>Operador Cedente</strong> <label>$operadorCed</label></span>";
            $output['data'].= "<span> <strong>Modalidad</strong> <label>$modalidad</label></span>";
            $output['data'].= "<span> <strong>Tipo de Linea</strong> <label>$tipo</label></span>";
            // $output['data'].= "<span> <strong>Plan Requerido</strong> <label>".$fila['planR']."</label></span>";
            // $output['data'].= "<input type='text' name='plan' id='plan' value=".$fila['planR']."> <strong>Plan Requerido</strong> <label>".$fila['planR']."</label></span>";
            $output['data'].= "<span><strong>Plan Requerido</strong> <select name='plan' id='plan'> <option hidden value='$planR'>$planR</option> <option value='S/ 29.90 MAX'>S/ 29.90 MAX</option> 
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

            // $output['data'].= "<span> <strong>Equipo</strong> <label>".$fila['equipo']."</label></span>";
            $output['data'].= "<span><strong>Equipo</strong><select name='equipo' id='equipo'> <option hidden value='$equipo'>$equipo</option>
            <option value='Chip'>Chip</option> </select> </span>";

            $output['data'].= "<span> <strong>Forma de Pago</strong> <label>$formaPago</label></span>";
            // $output['data'].= "<span> <strong>SEC</strong> <label>".$fila['sec']."</label></span>";
            $output['data'].= "<span><strong>SEC</strong><input type='text' name='sec' id='sec' value='$sec'> </span>";

            // $output['data'].= "<span> <strong>Estado</strong> <label>".$fila['estado']."</label></span>";
            $output['data'].= "<span><strong>Estado</strong><select name='estado' id='estado'> <option hidden value='$estado'>$estado</option> <option value='Pendiente'>Pendiente</option>
            <option value='Concretado'>Concretado</option>
            <option value='No Requiere'>No Requiere</option> </select> </span>";

            $output['data'].= "<span> <strong>Fecha</strong> <label>$fecha</label></span>";
            $output['data'].= "</div>";
            $output['data'].= "<div class='abajoModal'>";
            $output['data'].= "<button id='edit'>Editar</button>";
            $output['data'].= "<button type='submit' id='save'>Guardar</button>";
            $output['data'].= "</div>";
        }
        else {
            $output['data'].= "<div class='arribaModal'>";
            $output['data'].= "<h4>Detalles de Venta Whatsapp</h4>";
            $output['data'].= "<span id='cerrar' class='cerrar material-symbols-outlined' onclick='cerrarModalDetalle();'>close</span>";
            $output['data'].= "</div>";
            $output['data'].= "<div class='centroModal'>";
            $output['data'].= "<span> <strong>Sin Resultado...</strong></span>";
            $output['data'].= "</div>";
            $output['data'].= "<div class='abajoModal'>";
            $output['data'].= "<button disabled id='edit'>Editar</button>";
            $output['data'].= "<button disabled type='submit' id='save'>Guardar</button>";
            $output['data'].= "</div>";
        }

    }
}


echo json_encode($output, JSON_UNESCAPED_UNICODE); //por si viene con 'ñ' o tildes...

?>