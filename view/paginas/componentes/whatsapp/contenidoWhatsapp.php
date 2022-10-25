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
        <button onclick="exportTableToExcel('tablaWhats', 'Data-Whatsapp')">Excel</button>
        <div class="buscar form-floating mb-3">                        
            <input class="a form-control form-control-sm" placeholder="Type to search..." autocomplete="off" type="text" name="busquedaW" id="busquedaW" onkeyup="getDataW(1);">
            <label for="busquedaW" class="form-label">Buscar</label>
        </div>
    </div>
    <div class="tabla">
        <center>
            <table id="tablaWhats" class="table table-responsive-sm table-striped table-hover ">
                <thead class="table-dark">
                    <tr>
                        <!-- <th ></th> -->
                        <th class="text-center">N°</th>
                        <!-- <th class="text-center">asesor</th> -->
                        <th class="text-center">NOMBRE</th>
                        <!-- <th class="text-center">dni</th> -->
                        <th class="text-center">TELEFONO</th>
                        <th class="text-center">PRODUCTO</th>
                        <!-- <th class="text-center">lineaProcedente</th>  -->
                        <!-- <th class="text-center">operadorCedente</th> -->
                        <!-- <th class="text-center">modalidad</th> -->
                        <!-- <th class="text-center">tipo</th> -->
                        <!-- <th class="text-center">planR</th> -->
                        <!-- <th class="text-center">equipo</th> -->
                        <!-- <th class="text-center">formaDePago</th> -->
                        <th class="text-center">SEC</th>
                        <!-- <th class="text-center">tipoFija</th> -->
                        <!-- <th class="text-center">planFija</th> -->
                        <th class="text-center">ESTADO</th>
                        <th class="text-center">REGISTRO</th>
                        <th ></th>
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

<div id="aggWhats" class="btnAggWhats">
    <button type="button" class="btn agg btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Agregar Venta
    </button>
</div>

<script src="controller/whatsapp/listarWhatsapp.js"></script>
<script src="controller/whatsapp/modal.js"></script>

<?php include_once "modalGuardarWhatsapp.php"; ?>
<?php include_once "modalDetallesWhatsapp.php"; ?>
