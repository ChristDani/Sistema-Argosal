<?php
require_once '../../model/conexion.php';

$model=new conexion();
$con=$model->conectar();

$columnas = ['documento', 'nombre', 'tel_Fijo', 'celular', 'fechaActivacion', 'operador', 'tipo_plan', 'direccion', 'distrito', 'provincia', 'departamento', 'fechaRegistro'];

$tabla = "masiva";

$buscar= isset($_POST['busqueda']) ? $_POST['busqueda'] : '923269070';
$nombre= isset($_POST['nombre']) ? $_POST['nombre'] : null;

$where='';

if ($buscar!=null) {
    $where="where (";
    $cont= count($columnas);
    for ($i=0; $i < $cont; $i++) { 
        $where.=$columnas[$i]." like '%".$buscar."%' or ";
    }
    $where=substr_replace($where, "", -3);
    $where.=")";
}

$sql = "select ".implode(", ", $columnas)." from $tabla $where order by documento desc";
// echo $sql;

// $resultado=sqlsrv_query($con,$sql, array(), array("Scrollable"=>"buffered"));
$resultado=sqlsrv_query($con,$sql, array(), array("Scrollable"=>SQLSRV_CURSOR_KEYSET));

$filas = sqlsrv_num_rows($resultado);

$output=[];
$output['tabla'] = '';
$output['tabla'] .= "<table border='1'>";
$output['tabla'] .= "<thead>";
$output['tabla'] .= "<tr>";
$output['tabla'] .= "<th>Documento</th>";
$output['tabla'] .= "<th>Nombre</th>";
$output['tabla'] .= "<th>Telefono Fijo</th>";
$output['tabla'] .= "<th>Celular</th>";
$output['tabla'] .= "<th>Fecha de Activacion</th>";
$output['tabla'] .= "<th>Operador</th>";
$output['tabla'] .= "<th>Tipo de Plan</th>";
$output['tabla'] .= "<th>Direccion</th>";
$output['tabla'] .= "<th>Distrito</th>";
$output['tabla'] .= "<th>Provincia</th>";
$output['tabla'] .= "<th>Departamento</th>";
$output['tabla'] .= "<th>Fecha de Registro</th>";
$output['tabla'] .= "</tr>";
$output['tabla'] .= "</thead>";
$output['tabla'] .= "<tbody>";
if ($filas>0) 
{    
    while ($fila=sqlsrv_fetch_array($resultado)) 
    {
        $output['tabla'] .= "<tr>";
        $output['tabla'] .= "<td>".$fila['documento']."</td>";
        $output['tabla'] .= "<td>".$fila['nombre']."</td>";
        $output['tabla'] .= "<td>".$fila['tel_Fijo']."</td>";
        $output['tabla'] .= "<td>".$fila['celular']."</td>";
        $output['tabla'] .= "<td>".$fila['fechaActivacion']->format('d/m/y')."</td>";
        $output['tabla'] .= "<td>".$fila['operador']."</td>";
        $output['tabla'] .= "<td>".$fila['tipo_plan']."</td>";
        $output['tabla'] .= "<td>".$fila['direccion']."</td>";
        $output['tabla'] .= "<td>".$fila['distrito']."</td>";
        $output['tabla'] .= "<td>".$fila['provincia']."</td>";
        $output['tabla'] .= "<td>".$fila['departamento']."</td>";
        $output['tabla'] .= "<td>".$fila['fechaRegistro']->format('d/m/y')."</td>";
        $output['tabla'] .= "</tr>";
    }
}
else 
{
    $output['tabla'] .= "<tr><td colspan=12 height=100 align=center>No Hay Datos Disponibles</td></tr>";
}
$output['tabla'] .= "</tbody>";
$output['tabla'] .= "</table>";

echo json_encode($output, JSON_UNESCAPED_UNICODE); //por si viene con 'ñ' o tildes...
?>