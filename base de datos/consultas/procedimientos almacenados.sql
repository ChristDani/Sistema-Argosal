use Argosal
go

-- insesion de usuario --

	--drop procedure if exists sp_insertar_usuario
	create procedure sp_insertar_usuario
	@dni char(8),
	@nombre char(50),
	@clave char(40),
	@tipo char(1),
	@foto char(30)
	as
	begin
		insert into usuarios(dni,nombre,clave,tipo,foto,estado,fotoPerfil) values(@dni,@nombre,@clave,@tipo,@foto,'0','default.svg')
	end 
	go

-- edición de usuario --

	-- editar usuario completo --
	--drop procedure if exists sp_editar_usuario
	create procedure sp_editar_usuario
	@dni char(8),
	@nombre char(50),
	@clave char(40),
	@foto char(30),
	@fotoPerfil char(30)
	as
	begin
		update usuarios set nombre=@nombre, clave=@clave, foto=@foto, fotoPerfil=@fotoPerfil where dni=@dni
	end 
	go

	-- editar el tipo de usuario --
	--drop procedure if exists sp_editar_usuario_administrador
	create procedure sp_editar_usuario_administrador
	@dni char(8),
	@tipo char(1)
	as
	begin
		update usuarios set tipo=@tipo where dni=@dni
	end 
	go

-- eliminar usuario --
	--drop procedure if exists sp_eliminar_usuario
	create procedure sp_eliminar_usuario
	@dni char(8)
	as
	begin
		delete usuarios where dni=@dni
	end 
	go

-- poner en estado desactivo al usuario --
	--drop procedure if exists sp_estado_desactivo_usuario
	create procedure sp_estado_desactivo_usuario
	@dni char(8)
	as
	begin
		update usuarios set estado='0' where dni=@dni
	end 
	go

	-- poner en estado activo al usuario --
	--drop procedure if exists sp_estado_activo_usuario
	create procedure sp_estado_activo_usuario
	@dni char(8)
	as
	begin
		update usuarios set estado='1' where dni=@dni
	end 
	go

	-- poner en estado de reposo al usuario --
	--drop procedure if exists sp_estado_reposo_usuario
	create procedure sp_estado_reposo_usuario
	@dni char(8)
	as
	begin
		update usuarios set estado='2' where dni=@dni
	end 
	go

	-- poner en estado de ocupado al usuario --
	--drop procedure if exists sp_estado_ocupar_usuario
	create procedure sp_estado_ocupar_usuario
	@dni char(8)
	as
	begin
		update usuarios set estado='3' where dni=@dni
	end 
	go


