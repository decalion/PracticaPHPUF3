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
                    echo"<td><a href='index.php?ids=".SELECTABLE."&action=$index'><button>Select</button></a></td>";
                    echo"<td><a href='index.php?ids=".CONFDELETETABLE."&action=$index'><button>Deleted</button></a></td>";
                    echo "</tr>";
                }
                ?>
                </table>
        <?php
            echo"<br><a href='index.php?ids=".CREATETABLE."'><button>Create Table</button></a></td>";
            echo"<br><a href='index.php?ids=".BACK."'><button>Volver</button></a></td>";
                
        ?>
    </body>
</html>
