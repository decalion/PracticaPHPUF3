<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <?php
        if (isset($message) && $message!= null) echo "<p>" . $message . "</p>";
    ?>
    <form action="index.php" method="post">
        <button type="submit" name="ids" value=45>Volver</button>
    </form>
    </body>
</html>