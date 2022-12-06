<p class="d-none" id="vt"></p>
<p class="d-none" id="vc"></p>
<p class="d-none" id="vp"></p>
<p class="d-none" id="vr"></p>

<div class="d-flex gap-3 align-items-start">
    <h1>REPORTES</h1>
    <input type="date" class="form-control-sm " name="fecharequerida" id="fecharequerida">
</div>

<div class="row">
    <div class="col-lg-12 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="bare row d-flex justify-content-center align-items-center">
                    <div class="col d-flex justify-content-start align-items-center">
                        <div class="d-flex justify-content-center align-items-baseline">
                            <p class="mx-1" for="numRegistrosRM">Mostrar</p>
                            <select name="numRegistrosRM" id="numRegistrosRM" class="mx-1 form-select" aria-label="Default select example">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <p class="mx-1" for="numRegistrosRM">Registros</p>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-end align-items-center">
                        <div class="form-floating">
                            <select class="form-select" aria-label="Floating label select example" name="busquedaestadoRM" id="busquedaestadoRM">
                                <option value="">Todos</option>
                                <option value="0">No Requiere</option>
                                <option value="2">Pendiente</option>
                                <option value="1">Concretado</option>
                            </select>
                            <label for="busquedaestadoRM">Estado</label>
                        </div>
                    </div> 
                    <div class="col d-flex justify-content-end align-items-center">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="busquedaRM" placeholder="Buscar" onkeyup="getDataRM(1);ahsdgjahdgasd();">
                            <label for="busquedaRM">Buscar</label>
                        </div>
                    </div>
                </div>
                <table class="table table-responsive-xl color">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">N</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Producto</th>
                            <th scope="col">SEC</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Registro</th>
                            <th scope="col">Detalles</th>
                        </tr>
                    </thead>
                    <tbody id="resultadosRM">
                        <tr>
                            <th scope="row" colspan="8" height="80" class="text-center text-muted">Sin resultados...</th>
                        </tr>
                    </tbody>
                </table>
                <div class="bare row d-flex justify-content-between">
                    <div id="munRM" class="col">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" id="graficosfeos">    
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="chart-container" style="position: relative; height:50%; width:100%">
                    <canvas id="pie"></canvas>
                </div>
            </div>
        </div>
    </div>   

    <div class="col-lg-6">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="chart-container" style="position: relative; height:45%; width:100%">
                        <canvas id="bar"></canvas>
                    </div>  
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="chart-container" style="position: relative; height:45%; width:100%">
                        <canvas id="line"></canvas>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div>

<?php include_once "modaldetallereportemes.php"; ?>

<script src="controller/reportes/listar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="controller/reportes/estadisticas.js"></script>
<script src="controller/reportes/modal.js"></script>
<!-- <script src="controller/reportes/estadisticas.js?v=01"></script> -->

        


