<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo TITLE; ?></title>
    </head>
    <body>
        <h1> Table List </h1>
                <table border="2">
                    <tr>
                        <td>Name</td>
                        <td>Select </td>
                        <td>Delete</td>
                    </tr>
                <?php
                $tblist=$facade->genericShowTables();
                foreach ($tblist as $index => $list){
                    echo"<tr>";
                    echo"<td>$list</td>";
                    echo"<td><a href='index.php?id=".SELECTABLE."&action=$index'><button>Select</button></a></td>";
                    echo"<td><a href='Borrar.php'><button>Deleted</button></a></td>";
                    echo "</tr>";
                }
                ?>
                </table>
        <br><a href='Borrar.php'><button>Create Table</button></a></td>
    </body>
</html>
