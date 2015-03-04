<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo TITLE; ?></title>
    </head>
    <body>
        <form method="post" action="">
            User <input type="text" name="user" /><br>
            Password <input type="password" name="pass" /><br>
            Server Name <select size="1">
                <?php
                foreach ($list as $server){
                    
                    echo"<option name='$server'>$server</option>";
                }
                
                ?>
            </select><br>
            <input type="submit" value="Login" />
        </form>
    </body>
</html>
