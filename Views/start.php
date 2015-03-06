<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo TITLE; ?></title>
    </head>
    <body>
        <form method="post" action="">
            
            <div>
                <?php
                    if(isset($_SESSION['errors'])){
                        //Errors::showErrors($_GET['errors']);
                        
                        echo $_SESSION['errors'];
                        
                        unset($_SESSION['errors']);
                    }
                
                ?>
                
            <div>
            User <input type="text" name="user" /><br>
            Password <input type="password" name="pass" /><br>
            Server Name <select size="1">
                <?php
                foreach ($list as $index => $server){
                    
                    echo"<option value='$index'>$server</option>";
                }
                
                ?>
            </select><input type="text"  name="id"  value="111" /><br>
            <input type="submit" value="Login" />
        </form>
    </body>
</html>
