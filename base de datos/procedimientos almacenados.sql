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
