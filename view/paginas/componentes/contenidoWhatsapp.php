
<input type="checkbox" name="btnModalW" id="btnModalW">

<div class="btnAgg">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Agregar Venta
    </button>
</div>

<div id="whatsapp" class="contenedor E">
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
        <button>Excel</button>
        <div class="buscar form-floating mb-3">                        
            <input class="a form-control form-control-sm" placeholder="Type to search..." name="busquedaW" id="busquedaW" onkeyup="getDataW(1);">
            <label for="busquedaW" class="form-label">Buscar</label>
        </div>
    </div>
    <div class="tabla">
        <center>
            <table class="table table-responsive-sm table-striped table-hover ">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">N°</th>
                        <!-- <th class="text-center">asesor</th> -->
                        <th class="text-center">nombre</th>
                        <!-- <th width="10%">dni</th> -->
                        <th class="text-center">telefono</th>
                        <!-- <th width="5%">producto</th> -->
                        <!-- <th width="5%">lineaProcedente</th>  -->
                        <!-- <th width="10%">operadorCedente</th> -->
                        <!-- <th class="text-center">modalidad</th> -->
                        <!-- <th width="10%">tipo</th> -->
                        <!-- <th width="10%">planR</th> -->
                        <!-- <th width="10%">equipo</th> -->
                        <!-- <th width="10%">formaDePago</th> -->
                        <th class="text-center">sec</th>
                        <!-- <th width="10%">tipoFija</th> -->
                        <!-- <th width="10%">planFija</th> -->
                        <th class="text-center">estado</th>
                        <th class="text-center">fechaRegistro</th>
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

<script src="controller/whatsapp/listarWhatsapp.js"></script>



