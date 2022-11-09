<div class="contenedor E">
    aca va la tabla de metas
</div>
<div class="contenedor E">
<div class="campos">
        <div class='mostrar'>
            <label for="numRegistrosVC">Mostrar</label>
            <select name="numRegistrosVC" id="numRegistrosVC">
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
            <label for="numRegistrosVC">Registros.</label>
        </div>
        <button onclick="exportTableToExcel('tablaVent', 'Data-Ventas-Concluidas')">Excel</button>
        <div class='buscar form-floating mb-3'>
            <input class="a form-control form-control-sm" placeholder="Type to search..."  autocomplete="off" type="text" name="busquedaVC" id="busquedaVC" onkeyup="getDataVC(1);">
            <label for='busquedaVC' class="form-label">Buscar</label>
        </div>
    </div>
    <div class="tabla">
        <center>
            <table id="tablaVent" class="table table-responsive-sm table-striped table-hover ">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">N°</th>
                        <th class="text-center">NOMBRE</th>
                        <th class="text-center">TELEFONO DE REFERENCIA</th>
                        <th class="text-center">PRODUCTO</th>
                        <th class="text-center">SEC</th>
                        <th class="text-center">ESTADO</th>
                        <th class="text-center">REGISTRO</th>
                        <th class="text-center">DETALLES</th>
                    </tr>
                </thead>
                <tbody id='resultadosVC'>

                </tbody>
            </table>
        </center>
    </div>
    <div class="paginacion">
        <div class="mensaje">
            <label id="msgVC"></label>
        </div>
        <div id="munVC" class="pasar">

        </div>
    </div>
</div>

<?php //include_once "whatsapp/modalDetallesWhatsapp.php"; ?>

<script src="controller/metas/listarVentasConc.js"></script>
<!-- <script src="controller/whatsapp/modal.js"></script> -->
