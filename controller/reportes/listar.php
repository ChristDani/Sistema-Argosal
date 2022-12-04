<?php
require_once '../../model/conexion.php';

$model=new conexion();
$con=$model->conectar();

$fecharequerida= !empty($_POST['fecha']) ? $_POST['fecha'] : null;

if ($fecharequerida != null) 
{
    // ventas totales
    $sqlvt = "select * from whatsapp where (datepart(mm, fechaRegistro)=datepart(mm, '$fecharequerida') and datepart(yyyy, fechaRegistro)=datepart(yyyy, '$fecharequerida'))";
    $resultadovt = sqlsrv_query($con,$sqlvt, array(), array("Scrollable"=>"buffered"));
    $vt = sqlsrv_num_rows($resultadovt);
    // ventas concretadas
    $sqlvc = "select * from whatsapp where estado='1' and (datepart(mm, fechaRegistro)=datepart(mm, '$fecharequerida') and datepart(yyyy, fechaRegistro)=datepart(yyyy, '$fecharequerida'))";
    $resultadovc = sqlsrv_query($con,$sqlvc, array(), array("Scrollable"=>"buffered"));
    $vc = sqlsrv_num_rows($resultadovc);
    // ventas pendientes
    $sqlvp = "select * from whatsapp where estado='2' and (datepart(mm, fechaRegistro)=datepart(mm, '$fecharequerida') and datepart(yyyy, fechaRegistro)=datepart(yyyy, '$fecharequerida'))";
    $resultadovp = sqlsrv_query($con,$sqlvp, array(), array("Scrollable"=>"buffered"));
    $vp = sqlsrv_num_rows($resultadovp);
    // ventas rechazadas
    $sqlvr = "select * from whatsapp where estado='0' and (datepart(mm, fechaRegistro)=datepart(mm, '$fecharequerida') and datepart(yyyy, fechaRegistro)=datepart(yyyy, '$fecharequerida'))";
    $resultadovr = sqlsrv_query($con,$sqlvr, array(), array("Scrollable"=>"buffered"));
    $vr = sqlsrv_num_rows($resultadovr);
}
elseif ($fecharequerida == null) 
{
    // ventas totales
    $sqlvt = "select * from whatsapp where (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate()))";
    $resultadovt = sqlsrv_query($con,$sqlvt, array(), array("Scrollable"=>"buffered"));
    $vt = sqlsrv_num_rows($resultadovt);
    // ventas concretadas
    $sqlvc = "select * from whatsapp where estado='1' and (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate()))";
    $resultadovc = sqlsrv_query($con,$sqlvc, array(), array("Scrollable"=>"buffered"));
    $vc = sqlsrv_num_rows($resultadovc);
    // ventas pendientes
    $sqlvp = "select * from whatsapp where estado='2' and (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate()))";
    $resultadovp = sqlsrv_query($con,$sqlvp, array(), array("Scrollable"=>"buffered"));
    $vp = sqlsrv_num_rows($resultadovp);
    // ventas rechazadas
    $sqlvr = "select * from whatsapp where estado='0' and (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate()))";
    $resultadovr = sqlsrv_query($con,$sqlvr, array(), array("Scrollable"=>"buffered"));
    $vr = sqlsrv_num_rows($resultadovr);
}

// echo "$vt | $vc | $vp | $vr";

// en el caso de solo querer determinadas columnas usar esto con el mismo nombre de las columnas...
$columnas=['codigo','dniAsesor','nombre','dni','telefono','producto','lineaProcedente','operadorCedente','modalidad','tipo','planR','equipo','formaDePago','numeroReferencia','sec','tipoFija','planFija','estado','observaciones','promocion','ubicacion','distrito','fechaRegistro','fechaActualizacion'];
$columnasBus=['codigo','dniAsesor','nombre','dni','telefono','producto','lineaProcedente','operadorCedente','modalidad','tipo','planR','equipo','formaDePago','numeroReferencia','sec','tipoFija','planFija','observaciones','promocion','ubicacion','distrito','fechaRegistro','fechaActualizacion'];

// tabla a seleccionar
$tabla='whatsapp';

$buscar= isset($_POST['busqueda']) ? $_POST['busqueda'] : null;
// print_r(getdate());

// busqueda de datos
$where='';
if ($fecharequerida != null) 
{
    $where.="where (datepart(mm, fechaRegistro)=datepart(mm, '$fecharequerida') and datepart(yyyy, fechaRegistro)=datepart(yyyy, '$fecharequerida'))";
}
elseif ($fecharequerida == null) 
{
    $where.="where (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate()))";
}

if ($buscar!=null) {
    // $buscar=' ';
    $where=" and ";
    $cont= count($columnasBus);
    for ($i=0; $i < $cont; $i++) { 
        $where.=$columnasBus[$i]." like '%".$buscar."%' or ";
    }
    $where=substr_replace($where, "", -3);
    // $where.=")";
}

// limite de registros
$limite = isset($_POST['registros']) ? $_POST['registros'] : 10;
$pagina = isset($_POST['pagina']) ? $_POST['pagina'] : 0;

if (!$pagina) {
    $inicio=0;
    $pagina=1;
}else {
    $inicio=($pagina-1) * $limite;
}

$sLimite = " offset $inicio rows fetch next $limite rows only ";

