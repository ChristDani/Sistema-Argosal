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
        <button onclick="exportTableToExcel('tablaProduc', 'Data-Productos')">Excel</button>
        <div class="buscadores">
            <div class="form-floating">                
                <select class="region form-select form-select-sm" name="busquedaER" id="busquedaER">
                    <option value="" style="color: gray;">---</option>
                    <option value="Norte">Norte</option>
                    <option value="Lima">Lima</option>
                    <option value="Sur">Sur</option>
                    <option value="Centro">Centro</option>
                </select>
                <label for="busquedaER">Buscar Region</label>
            </div>
            <div class='buscar form-floating mb-3'>
                <input class="a form-control form-control-sm" placeholder="Type to search..."  autocomplete="off" type="text" name="busquedaEC" id="busquedaEC" onkeyup="getDataE(1);">
                <label for='busquedaEC' class="form-label">Buscar CAC</label>
            </div>
            <div class='buscar form-floating mb-3'>
                <input class="a form-control form-control-sm" placeholder="Type to search..."  autocomplete="off" type="text" name="busquedaE" id="busquedaE" onkeyup="getDataE(1);">
                <label for='busquedaE' class="form-label">Buscar Equipo</label>
            </div>
        </div>
    </div>
    <div class="tabla">
        <center>
            <table id="tablaProduc" class="table table-responsive-sm table-striped table-hover ">
                <thead class="table-dark">
                    <tr>
                    <th class="text-center">N°</th>
                    <th class="text-center">region</th>
                    <th class="text-center">nombre</th>
                    <th class="text-center">centro</th>
                    <th class="text-center">almacen</th>
                    <th class="text-center">nombreAlmacen</th>
                    <th class="text-center">material</th>
                    <th class="text-center">descripcion</th>
                    <th class="text-center">libres</th>
                    <th class="text-center">bloqueados</th>
                    <th class="text-center">Total</th>
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
