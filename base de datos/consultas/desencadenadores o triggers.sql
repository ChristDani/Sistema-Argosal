use Argosal
go

--drop trigger if exists creacion_de_metas
create trigger creacion_de_metas
	on usuarios
for insert
as
declare @dni char(8)
set @dni = (select dni from inserted)
insert into metas values(@dni,'10','10','3','1','1','4','4','1')

--drop trigger if exists agregar_direccion
create trigger agregar_direccion
	on whatsapp
for insert
as
declare @codigo char(10)
set @codigo = (select codigo from inserted)
declare @distrito char(25)
set @distrito = (select distrito from masiva)
declare @ubicacion char(100)
set @ubicacion = (select direccion from masiva)
update whatsapp set distrito=@distrito, ubicacion=@ubicacion from codigo=@codigo