<?php
require_once '../../model/conexion.php';

$model=new conexion();
$con=$model->conectar();

$fecharequerida= !empty($_GET['fecha']) ? $_GET['fecha'] : null;

$columnas = ['w.codigo','u.nombre','w.nombre','w.dni','w.telefono','w.producto','w.lineaProcedente','w.operadorCedente','w.modalidad','w.tipo','w.planR','w.equipo','w.formaDePago','w.numeroReferencia','w.sec','w.tipoFija','w.planFija','w.modoFija','w.estado','observaciones','w.promocion','w.ubicacion','w.distrito','w.fechaRegistro','w.fechaActualizacion'];

$tabla = 'whatsapp as w inner join usuarios as u on w.dniAsesor=u.dni';

$where = '';

// if ($fecharequerida != null) 
// {
//     $where .= ' where (datepart(mm, fechaRegistro)=datepart(mm, '$fecharequerida') and datepart(yyyy, fechaRegistro)=datepart(yyyy, '$fecharequerida'))';
// }
// elseif ($fecharequerida == null) 
// {
//     $where .= ' where (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate()))';
// }

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

                    if ($fila['producto'] === "0") 
                    {
                        echo "<td>Fija</td>";
                    }
                    elseif ($fila['producto'] === "1") 
                    {
                        echo "<td>Movil</td>";
                    }
                    echo "<td>".$fila['lineaProcedente']."</td>";
                    echo "<td>".$fila['operadorCedente']."</td>";

                    if ($fila['modalidad'] === "0") 
                    {
                        echo "<td>Prepago</td>";
                    }
                    elseif ($fila['modalidad'] === "1") 
                    {
                        echo "<td>Postpago</td>";
                    }

                    if ($fila['tipo'] === "0") 
                    {
                        echo "<td>Linea Nueva</td>";
                    }
                    elseif ($fila['tipo'] === "1") 
                    {
                        echo "<td>Portabilidad</td>";
                    }
                    elseif ($fila['tipo'] === "2") 
                    {
                        echo "<td>Renovacion</td>";
                    }
                    echo "<td>".$fila['planR']."</td>";
                    echo "<td>".$fila['equipo']."</td>";
                    echo "<td>".$fila['formaDePago']."</td>";
                    echo "<td>".$fila['numeroReferencia']."</td>";
                    echo "<td>".$fila['sec']."</td>";

                    if ($fila['tipoFija'] === "0") 
                    {
                        echo "<td>Alta</td>";
                    }
                    elseif ($fila['tipoFija'] === "1") 
                    {
                        echo "<td>Portabilidad</td>";
                    }
                    echo "<td>".$fila['planFija']."</td>";
                    echo "<td>".$fila['modoFija']."</td>";

                    if ($fila['estado'] === "0") 
                    {
                        echo "<td>No Requiere</td>";
                    }
                    elseif ($fila['estado'] === "1") 
                    {
                        echo "<td>Concretado</td>";
                        
                    }
                    elseif ($fila['estado'] === "2") 
                    {
                        echo "<td>Pendiente</td>";
                        
                    }
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