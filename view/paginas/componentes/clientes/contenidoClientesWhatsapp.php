<div class="bare row d-flex justify-content-center align-items-center" id="headerWhatsapp">
    <div class="col d-flex justify-content-start align-items-center">
        <div class="d-flex justify-content-center align-items-baseline">
            <p for="numRegistrosW">Mostrar</p>
            <select name="numRegistrosW" id="numRegistrosW" class="form-select" aria-label="Default select example">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <p for="numRegistrosW">Registros</p>
        </div>
    </div>
    <div class="col d-flex justify-content-between align-items-center">
        <a href="#" class="primary" type="button" data-bs-toggle="modal" data-bs-target="#AgregarWhatsapp">
            <ion-icon name="add-circle-outline"></ion-icon>
        </a>
    </div>
    <div class="col d-flex justify-content-center align-items-center" id="wsp">
        <a href="#" class="btn success-bg" onclick="exportTableToExcel('tablaWhats', 'Data-Whatsapp')">
            <div>Excel</div>
        </a>
    </div>

    <div class="col d-flex justify-content-end align-items-center">
        <div class="form-floating">
            <input type="text" class="form-control" id="busquedaW" placeholder="Buscar">
            <label for="busquedaW">Buscar</label>
        </div>
    </div>
</div>

<div class="row mb-4" id="resultadosW">
    
</div>
<div class="paginacion">
    <div class="mensaje">
        <label id="msgW"></label>
    </div>
    <div id="munW" class="pasar">

    </div>
</div>

<?php include_once "contenidoModalAgregarWhatsapp.php"; ?>
<?php //include_once "modalDetallesWhatsapp.php"; ?>

<script src="controller/whatsapp/listarWhatsapp.js"></script>     
