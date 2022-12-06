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
        $sql="select * from usuarios where activo='1'";
        $rs=sqlsrv_query($conexion,$sql);

        while($row=sqlsrv_fetch_array($rs))
		{
            $filas[]=$row;
        }
        
        $conexion=$model->desconectar();
        return $filas;
    }

    public function insertarUsuario($dni,$nombre,$clave,$tipo)
    {
        $model=new conexion();
        $con=$model->conectar();
        
        $sql="exec sp_insertar_usuario '$dni','$nombre','$clave','$tipo'";

		$rs=sqlsrv_query($con,$sql);

		$con=$model->desconectar();
        return "Usuario agregado con exito";
    }

    public function editarUsuario($dni,$nombre,$clave,$fotoPerfil)
    {
        $model=new conexion();
        $con=$model->conectar();
        
        $sql="exec sp_editar_usuario '$dni','$nombre','$clave','$fotoPerfil'";

		$rs=sqlsrv_query($con,$sql);

		$con=$model->desconectar();
        return "Usuario editado";
    }

    public function reactivar($dni)
    {
        $model=new conexion();
        $con=$model->conectar();
        
        $sql="exec sp_reactivar_usuario '$dni'";

		$rs=sqlsrv_query($con,$sql);

		$con=$model->desconectar();
        return "Usuario reactivado";
    }

    public function cambiarTipoUsuario($dni,$tipo)
    {
        $model=new conexion();
        $con=$model->conectar();
        
        $sql="exec sp_editar_usuario_administrador '$dni','$tipo'";

		$rs=sqlsrv_query($con,$sql);

		$con=$model->desconectar();
        return "Tipo de usuario cambiado";
    }

    public function activarEstado($dni)
    {
        $model=new conexion();
        $con=$model->conectar();
        
        $sql="exec sp_estado_activo_usuario '$dni'";

		$rs=sqlsrv_query($con,$sql);

		$con=$model->desconectar();
        return "Estado del usuario activo";
    }

    public function desactivarEstado($dni)
    {
        $model=new conexion();
        $con=$model->conectar();
        
        $sql="exec sp_estado_desactivo_usuario '$dni'";

		$rs=sqlsrv_query($con,$sql);

		$con=$model->desconectar();
        return "Estado del usuario desactivo";
    }

    public function reposarEstado($dni)
    {
        $model=new conexion();
        $con=$model->conectar();
        
        $sql="exec sp_estado_reposo_usuario '$dni'";

		$rs=sqlsrv_query($con,$sql);

		$con=$model->desconectar();
        return "Estado del usuario en reposo";
    }

    public function ocuparEstado($dni)
    {
        $model=new conexion();
        $con=$model->conectar();
        
        $sql="exec sp_estado_ocupar_usuario '$dni'";

		$rs=sqlsrv_query($con,$sql);

		$con=$model->desconectar();
        return "Estado del usuario en reposo";
    }

    public function eliminarUsuario($dni)
    {
        $model=new conexion();
        $con=$model->conectar();
        
        $sql="exec sp_eliminar_usuario '$dni'";

		$rs=sqlsrv_query($con,$sql);

		$con=$model->desconectar();
        return "Usuario eliminado con exito";
    }
}
?>