<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Registrar venta</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body"> 
            <?php echo "<form action='controller/whatsapp/agregar.php?dni=$dni' method='post'>"; ?>
                <div class="form-floating mb-3">                
                    <div class="col-xs-2">
                        <!-- valor para mostrar -->
                        <center><label>Registrando venta como <?php echo "<em>$tusu</em>"; ?></label></center>
                        <!-- valor para llevar datos -->
                        <input hidden  name="asesor" id="asesor" value="<?php echo $tusu; ?>"> 
                    </div>
                </div>                 
                <div class="form-floating mb-3">
                    <input class="form-control" autocomplete="off" type="text" name="nombre" id="nombre" placeholder="Nombre del cliente..." required>
                    <label for="nombre">Nombre</label>
                </div>
                
                <div class="form-floating mb-3">                
                    <input class="form-control" autocomplete="off" type="text" name="dni" id="dni" maxlength=8 placeholder="DNI del cliente..." required oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                    <label for="dni">DNI</label>
                </div>
                
                <div class="form-floating mb-3">                
                    <input class="form-control" autocomplete="off" type="tel" name="telefono" id="telefono" maxlength=9 placeholder="999 999 999" required oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                    <label for="telefono">Telefono</label>
                </div>
                
                <div class="form-floating mb-3">                
                    <select class="form-select form-select-sm" name="producto" id="producto">
                        <option value="---" style="color: gray;">(vacio)</option>
                        <option hidden selected>Seleccione Producto</option>
                        <option value="Movil">Movil</option>
                        <option value="Fija">Fija</option>
                    </select>
                    <label for="producto">Producto</label>
                </div>

                <div class="form-floating mb-3 hidden" id="dtipo">                
                    <select class="form-select form-select-sm" name="tipo" id="tipo">
                        <option value="---" style="color: gray;">(vacio)</option>
                        <option hidden selected>Seleccione Tipo</option>
                        <option value="Portabilidad">Portabilidad</option>
                        <option value="Renovacion">Renovacion</option>
                    </select>
                    <label for="tipo">Tipo</label>
                </div>
                
                <div class="form-floating mb-3 hidden" id="dlineaProce">                
                    <select class="form-select form-select-sm" name="lineaProce" id="lineaProce">
                        <option value="---" style="color: gray;">(vacio)</option>
                        <option hidden selected>Seleccione Linea</option>
                        <option value="Postpago">Postpago</option>
                        <option value="Prepago">Prepago</option>
                    </select>
                    <label for="lineaProce">Linea Procedente</label>
                </div>
                
                <div class="form-floating mb-3 hidden" id="doperadorCeden">                
                    <select class="form-select form-select-sm" name="operadorCeden" id="operadorCeden">
                        <option value="---">---</option>
                        <option value="Movistar">Movistar</option>
                        <option value="Entel">Entel</option>
                        <option value="Bitel">Bitel</option>
                    </select>
                    <label for="operadorCeden">Operador Cedente</label>
                </div>
                
                <div class="form-floating mb-3 hidden" id="dmodalidad">                
                    <select class="form-select form-select-sm" name="modalidad" id="modalidad">
                        <option value="---">---</option>
                        <option value="Postpago">Postpago</option>
                        <option value="Prepago">Prepago</option>
                    </select>
                    <label for="modalidad">Modalidad</label>
                </div>
                
                
                <div class="form-floating mb-3 hidden" id="dplan">                
                    <select class="form-select form-select-sm" name="plan" id="plan">
                        <option value="---">---</option>
                        <option value="S/ 29.90 MAX">S/ 29.90 MAX</option>
                        <option value="S/ 39.90">S/ 39.90</option>
                        <option value="S/ 49.90">S/ 49.90</option>
                        <option value="S/ 55.90">S/ 55.90</option>
                        <option value="S/ 69.90 MAX ILIMITADO">S/ 69.90 MAX ILIMITADO</option>
                        <option value="S/ 79.90 MAX ILIMITADO">S/ 79.90 MAX ILIMITADO</option>
                        <option value="S/ 95.90 MAX ILIMITADO">S/ 95.90 MAX ILIMITADO</option>
                        <option value="S/ 109.90 MAX ILIMITADO">S/ 109.90 MAX ILIMITADO</option>
                        <option value="S/ 159.90 MAX ILIMITADO">S/ 159.90 MAX ILIMITADO</option>
                        <option value="S/ 189.90 MAX ILIMITADO">S/ 189.90 MAX ILIMITADO</option>
                        <option value="S/ 289.90 MAX ILIMITADO">S/ 289.90 MAX ILIMITADO</option>
                        <option value="S/ 95.00 MAX PLAY - NETFLIX">S/ 95.00 MAX PLAY - NETFLIX</option>
                        <option value="S/ 115.00 MAX PLAY - NETFLIX">S/ 115.00 MAX PLAY - NETFLIX</option>
                        <option value="S/ 145.00 MAX PLAY - NETFLIX">S/ 145.00 MAX PLAY - NETFLIX</option>
                    </select>
                    <label for="plan">Plan</label>
                </div>
                
                <div class="form-floating mb-3 hidden" id="dequipos">                
                    <select class="form-select form-select-sm" name="equipos" id="equipos">
                        <option value="---">---</option>
                        <option value="Chip">Chip</option>
                    </select>
                    <label for="equipos">Equipos</label>
                </div>
                
                <div class="form-floating mb-3 hidden" id="dformaPago">                
                    <select class="form-select form-select-sm" name="formaPago" id="formaPago">
                        <option value="---">---</option>
                        <option value="Contado">Contado</option>
                        <option value="Cuotas">Cuotas</option>
                    </select>
                    <label for="formaPago">Formas de Pago</label>
                </div>
                
                <div class="form-floating mb-3 hidden" id="dsec">                
                    <input class="form-control" autocomplete="off" type="text" name="sec" id="sec" placeholder="SEC..." oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                    <label for="sec">SEC</label>
                </div>
                
                
                <div class="form-floating mb-3 hidden" id="dtipoFija">                
                    <select class="form-select form-select-sm" name="tipoFija" id="tipoFija">
                        <option value="---" style="color: gray;">(vacio)</option>
                        <option hidden selected>Seleccione Tipo de Fija</option>
                        <option value="Portabilidad">Portabilidad</option>
                        <option value="Alta">Alta</option>
                    </select>
                    <label for="tipoFija">Tipo Fija</label>
                </div>
                
                <div class="form-floating mb-3 hidden" id="dplanFija">                
                    <select class="form-select form-select-sm" name="planFija" id="planFija">
                        <option value="---" style="color: gray;">(vacio)</option>
                        <option hidden selected>Seleccione Plan de Fija</option>
                        <option value="1 Play - Telefonia">1 Play - Telefonia</option>
                        <option value="1 Play - Television">1 Play - Television</option>
                        <option value="1 Play - Internet">1 Play - Internet</option>
                        <option value="2 Play - Telefonia + Internet">2 Play - Telefonia + Internet</option>
                        <option value="2 Play - Internet + Cable Avanzado">2 Play - Internet + Cable Avanzado</option>
                        <option value="2 Play - Internet + Cable Superior">2 Play - Internet + Cable Superior</option>
                        <option value="3 Play - Telefonia + Internet + Cable Avanzado">3 Play - Telefonia + Internet + Cable Avanzado</option>
                        <option value="3 Play - Telefonia + Internet + Cable Superior">3 Play - Telefonia + Internet + Cable Superior</option>
                    </select>
                    <label for="planFija">Plan Fija</label>
                </div> 
                
                <div class="form-floating mb-3 hidden" id="destado">                
                    <select class="form-select form-select-sm" name="estado" id="estado">
                        <option value="---" style="color: gray;">(vacio)</option>
                        <option value="---" hidden selected>Seleccione Estado</option>
                        <option value="Pendiente">Pendiente</option>
                        <option value="Concretado">Concretado</option>
                        <option value="No Requiere">No Requiere</option>
                    </select>
                    <label for="estado">Estado</label>
                </div>
                

            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <script src="controller/whatsapp/validaciones.js"></script>
