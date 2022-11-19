<div class="contenedor E">
    <hgroup>
        <h3>Meta en Ventas del Mes</h3>
    </hgroup>
    <div class="meta">
        <div class="card" style="width: 15%;">
            <div class="card-header">
                <h6 class="card-title">Meta Total de Ventas</h6>
            </div>
            <div class="card-body">
                <p class="card-text" id="totven">75</p>
                <div>
                    <progress value="100" max="100" min="0"></progress>
                    <small class="porcent">100%</small>
                </div>
            </div>
        </div>
        <div class="card" style="width: 15%;">
            <div class="card-header">
                <h6 class="card-title">Portabilidades Menores a S/69.90</h6>
            </div>
            <div class="card-body">
                <p class="card-text" id="portmen69">22</p>
                <div>
                    <progress value="29.3" max="100" min="0"></progress>
                    <small class="porcent">29.3%</small>
                </div>
            </div>
        </div>
        <div class="card" style="width: 15%;">
            <div class="card-header">
                <h6 class="card-title">Portabilidades Mayores a S/69.90</h6>
            </div>
            <div class="card-body">
                <p class="card-text" id="portmay69">25</p>
                <div>
                    <progress value="33.3" max="100" min="0"></progress>
                    <small class="porcent">33.3%</small>
                </div>
            </div>
        </div>
        <div class="card" style="width: 15%;">
            <div class="card-header">
                <h6 class="card-title">Altas Postpago</h6>
            </div>
            <div class="card-body">
                <p class="card-text" id="altpost">5</p>
                <div>
                    <progress value="6.7" max="100" min="0"></progress>
                    <small class="porcent">6.7%</small>
                </div>
            </div>
        </div>
        <div class="card" style="width: 15%;">
            <div class="card-header">
                <h6 class="card-title">Alta Prepago</h6>
            </div>
            <div class="card-body">
                <p class="card-text" id="altpre">1</p>
                <div>
                    <progress value="1.3" max="100" min="0"></progress>
                    <small class="porcent">1.3%</small>
                </div>
            </div>
        </div>
        <div class="card" style="width: 15%;">
            <div class="card-header">
                <h6 class="card-title">Portabilidad Prepago</h6>
            </div>
            <div class="card-body">
                <p class="card-text" id="portpre">1</p>
                <div>
                    <progress value="1.3" max="100" min="0"></progress>
                    <small class="porcent">1.3%</small>
                </div>
            </div>
        </div>
        <div class="card" style="width: 15%;">
            <div class="card-header">
                <h6 class="card-title">Renovación</h6>
            </div>
            <div class="card-body">
                <p class="card-text" id="reno">10</p>
                <div>
                    <progress value="13.3" max="100" min="0"></progress>
                    <small class="porcent">13.3%</small>
                </div>
            </div>
        </div>
        <div class="card" style="width: 15%;">
            <div class="card-header">
                <h6 class="card-title">HFC (Inc. FTTH)</h6>
            </div>
            <div class="card-body">
                <p class="card-text" id="ftth">10</p>
                <div>
                    <progress value="13.3" max="100" min="0"></progress>
                    <small class="porcent">13.3%</small>
                </div>
            </div>
        </div>
        <div class="card" style="width: 15%;">
            <div class="card-header">
                <h6 class="card-title">IFI</h6>
            </div>
            <div class="card-body">
                <p class="card-text" id="ifi">1</p>
                <div>
                    <progress value="1.3" max="100" min="0"></progress>
                    <small class="porcent">1.3%</small>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="contenedor E">
    <hgroup>
        <h3>Progreso en Ventas del Mes</h3>
    </hgroup>
    <div class="meta">
        <div class="card" id="cartatotaal">
            <div class="card-header">
                <h6 class="card-title">Progreso en la Meta Total de Ventas</h6>
            </div>
            <div class="card-body">
                <p class="card-text" id="progreTotVen"><?php echo $ventasTotalesPr; ?></p>
                <div>
                    <progress value="1.3" max="100" min="0" id="BarraProgreTotVen"></progress>
                    <small class="porcent" id="textProgreTotVen"></small>
                </div>
            </div>
        </div>
        <div class="card" id="cartaPortMen69">
            <div class="card-header">
                <h6 class="card-title">Progreso en Portabilidades Menores a S/69.90</h6>
            </div>
            <div class="card-body">
                <p class="card-text" id="progrevenprotmen69"><?php echo $ventasMen69; ?></p>
                <div>
                    <progress value="1.3" max="100" min="0" id="BarraProgrevenprotmen69"></progress>
                    <small class="porcent" id="textProgrevenprotmen69"></small>
                </div>
            </div>
        </div>
        <div class="card" id="cartaPortMay69">
            <div class="card-header">
                <h6 class="card-title">Progreso en Portabilidades Mayores a S/69.90</h6>
            </div>
            <div class="card-body">
                <p class="card-text" id="progrevenprotmay69"><?php echo $ventasMay69; ?></p>
                <div>
                    <progress value="1.3" max="100" min="0" id="BarraProgrevenprotmay69"></progress>
                    <small class="porcent" id="textProgrevenprotmay69"></small>
                </div>
            </div>
        </div>
        <div class="card" id="cartaAltPost">
            <div class="card-header">
                <h6 class="card-title">Progreso en Altas Postpago</h6>
            </div>
            <div class="card-body">
                <p class="card-text" id="progrevenaltpost"><?php echo $ventasAltPost; ?></p>
                <div>
                    <progress value="1.3" max="100" min="0" id="Barraprogrevenaltpost"></progress>
                    <small class="porcent" id="textprogrevenaltpost"></small>
                </div>
            </div>
        </div>
        <div class="card" id="cartaAltPre">
            <div class="card-header">
                <h6 class="card-title">Progreso en Alta Prepago</h6>
            </div>
            <div class="card-body">
                <p class="card-text" id="progrevenaltpre"><?php echo $ventasAltPre; ?></p>
                <div>
                    <progress value="1.3" max="100" min="0" id="BarraProgreVenAltPre"></progress>
                    <small class="porcent" id="textProgreVenAltPre"></small>
                </div>
            </div>
        </div>
        <div class="card" id="cartaPortPre">
            <div class="card-header">
                <h6 class="card-title">Progreso en Portabilidad Prepago</h6>
            </div>
            <div class="card-body">
                <p class="card-text" id="progreportprepa"><?php echo $ventasPortPre; ?></p>
                <div>
                    <progress value="1.3" max="100" min="0" id="BarraProgreportprepa"></progress>
                    <small class="porcent" id="textProgreportprepa"></small>
                </div>
            </div>
        </div>
        <div class="card" id="cartaReno">
            <div class="card-header">
                <h6 class="card-title">Progreso en Renovación</h6>
            </div>
            <div class="card-body">
                <p class="card-text" id="progrevenrenova"><?php echo $ventasReno; ?></p>
                <div>
                    <progress value="1.3" max="100" min="0" id="BarraProgrevenrenova"></progress>
                    <small class="porcent" id="textProgrevenrenova"></small>
                </div>
            </div>
        </div>
        <div class="card" id="cartaFtth">
            <div class="card-header">
                <h6 class="card-title">Progreso en HFC (Inc. FTTH)</h6>
            </div>
            <div class="card-body">
                <p class="card-text" id="progrevenfijaftth"><?php echo $ventasFijaFtth; ?></p>
                <div>
                    <progress value="1.3" max="100" min="0" id="BarraProgrevenfijaftth"></progress>
                    <small class="porcent" id="textProgrevenfijaftth"></small>
                </div>
            </div>
        </div>
        <div class="card" id="cartaIfi">
            <div class="card-header">
                <h6 class="card-title">Progreso en IFI</h6>
            </div>
            <div class="card-body">
                <p class="card-text" id="progrevenfijaifi"><?php echo $ventasFijaIfi; ?></p>
                <div>
                    <progress value="1.3" max="100" min="0" id="BarraProgrevenfijaifi"></progress>
                    <small class="porcent" id="textProgrevenfijaifi"></small>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="contenedor E">
    <h3>Tabla de Ventas Concluidas</h3>
</div> -->
<div class="contenedor E">
    <hgroup>
        <h3>
            Detalles de Ventas
        </h3>
    </hgroup>
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

<?php include_once "modalDetallesMetas.php"; ?>

<script src="controller/metas/listarVentasConc.js"></script>
<script src="controller/metas/modal.js"></script>
<script src="controller/metas/progres.js"></script>
