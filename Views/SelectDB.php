<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo TITLE; ?></title>
    </head>
    <body>
        Select a Database<br>
        <form method="POST" action="index.php">
          Database List <select size="1" name="database">
                <?php
                $dblist=$facade->genericShowDatabases();
                foreach ($dblist as $index => $list){
                    echo"<option value='$list'>$list</option>";
                }
                ?>
          </select><input type="text"  name="id"  value="101" hidden /><br>
          <input type="submit" value="Select" />
        </form>
    </body>
</html>
