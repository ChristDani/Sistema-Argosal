<h1>REPORTES</h1>
<!-- <input type="text" name="vti" id="vti">
<input type="text" name="vci" id="vci">
<input type="text" name="vpi" id="vpi">
<input type="text" name="vri" id="vri"> -->
<p id="vt"></p>
<p id="vc"></p>
<p id="vp"></p>
<p id="vr"></p>
<input type="date" name="fecharequerida" id="fecharequerida">

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body text-center">
                    <div class="chart-container" tyle="position: relative; height:50vh; width:80vw">
                        <canvas id="bar"></canvas>
                    </div>                 
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body text-center">
                    <div class="chart-container" tyle="position: relative; height:40vh; width:80vw">
                        <canvas id="pie"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mb-3">
            <div class="card">
                <div class="card-head">
            <!-- <div class="col d-flex justify-content-start align-items-center">
                    <div class="d-flex justify-content-center align-items-baseline">
                        <p class="mx-1" for="numRegistrosW">Mostrar</p>
                        <select name="numRegistrosW" id="numRegistrosW" class="mx-1 form-select" aria-label="Default select example">
                            <option value="12">12</option>
                            <option value="28">28</option>
                            <option value="52">52</option>
                            <option value="100">100</option>
                        </select>
                        <p class="mx-1" for="numRegistrosW">Registros</p>
                    </div>
                </div>
                <div class="col d-flex justify-content-center align-items-center mb-2" id="wsp">
                    <a href="#" class="btn success-bg" onclick="exportTableToExcel('tablaWhats', 'Data-Whatsapp');">
                        <div>Excel</div>
                    </a>
                </div>
                <div class="col d-flex justify-content-end align-items-center">
                    <div class="form-floating">
                        <select class="form-select" aria-label="Floating label select example" name="busquedaestadowhats" id="busquedaestadowhats">
                            <option value="">Todos</option>
                            <option value="0">No Requiere</option>
                            <option value="2">Pendiente</option>
                            <option value="1">Concretado</option>
                        </select>
                        <label for="busquedaestadowhats">Estado</label>
                    </div>
                </div> 
                <div class="col d-flex justify-content-end align-items-center">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="busquedaW" placeholder="Buscar" onkeyup="getDataW(1); pasarDato();">
                        <label for="busquedaW">Buscar</label>
                    </div>
                </div> -->
                </div>
                <div class="card-body">
                    <table class="table table-responsive-xl color table-borderless">
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
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="controller/reportes/listar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="controller/reportes/statistics.js"></script>
    
        


