use Argosal
go

-- insesion de usuario --

drop procedure if exists sp_insertar_usuario
create procedure sp_insertar_usuario
@tdni char(8),
@tnombre char(25),
@tclave char(6),
@ttipo char(15)
as
begin
	insert into usuarios(dni,nombre,clave,tipo) values(@tdni,@tnombre,@tclave,@ttipo)
end 
go

-- insesion de whatsapp --

drop procedure if exists sp_insertar_whatsapp
create procedure sp_insertar_whatsapp
@codigo char(10),
@asesor char(15),
@nombre char(50),
@dni char(8),
@telefono char(11),
@producto char(5),
@lineaProcedente char(8),
@operadorCedente char(15),
@modalidad char(8),
@tipo char(15),
@planR char(50),
@equipo char(50),
@formaDePago char(10),
@numeroReferencia char(11),
@sec char(15),
@tipoFija char(15),
@planFija char(50),
@estado char(15),
@observacion varchar(300),
@promocion char(50),
@ubicacion char(100),
@distrito char(25)
as
begin
	insert into whatsapp(codigo,asesor,nombre,dni,telefono,producto,lineaProcedente,operadorCedente,modalidad,tipo,planR,equipo,formaDePago,numeroReferencia,sec,tipoFija,planFija,estado,observaciones,promocion,ubicacion,distrito) values(@codigo,@asesor,@nombre,@dni,@telefono,@producto,@lineaProcedente,@operadorCedente,@modalidad,@tipo,@planR,@equipo,@formaDePago,@numeroReferencia,@sec,@tipoFija,@planFija,@estado,@observacion,@promocion,@ubicacion,@distrito)
end 
go

declare @codigo char(10);
set @codigo = dbo.Gencodwhats();
print @codigo;
exec sp_insertar_whatsapp @codigo,'Christian','juan jose','73179455','985478547','Fija','---','---','---','---','---','---','Contado','---','---','Alta','1 Play','Pendiente'

select * from whatsapp



-- editar whatsapp --
-- fija --

drop procedure if exists sp_editar_whatsapp_fija
create procedure sp_editar_whatsapp_fija
@codigo char(10),
@numeroReferencia char(11),
@sec char(15),
@planFija char(50),
@estado char(15)
as
begin
	update whatsapp set numeroReferencia=@numeroReferencia, sec=@sec, planFija=@planFija, estado=@estado where codigo=@codigo
end 
go

exec sp_editar_whatsapp_fija 'WP00000004','','602145754','','Concretado'

select * from whatsapp


-- movil --

drop procedure if exists sp_editar_whatsapp_movil
create procedure sp_editar_whatsapp_movil
@codigo char(10),
@planR char(50),
@equipo char(50),
@formaDePago char(10),
@numeroReferencia char(11),
@sec char(15),
@estado char(15)
as
begin
	update whatsapp set planR=@planR, equipo=@equipo, formaDePago=@formaDePago, numeroReferencia=@numeroReferencia, sec=@sec, estado=@estado where codigo=@codigo
end 
go

exec sp_editar_whatsapp_movil 'WP00000007','sin plan','Samsung S20+','Cuotas','922456854','86954575','Concretado'

select * from whatsapp