<?php
require_once '../../model/conexion.php';

$model=new conexion();
$con=$model->conectar();

// en el caso de solo querer determinadas columnas usar esto con el mismo nombre de las columnas...
$columnas=['asesor','nombre','dni','telefono','producto','lineaProcedente','operadorCedente','modalidad','tipo','planR','equipo','formaDePago','sec','tipoFija','planFija','estado','fechaRegistro'];

// tabla a seleccionar
$tabla='whatsapp';

// posicion de registro
$posicion = isset($_POST['posicion']) ? $_POST['posicion'] : 2;

$sPosicion = " offset $posicion rows fetch next 1 rows only ";

// llamamos a la posicion
$sql = "select ".implode(", ", $columnas)." from $tabla order by fechaRegistro $sPosicion";
// para verificar errores en la consulta
// echo $sql;


$resultado=sqlsrv_query($con,$sql, array(), array("Scrollable"=>"buffered"));

// para saber el numero de filas
$filas = sqlsrv_num_rows($resultado);

// validacion del mensaje

// $msg = '';

// if ($totalContar===0) {
//     $msg = '';
// } elseif ($totalContar===1) {
//     $msg = "Mostrando 1 Registro de un Total de 1 Registro.";
// } elseif ($inicio+$limite>$totalContar) {
//     $msg = "Mostrando Registros del ".$inicio+1 ." al $totalContar de un Total de $totalContar Registros.";
// } else {
//     $msg = "Mostrando Registros del ".$inicio+1 ." al ".$inicio+$limite." de un Total de $totalContar Registros.";
// }

$output=[];
// $output['mensaje']= $msg;
$output['data']= '';
// $output['paginacion']= '';

if ($filas>0) {
    $i=$posicion+1;
    while ($fila=sqlsrv_fetch_array($resultado)) {

        $fecha = $fila['fechaRegistro']-> format('d/m/Y');
        $producto = $fila['producto'];
        $movil = "Movil";
        $fija = "Fija ";

        // echo $producto;
        // echo $fija;

        if ($producto === $fija) 
        {
            // $output['data'].= "<div class='contenidoDetalles'>";
            $output['data'].= "<tr>";
            $output['data'].= "<td align='center'>$i</td>";
            $output['data'].= "<td align='center'>".$fila['asesor']."</td>";
            $output['data'].= "<td align='left'>".$fila['nombre']."</td>";
            $output['data'].= "<td align='center'>".$fila['dni']."</td>";
            $output['data'].= "<td align='center'>".$fila['telefono']."</td>";
            $output['data'].= "<td align='center'>".$fila['producto']."</td>";
            $output['data'].= "<td align='center'>".$fila['tipoFija']."</td>";
            $output['data'].= "<td align='center'>".$fila['planFija']."</td>";
            $output['data'].= "<td align='center'>".$fila['sec']."</td>";
            $output['data'].= "<td align='center'>".$fila['estado']."</td>";
            $output['data'].= "<td align='center'>".$fecha."</td>";
            $output['data'].= "</tr>";
        } 
        elseif ($producto === $movil) 
        {
            $output['data'].= "<tr>";
            $output['data'].= "<td align='center'>$i</td>";
            $output['data'].= "<td align='center'>".$fila['asesor']."</td>";
            $output['data'].= "<td align='left'>".$fila['nombre']."</td>";
            $output['data'].= "<td align='center'>".$fila['dni']."</td>";
            $output['data'].= "<td align='center'>".$fila['telefono']."</td>";
            $output['data'].= "<td align='center'>".$fila['producto']."</td>";
            $output['data'].= "<td align='center'>".$fila['lineaProcedente']."</td>";
            $output['data'].= "<td align='center'>".$fila['operadorCedente']."</td>";
            $output['data'].= "<td align='center'>".$fila['modalidad']."</td>";
            $output['data'].= "<td align='center'>".$fila['tipo']."</td>";
            $output['data'].= "<td align='center'>".$fila['planR']."</td>";
            $output['data'].= "<td align='center'>".$fila['equipo']."</td>";
            $output['data'].= "<td align='center'>".$fila['formaDePago']."</td>";
            $output['data'].= "<td align='center'>".$fila['sec']."</td>";
            $output['data'].= "<td align='center'>".$fila['estado']."</td>";
            $output['data'].= "<td align='center'>".$fecha."</td>";
            $output['data'].= "</tr>";
        }

    }
} else {
    $output['data'].= "<tr>";
    $output['data'].= "<td align='center' colspan=8 height='100px'>Sin Resultados...</td>";
    $output['data'].= "</tr>";
}


echo json_encode($output, JSON_UNESCAPED_UNICODE); //por si viene con 'ñ' o tildes...

?>