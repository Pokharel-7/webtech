<?php 
session_start();
?>
<html>
    <body>
        <?php 
        $_session["name"]="lagrandee";
        $_session["class"]= "webii";
        echo "session variables are set";
        ?>
    </body>
</html>