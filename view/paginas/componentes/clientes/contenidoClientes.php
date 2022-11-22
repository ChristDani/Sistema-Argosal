<div class="col d-flex justify-content-start align-items-center">          
    <h1>CLIENTES</h1>
    <div class="dropdown">
        <a class="dropdown-toggle d-flex align-items-baseline mx-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <h1 id="MostrarOrigenClientes">WHATSAPP</h1>
        </a>

        <ul class="dropdown-menu" id="origenClientes">
            <!-- <li><a class="dropdown-item" href="#" onclick="mostrarOrigenWhastapp();">WHATSAPP</a></li> -->
            <li><a class="dropdown-item" href="#" onclick="mostrarOrigenLanding();">LANDING</a></li>
        </ul>
    </div>        
</div>
<div class="card">
<?php include_once "whatsapp/contenidoClientesWhatsapp.php"; ?>
<?php include_once "landing/contenidoClientesLanding.php"; ?>
</div>

<!-- <div class="modal fade" id="Editar" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Editar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Aqui va la edicion
      </div>
      <div class="modal-footer d-flex justify-content-between">
        <button class="btn btn-secondary" data-bs-target="#Detalles" data-bs-toggle="modal">Volver</button>
        <button class="btn danger-bg">Guardar</button>
      </div>
    </div>
  </div>|
</div> -->