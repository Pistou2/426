<?php
session_start();
/**
 * ETML
 * Author: Ruben Dos Santos
 * Date: 27.03.2017
 * Description:
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<h1>Website</h1>
<?php
// Check if there is an active connection
if (isset($_SESSION['s_login'])){
    echo "<p>The connection is active. Login name: " . $_SESSION['s_login'] . ".</p>";
    echo "<p><a href=\"logout.php\">Logout...</a></p>";
}
else{
    echo "<p>No permission to see this page without being connected</p>";
    echo "<p><a href=\"login.php\">Back to login...</a></p>";
}
?>
</body>
</html>