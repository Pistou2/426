<?php
/**
 * ETML
 * Author: Ruben Dos Santos
 * Date: 27.03.2017
 * Description:
 */
session_start();

spl_autoload_register(function ($class){
    include 'Classes/'. $class .'.php';
});

    if ($_SERVER["REQUEST_METHOD"]){

        $database = new Database();
        //$database->connectToDatabase();

        $login = $password = "";
        $users = $database->getUsers();

        // Check Username
        if (empty($_POST['login'])){
            // ERROR TODO: ERROR
        }
        else{
            $login = $_POST['login'];
            // Clean the input (remove backslashes, trim and special chars)
            $database->cleanInput($login);
        }

        // Check Password
        if (empty($_POST['password'])){
            // ERROR TODO: ERROR
        }
        else{
            $password = $_POST['password'];
            // Clean the input (remove backslashes, trim and special chars)
            $database->cleanInput($password);
        }

        foreach ($users as $user){
            if ($user == $login){

            }
        }
    }

//TODO: CHECK IF LOGIN EXISTS ON DATABASE
//$_SESSION['s_login'] = $login;
//TODO: CHECK IF THE PASSWORD OF THE LOGIN IS CORRECT ON THE DATABASE
//$_SESSION['s_password'] = $password;

    /*function connect(){
        $login = $_POST['login'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if($login == "admin" && password_verify("1234", $password)){
            $_SESSION['s_login'] = $login;
        }
    }*/

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
    <h1>Login website</h1>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <!-- User interaction -->
        <p>
            Pseudo
            <input type="text" name="login" required>
            Mot de passe
            <input type="text" name="password" required>
            <input type="submit" value="ok" name="submit">
        </p>
    </form>

    <!-- Page to test the connection -->
    <p><a href="normalPage.php">Test connection...</a></p>
    </body>
</html>