use Argosal
go

drop table if exists masiva
create table masiva
(
documento char(12) default'---',
nombre char(50) default'---',
tel_Fijo char(10) default'---',
celular char(11) default'---',
fechaActivacion char(10) default'--/--/----',
operador char(10) default'---',
tipo_plan char(25) default'---',
direccion char(50) default'---',
distrito char(25) default'---',
provincia char(25) default'---',
departamento char(25) default'---',
estado char(15) default 'Sin Procesar',
Asesor char(25) default 'Argosal',
fechaRegistro char(10) default'--/--/----'
)

drop table if exists whatsapp
create table whatsapp
(
telefono char(11) not null,
nombre char(25) not null,
idPromocion char(1) not null,
idTarjeta char(1) not null,
documento char(12) null,
operador char(10) null,
tipoPlan char(25) null,
idModoPago char(1) not null,
fechaRegistro smalldatetime default getdate(),
estado char(10) default 'sin procesar'
)

drop table if exists landing
create table landing
(
documento char(12) not null,
telefono char(11) not null,
planes char(25) not null,
fechaRegistro smalldatetime default getdate(),
estado char(10) default 'sin procesar'
)

drop table if exists equipos
create table equipos
(
region char(10) null,
nombre_centro char(25) null,
ce char(10) null,
alm char(10) null,
almacen char(25) null,
material char(20) null,
descripcion char(50) null,
libres char(4) null,
bloqueados char(4) null,
stockTotal char(4) null
)

drop table if exists usuarios
create table usuarios
(
dni char(8) primary key,
nombre char(25) not null,
clave char(6) not null,
tipo char(8) not null,
fechaRegistro smalldatetime default getdate()
)



drop table personas

select * from personas

delete from personas
print getdate()
select * from personas where documento like'%'