<div class="row">
    <a class="delete btn col" data-bs-toggle="modal" data-bs-target="#Eliminar" onclick="eliminarUsuario('<?php echo$u[0];?>','<?php echo trim($u[1]);?>');">
        <?php if ($u[6] === "0") { ?>
            <div class="profile-photo">
                <img class="img-fluid" src="view/static/ProfileIMG/<?php echo trim($u[7]);?>">   
            </div>
        <?php }elseif ($u[6] === "1") { ?>
            <div class="profile-photo">
                <img class="img-fluid" src="view/static/ProfileIMG/<?php echo trim($u[7]);?>">   
            </div>
        <?php }elseif ($u[6] === "2") { ?>
            <div class="profile-photo">
                <img class="img-fluid" src="view/static/ProfileIMG/<?php echo trim($u[7]);?>">   
            </div>
        <?php }elseif ($u[6] === "3") { ?>
            <div class="profile-photo">
                <img class="img-fluid" src="view/static/ProfileIMG/<?php echo trim($u[7]);?>">   
            </div>
        <?php } ?>                                                    
        <h2><?php echo strtoupper($u[1]); ?></h2>            
        <?php if ($u[3] === "1") { ?>
        <h4 class="text-muted text-start">Administrador</h4>
        <?php }elseif ($u[3] === "0") { ?>
        <h4 class="text-muted text-start">Asesor</h4>
        <?php } ?>
    </a>
</div>

