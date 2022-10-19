<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema | Argosal</title>
    <link rel="icon" href="view/static/img/icono.png">
    <link rel="stylesheet" href="view/static/style.css">
    <script src="view/static/script.js"></script>
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