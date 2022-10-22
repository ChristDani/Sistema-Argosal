<div id="masiva" class="contenedor">
    <div class="campos">
        <div class='mostrar'>
            <label for="numRegistrosM">Mostrar</label>
            <select name="numRegistrosM" id="numRegistrosM">
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
            <label for="numRegistrosM">Registros.</label>
        </div>
        <button onclick="exportTableToExcel('tablaMasi', 'Data-Masiva')">Excel</button>
        <div class='buscar'>
            <label for='busquedaM'>Buscar:</label>
            <input autocomplete="off" type="text" name="busquedaM" id="busquedaM" onkeyup="getDataM(1);">
        </div>
    </div>
    <div class="tabla">
        <center>
            <table id="tablaMasi" border=1 width="100%">
                <thead>
                    <tr>
                        <th height=50px colspan=13>Tabla de Datos Provinientes de la Data Masiva</th>
                    </tr>
                    <tr>
                        <th width="6%">N°</th>
                        <th width="10%">Documento</th>
                        <th width="10%">Nombres</th>
                        <th width="10%">Celular</th>
                        <th width="10%">Activacion</th>
                        <th width="10%">Operador</th>
                        <th width="10%">Plan</th>
                        <th width="10%">Dirección</th>
                        <th width="10%">Distrito</th>
                        <th width="10%">Provincia</th>
                        <th width="10%">Departamento</th>
                        <th width="10%">Estado</th>
                    </tr>
                </thead>
                <tbody id='resultadosM'>

                </tbody>
            </table>
        </center>
    </div>
    <div class="paginacion">
        <div class="mensaje">
            <label id="msgM"></label>
        </div>
        <div id="munM" class="pasar">

        </div>
    </div>
</div>

<script src="controller/masiva/xportExcelMasiva.js"></script>
<script src="controller/masiva/listarMasiva.js"></script>