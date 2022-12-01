<?php
require_once '../../model/conexion.php';

$model=new conexion();
$con=$model->conectar();

$columnas = ['documento','nombre','tel_Fijo','celular','fechaActivacion','operador','tipo_plan','direccion','distrito','provincia','departamento','fechaRegistro'];

$tabla = "masiva";

$buscar= isset($_POST['busqueda']) ? $_POST['busqueda'] : null;
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

$sql = "select ".implode(", ", $columnas)." from $tabla $where order by documento asc";
// echo $sql;

$resultado=sqlsrv_query($con,$sql, array(), array("Scrollable"=>"buffered"));

$filas = sqlsrv_num_rows($resultado);
header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
// header("Content-Disposition: attachment; filename=$nombre");
header("Content-Disposition: attachment; filename=Data-Masiva.xls");
?>
<table border="1">
    <thead>
        <tr>
            <th>documento</th>
            <th>nombre</th>
            <th>tel_Fijo</th>
            <th>celular</th>
            <th>fechaActivacion</th>
            <th>operador</th>
            <th>tipo_plan</th>
            <th>direccion</th>
            <th>distrito</th>
            <th>provincia</th>
            <th>departamento</th>
            <th>fechaRegistro</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if ($filas>0) 
            {    
                while ($fila=sqlsrv_fetch_array($resultado)) 
                {
                    echo "<tr>";
                    echo "<td>".$fila['documento']."</td>";
                    echo "<td>".$fila['nombre']."</td>";
                    echo "<td>".$fila['tel_Fijo']."</td>";
                    echo "<td>".$fila['celular']."</td>";
                    echo "<td>".$fila['fechaActivacion']."</td>";
                    echo "<td>".$fila['operador']."</td>";
                    echo "<td>".$fila['tipo_plan']."</td>";
                    echo "<td>".$fila['direccion']."</td>";
                    echo "<td>".$fila['distrito']."</td>";
                    echo "<td>".$fila['provincia']."</td>";
                    echo "<td>".$fila['departamento']."</td>";
                    echo "<td>".$fila['fechaRegistro']."</td>";
                    echo "</tr>";
                }
            }
            else 
            {
                echo "<tr><td colspan=12 height=100 align=center>No Hay Datos Disponibles</td></tr>";
            }
        ?>
    </tbody>
</table>