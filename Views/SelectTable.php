<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo TITLE; ?></title>
    </head>
    <body>
        <form method="POST" action="index.php">
            <h1> Table List </h1>
                <table>
                    <tr>
                        <td>Name</td>
                        <td>Select </td>
                        <td>Add</td>
                        <td>Delete</td>
                    </tr>
                <?php
                $tblist=$facade->genericShowTables();
                foreach ($tblist as $index => $list){
                    echo"<tr>";
                    echo"<td>$list</td>";
                    echo"<td><button>Select</button></td>";
                    echo"<td><button>Add</button></td>";
                    echo"<td><button>Deleted</button></td>";
                    echo "</tr>";
                }
                ?>
                </table>
          <input type="text"  name="id"  value="101" hidden /><br>
          <input type="submit" value="Select" />
        </form>
    </body>
</html>
