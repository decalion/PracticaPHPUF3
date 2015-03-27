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
    <?php "<p>Has escogido " . $_SESSION['fields'] . " para la tabla " . $_SESSION['ctable'] . "</p>"; ?>

    <form action="index.php" method="post">
    <?php
        for ($i = 0; $i < $_SESSION['fields']; $i++){
            echo "<label for=\"name" . $i . "\">Campo " . ($i + 1) . ":</label>";
            echo "<input type=\"text\" name=\"name" . $i . "\" id=\"name" . $i . "\" />";
            echo "&nbsp;&nbsp;";
            echo "<label for=\"type" . $i . "\">Tipo: </label>";
            echo "<select name=\"type" . $i . "\" id=\"type" . $i ."\" >";
                echo "<option value=\"varchar\">varchar</option>";
                echo "<option value=\"tinyint\">tinyint</option>";
                echo "<option value=\"int\">int</option>";
                echo "<option value=\"smallint\">smallint</option>";
                echo "<option value=\"char\">char</option>";
                echo "<option value=\"boolean\">bool</option>";
            echo "</select>";
            echo "&nbsp;&nbsp";
            echo "<label for=\"size" . $i . "\">Medida:</label>";
            echo "<input type=\"text\" name=\"size" . $i . "\" id=\"size" . $i . "\" />";
            echo "&nbsp;&nbsp";
            echo "<label for=\"primarykey" . $i . "\">Clave primaria:</label>";
            echo "<input type=\"radio\" value=\"" . $i . "\" name=\"pKey\" id=\"primaryKey" . $i . "\" />";
            echo "&nbsp;&nbsp";
            echo "<label for=\"notNull" . $i . "\">Not null:</label>";
            echo "<input type=\"checkbox\" name=\"notNull" . $i . "\" id=\"notNull" . $i . "\" />";
            echo "<br/><br/>";
        }
    ?>
        <button type="submit" name="ids" value=107>Enviar</button>
        <button type="submit" name="ids" value=45>Volver</button>
    </form>
    </body>
</html>
