use Argosal
go

drop table if exists masiva
create table masiva
(
documento char(12),
nombre char(50),
tel_Fijo char(10),
celular char(11),
fechaActivacion datetime,
operador char(10),
tipo_plan char(25),
direccion char(50),
distrito char(25),
provincia char(25),
departamento char(25),
fechaRegistro datetime default getDate()
)

drop table if exists whatsapp
create table whatsapp
(
codigo char(10) primary key,
dniAsesor char(8) not null,
nombre char(50) COLLATE Latin1_General_100_CI_AI_SC_UTF8 not null,
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
observaciones varchar(300) not null,
promocion char(50) not null,
ubicacion varchar(100) not null,
distrito char(25) not null,
fechaRegistro datetime default getdate(),
fechaActualizacion datetime default getDate(),

constraint fk_dniAsesor foreign key(dniAsesor) references usuarios(dni)
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

drop table if exists productos
create table productos
(
region char(10) null,
nombre char(50) null,
centro char(10) null,
almacen char(10) null,
nombreAlmacen char(50) null,
material char(20) null,
descripcion char(50) null,
libres char(5) null,
bloqueados char(5) null
)

drop table if exists cac
create table cac
(
region char(15) null,
pdv char(10) null,
nombre char(50) null,
entrega char(20) null,
direccion char(255) null,
distrito char(30) null,
provincia char(20) null,
departamento char(20) null,
horario char(100) null
)

drop table if exists dac
create table dac
(
nombre char(100) null,
distrito char(30) null,
provincia char(30) null,
departamento char(30) null,
region char(20) null,
direccion char(255) null,
descripcion char(100) null
)

drop table if exists acd
create table acd
(
region char(20) null,
pdv char(10) null,
nombre char(100) null,
entrega char(20) null,
pdvsisact char(100) null,
codpdv char(10) null,
descripcion char(100) null,
direccion char(255) null,

distrito char(5) null,
provincia char(5) null,
departamento char(5) null,
horario char(5) null,
estado char(5) null,
alta char(15) null,
baja char(15) null
)

drop table if exists cadena
create table cadena
(
region char(10) null,
razonsocial char(50) null,
codigointer char(10) null,
codpdv char(10) null,
pdvsisact char(50) null,
entrega char(20) null,
direccion char(50) null,
distrito char(5) null,
provincia char(5) null,
departamento char(5) null,
dias char(5) null,
horario char(5) null,
estado char(5) null
)

drop table if exists usuarios
create table usuarios
(
dni char(8) primary key,
nombre char(50) not null,
clave char(40) not null,
tipo char(1) not null,
foto char(30) not null,
fechaRegistro datetime default getdate(),
estado char(1) not null
)

select w.codigo, u.nombre from whatsapp as w inner join usuarios as u on u.nombre=w.asesor where u.dni='73179455'

update whatsapp set asesor='Christian Campaña' where asesor='Christian'