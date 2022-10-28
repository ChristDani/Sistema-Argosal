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

        // $fecha = $fila['fechaRegistro']-> format('d/m/Y');
        $fecha = $fila['fechaRegistro']-> format('l j \of F Y h:i:s A');
        $producto = $fila['producto'];
        $movil = "Movil";
        $fija = "Fija ";

        if ($producto === $fija) 
        {
            $output['data'].= "<div class='arribaModal'>";
            $output['data'].= "<h4>Detalles de Venta Whatsapp</h4>";
            $output['data'].= "<span id='cerrar' class='cerrar material-symbols-outlined' onclick='cerrarModalDetalle();'>close</span>";
            $output['data'].= "</div>";
            // $output['data'].= "<form action='controller/whatsapp/editar.php' method='post'>";
            $output['data'].= "<div class='centroModal'>";
            $output['data'].= "<span> <strong>Asesor</strong> <label>".$fila['asesor']."</label></span>";
            $output['data'].= "<span> <strong>Nombre</strong> <label>".$fila['nombre']."</label></span>";
            $output['data'].= "<span> <strong>DNI</strong> <label>".$fila['dni']."</label></span>";
            $output['data'].= "<span> <strong>Telefono</strong> <label>".$fila['telefono']."</label></span>";
            // $output['data'].= "<span> <strong>Producto</strong> <label>".$fila['producto']."</label></span>";
            $output['data'].= "<input type='text' name='producto' id='producto' value=".$fila['producto']."> <strong>Producto</strong> <label>".$fila['producto']."</label></span>";
            $output['data'].= "<span> <strong>Tipo</strong> <label>".$fila['tipoFija']."</label></span>";
            // $output['data'].= "<span> <strong>Plan</strong> <label>".$fila['planFija']."</label></span>";
            $output['data'].= "<input type='text' name='planFija' id='planFija' value=".$fila['planFija']."> <strong>Plan</strong> <label>".$fila['planFija']."</label></span>";
            // $output['data'].= "<span id='sec'> <strong>SEC</strong> <label>".$fila['sec']."</label></span>";
            $output['data'].= "<input type='text' name='sec' id='sec' value=".$fila['sec']."> <strong>SEC</strong> <label>".$fila['sec']."</label></span>";
            // $output['data'].= "<span> <strong>Estado</strong> <label>".$fila['estado']."</label></span>";
            $output['data'].= "<input type='text' name='estado' id='estado' value=".$fila['estado']."> <strong>Estado</strong> <label>".$fila['estado']."</label></span>";
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
            $output['data'].= "<span> <strong>Asesor</strong> <label>".$fila['asesor']."</label></span>";
            $output['data'].= "<span> <strong>Nombre</strong> <label>".$fila['nombre']."</label></span>";
            $output['data'].= "<span> <strong>DNI</strong> <label>".$fila['dni']."</label></span>";
            $output['data'].= "<span> <strong>Telefono</strong> <label>".$fila['telefono']."</label></span>";
            // $output['data'].= "<span> <strong>Producto</strong> <label>".$fila['producto']."</label></span>";
            $output['data'].= "<input type='text' name='producto' id='producto' value=".$fila['producto']."> <strong>Producto</strong> <label>".$fila['producto']."</label></span>";
            $output['data'].= "<span> <strong>Linea Procedente</strong> <label>".$fila['lineaProcedente']."</label></span>";
            $output['data'].= "<span> <strong>Operador Cedente</strong> <label>".$fila['operadorCedente']."</label></span>";
            $output['data'].= "<span> <strong>Modalidad</strong> <label>".$fila['modalidad']."</label></span>";
            $output['data'].= "<span> <strong>Tipo de Linea</strong> <label>".$fila['tipo']."</label></span>";
            // $output['data'].= "<span> <strong>Plan Requerido</strong> <label>".$fila['planR']."</label></span>";
            $output['data'].= "<input type='text' name='plan' id='plan' value=".$fila['planR']."> <strong>Plan Requerido</strong> <label>".$fila['planR']."</label></span>";

            // $output['data'].= "<span> <strong>Equipo</strong> <label>".$fila['equipo']."</label></span>";
            $output['data'].= "<input type='text' name='equipo' id='equipo' value=".$fila['equipo']."> <strong>Equipo</strong> <label>".$fila['equipo']."</label></span>";

            $output['data'].= "<span> <strong>Forma de Pago</strong> <label>".$fila['formaDePago']."</label></span>";
            // $output['data'].= "<span> <strong>SEC</strong> <label>".$fila['sec']."</label></span>";
            $output['data'].= "<input type='text' name='sec' id='sec' value=".$fila['sec']."> <strong>SEC</strong> <label>".$fila['sec']."</label></span>";

            // $output['data'].= "<span> <strong>Estado</strong> <label>".$fila['estado']."</label></span>";
            $output['data'].= "<input type='text' name='estado' id='estado' value=".$fila['estado']."> <strong>Estado</strong> <label>".$fila['estado']."</label></span>";

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