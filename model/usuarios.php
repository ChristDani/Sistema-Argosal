<?php
require_once "conexion.php";

class user
{
    public function buscarUser($dni)
    {
        $filas=null;
        $model=new conexion();
		$conexion=$model->conectar();
        $sql="select * from usuarios where dni='".$dni."'";
        $rs=sqlsrv_query($conexion,$sql);

        while($row=sqlsrv_fetch_array($rs))
		{
            $filas[]=$row;
        }
        
        $conexion=$model->desconectar();
        return $filas;
    }

    public function listar()
    {
        $filas=null;
        $model=new conexion();
		$conexion=$model->conectar();
        $sql="select * from usuarios";
        $rs=sqlsrv_query($conexion,$sql);

        while($row=sqlsrv_fetch_array($rs))
		{
            $filas[]=$row;
        }
        
        $conexion=$model->desconectar();
        return $filas;
    }
}
?>