-- insersion de ventas whatsapp --

	-- insesion de whatsapp fija --

		-- venta de fija portabilidad --
		--drop procedure if exists sp_insertar_whatsapp_fija_portabilidad
		create procedure sp_insertar_whatsapp_fija_portabilidad
		@codigo char(10),
		@dniasesor char(8),
		@nombre char(50),
		@dni char(8),
		@numeroReferencia char(11),
		@producto char(5),
		@promocion char(50),
		@tipoFija char(15),
		@telefono char(11),
		@planFija char(50),
		@modofija char(4),
		@formaDePago char(10),
		@sec char(15),
		@estado char(1),
		@observacion varchar(300),
		@ubicacion char(100),
		@distrito char(25)
		as
		begin
			insert into whatsapp(codigo,dniAsesor,nombre,dni,telefono,producto,lineaProcedente,operadorCedente,modalidad,tipo,planR,equipo,formaDePago,numeroReferencia,sec,tipoFija,planFija,modoFija,estado,observaciones,promocion,ubicacion,distrito) values(@codigo,@dniasesor,@nombre,@dni,@telefono,@producto,'---','---','---','---','---','---',@formaDePago,@numeroReferencia,@sec,@tipoFija,@planFija,@modofija,@estado,@observacion,@promocion,@ubicacion,@distrito)
		end 
		go

		-- venta de fija linea nueva --
		--drop procedure if exists sp_insertar_whatsapp_fija_lineanueva
		create procedure sp_insertar_whatsapp_fija_lineanueva
		@codigo char(10),
		@dniasesor char(8),
		@nombre char(50),
		@dni char(8),
		@numeroReferencia char(11),
		@producto char(5),
		@promocion char(50),
		@tipoFija char(15),
		@planFija char(50),
		@modofija char(4),
		@formaDePago char(10),
		@sec char(15),
		@estado char(1),
		@observacion varchar(300),
		@ubicacion char(100),
		@distrito char(25)
		as
		begin
			insert into whatsapp(codigo,dniAsesor,nombre,dni,telefono,producto,lineaProcedente,operadorCedente,modalidad,tipo,planR,equipo,formaDePago,numeroReferencia,sec,tipoFija,planFija,modoFija,estado,observaciones,promocion,ubicacion,distrito) values(@codigo,@dniasesor,@nombre,@dni,'---',@producto,'---','---','---','---','---','---',@formaDePago,@numeroReferencia,@sec,@tipoFija,@planFija,@modofija,@estado,@observacion,@promocion,@ubicacion,@distrito)
		end 
		go

	-- insercion de whatsapp movil --
		
		-- venta de movil en linea nueva --
			
			-- linea nueva en postpago --
			--drop procedure if exists sp_insertar_whatsapp_movil_lineanueva_postpago
			create procedure sp_insertar_whatsapp_movil_lineanueva_postpago
			@codigo char(10),
			@dniasesor char(8),
			@nombre char(50),
			@dni char(8),
			@numeroReferencia char(11),
			@producto char(5),
			@promocion char(50),
			@tipo char(15),
			@modalidad char(8),
			@planR char(50),
			@equipo char(50),
			@formaDePago char(10),
			@sec char(15),
			@estado char(1),
			@observacion varchar(300),
			@ubicacion char(100),
			@distrito char(25)
			as
			begin
				insert into whatsapp(codigo,dniAsesor,nombre,dni,telefono,producto,lineaProcedente,operadorCedente,modalidad,tipo,planR,equipo,formaDePago,numeroReferencia,sec,tipoFija,planFija,modoFija,estado,observaciones,promocion,ubicacion,distrito) values(@codigo,@dniasesor,@nombre,@dni,'---',@producto,'---','---',@modalidad,@tipo,@planR,@equipo,@formaDePago,@numeroReferencia,@sec,'---','---','---',@estado,@observacion,@promocion,@ubicacion,@distrito)
			end 
			go

			-- linea nueva en prepago --
			--drop procedure if exists sp_insertar_whatsapp_movil_lineanueva_prepago
			create procedure sp_insertar_whatsapp_movil_lineanueva_prepago
			@codigo char(10),
			@dniasesor char(8),
			@nombre char(50),
			@dni char(8),
			@numeroReferencia char(11),
			@producto char(5),
			@promocion char(50),
			@tipo char(15),
			@modalidad char(8),
			@equipo char(50),
			@formaDePago char(10),
			@sec char(15),
			@estado char(1),
			@observacion varchar(300),
			@ubicacion char(100),
			@distrito char(25)
			as
			begin
				insert into whatsapp(codigo,dniAsesor,nombre,dni,telefono,producto,lineaProcedente,operadorCedente,modalidad,tipo,planR,equipo,formaDePago,numeroReferencia,sec,tipoFija,planFija,modoFija,estado,observaciones,promocion,ubicacion,distrito) values(@codigo,@dniasesor,@nombre,@dni,'---',@producto,'---','---',@modalidad,@tipo,'---',@equipo,@formaDePago,@numeroReferencia,@sec,'---','---','---',@estado,@observacion,@promocion,@ubicacion,@distrito)
			end 
			go

		-- venta de movil en portabilidad --
			
			-- portabilidad en postpago --
			--drop procedure if exists sp_insertar_whatsapp_movil_portabilidad_postpago
			create procedure sp_insertar_whatsapp_movil_portabilidad_postpago
			@codigo char(10),
			@dniasesor char(8),
			@nombre char(50),
			@dni char(8),
			@numeroReferencia char(11),
			@producto char(5),
			@promocion char(50),
			@tipo char(15),
			@telefono char(11),
			@lineaProcedente char(8),
			@operadorCedente char(15),
			@modalidad char(8),
			@planR char(50),
			@equipo char(50),
			@formaDePago char(10),
			@sec char(15),
			@estado char(1),
			@observacion varchar(300),
			@ubicacion char(100),
			@distrito char(25)
			as
			begin
				insert into whatsapp(codigo,dniAsesor,nombre,dni,telefono,producto,lineaProcedente,operadorCedente,modalidad,tipo,planR,equipo,formaDePago,numeroReferencia,sec,tipoFija,planFija,modoFija,estado,observaciones,promocion,ubicacion,distrito) values(@codigo,@dniasesor,@nombre,@dni,@telefono,@producto,@lineaProcedente,@operadorCedente,@modalidad,@tipo,@planR,@equipo,@formaDePago,@numeroReferencia,@sec,'---','---','---',@estado,@observacion,@promocion,@ubicacion,@distrito)
			end 
			go

			-- portabilidad en prepago --
			--drop procedure if exists sp_insertar_whatsapp_movil_portabilidad_prepago
			create procedure sp_insertar_whatsapp_movil_portabilidad_prepago
			@codigo char(10),
			@dniasesor char(8),
			@nombre char(50),
			@dni char(8),
			@numeroReferencia char(11),
			@producto char(5),
			@promocion char(50),
			@tipo char(15),
			@telefono char(11),
			@lineaProcedente char(8),
			@operadorCedente char(15),
			@modalidad char(8),
			@equipo char(50),
			@formaDePago char(10),
			@sec char(15),
			@estado char(1),
			@observacion varchar(300),
			@ubicacion char(100),
			@distrito char(25)
			as
			begin
				insert into whatsapp(codigo,dniAsesor,nombre,dni,telefono,producto,lineaProcedente,operadorCedente,modalidad,tipo,planR,equipo,formaDePago,numeroReferencia,sec,tipoFija,planFija,modoFija,estado,observaciones,promocion,ubicacion,distrito) values(@codigo,@dniasesor,@nombre,@dni,@telefono,@producto,@lineaProcedente,@operadorCedente,@modalidad,@tipo,'---',@equipo,@formaDePago,@numeroReferencia,@sec,'---','---','---',@estado,@observacion,@promocion,@ubicacion,@distrito)
			end 
			go

		-- venta de movil en renovacion --
			
			-- renovacion en postpago --
			--drop procedure if exists sp_insertar_whatsapp_movil_renovacion_postpago
			create procedure sp_insertar_whatsapp_movil_renovacion_postpago
			@codigo char(10),
			@dniasesor char(8),
			@nombre char(50),
			@dni char(8),
			@numeroReferencia char(11),
			@producto char(5),
			@promocion char(50),
			@tipo char(15),
			@telefono char(11),
			@lineaProcedente char(8),
			@modalidad char(8),
			@planR char(50),
			@equipo char(50),
			@formaDePago char(10),
			@sec char(15),
			@estado char(1),
			@observacion varchar(300),
			@ubicacion char(100),
			@distrito char(25)
			as
			begin
				insert into whatsapp(codigo,dniAsesor,nombre,dni,telefono,producto,lineaProcedente,operadorCedente,modalidad,tipo,planR,equipo,formaDePago,numeroReferencia,sec,tipoFija,planFija,modoFija,estado,observaciones,promocion,ubicacion,distrito) values(@codigo,@dniasesor,@nombre,@dni,@telefono,@producto,@lineaProcedente,'---',@modalidad,@tipo,@planR,@equipo,@formaDePago,@numeroReferencia,@sec,'---','---','---',@estado,@observacion,@promocion,@ubicacion,@distrito)
			end 
			go

			--renovacion en prepago --
			--drop procedure if exists sp_insertar_whatsapp_movil_renovacion_prepago
			create procedure sp_insertar_whatsapp_movil_renovacion_prepago
			@codigo char(10),
			@dniasesor char(8),
			@nombre char(50),
			@dni char(8),
			@numeroReferencia char(11),
			@producto char(5),
			@promocion char(50),
			@tipo char(15),
			@telefono char(11),
			@lineaProcedente char(8),
			@modalidad char(8),
			@equipo char(50),
			@formaDePago char(10),
			@sec char(15),
			@estado char(1),
			@observacion varchar(300),
			@ubicacion char(100),
			@distrito char(25)
			as
			begin
				insert into whatsapp(codigo,dniAsesor,nombre,dni,telefono,producto,lineaProcedente,operadorCedente,modalidad,tipo,planR,equipo,formaDePago,numeroReferencia,sec,tipoFija,planFija,modoFija,estado,observaciones,promocion,ubicacion,distrito) values(@codigo,@dniasesor,@nombre,@dni,@telefono,@producto,@lineaProcedente,'---',@modalidad,@tipo,'---',@equipo,@formaDePago,@numeroReferencia,@sec,'---','---','---',@estado,@observacion,@promocion,@ubicacion,@distrito)
			end 
			go



