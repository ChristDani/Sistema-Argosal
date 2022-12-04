<h1>REPORTES</h1>

<p class="d-none" id="vt"></p>
<p class="d-none" id="vc"></p>
<p class="d-none" id="vp"></p>
<p class="d-none" id="vr"></p>


<input type="date" name="fecharequerida" id="fecharequerida">


<div class="row">    
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



<div class="row">
    <div class="col-lg-12 mb-3">
        <div class="card">
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

<script src="controller/reportes/listar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="controller/reportes/statistics.js"></script>

        


