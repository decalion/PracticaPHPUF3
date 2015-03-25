<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <?php
        if (isset($message) && $message != null) echo $message;
    ?>
    <form action="index.php" method="post">
        <label for="table">Tabla de la base de datos: </label>
        <input type="text" name="ctable" id="ctable"/>
        <br/>
        <br/>
        <label for="fields">Número de campos: </label>
        <input type="text" name="fields" id="fields" />
        <br/>
        <br/>
        
        <button type="submit" name="id" value=106>Enviar</button>
        <button type="submit" name="id" value=45>Volver</button>
    </form>
    </body>
</html>
