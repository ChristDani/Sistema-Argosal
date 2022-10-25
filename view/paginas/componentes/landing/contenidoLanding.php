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
        <button onclick="exportTableToExcel('tablaLand', 'Data-Landing')">Excel</button>
        <div class='buscar form-floating mb-3'>
            <input class="a form-control form-control-sm" placeholder="Type to search..." autocomplete="off" type="text" name="busquedaL" id="busquedaL" onkeyup="getDataL(1);">
            <label for='busquedaL' class="form-label">Buscar</label>
        </div>
    </div>
    <div class="tabla">
        <center>
            <table id="tablaLand" class="table table-responsive-sm table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">N°</th>
                        <th class="text-center">DOCUMENTO</th>
                        <th class="text-center">TELEFONO</th>
                        <th class="text-center">PLANES</th>
                        <th class="text-center">FECHA REGISTRO</th>
                        <th class="text-center">ESTADO</th>
                        <th></th>
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
