<?php
require_once 'conexion.php';

class Whatsapp
{
    // insersiones

    // fija en porta 
    public function agregarFijaPortabilidad($asesor,$nombre,$dni,$telefonoRef,$producto,$promocion,$tipoFija,$telefono,$planFija,$modoFija,$formaPago,$sec,$estado,$observacion,$ubicacion,$distrito)
    {
        $model=new conexion();
        $con=$model->conectar();
        
        $sql="declare @codigo char(10); set @codigo = dbo.Gencodwhats(); exec sp_insertar_whatsapp_fija_portabilidad @codigo,'$asesor','$nombre','$dni','$telefonoRef','$producto','$promocion','$tipoFija','$telefono','$planFija','$modoFija','$formaPago','$sec','$estado','$observacion','$ubicacion','$distrito'";

		$rs=sqlsrv_query($con,$sql);

		$con=$model->desconectar();
        return "Venta Registrada Satisfactoriamente...";
    }
    
    // fija en alta
    public function agregarFijaAlta($asesor,$nombre,$dni,$telefonoRef,$producto,$promocion,$tipoFija,$planFija,$modoFija,$formaPago,$sec,$estado,$observacion,$ubicacion,$distrito)
    {
        $model=new conexion();
        $con=$model->conectar();
        
        $sql="declare @codigo char(10); set @codigo = dbo.Gencodwhats(); exec sp_insertar_whatsapp_fija_lineanueva @codigo,'$asesor','$nombre','$dni','$telefonoRef','$producto','$promocion','$tipoFija','$planFija','$modoFija','$formaPago','$sec','$estado','$observacion','$ubicacion','$distrito'";

		$rs=sqlsrv_query($con,$sql);

		$con=$model->desconectar();
        return "Venta Registrada Satisfactoriamente...";
    }
    
    // movil en alta pre
    public function agregarMovilNewPre($asesor,$nombre,$dni,$telefonoRef,$producto,$promocion,$tipo,$modalidad,$equipos,$formaPago,$sec,$estado,$observacion,$ubicacion,$distrito)
    {
        $model=new conexion();
        $con=$model->conectar();
        
        $sql="declare @codigo char(10); set @codigo = dbo.Gencodwhats(); exec sp_insertar_whatsapp_movil_lineanueva_prepago @codigo,'$asesor','$nombre','$dni','$telefonoRef','$producto','$promocion','$tipo','$modalidad','$equipos','$formaPago','$sec','$estado','$observacion','$ubicacion','$distrito'";

		$rs=sqlsrv_query($con,$sql);

		$con=$model->desconectar();
        return "Venta Registrada Satisfactoriamente...";
    }

    // movil en alta post
    public function agregarMovilNewPost($asesor,$nombre,$dni,$telefonoRef,$producto,$promocion,$tipo,$modalidad,$plan,$equipos,$formaPago,$sec,$estado,$observacion,$ubicacion,$distrito)
    {
        $model=new conexion();
        $con=$model->conectar();
        
        $sql="declare @codigo char(10); set @codigo = dbo.Gencodwhats(); exec sp_insertar_whatsapp_movil_lineanueva_postpago @codigo,'$asesor','$nombre','$dni','$telefonoRef','$producto','$promocion','$tipo','$modalidad','$plan','$equipos','$formaPago','$sec','$estado','$observacion','$ubicacion','$distrito'";

		$rs=sqlsrv_query($con,$sql);

		$con=$model->desconectar();
        return "Venta Registrada Satisfactoriamente...";
    }

    // movil en porta pre
    public function agregarMovilPortaPre($asesor,$nombre,$dni,$telefonoRef,$producto,$promocion,$tipo,$telefono,$lineaProce,$operadorCeden,$modalidad,$equipos,$formaPago,$sec,$estado,$observacion,$ubicacion,$distrito)
    {
        $model=new conexion();
        $con=$model->conectar();
        
        $sql="declare @codigo char(10); set @codigo = dbo.Gencodwhats(); exec sp_insertar_whatsapp_movil_portabilidad_prepago @codigo,'$asesor','$nombre','$dni','$telefonoRef','$producto','$promocion','$tipo','$telefono','$lineaProce','$operadorCeden','$modalidad','$equipos','$formaPago','$sec','$estado','$observacion','$ubicacion','$distrito'";

		$rs=sqlsrv_query($con,$sql);

		$con=$model->desconectar();
        return "Venta Registrada Satisfactoriamente...";
    }

    // movil en porta post
    public function agregarMovilPortaPost($asesor,$nombre,$dni,$telefonoRef,$producto,$promocion,$tipo,$telefono,$lineaProce,$operadorCeden,$modalidad,$plan,$equipos,$formaPago,$sec,$estado,$observacion,$ubicacion,$distrito)
    {
        $model=new conexion();
        $con=$model->conectar();
        
        $sql="declare @codigo char(10); set @codigo = dbo.Gencodwhats(); exec sp_insertar_whatsapp_movil_portabilidad_postpago @codigo,'$asesor','$nombre','$dni','$telefonoRef','$producto','$promocion','$tipo','$telefono','$lineaProce','$operadorCeden','$modalidad','$plan','$equipos','$formaPago','$sec','$estado','$observacion','$ubicacion','$distrito'";

		$rs=sqlsrv_query($con,$sql);

		$con=$model->desconectar();
        return "Venta Registrada Satisfactoriamente...";
    }

    // movil en reno pre
    public function agregarMovilRenoPre($asesor,$nombre,$dni,$telefonoRef,$producto,$promocion,$tipo,$telefono,$lineaProce,$modalidad,$equipos,$formaPago,$sec,$estado,$observacion,$ubicacion,$distrito)
    {
        $model=new conexion();
        $con=$model->conectar();
        
        $sql="declare @codigo char(10); set @codigo = dbo.Gencodwhats(); exec sp_insertar_whatsapp_movil_renovacion_prepago @codigo,'$asesor','$nombre','$dni','$telefonoRef','$producto','$promocion','$tipo','$telefono','$lineaProce','$modalidad','$equipos','$formaPago','$sec','$estado','$observacion','$ubicacion','$distrito'";

		$rs=sqlsrv_query($con,$sql);

		$con=$model->desconectar();
        return "Venta Registrada Satisfactoriamente...";
    }

    // movil en reno post
    public function agregarMovilRenoPost($asesor,$nombre,$dni,$telefonoRef,$producto,$promocion,$tipo,$telefono,$lineaProce,$modalidad,$plan,$equipos,$formaPago,$sec,$estado,$observacion,$ubicacion,$distrito)
    {
        $model=new conexion();
        $con=$model->conectar();
        
        $sql="declare @codigo char(10); set @codigo = dbo.Gencodwhats(); exec sp_insertar_whatsapp_movil_renovacion_postpago @codigo,'$asesor','$nombre','$dni','$telefonoRef','$producto','$promocion','$tipo','$telefono','$lineaProce','$modalidad','$plan','$equipos','$formaPago','$sec','$estado','$observacion','$ubicacion','$distrito'";

		$rs=sqlsrv_query($con,$sql);

		$con=$model->desconectar();
        return "Venta Registrada Satisfactoriamente...";
    }

    // ediciones

    // fija en alta








    



    
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