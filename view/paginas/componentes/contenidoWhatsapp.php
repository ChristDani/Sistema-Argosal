<div id="whatsapp" class="contenedor">
    <hgroup><h2>Whatsapp</h2></hgroup>
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