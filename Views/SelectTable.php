<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo TITLE; ?></title>
    </head>
    <body>
        <form method="POST" action="index.php">
          Table List <select size="1" name="database">
                <?php
                $tblist=Facade::genericShowTables();
                foreach ($tblist as $index => $list){
                    echo"<option value='$list'>$list</option>";
                }
                ?>
          </select><input type="text"  name="id"  value="101" hidden /><br>
          <input type="submit" value="Select" />
        </form>
    </body>
</html>
