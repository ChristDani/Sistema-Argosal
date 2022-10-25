<?php
require_once 'conexion.php';

$model=new conexion();
$con=$model->conectar();

// en el caso de solo querer determinadas columnas usar esto con el mismo nombre de las columnas...
$columnas=['asesor','nombre','dni','telefono','producto','lineaProcedente','operadorCedente','modalidad','tipo','planR','equipo','formaDePago','sec','tipoFija','planFija','estado','fechaRegistro'];

// tabla a seleccionar
$tabla='whatsapp';

// $buscar=isset($_POST['busqueda']) ? $con->mssql_escape($_POST['busqueda']) : null;
$buscar= isset($_POST['busqueda']) ? $_POST['busqueda'] : null;

// busqueda de datos
$where='';

if ($buscar!=null) {
    // $buscar='jorge';
    $where="where (";
    $cont= count($columnas);
    for ($i=0; $i < $cont; $i++) { 
        $where.=$columnas[$i]." like '%".$buscar."%' or ";
    }
    $where=substr_replace($where, "", -3);
    $where.=")";
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

$sql = "select ".implode(", ", $columnas)." from $tabla $where order by fechaRegistro $sLimite";
// para verificar errores en la consulta
// echo $sql;


// $resulContar=sqlsrv_query($con,$contar, array(), array("Scrollable"=>"buffered"));
$resulContar=sqlsrv_query($con,$contar, array(), array("Scrollable"=>SQLSRV_CURSOR_KEYSET));

$resultado=sqlsrv_query($con,$sql, array(), array("Scrollable"=>"buffered"));
// $resultado=sqlsrv_query($con,$sql, array(), array("Scrollable"=>SQLSRV_CURSOR_KEYSET));
// para saber el numero de filas

$totalContar = sqlsrv_num_rows($resulContar);

$filas = sqlsrv_num_rows($resultado);

// validacion del mensaje

$msg = '';

if ($totalContar===0) {
    $msg = '';
} elseif ($totalContar===1) {
    $msg = "Mostrando 1 Registro de un Total de 1 Registro.";
} elseif ($inicio+$limite>$totalContar) {
    $msg = "Mostrando Registros del ".$inicio+1 ." al $totalContar de un Total de $totalContar Registros.";
} else {
    $msg = "Mostrando Registros del ".$inicio+1 ." al ".$inicio+$limite." de un Total de $totalContar Registros.";
}

$output=[];
$output['mensaje']= $msg;
$output['data']= '';
$output['paginacion']= '';

if ($filas>0) {
    $i=$inicio+1;
    while ($fila=sqlsrv_fetch_array($resultado)) {

        $fecha=$fila['fechaRegistro']-> format('d/m/Y');

        $output['data'].= "<tr>";
        // $output['data'].= "<td align='center'><a href=''><span class='material-symbols-outlined'>info</span></a></td>";
        $output['data'].= "<td align='center'>$i</td>";
        // $output['data'].= "<td align='center'>".$fila['asesor']."</td>";
        $output['data'].= "<td align='left'>".$fila['nombre']."</td>";
        // $output['data'].= "<td align='center'>".$fila['dni']."</td>";
        $output['data'].= "<td align='center'>".$fila['telefono']."</td>";
        $output['data'].= "<td align='center'>".$fila['producto']."</td>";
        // $output['data'].= "<td align='center'>".$fila['lineaProcedente']."</td>";
        // $output['data'].= "<td align='center'>".$fila['operadorCedente']."</td>";
        // $output['data'].= "<td align='center'>".$fila['modalidad']."</td>";
        // $output['data'].= "<td align='center'>".$fila['tipo']."</td>";
        // $output['data'].= "<td align='center'>".$fila['planR']."</td>";
        // $output['data'].= "<td align='center'>".$fila['equipo']."</td>";
        // $output['data'].= "<td align='center'>".$fila['formaDePago']."</td>";
        $output['data'].= "<td align='center'>".$fila['sec']."</td>";
        // $output['data'].= "<td align='center'>".$fila['tipoFija']."</td>";
        // $output['data'].= "<td align='center'>".$fila['planFija']."</td>";
        $output['data'].= "<td align='center'>".$fila['estado']."</td>";
        $output['data'].= "<td align='center'>".$fecha."</td>";
        $output['data'].= "<td align='center'><label id='abrir'><span class='material-symbols-outlined'>info</span></label></td>";
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

class Whatsapp
{

}

?>