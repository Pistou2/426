<?php
/**
 * ETML
 * Author: Ruben Dos Santos
 * Date: 27.03.2017
 * Description:
 */

session_start();
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Logout</title>
    </head>
    <body>
        <h1>Logout Website</h1>
        <?php
            // Check if there is an active connection to destroy
            if (isset($_SESSION["s_login"])){
                session_unset();
                session_destroy();
                echo "<p>Session destroyed</p>";
            }
            else{
                echo "<p>No open session to destroy</p>";
            }
        ?>
        <p>
            <a href="login.php">Go to login...</a>
        </p>
    </body>
</html>