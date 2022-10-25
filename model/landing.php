<?php
require_once 'conexion.php';

$model=new conexion();
$con=$model->conectar();

// en el caso de solo querer determinadas columnas usar esto con el mismo nombre de las columnas...
$columnas=['documento',	'telefono',	'planes',	'fechaRegistro', 'estado'];

// tabla a seleccionar
$tabla='landing';

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

$sql = "select ".implode(", ", $columnas)." from $tabla $where order by documento $sLimite";
// para verificar errores en la consulta
// echo $sql;


// $resulContar=sqlsrv_query($con,$contar, array(), array("Scrollable"=>"buffered"));
$resulContar=sqlsrv_query($con,$contar, array(), array("Scrollable"=>SQLSRV_CURSOR_KEYSET));

$resultado=sqlsrv_query($con,$sql, array(), array("Scrollable"=>"buffered"));
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
        $output['data'].= "<tr>";
        $output['data'].= "<td align='center'>$i</td>";
        $output['data'].= "<td align='center'>".$fila['documento']."</td>";
        $output['data'].= "<td align='center'>".$fila['telefono']."</td>";
        $output['data'].= "<td align='center'>".$fila['planes']."</td>";
        $output['data'].= "<td align='center'>".$fila['fechaRegistro']."</td>";
        $output['data'].= "<td align='center'>".$fila['estado']."</td>";
        $output['data'].= "<td align='center'><label><span class='material-symbols-outlined'>info</span></label></td>";
        $output['data'].= "</tr>";
        $i+=1;
    }
} else {
    $output['data'].= "<tr>";
    $output['data'].= "<td align='center' colspan=7 height='100px'>Sin Resultados...</td>";
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
            $output['paginacion'] .= "<button disabled onclick='getDataL(".$pagina-1 .");'>Anterior</button>";
        } else {
            $output['paginacion'] .= "<button class='activo' onclick='getDataL(".$pagina-1 .");'>Anterior</button>";
        }
    
        $output['paginacion'] .= "<ul>";
    
    
        // pagina inicial anclada
    
        if ($pagInicio>2) {
            $output['paginacion'] .= "<li><a href='#' onclick='getDataL(1);'>1</a></li>";
            $output['paginacion'] .= "<li class='ancla'><a>...</a></li>";
        }
    
        // paginas dinamicas
    
        for ($i = $pagInicio; $i <= $pagFinal; $i++) {
            if ($pagina==$i) {
                $output['paginacion'] .= "<li class='actual'><a>$i</a></li>";
            }else {
                $output['paginacion'] .= "<li><a href='#' onclick='getDataL($i);'>$i</a></li>";
            }
        }
    
        // pagina final anclada
    
        if ($pagFinal<($paginasTotal-1)) {
            $output['paginacion'] .= "<li class='ancla'><a>...</a></li>";
            $output['paginacion'] .= "<li><a href='#' onclick='getDataL($paginasTotal);'>$paginasTotal</a></li>";
        }
    
        $output['paginacion'] .= "</ul>";
    
        // activacion del boton siguiente
    
        if ($pagina==$pagFinal) {
            $output['paginacion'] .= "<button disabled onclick='getDataL(".$pagina+1 .");'>Siguiente</button>";
        } else {
            $output['paginacion'] .= "<button class='activo' onclick='getDataL(".$pagina+1 .");'>Siguiente</button>";
        }
    }


}

echo json_encode($output, JSON_UNESCAPED_UNICODE); //por si viene con 'ñ' o tildes...

class Landing
{

}

?>