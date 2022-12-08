<?php
require "../librerias/PHPExcel/Classes/PHPExcel.php";

require_once "../model/conexion.php";
$model = new conexion();
$con = $model -> conectar();

if ($_FILES['prueba']['name']) 
{
    // subiendo el archivo al sistema
    $archivo = $_FILES['prueba']['name'];
    $dirt = "archivos/".$archivo;
    copy($_FILES['prueba']['tmp_name'],$dirt);
    
    // detenemos el codigo un momento para que procesen los datos
    sleep(0.8);

    // especificando la ubicacion del archivo
    $archivoPrueva = $dirt;

    // cargando el archivo con la libreria
    $excelPrueba = PHPExcel_IOFactory::load($archivoPrueva);

    // cargar la hoja escefica que queremos
    $excelPrueba -> setActiveSheetIndex(0);

    // obtener el numero de filas del archivo
    $numerofila = $excelPrueba -> setActiveSheetIndex(0) -> getHighestRow();
    // echo $numerofila;

    // eliminamos la tabla antigua para reemplazar los datos
    $sqld = "delete from prueba";
    $rsd=sqlsrv_query($con,$sqld);

    for ($i=2; $i <= $numerofila ; $i++) 
    {
        $idPrueba = $excelPrueba -> getActiveSheet() -> getCell('A'.$i) -> getCalculatedValue();
        $nombre = $excelPrueba -> getActiveSheet() -> getCell('B'.$i) -> getCalculatedValue();
        // echo $idPrueba." - ".$nombre."<br>";
        $sql = "insert into prueba(id,nombre) values('$idPrueba','$nombre')";
        $rs=sqlsrv_query($con,$sql);
    }
}

if ($_FILES['dark']['name']) 
{
    // subiendo el archivo al sistema
    $archivo = $_FILES['dark']['name'];
    $dirt = "archivos/".$archivo;
    copy($_FILES['dark']['tmp_name'],$dirt);
    
    // detenemos el codigo un momento para que procesen los datos
    sleep(0.8);

    // especificando la ubicacion del archivo
    $archivoPrueva = $dirt;

    // cargando el archivo con la libreria
    $excelPrueba = PHPExcel_IOFactory::load($archivoPrueva);

    // cargar la hoja escefica que queremos
    $excelPrueba -> setActiveSheetIndex(0);

    // obtener el numero de filas del archivo
    $numerofila = $excelPrueba -> setActiveSheetIndex(0) -> getHighestRow();
    // echo $numerofila;

    // eliminamos la tabla antigua para reemplazar los datos
    $sqld = "delete from prueba2";
    $rsd=sqlsrv_query($con,$sqld);

    for ($i=2; $i <= $numerofila ; $i++) 
    {
        $idPrueba = $excelPrueba -> getActiveSheet() -> getCell('A'.$i) -> getCalculatedValue();
        $nombre = $excelPrueba -> getActiveSheet() -> getCell('B'.$i) -> getCalculatedValue();
        // echo $idPrueba." - ".$nombre."<br>";
        $sql = "insert into prueba2(id,nombre) values('$idPrueba','$nombre')";
        $rs=sqlsrv_query($con,$sql);
    }
}
$con = $model->desconectar();
?>

<script>
    alert("Archivo subido correctamente");
    window.history.back();
</script>