<?php
require_once '../../model/conexion.php';

$model=new conexion();
$con=$model->conectar();

// en el caso de solo querer determinadas columnas usar esto con el mismo nombre de las columnas...
$columnas=['region', 'nombre', 'centro', 'almacen',	'nombreAlmacen', 'material', 'descripcion', 'libres', 'bloqueados'];

// tabla a seleccionar
$tabla='productos';

// $buscar=isset($_POST['busqueda']) ? $con->mssql_escape($_POST['busqueda']) : null;
$buscarRegion= isset($_POST['BusReg']) ? $_POST['BusReg'] : null;
$buscarCac= isset($_POST['busCac']) ? $_POST['busCac'] : null;
$buscar= isset($_POST['busqueda']) ? $_POST['busqueda'] : null;

// busqueda de datos
$where="";

if ($buscarRegion!=null) {
    if ($buscarRegion!='---') {
        $where.="where region like '%".$buscarRegion."%'";
        if ($buscarCac!=null) {
            $where.=" and nombre like '%".$buscarCac."%'";
            if ($buscar!=null) {
                $where.=" and descripcion like '%".$buscar."%'";
            }
        }
        elseif ($buscar!=null) {
            $where.=" and descripcion like '%".$buscar."%'";
        }
    }
}
elseif ($buscarCac!=null and $buscarRegion==null) {
    $where.="where nombre like '%".$buscarCac."%'";
        if ($buscar!=null) {
            $where.=" and descripcion like '%".$buscar."%'";
        }
}
elseif ($buscar!=null and $buscarCac==null and $buscarRegion==null) {
    $where.="where descripcion like '%".$buscar."%'";

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

$sql = "select ".implode(", ", $columnas)." from $tabla $where order by region $sLimite";
// para verificar errores en la consulta
// echo $sql;
// echo "<br>";
// echo "<br>";


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
        $total = $fila['libres']+$fila['bloqueados'];
        $output['data'].= "<tr>";
        $output['data'].= "<td align='center'>$i</td>";
        $output['data'].= "<td align='center'>".$fila['region']."</td>";
        $output['data'].= "<td align='center'>".$fila['nombre']."</td>";
        $output['data'].= "<td align='center'>".$fila['centro']."</td>";
        $output['data'].= "<td align='center'>".$fila['almacen']."</td>";
        $output['data'].= "<td align='center'>".$fila['nombreAlmacen']."</td>";
        $output['data'].= "<td align='center'>".$fila['material']."</td>";
        $output['data'].= "<td align='center'>".$fila['descripcion']."</td>";
        $output['data'].= "<td align='center'>".$fila['libres']."</td>";
        $output['data'].= "<td align='center'>".$fila['bloqueados']."</td>";
        $output['data'].= "<td align='center'>$total</td>";
        // $output['data'].= "<td align='center'><a href=''>editar</a></td>";
        $output['data'].= "</tr>";
        $i+=1;
    }
} else {
    $output['data'].= "<tr>";
    $output['data'].= "<td align='center' colspan=13 height='100px'>Sin Resultados...</td>";
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
            $output['paginacion'] .= "<button disabled onclick='getDataE(".$pagina-1 .");'>Anterior</button>";
        } else {
            $output['paginacion'] .= "<button class='activo' onclick='getDataE(".$pagina-1 .");'>Anterior</button>";
        }
    
        $output['paginacion'] .= "<ul>";
    
    
        // pagina inicial anclada
    
        if ($pagInicio>2) {
            $output['paginacion'] .= "<li><a href='#' onclick='getDataE(1);'>1</a></li>";
            $output['paginacion'] .= "<li class='ancla'><a>...</a></li>";
        }
    
        // paginas dinamicas
    
        for ($i = $pagInicio; $i <= $pagFinal; $i++) {
            if ($pagina==$i) {
                $output['paginacion'] .= "<li class='actual'><a>$i</a></li>";
            }else {
                $output['paginacion'] .= "<li><a href='#' onclick='getDataE($i);'>$i</a></li>";
            }
        }
    
        // pagina final anclada
    
        if ($pagFinal<($paginasTotal-1)) {
            $output['paginacion'] .= "<li class='ancla'><a>...</a></li>";
            $output['paginacion'] .= "<li><a href='#' onclick='getDataE($paginasTotal);'>$paginasTotal</a></li>";
        }
    
        $output['paginacion'] .= "</ul>";
    
        // activacion del boton siguiente
    
        if ($pagina==$pagFinal) {
            $output['paginacion'] .= "<button disabled onclick='getDataE(".$pagina+1 .");'>Siguiente</button>";
        } else {
            $output['paginacion'] .= "<button class='activo' onclick='getDataE(".$pagina+1 .");'>Siguiente</button>";
        }
    }


}

echo json_encode($output, JSON_UNESCAPED_UNICODE); //por si viene con 'ñ' o tildes...

class Equipos
{

}

?>