<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
