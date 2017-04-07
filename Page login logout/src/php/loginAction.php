<?php
session_start();
/**
 * ETML
 * Author: Ruben Dos Santos
 * Date: 27.03.2017
 * Description:
 */

$login = $_POST['login'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
/*$sessions = array();

// Gets the content of the text file and splits it by new lines storing them into an array
$fileContent = explode("\r\n", file_get_contents("SessionInfo.txt"));

// Separates each line of the text file by it's tabulation storing them into a multidimensional array
foreach ($fileContent as $line)
{
    $sessions[] = explode("\t", $line);
}

// Tests the login and password of each line until it finds a match
foreach ($sessions as $session)
{
    if($session[0] == $login && password_verify($session[1], $password)){
        $_SESSION['s_login'] = $login;
    }
}*/

if($login == "admin" && password_verify("1234", $password)){
    $_SESSION['s_login'] = $login;
}

// Redirects to the previous page
header('Location: login.php');