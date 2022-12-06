<?php
require_once '../../model/conexion.php';

$model=new conexion();
$con=$model->conectar();

$fecharequerida= !empty($_GET['fecha']) ? $_GET['fecha'] : getdate();

$columnas = ['w.codigo','u.nombre','w.nombre','w.dni','w.telefono','w.producto','w.lineaProcedente','w.operadorCedente','w.modalidad','w.tipo','w.planR','w.equipo','w.formaDePago','w.numeroReferencia','w.sec','w.tipoFija','w.planFija','w.modoFija','w.estado','observaciones','w.promocion','w.ubicacion','w.distrito','w.fechaRegistro','w.fechaActualizacion'];

$tabla = 'whatsapp as w inner join usuarios as u on w.dniAsesor=u.dni';

if ($fecharequerida != null) 
{
    $where=' where (datepart(mm, fechaRegistro)=datepart(mm, '$fecharequerida') and datepart(yyyy, fechaRegistro)=datepart(yyyy, '$fecharequerida'))';
}
elseif ($fecharequerida == null) 
{
    $where=' where (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate()))';
}

$sql = "select ".implode(", ", $columnas)." from $tabla $where order by codigo asc";
// echo $sql;

$resultado=sqlsrv_query($con,$sql, array(), array("Scrollable"=>"buffered"));

$filas = sqlsrv_num_rows($resultado);
header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
if ($fecharequerida != null) 
{
    header("Content-Disposition: attachment; filename=Ventas-Whatsapp-de-$fecharequerida.xls");
}
elseif ($fecharequerida == null) 
{
    header("Content-Disposition: attachment; filename=Ventas-Whatsapp-Mes-Actual.xls");
}
?>
<table border="1">
    <thead>
        <tr>
            <th>Asesor</th>
            <th>nombre</th>
            <th>dni</th>
            <th>telefono</th>
            <th>producto</th>
            <th>lineaProcedente</th>
            <th>operadorCedente</th>
            <th>modalidad</th>
            <th>tipo</th>
            <th>planR</th>
            <th>equipo</th>
            <th>formaDePago</th>
            <th>numeroReferencia</th>
            <th>sec</th>
            <th>tipoFija</th>
            <th>planFija</th>
            <th>modoFija</th>
            <th>estado</th>
            <th>observaciones</th>
            <th>promocion</th>
            <th>ubicacion</th>
            <th>distrito</th>
            <th>fechaRegistro</th>
            <th>fechaActualizacion</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if ($filas>0) 
            {    
                while ($fila=sqlsrv_fetch_array($resultado)) 
                {
                    echo "<tr>";
                    echo "<td>".$fila[1]."</td>";
                    echo "<td>".$fila['nombre']."</td>";
                    echo "<td>".$fila['dni']."</td>";
                    echo "<td>".$fila['telefono']."</td>";
                    echo "<td>".$fila['producto']."</td>";
                    echo "<td>".$fila['lineaProcedente']."</td>";
                    echo "<td>".$fila['operadorCedente']."</td>";
                    echo "<td>".$fila['modalidad']."</td>";
                    echo "<td>".$fila['tipo']."</td>";
                    echo "<td>".$fila['planR']."</td>";
                    echo "<td>".$fila['equipo']."</td>";
                    echo "<td>".$fila['formaDePago']."</td>";
                    echo "<td>".$fila['numeroReferencia']."</td>";
                    echo "<td>".$fila['sec']."</td>";
                    echo "<td>".$fila['tipoFija']."</td>";
                    echo "<td>".$fila['planFija']."</td>";
                    echo "<td>".$fila['modoFija']."</td>";
                    echo "<td>".$fila['estado']."</td>";
                    echo "<td>".$fila['observaciones']."</td>";
                    echo "<td>".$fila['promocion']."</td>";
                    echo "<td>".$fila['ubicacion']."</td>";
                    echo "<td>".$fila['distrito']."</td>";
                    echo "<td>".$fila['fechaRegistro']->format('d/m/y')."</td>";
                    echo "<td>".$fila['fechaActualizacion']->format('d/m/y')."</td>";
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