-- edicion de ventas whatsapp --

	-- edicion de whatsapp fija --

		-- venta de fija portabilidad --
		--drop procedure if exists sp_editar_whatsapp_fija_portabilidad
		create procedure sp_editar_whatsapp_fija_portabilidad
		@codigo char(10),
		@dniasesor char(8),
		@nombre char(50),
		@dni char(8),
		@numeroReferencia char(11),
		@producto char(5),
		@promocion char(50),
		@tipoFija char(15),
		@telefono char(11),
		@planFija char(50),
		@modofija char(4),
		@formaDePago char(10),
		@sec char(15),
		@estado char(1),
		@observacion varchar(300),
		@ubicacion char(100),
		@distrito char(25)
		as
		begin
			declare @fechaUpdate datetime;
			set @fechaUpdate = getdate();
			update whatsapp set dniAsesor=@dniasesor, nombre=@nombre, dni=@dni, numeroReferencia=@numeroReferencia, producto=@producto, promocion=@promocion, tipoFija=@tipoFija, telefono=@telefono, planFija=@planFija, modoFija=@modofija, formaDePago=@formaDePago, sec=@sec, estado=@estado, observaciones=@observacion, ubicacion=@ubicacion, distrito=@distrito, fechaActualizacion=@fechaUpdate where codigo=@codigo
		end 
		go

		-- venta de fija linea nueva --
		--drop procedure if exists sp_editar_whatsapp_fija_lineanueva
		create procedure sp_editar_whatsapp_fija_lineanueva
		@codigo char(10),
		@dniasesor char(8),
		@nombre char(50),
		@dni char(8),
		@numeroReferencia char(11),
		@producto char(5),
		@promocion char(50),
		@tipoFija char(15),
		@planFija char(50),
		@modofija char(4),
		@formaDePago char(10),
		@sec char(15),
		@estado char(1),
		@observacion varchar(300),
		@ubicacion char(100),
		@distrito char(25)
		as
		begin
			declare @fechaUpdate datetime;
			set @fechaUpdate = getdate();
			update whatsapp set dniAsesor=@dniasesor, nombre=@nombre, dni=@dni, numeroReferencia=@numeroReferencia, producto=@producto, promocion=@promocion, tipoFija=@tipoFija, planFija=@planFija, modoFija=@modofija, formaDePago=@formaDePago, sec=@sec, estado=@estado, observaciones=@observacion, ubicacion=@ubicacion, distrito=@distrito, fechaActualizacion=@fechaUpdate where codigo=@codigo
		end 
		go

	-- edicion de whatsapp movil --
		
		-- venta de movil en linea nueva --
			
			-- linea nueva en postpago --
			--drop procedure if exists sp_editar_whatsapp_movil_lineanueva_postpago
			create procedure sp_editar_whatsapp_movil_lineanueva_postpago
			@codigo char(10),
			@dniasesor char(8),
			@nombre char(50),
			@dni char(8),
			@numeroReferencia char(11),
			@producto char(5),
			@promocion char(50),
			@tipo char(15),
			@modalidad char(8),
			@planR char(50),
			@equipo char(50),
			@formaDePago char(10),
			@sec char(15),
			@estado char(1),
			@observacion varchar(300),
			@ubicacion char(100),
			@distrito char(25)
			as
			begin
				declare @fechaUpdate datetime;
				set @fechaUpdate = getdate();
				update whatsapp set dniAsesor=@dniasesor, nombre=@nombre, dni=@dni, numeroReferencia=@numeroReferencia, producto=@producto, promocion=@promocion, tipo=@tipo, modalidad=@modalidad, planR=@planR, equipo=@equipo, formaDePago=@formaDePago, sec=@sec, estado=@estado, observaciones=@observacion, ubicacion=@ubicacion, distrito=@distrito, fechaActualizacion=@fechaUpdate where codigo=@codigo
			end 
			go

			-- linea nueva en prepago --
			--drop procedure if exists sp_editar_whatsapp_movil_lineanueva_prepago
			create procedure sp_editar_whatsapp_movil_lineanueva_prepago
			@codigo char(10),
			@dniasesor char(8),
			@nombre char(50),
			@dni char(8),
			@numeroReferencia char(11),
			@producto char(5),
			@promocion char(50),
			@tipo char(15),
			@modalidad char(8),
			@equipo char(50),
			@formaDePago char(10),
			@sec char(15),
			@estado char(1),
			@observacion varchar(300),
			@ubicacion char(100),
			@distrito char(25)
			as
			begin
				declare @fechaUpdate datetime;
				set @fechaUpdate = getdate();
				update whatsapp set dniAsesor=@dniasesor, nombre=@nombre, dni=@dni, numeroReferencia=@numeroReferencia, producto=@producto, promocion=@promocion, tipo=@tipo, modalidad=@modalidad, equipo=@equipo, formaDePago=@formaDePago, sec=@sec, estado=@estado, observaciones=@observacion, ubicacion=@ubicacion, distrito=@distrito, fechaActualizacion=@fechaUpdate where codigo=@codigo
			end 
			go

		-- venta de movil en portabilidad --
			
			-- portabilidad en postpago --
			--drop procedure if exists sp_editar_whatsapp_movil_portabilidad_postpago
			create procedure sp_editar_whatsapp_movil_portabilidad_postpago
			@codigo char(10),
			@dniasesor char(8),
			@nombre char(50),
			@dni char(8),
			@numeroReferencia char(11),
			@producto char(5),
			@promocion char(50),
			@tipo char(15),
			@telefono char(11),
			@lineaProcedente char(8),
			@operadorCedente char(15),
			@modalidad char(8),
			@planR char(50),
			@equipo char(50),
			@formaDePago char(10),
			@sec char(15),
			@estado char(1),
			@observacion varchar(300),
			@ubicacion char(100),
			@distrito char(25)
			as
			begin
				declare @fechaUpdate datetime;
				set @fechaUpdate = getdate();
				update whatsapp set dniAsesor=@dniasesor, nombre=@nombre, dni=@dni, numeroReferencia=@numeroReferencia, producto=@producto, promocion=@promocion, tipo=@tipo, telefono=@telefono, lineaProcedente=@lineaProcedente, operadorCedente=@operadorCedente, modalidad=@modalidad, planR=@planR, equipo=@equipo, formaDePago=@formaDePago, sec=@sec, estado=@estado, observaciones=@observacion, ubicacion=@ubicacion, distrito=@distrito, fechaActualizacion=@fechaUpdate where codigo=@codigo
			end 
			go

			-- portabilidad en prepago --
			--drop procedure if exists sp_editar_whatsapp_movil_portabilidad_prepago
			create procedure sp_editar_whatsapp_movil_portabilidad_prepago
			@codigo char(10),
			@dniasesor char(8),
			@nombre char(50),
			@dni char(8),
			@numeroReferencia char(11),
			@producto char(5),
			@promocion char(50),
			@tipo char(15),
			@telefono char(11),
			@lineaProcedente char(8),
			@operadorCedente char(15),
			@modalidad char(8),
			@equipo char(50),
			@formaDePago char(10),
			@sec char(15),
			@estado char(1),
			@observacion varchar(300),
			@ubicacion char(100),
			@distrito char(25)
			as
			begin
				declare @fechaUpdate datetime;
				set @fechaUpdate = getdate();
				update whatsapp set dniAsesor=@dniasesor, nombre=@nombre, dni=@dni, numeroReferencia=@numeroReferencia, producto=@producto, promocion=@promocion, tipo=@tipo, telefono=@telefono, lineaProcedente=@lineaProcedente, operadorCedente=@operadorCedente, modalidad=@modalidad, equipo=@equipo, formaDePago=@formaDePago, sec=@sec, estado=@estado, observaciones=@observacion, ubicacion=@ubicacion, distrito=@distrito, fechaActualizacion=@fechaUpdate where codigo=@codigo
			end 
			go

		-- venta de movil en renovacion --
			
			-- renovacion en postpago --
			--drop procedure if exists sp_editar_whatsapp_movil_renovacion_postpago
			create procedure sp_editar_whatsapp_movil_renovacion_postpago
			@codigo char(10),
			@dniasesor char(8),
			@nombre char(50),
			@dni char(8),
			@numeroReferencia char(11),
			@producto char(5),
			@promocion char(50),
			@tipo char(15),
			@telefono char(11),
			@lineaProcedente char(8),
			@modalidad char(8),
			@planR char(50),
			@equipo char(50),
			@formaDePago char(10),
			@sec char(15),
			@estado char(1),
			@observacion varchar(300),
			@ubicacion char(100),
			@distrito char(25)
			as
			begin
				declare @fechaUpdate datetime;
				set @fechaUpdate = getdate();
				update whatsapp set dniAsesor=@dniasesor, nombre=@nombre, dni=@dni, numeroReferencia=@numeroReferencia, producto=@producto, promocion=@promocion, tipo=@tipo, telefono=@telefono, lineaProcedente=@lineaProcedente, modalidad=@modalidad, planR=@planR, equipo=@equipo, formaDePago=@formaDePago, sec=@sec, estado=@estado, observaciones=@observacion, ubicacion=@ubicacion, distrito=@distrito, fechaActualizacion=@fechaUpdate where codigo=@codigo
			end 
			go

			-- renovacion en prepago --
			--drop procedure if exists sp_editar_whatsapp_movil_renovacion_prepago
			create procedure sp_editar_whatsapp_movil_renovacion_prepago
			@codigo char(10),
			@dniasesor char(8),
			@nombre char(50),
			@dni char(8),
			@numeroReferencia char(11),
			@producto char(5),
			@promocion char(50),
			@tipo char(15),
			@telefono char(11),
			@lineaProcedente char(8),
			@modalidad char(8),
			@equipo char(50),
			@formaDePago char(10),
			@sec char(15),
			@estado char(1),
			@observacion varchar(300),
			@ubicacion char(100),
			@distrito char(25)
			as
			begin
				declare @fechaUpdate datetime;
				set @fechaUpdate = getdate();
				update whatsapp set dniAsesor=@dniasesor, nombre=@nombre, dni=@dni, numeroReferencia=@numeroReferencia, producto=@producto, promocion=@promocion, tipo=@tipo, telefono=@telefono, lineaProcedente=@lineaProcedente, modalidad=@modalidad, equipo=@equipo, formaDePago=@formaDePago, sec=@sec, estado=@estado, observaciones=@observacion, ubicacion=@ubicacion, distrito=@distrito, fechaActualizacion=@fechaUpdate where codigo=@codigo
			end 
			go
