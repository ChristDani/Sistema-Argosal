<?php include_once "componentes/header.php"; ?>
<?php include_once "componentes/footer.php"; ?>
<div class="contenPage">
    <?php 
    include_once "componentes/menuClientes.php";
    include_once "componentes/whatsapp/contenidoWhatsapp.php";
    if ($tipoU == 'director')
    {
        include_once "componentes/masiva/contenidoMasiva.php";
        }
        include_once "componentes/landing/contenidoLanding.php"; ?>
</div>

<script src="controller/xportExcelMasiva.js"></script>