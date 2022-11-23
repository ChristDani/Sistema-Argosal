<div class="bare row d-flex justify-content-center align-items-center desaparecido" id="headerDac">
    <div class="col d-flex justify-content-start align-items-center">
        <div class="d-flex justify-content-center align-items-baseline">
            <p class="mx-1" for="numRegistrosE">Mostrar</p>
            <select name="numRegistrosE" id="numRegistrosE" class="mx-1 form-select" aria-label="Default select example">
                <option value="12">12</option>
                <option value="28">28</option>
                <option value="52">52</option>
                <option value="100">100</option>
            </select>
            <p class="mx-1" for="numRegistrosE">Registros</p>
        </div>
    </div>dac
    <div class="col d-flex justify-content-end">
        <div class="form-floating mx-1">
            <select class="form-select" aria-label="Floating label select example" name="busquedaER" id="busquedaER">
                <option value="">Todas</option>
                <option value="Norte">Norte</option>
                <option value="Lima">Lima</option>
                <option value="Sur">Sur</option>
                <option value="Centro">Centro</option>
            </select>
            <label for="busquedaER">Region</label>
        </div>

        <div class="form-floating mx-1">
            <input type="text" class="form-control" name="busquedaEC" id="busquedaEC" onkeyup="getDataE(1);" placeholder="Buscar">
            <label for="busquedaEC">Buscar CAC</label>
        </div>

        <div class="form-floating mx-1">
            <input type="text" class="form-control" name="busquedaE" id="busquedaE" onkeyup="getDataE(1);" placeholder="Buscar">
            <label for="busquedaE">Buscar Equipo</label>
        </div>
    </div>
</div>

<div class="row mb-4 desaparecido" id="resultadosDac">

</div>

<div class="bare d-flex justify-content-between mb-3 desaparecido" id="paginacionDac">
    <div class="mensaje">
        <h3 class="text-muted m-3" id="msgE"></h3>
    </div>
    <div id="munE">

    </div>
</div>