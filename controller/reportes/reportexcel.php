<?php
require_once '../../model/conexion.php';

$conexion = new conexion();
$con = $conexion->conectar();

$columnas=['codigo','dniAsesor','nombre','dni','telefono','producto','lineaProcedente','operadorCedente','modalidad','tipo','planR','equipo','formaDePago','numeroReferencia','sec','tipoFija','planFija','estado','observaciones','promocion','ubicacion','distrito','fechaRegistro','fechaActualizacion'];
$columnasBus=['codigo','nombre','dni','telefono','producto','lineaProcedente','operadorCedente','modalidad','tipo','planR','equipo','formaDePago','numeroReferencia','sec','tipoFija','planFija','observaciones','promocion','ubicacion','distrito','fechaActualizacion'];

$tabla='whatsapp';

$fecharequerida= !empty($_POST['busquedareportefechaventa']) ? $_POST['busquedareportefechaventa'] : null;
$dniAsesorMeta= !empty($_POST['busquedareporteasesorventa']) ? $_POST['busquedareporteasesorventa'] : null;
$buscarestado= isset($_POST['busquedareporteestadoventa']) ? $_POST['busquedareporteestadoventa'] : null;
$buscar= isset($_POST['busquedareporteventa']) ? $_POST['busquedareporteventa'] : null;

if ($buscarestado == "0") 
{
    $buscarestadoname = "No Requiere";
}
elseif ($buscarestado == "1") 
{
    $buscarestadoname = "Concretado";
}
elseif ($buscarestado == "2") 
{
    $buscarestadoname = "Pendiente";
}

$where='';

if ($fecharequerida != null) 
{
    $name = "-".$fecharequerida;
}
elseif ($fecharequerida == null) 
{
    $name = "-MesActual";
}

if ($dniAsesorMeta != null) {
    $name .= "-".$dniAsesorMeta;
    if ($buscarestado != null) {
        $name .= "-".$dniAsesorMeta."-".$buscarestadoname;
        if ($buscar!=null) {
            $name .= "-".$dniAsesorMeta."-".$buscarestadoname."-".$buscar;
        }
    }
    elseif ($buscar!=null) {
        $name .= "-".$dniAsesorMeta."-".$buscar;
    }
}
if ($buscarestado != null and $dniAsesorMeta == null) {
    $name .= "-".$buscarestadoname;
    if ($buscar!=null) {
        $name .= "-".$buscarestadoname."-".$buscar;
    }
}
elseif ($buscar!=null and $dniAsesorMeta == null and $buscarestado == null) {
    $name .= "-".$buscar;
}

if (isset($_POST['btngenerarreporteventas'])) 
{
    // nombre del archivo
    header('Content-Type:text/csv; charset=latin1');
    header('Content-Disposition: attachment; filename="Reporte-Ventas'.$name.'.csv"');

    // salida de archivo
    $salida = fopen('php://output', 'w');
    // encabezados
    fputcsv($salida, array('codigo','dniAsesor','nombre','dni','telefono','producto','lineaProcedente','operadorCedente','modalidad','tipo','planR','equipo','formaDePago','numeroReferencia','sec','tipoFija','planFija','estado','observaciones','promocion','ubicacion','distrito','fechaRegistro','fechaActualizacion'));
    // consulta para crear el reporte
    if ($fecharequerida != null) 
    {
        $where.="where (datepart(mm, fechaRegistro)=datepart(mm, '$fecharequerida') and datepart(yyyy, fechaRegistro)=datepart(yyyy, '$fecharequerida')) ";
    }
    elseif ($fecharequerida == null) 
    {
        $where.="where (datepart(mm, fechaRegistro)=datepart(mm, getdate()) and datepart(yyyy, fechaRegistro)=datepart(yyyy, getdate())) ";
    }

    if ($dniAsesorMeta != null) {
        $where.="and dniAsesor='".$dniAsesorMeta."' ";
        if ($buscarestado != null) {
            $where.="and estado='".$buscarestado."' ";
            if ($buscar!=null) {
                $where.=" and (";
                $cont= count($columnasBus);
                for ($i=0; $i < $cont; $i++) { 
                    $where.=$columnasBus[$i]." like '%".$buscar."%' or ";
                }
                $where=substr_replace($where, "", -3);
                $where.=")";
            }
        }
        elseif ($buscar!=null) {
            $where.=" and (";
            $cont= count($columnasBus);
            for ($i=0; $i < $cont; $i++) { 
                $where.=$columnasBus[$i]." like '%".$buscar."%' or ";
            }
            $where=substr_replace($where, "", -3);
            $where.=")";
        }
    }
    if ($buscarestado != null and $dniAsesorMeta == null) {
        $where.="and estado='".$buscarestado."' ";
        if ($buscar!=null) {
            $where.=" and (";
            $cont= count($columnasBus);
            for ($i=0; $i < $cont; $i++) { 
                $where.=$columnasBus[$i]." like '%".$buscar."%' or ";
            }
            $where=substr_replace($where, "", -3);
            $where.=")";
        }
    }
    elseif ($buscar!=null and $dniAsesorMeta == null and $buscarestado == null) {
        $where.="and (";
        $cont= count($columnasBus);
        for ($i=0; $i < $cont; $i++) { 
            $where.=$columnasBus[$i]." like '%".$buscar."%' or ";
        }
        $where=substr_replace($where, "", -3);
        $where.=")";
    }

    $sql = "select ".implode(", ", $columnas)." from $tabla $where order by codigo";
    $reporteventas=sqlsrv_query($con,$sql);
    while($row=sqlsrv_fetch_array($reporteventas))
    {
        $fechar = $row['fechaRegistro']->format('d/m/y');
        $fechaa = $row['fechaActualizacion']->format('d/m/y');
        fputcsv($salida, array($row['codigo'],
                                $row['dniAsesor'],
                                $row['nombre'],
                                $row['dni'],
                                $row['telefono'],
                                $row['producto'],
                                $row['lineaProcedente'],
                                $row['operadorCedente'],
                                $row['modalidad'],
                                $row['tipo'],
                                $row['planR'],
                                $row['equipo'],
                                $row['formaDePago'],
                                $row['numeroReferencia'],
                                $row['sec'],
                                $row['tipoFija'],
                                $row['planFija'],
                                $row['estado'],
                                $row['observaciones'],
                                $row['promocion'],
                                $row['ubicacion'],
                                $row['distrito'],
                                $fechar,
                                $fechaa));
    }
}
?>