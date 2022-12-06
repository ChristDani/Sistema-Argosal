<?php

$dni = 71574122;
$linkdni = "https://dniruc.apisperu.com/api/v1/dni/$dni?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6Im9saXZlcmRnMkBob3RtYWlsLmNvbSJ9.pnGANDWZM-k_JFQGPowjSinW949B3bfeqN-DIp9Fe_o";

$datos = json_decode(file_get_contents($linkdni), true);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="display:flex; gap:5px;">
        <p><?php echo $datos["nombres"] ?></p>
        <p><?php echo $datos["apellidoPaterno"] ?></p>
        <p><?php echo $datos["apellidoMaterno"] ?></p>
    </div>
</body>
</html>