use Argosal
go

-- insesion de usuario --

create procedure sp_insertar_usuario
@tdni char(8),
@tnombre char(25),
@tclave char(6)
as
begin
	insert into usuarios(dni,nombre,clave) values(@tdni,@tnombre,@tclave)
end 
go
