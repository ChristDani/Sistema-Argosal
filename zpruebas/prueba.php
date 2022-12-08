<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>probando todo tipo de cosas</title>
</head>
<body>
    <form action="action.php" method="post" enctype="multipart/form-data">
        <label for="prueba">Ingrese el documento de prueba</label>
        <input type="file" name="prueba" id="prueba">
        <br>
        <label for="prueba">Ingrese el documento de dark</label>
        <input type="file" name="dark" id="dark">
        <br>
        <input type="submit" value="send">
    </form>
</body>
</html>