<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema | Argosal</title>
        <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="icon" href="view/static/img/icono.png">
    <link rel="stylesheet" href="view/static/styleLogin.css">
    <link rel="stylesheet" href="view/static/style.css">
    <link rel="stylesheet" href="view/static/reset.css">
    <script src="view/static/script.js"></script>

    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
    <!-- <script src="controller/whatsapp/modal.js"></script> -->
</head>
<body>
    <?php 
    require_once("model/usuarios.php");
    if (isset($_GET["pagina"])) 
    {
        if (session_start())
        {
            $dni=$_GET['dni'];
    
            $consultas=new user();
            $filas2=$consultas->buscarUser($dni);
    
            foreach($filas2 as $columna) 
            {
                $tusu=$columna[1];
                $tipoU=$columna[3];
            }

            if($_GET["pagina"]==="clientes")
            {
                include_once "paginas/clientes.php";
            }
            elseif ($_GET["pagina"]==="equipos") 
            {
                include_once "paginas/equipos.php";
            }
            elseif ($_GET["pagina"]==="metas") 
            {
                include_once "paginas/metas.php";
            }
            else {
                session_destroy();
                header("location: ./");
            }
        }
    }
    else
    {
        
        include_once "paginas/login.php";
        
    }
    ?>

</body>
</html>