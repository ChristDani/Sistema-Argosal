
<input type="checkbox" name="btnModalW" id="btnModalW">

<div id="whatsapp" class="contenedor">
    <div class="campos">
        <div class='mostrar'>
            <label for="numRegistrosW">Mostrar</label>
            <select name="numRegistrosW" id="numRegistrosW">
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
            <label for="numRegistrosW">Registros.</label>
        </div>
        <button>Excel</button>
        <div class='buscar'>
            <label for='busquedaW'>Buscar:</label>
            <input autocomplete="off" type="text" name="busquedaW" id="busquedaW" onkeyup="getDataW(1);">
        </div>
    </div>
    <div class="tabla">
        <center>
            <table border=1 width="100%">
                <thead>
                    <tr>
                        <th height=50px colspan=2><label for="btnModalW" class="btnModal">Agregar Venta</label></th>
                        <th colspan=8>Tabla de Datos Provinientes del Whatsapp</th>
                    </tr>
                    <tr>
                        <th width="6%">N°</th>
                        <th width="10%">Telefono</th>
                        <th width="30%">Nombre</th>
                        <th width="10%">Documento</th>
                        <th width="20%">Producto Solicitado</th>
                        <th width="5%">Promoción</th>
                        <th width="5%">Opción</th>
                        <th width="10%">Fecha</th>
                        <th width="10%">Estado</th>
                    </tr>
                </thead>
                <tbody id='resultadosW'>

                </tbody>
            </table>
        </center>
    </div>
    <div class="paginacion">
        <div class="mensaje">
            <label id="msgW"></label>
        </div>
        <div id="munW" class="pasar">

        </div>
    </div>
</div>

<script src="controller/whatsapp/listarWhatsapp.js"></script>

<div class="modal">
    <div class="contenido">
        <hgroup><h3>Agregar Venta</h3></hgroup>
        <form action="" method="post">

            <div>
                <label for="asesor">Asesor:</label>
                <input disabled type="text" name="asesor" id="asesor" value="<?php echo $tusu; ?>">
            </div>

            <div>
                <label for="nombre">Nombre:</label>
                <input autocomplete="off" type="text" name="nombre" id="nombre" placeholder="Nombre del cliente..." required>
            </div>
            
            <div>
                <label for="dni">DNI:</label>
                <input autocomplete="off" type="text" name="dni" id="dni" maxlength=8 placeholder="DNI del cliente..." required oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
            </div>
            
            <div>
                <label for="telefono">Telefono:</label>
                <input autocomplete="off" type="tel" name="telefono" id="telefono" maxlength=9 placeholder="999 999 999" required oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
            </div>

            <div>
                <label for="producto">Producto:</label>
                <select name="producto" id="producto">
                    <option value="Movil">Movil</option>
                    <option value="Fija">Fija</option>
                </select>
            </div>
            
            <div>
                <label for="lineaProce">Linea Procedente:</label>
                <select name="lineaProce" id="lineaProce">
                    <option value="Postpago">Postpago</option>
                    <option value="Prepago">Prepago</option>
                </select>
            </div>
            
            <div>
                <label for="operadorCeden">Operador Cedente:</label>
                <select name="operadorCeden" id="operadorCeden">
                    <option value="Claro">Claro</option>
                    <option value="Movistar">Movistar</option>
                    <option value="Entel">Entel</option>
                    <option value="Bitel">Bitel</option>
                </select>
            </div>
            
            <div>
                <label for="modalidad">Modalidad:</label>
                <select name="modalidad" id="modalidad">
                    <option value="Postpago">Postpago</option>
                    <option value="Prepago">Prepago</option>
                </select>
            </div>
            
            <div>
                <label for="tipo">Tipo:</label>
                <select name="tipo" id="tipo">
                    <option value="Portabilidad">Portabilidad</option>
                    <option value="Renovacion">Renovacion</option>
                </select>
            </div>
            
            <div>
                <label for="plan">Plan:</label>
                <select name="plan" id="plan">
                    <option value="S/ 29.90 MAX">S/ 29.90 MAX</option>
                    <option value="S/ 39.90">S/ 39.90</option>
                    <option value="S/ 49.90">S/ 49.90</option>
                    <option value="S/ 55.90">S/ 55.90</option>
                    <option value="S/ 69.90 MAX ILIMITADO">S/ 69.90 MAX ILIMITADO</option>
                    <option value="S/ 79.90 MAX ILIMITADO">S/ 79.90 MAX ILIMITADO</option>
                    <option value="S/ 95.90 MAX ILIMITADO">S/ 95.90 MAX ILIMITADO</option>
                    <option value="S/ 109.90 MAX ILIMITADO">S/ 109.90 MAX ILIMITADO</option>
                    <option value="S/ 159.90 MAX ILIMITADO">S/ 159.90 MAX ILIMITADO</option>
                    <option value="S/ 189.90 MAX ILIMITADO">S/ 189.90 MAX ILIMITADO</option>
                    <option value="S/ 289.90 MAX ILIMITADO">S/ 289.90 MAX ILIMITADO</option>
                    <option value="S/ 95.00 MAX PLAY - NETFLIX">S/ 95.00 MAX PLAY - NETFLIX</option>
                    <option value="S/ 115.00 MAX PLAY - NETFLIX">S/ 115.00 MAX PLAY - NETFLIX</option>
                    <option value="S/ 145.00 MAX PLAY - NETFLIX">S/ 145.00 MAX PLAY - NETFLIX</option>
                </select>
            </div>

            <div>
                <label for="equipos">Equipos:</label>
                <select name="equipos" id="equipos">
                    <option value="Chip">Chip</option>
                </select>
            </div>
            
            <div>
                <label for="formaPago">Formas de Pago:</label>
                <select name="formaPago" id="formaPago">
                    <option value="Contado">Contado</option>
                    <option value="Cuotas">Cuotas</option>
                </select>
            </div>

            <div>
                <label for="sec">SEC:</label>
                <input autocomplete="off" type="text" name="sec" id="sec" placeholder="SEC..." required oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
            </div>

            <div>
                <label for="estado">Estado:</label>
                <select name="estado" id="estado">
                    <option value="Pendiente">Pendiente</option>
                    <option value="Concretado">Concretado</option>
                    <option value="No Requiere">No Requiere</option>
                </select>
            </div>
            
            <div>
                <label for="tipoFija">Tipo Fija:</label>
                <select name="tipoFija" id="tipoFija">
                    <option value="Portabilidad">Portabilidad</option>
                    <option value="Alta">Alta</option>
                </select>
            </div>
            
            <div>
                <label for="planFija">Plan Fija:</label>
                <select name="planFija" id="planFija">
                    <option value="1 Play - Telefonia">1 Play - Telefonia</option>
                    <option value="1 Play - Television">1 Play - Television</option>
                    <option value="1 Play - Internet">1 Play - Internet</option>
                    <option value="2 Play - Telefonia + Internet">2 Play - Telefonia + Internet</option>
                    <option value="2 Play - Internet + Cable Avanzado">2 Play - Internet + Cable Avanzado</option>
                    <option value="2 Play - Internet + Cable Superior">2 Play - Internet + Cable Superior</option>
                    <option value="3 Play - Telefonia + Internet + Cable Avanzado">3 Play - Telefonia + Internet + Cable Avanzado</option>
                    <option value="3 Play - Telefonia + Internet + Cable Superior">3 Play - Telefonia + Internet + Cable Superior</option>
                </select>
            </div>








            <input type="submit" value="Guardar Venta">
        </form>
        <div class="cerrar">
            <label for="btnModalW">Cerrar</label>
        </div>
    </div>
</div>