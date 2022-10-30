<?php
require_once 'conexion.php';

class Whatsapp
{

    public function agregarWhatsapp($asesor,$nombreC,$dniC,$telefono,$producto,$lineaProce,$operadorCeden,$modalidad,$tipo,$plan,$equipos,$formaPago,$telefonoRef,$sec,$tipoFija,$planFija,$estado)
    {

        $model=new conexion();
        $con=$model->conectar();
        
        $sql="declare @codigo char(10); set @codigo = dbo.Gencodwhats(); exec sp_insertar_whatsapp @codigo,'$asesor','$nombreC','$dniC','$telefono','$producto','$lineaProce','$operadorCeden','$modalidad','$tipo','$plan','$equipos','$formaPago','$telefonoRef','$sec','$tipoFija','$planFija','$estado'";

		$rs=sqlsrv_query($con,$sql);

		$con=$model->desconectar();
        return "Venta Registrada Satisfactoriamente...";

    }

    public function actualizarWhatsappFija($codigo,$planFija,$telRef,$sec,$estado)
    {

        $model=new conexion();
        $con=$model->conectar();

        $sql="exec sp_editar_whatsapp_fija '$codigo','$telRef','$sec','$planFija','$estado'";

        $rs=sqlsrv_query($con,$sql);

		$con=$model->desconectar();
        return "Venta Actualizada Satisfactoriamente...";

    }

    public function actualizarWhatsappMovil($codigo,$plan,$equipo,$formaPago,$telRef,$sec,$estado)
    {

        $model=new conexion();
        $con=$model->conectar();

        $sql="exec sp_editar_whatsapp_movil '$codigo','$plan','$equipo','$formaPago','$telRef','$sec','$estado'";

        $rs=sqlsrv_query($con,$sql);

		$con=$model->desconectar();
        return "Venta Actualizada Satisfactoriamente...";

    }

}

?>