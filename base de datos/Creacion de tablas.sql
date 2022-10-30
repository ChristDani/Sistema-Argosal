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
codigo char(10) primary key,
asesor char(15) not null,
nombre char(50) not null,
dni char(8) not null,
telefono char(11) not null,
producto char(5) not null,
lineaProcedente char(8) not null,
operadorCedente char(15) not null,
modalidad char(8) not null,
tipo char(15) not null,
planR char(50) not null,
equipo char(50) not null,
formaDePago char(10) not null,
numeroReferencia char(11) not null,
sec char(15) null,
tipoFija char(15) not null,
planFija char(50) not null,
estado char(15) not null,
fechaRegistro smalldatetime default getdate()
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