//usamos las columnas o la consulta personalisada...
// $sql = "select $sLimite ".implode(", ", $columnas)." from $tabla $where";
// cantidad de registros devueltos en la consulta
$contar="select * from $tabla $where";

$sql = "select ".implode(", ", $columnas)." from $tabla $where order by codigo $sLimite";
// para verificar errores en la consulta
// echo $sql;


// $resulContar=sqlsrv_query($con,$contar, array(), array("Scrollable"=>"buffered"));
$resulContar=sqlsrv_query($con,$contar, array(), array("Scrollable"=>SQLSRV_CURSOR_KEYSET));

$resultado=sqlsrv_query($con,$sql, array(), array("Scrollable"=>"buffered"));
// $resultado=sqlsrv_query($con,$sql, array(), array("Scrollable"=>SQLSRV_CURSOR_KEYSET));
// para saber el numero de filas

$totalContar = sqlsrv_num_rows($resulContar);

$filas = sqlsrv_num_rows($resultado);

$output=[];
$output['data']= '';
$output['paginacion']= '';
$output['vt']= $vt;
$output['vc']= $vc;
$output['vp']= $vp;
$output['vr']= $vr;

if ($filas>0) {
    $i=$inicio+1;
    while ($fila=sqlsrv_fetch_array($resultado)) {
        
        $code = $fila['codigo'];
        $fecha=$fila['fechaRegistro']-> format('d/m/Y');

        $output['data'].= "<tr>";
        $output['data'].= "<td align='center'>$i</td>";
        $output['data'].= "<td align='left'>".$fila['nombre']."</td>";
        $output['data'].= "<td align='center'>".$fila['numeroReferencia']."</td>";
        if ($fila['producto'] === "0") 
        {
            $output['data'].= "<td align='center'>Fija</td>";
        }
        elseif ($fila['producto'] === "1") 
        {
            $output['data'].= "<td align='center'>Movil</td>";
        }
        $output['data'].= "<td align='center'>".$fila['sec']."</td>";
        if ($fila['estado'] === "1") 
        {
            $output['data'].= "<td align='center'>Concretado</td>";
        }
        elseif ($fila['estado'] === "2") 
        {
            $output['data'].= "<td align='center'>Pendiente</td>";
        }
        elseif ($fila['estado'] === "0") 
        {
            $output['data'].= "<td align='center'>No Requiere</td>";
        }
        $output['data'].= "<td align='center'>".$fecha."</td>";
        $output['data'].= "<td align='center' onclick="."abrirModalDetalle('$code');"."><ion-icon name='information-circle-outline'></ion-icon></td>";
        $output['data'].= "</tr>";
        $i+=1;
    }
} else {
    $output['data'].= "<tr>";
    $output['data'].= "<td align='center' colspan=8 height='100px'>Sin Resultados...</td>";
    $output['data'].= "</tr>";
}

// paginacion
if ($totalContar===1) {
    $output['paginacion']= '';
} elseif ($totalContar>0) {
    $paginasTotal = ceil($totalContar / $limite);

    if ($paginasTotal==1) {
        $output['paginacion']= '';
    }else {
        
        // condiciones para mostrar las paginas
        $pagInicio = 1;
    
        if (($pagina - 3)>1) {
            $pagInicio = $pagina - 2;
        }
    
        $pagFinal = $pagInicio + 4;
    
        if ($pagFinal>$paginasTotal) {
            $pagFinal =  $paginasTotal;
        }
    
        // activacion del boton anterior
    
        if ($pagina==$pagInicio) {
            $output['paginacion'] .= "<button disabled onclick='getDataW(".$pagina-1 .");'>Anterior</button>";
        } else {
            $output['paginacion'] .= "<button class='activo' onclick='getDataW(".$pagina-1 .");'>Anterior</button>";
        }
    
        $output['paginacion'] .= "<ul>";
    
    
        // pagina inicial anclada
    
        if ($pagInicio>2) {
            $output['paginacion'] .= "<li><a href='#' onclick='getDataW(1);'>1</a></li>";
            $output['paginacion'] .= "<li class='ancla'><a>...</a></li>";
        }
    
        // paginas dinamicas
    
        for ($i = $pagInicio; $i <= $pagFinal; $i++) {
            if ($pagina==$i) {
                $output['paginacion'] .= "<li class='actual'><a>$i</a></li>";
            }else {
                $output['paginacion'] .= "<li><a href='#' onclick='getDataW($i);'>$i</a></li>";
            }
        }
    
        // pagina final anclada
    
        if ($pagFinal<($paginasTotal-1)) {
            $output['paginacion'] .= "<li class='ancla'><a>...</a></li>";
            $output['paginacion'] .= "<li><a href='#' onclick='getDataW($paginasTotal);'>$paginasTotal</a></li>";
        }
    
        $output['paginacion'] .= "</ul>";
    
        // activacion del boton siguiente
    
        if ($pagina==$pagFinal) {
            $output['paginacion'] .= "<button disabled onclick='getDataW(".$pagina+1 .");'>Siguiente</button>";
        } else {
            $output['paginacion'] .= "<button class='activo' onclick='getDataW(".$pagina+1 .");'>Siguiente</button>";
        }
    }


}

echo json_encode($output, JSON_UNESCAPED_UNICODE); //por si viene con 'ñ' o tildes...

?>