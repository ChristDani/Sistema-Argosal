<?php
require_once '../../model/conexion.php';

$model=new conexion();
$con=$model->conectar();

// en el caso de solo querer determinadas columnas usar esto con el mismo nombre de las columnas...
$columnas=['w.codigo','u.nombre','w.nombre','w.dni','w.telefono','w.producto','w.lineaProcedente','w.operadorCedente','w.modalidad','w.tipo','w.planR','w.equipo','w.formaDePago','w.numeroReferencia','w.sec','w.tipoFija','w.planFija','w.modoFija','w.estado','observaciones','w.promocion','w.ubicacion','w.distrito','w.fechaRegistro','w.fechaActualizacion'];

// tabla a seleccionar
$tabla='whatsapp as w inner join usuarios as u on w.dniAsesor=u.dni';

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
$limite = isset($_POST['registros']) ? $_POST['registros'] : 12;
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

$sql = "select ".implode(", ", $columnas)." from $tabla $where order by w.fechaRegistro $sLimite";
// para verificar errores en la consulta
// echo "$sql<br>";


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

if ($filas>0) {
    
    while ($fila=sqlsrv_fetch_array($resultado)) {
        
        $code = $fila['codigo'];
        $estado=$fila['estado'];
        $fecha=$fila['fechaRegistro']-> format('l j \of F Y h:i:s A');

        $output['data'].= "<div class='col-xl-3 col-md-6'>";
        $output['data'].= "<div class='card'>";
        $output['data'].= "<a href='#' type='button' data-bs-toggle='modal' data-bs-target='#DetallesWhatsapp' onclick=abrirModalDetalle('$code');>";
        $output['data'].= "<div class='card-body'>";
        $output['data'].= "<div class='head d-flex justify-content-around'>";
        $output['data'].= "<p>".$fila['promocion']."</p>";
        $output['data'].= "<p></p>";
        $output['data'].= "<p></p>";
        if ($estado === "0") 
        {
            $output['data'].= "<p class='danger'>No Requiere</p>";
        }
        elseif ($estado === "1") 
        {
            $output['data'].= "<p class='success'>Concretado</p>";
        }
        elseif ($estado === "2") 
        {
            $output['data'].= "<p class='warning'>Pendiente</p>";
        }
        $output['data'].= "<p></p>";
        $output['data'].= "<p></p>";
        $output['data'].= "<p>".$fila['dni']."</p>";
        $output['data'].= "</div>";
        $output['data'].= "<div class='body'>";
        $output['data'].= "<div class='row my-2'>";
        $output['data'].= "<h4 class='text-center'>".$fila['nombre']."</h4>";
        $output['data'].= "</div>";
        $output['data'].= "<div class='row text-center'>";
        $output['data'].= "<div class='col'>";
        $output['data'].= "<p>".$fila['modalidad']."</p>";
        $output['data'].= "</div>";
        $output['data'].= "<div class='col'>";
        $output['data'].= "<p>".$fila['numeroReferencia']."</p>";
        $output['data'].= "</div>";
        $output['data'].= "<div class='col'>";
        $output['data'].= "<p>".$fila['planR']."</p>";
        $output['data'].= "</div>";
        $output['data'].= "</div>";
        $output['data'].= "<div class='row text-center' style='border-top: 1px solid #b9b9b9;'>";
        $output['data'].= "<p class='my-1 text-muted'>".$fecha."</p>";
        $output['data'].= "</div>";
        $output['data'].= "</div>";
        $output['data'].= "</div>";
        $output['data'].= "</a>";
        $output['data'].= "</div>";
        $output['data'].= "</div>";
    }
} else {
    $output['data'].= "<div>";
    $output['data'].= "<h1 class='text-muted text-center my-5'>Sin Resultados...</h1>";
    $output['data'].= "</div>";
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
        
        $output['paginacion'] .= "<div class='btn-toolbar mb-3' role='toolbar'><div class='btn-group btn-group-sm' role='group'>";
        
        // activacion del boton anterior
        if ($pagina!=$pagInicio) 
        {
            $output['paginacion'] .= "<button type='button' onclick='getDataW(".$pagina-1 .");' class='btn rounded-5 mx-1 d-flex justify-content-center align-items-center'><ion-icon name='arrow-back-outline'></ion-icon></button>";
        }  
    
        // pagina inicial anclada
        if ($pagInicio>2) {
            $output['paginacion'] .= "<button type='button' class='btn btn-outline-secondary mx-1 rounded-5' onclick='getDataW(1);'>1</button>";
            $output['paginacion'] .= "<button type='button' class='btn btn-outline-secondary mx-1 disabled'>...</button>";
        }
    
        // paginas dinamicas
        for ($i = $pagInicio; $i <= $pagFinal; $i++) {
            if ($pagina==$i) 
            {
                $output['paginacion'] .= "<button type='button' class='btn btn-outline-secondary rounded-5 mx-1 active'>$i</button>";
            }
            else 
            {
                $output['paginacion'] .= "<button type='button' class='btn btn-outline-secondary mx-1 rounded-5' onclick='getDataW($i);'>$i</button>";
            }
        }
    
        // pagina final anclada
        if ($pagFinal<($paginasTotal-1)) {
            $output['paginacion'] .= "<button type='button' class='btn btn-outline-secondary mx-1 disabled'>...</button>";
            $output['paginacion'] .= "<button type='button' class='btn btn-outline-secondary mx-1 rounded-5' onclick='getDataW($paginasTotal);'>$paginasTotal</button>";
        }
    
        
        // activacion del boton siguiente
        
        if ($pagina!=$pagFinal) 
        {
            $output['paginacion'] .= "<button type='button' onclick='getDataW(".$pagina+1 .");' class='btn mx-1 d-flex justify-content-center rounded-5 align-items-center'><ion-icon name='arrow-forward-outline'></ion-icon></button>";
        }
        $output['paginacion'] .= "</div>";
    }


}

echo json_encode($output, JSON_UNESCAPED_UNICODE); //por si viene con 'ñ' o tildes...
?>