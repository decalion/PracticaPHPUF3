<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo TITLE; ?></title>
    </head>
    <body>
        <h1>Database List</h1>
            <table border="2">
                <tr>
                    <td>Database List</td>
                    <td>Select</td>
                    <td>Deleted</td>
                    <td>Backup</td>
                </tr>
                <?php
                $dblist=$facade->genericShowDatabases();
                //print_r($dblist);
                foreach ($dblist as $index => $list){
                    echo "<tr>";
                    echo "<td> $list </td>";
                    echo "<td><a href='index.php?id=".SELECTDATABASE."&action=$index'><button>Select</button></a></td>";
                    echo "<td><a href='Borrar.php'><button>Deleted</button></a></td>";
                    echo "<td><a href='index.php?id=".BACKUPSVIEW."&action=$index''><button>Backup</button></a></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        <br><a href='Borrar.php'><button>Create Database</button></a></td>
    </body>
</html>
