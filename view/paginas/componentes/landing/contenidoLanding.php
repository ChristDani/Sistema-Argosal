<div id="landing" class="contenedor">
    <div class="campos">
        <div class='mostrar'>
            <label for="numRegistrosL">Mostrar</label>
            <select name="numRegistrosL" id="numRegistrosL">
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
            <label for="numRegistrosL">Registros.</label>
        </div>
        <button>Excel</button>
        <div class='buscar'>
            <label for='busquedaL'>Buscar:</label>
            <input autocomplete="off" type="text" name="busquedaL" id="busquedaL" onkeyup="getDataL(1);">
        </div>
    </div>
    <div class="tabla">
        <center>
            <table border=1 width="100%">
                <thead>
                    <tr>
                        <th height=50px colspan=1>Agregar Venta</th>
                        <th colspan=7>Tabla de Datos Provinientes de la Landing</th>
                    </tr>
                    <tr>
                        <th width="6%">N°</th>
                        <th width="10%">documento</th>
                        <th width="10%">telefono</th>
                        <th width="10%">planes</th>
                        <th width="10%">fecha Registro</th>
                        <th width="10%">estado</th>
                    </tr>
                </thead>
                <tbody id='resultadosL'>

                </tbody>
            </table>
        </center>
    </div>
    <div class="paginacion">
        <div class="mensaje">
            <label id="msgL"></label>
        </div>
        <div id="munL" class="pasar">

        </div>
    </div>
</div>

<div id="aggLand" class="btnAggLand">
    <button type="button" class="btn agg btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Agregar Venta
    </button>
</div>

<script src="controller/landing/listarLanding.js"></script>
