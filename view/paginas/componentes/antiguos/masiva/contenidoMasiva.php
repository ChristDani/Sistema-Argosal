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
        <div class='buscar form-floating mb-3'>
            <input class="a form-control form-control-sm" placeholder="Type to search..." autocomplete="off" type="text" name="busquedaM" id="busquedaM" onkeyup="getDataM(1);">
            <label for='busquedaM' class="form-label">Buscar</label>
        </div>
    </div>
    <div class="tabla">
        <center>
            <table id="tablaMasi" class="table table-responsive-sm table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">N°</th>
                        <th class="text-center">DOCUMENTO</th>
                        <th class="text-center">NOMBRES</th>
                        <th class="text-center">CELULAR</th>
                        <th class="text-center">ACTIVACION</th>
                        <th class="text-center">OPERADOR</th>
                        <th class="text-center">PLAN</th>
                        <!-- <th class="text-center">DIRECCION</th> -->
                        <!-- <th class="text-center">DISTRITO</th> -->
                        <!-- <th class="text-center">PROVINCIA</th> -->
                        <!-- <th class="text-center">DEPARTAMENTO</th> -->
                        <th class="text-center">ESTADO</th>
                        <th></th>
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

<script src="controller/masiva/listarMasiva.js"></script>