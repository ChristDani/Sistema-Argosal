<?php
require_once "conexion.php";

class Masiva
{

    public function listarMasiva($empieza,$cantidad)
    {

        $cantidad2=$cantidad;
        $empieza2=$empieza;

        $filas=null;
        $model=new conexion();
        $conexion=$model->conectar();
        $sql="SELECT * FROM personas order by documento offset $empieza2 rows fetch next $cantidad2 rows only";
        $rscat=sqlsrv_query($conexion,$sql);
        while($row=sqlsrv_fetch_array($rscat))
        {
            $filas[]=$row;
        }
        $conexion=$model->desconectar();
        return $filas;

    }

    public function contarMasiva()
    {

        $filas=null;
        $model=new conexion();
        $conexion=$model->conectar();
        $sql="SELECT * FROM personas";
        $rscat=sqlsrv_query($conexion,$sql);
        while($row=sqlsrv_fetch_array($rscat))
        {
            $filas[]=$row;
        }
        $conexion=$model->desconectar();
        return count($filas);

    }

    // public function listar()
    // {

    //     $filas=null;
    //     $model=new conexion();
    //     $conexion=$model->conectar();
    //     // $sql="SELECT * FROM personas";
    //     $sql="SELECT * FROM personas for json path,root('personas')";
    //     // $sql="SELECT * FROM personas where data_origen='Adquirida'";
    //     $rscat=sqlsrv_query($conexion,$sql);
    //     if($rscat === false) {
    //         $filas=trigger_error(print_r(sqlsrv_errors(), true), E_USER_ERROR);
    //     }
    //     while($row=sqlsrv_fetch_array($rscat))
    //     {
    //         $filas[]=$row;
    //     }
    //     $conexion=$model->desconectar();
    //     return $filas;

    // }

    // public function listarC($estado)
    // {

    //     $filas=null;
    //     $model=new conexion();
    //     $conexion=$model->conectar();
    //     $sql="SELECT * FROM personas WHERE estado='$estado'";
    //     $rscat=sqlsrv_query($conexion,$sql);
    //     if($rscat === false) {
    //         $filas=trigger_error(print_r(sqlsrv_errors(), true), E_USER_ERROR);
    //     }
    //     while($row=sqlsrv_fetch_array($rscat))
    //     {
    //         $filas[]=$row;
    //     }
    //     $conexion=$model->desconectar();
    //     return $filas;

    // }
}

?>