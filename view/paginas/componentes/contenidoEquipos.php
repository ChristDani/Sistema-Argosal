<div class="contenedor E">
<div class="campos">
        <div class='mostrar'>
            <label for="numRegistrosE">Mostrar</label>
            <select name="numRegistrosE" id="numRegistrosE">
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
            <label for="numRegistrosE">Registros.</label>
        </div>
        <button>Excel</button>
        <div class='buscar'>
            <label for='busquedaE'>Buscar:</label>
            <input autocomplete="off" type="text" name="busquedaE" id="busquedaE" onkeyup="getDataE(1);">
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
                <tbody id='resultadosE'>

                </tbody>
            </table>
        </center>
    </div>
    <div class="paginacion">
        <div class="mensaje">
            <label id="msgE"></label>
        </div>
        <div id="munE" class="pasar">

        </div>
    </div>
</div>

<script src="controller/equipos/listarEquipos.js"></script>
