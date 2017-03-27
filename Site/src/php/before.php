<!DOCTYPE html>
<!--
ETML
Author: Merk Yann
Date: 27.03.2017
Summary:
-->

<?php
session_start();

//This page require the var $pageId to be correctly set (see classes/GlobalValue.php, PAGES_ARRAY)

/*Session var possible :
userId : Id in the database, or null if disconnected

*/

// To load the classes automaticaly
spl_autoload_register(function ($class) {
    include_once "classes/$class.php";
});

$isConnected = $_SESSION["userID"] != null;

?>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <title><?php echo GlobalValue::PAGES_ARRAY[$pageId][0] . " - " . GlobalValue::SITE_TITLE ?></title>

        <!-- Bootstrap -->
        <link type="text/css" href="resources/lib/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">


        <link type="text/css" href="resources/css/common.css" rel="stylesheet">
        <link href="resources/image/book-256.ico" rel="icon">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
        <header>
            <h1><?php echo GlobalValue::PAGES_ARRAY[$pageId][0] ?></h1>
        </header>
        <nav>
            <a href="/"><?php echo GlobalValue::SITE_TITLE ?></a>
            <ul>
                <li <?php echo $pageId === 0 ? 'class="active"' : '' ?>><a
                        href=<?php echo '"' . GlobalValue::PAGES_ARRAY[0][0] . '">' . GlobalValue::PAGES_ARRAY[0][0] ?></a>
                </li>
                <li <?php echo $pageId === 1 ? 'class="active"' : '' ?>><a
                        href=<?php echo '"' . GlobalValue::PAGES_ARRAY[1][1] . '">' . GlobalValue::PAGES_ARRAY[1][0] ?></a>
                </li>

                <?php
                if ($isConnected) {
                    echo '<li' . ($pageId === 2 ? ' class="active"' : '') . '><a href="' . GlobalValue::PAGES_ARRAY[2][1] . '">' . GlobalValue::PAGES_ARRAY[2][0] . '</a></li>';
                }
                ?>
            </ul>

            <ul>
                <?php
                if ($isConnected) {
                    echo '<li><a href="#"><span class="glyphicon glyphicon-user"></span> Mon Compte</a></li>';
                    echo '<li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a></li>';
                } else {
                    echo '<li><a href="/Inscription"><span class="glyphicon glyphicon-user"></span> Inscription</a></li>';
                    echo '<li><a href="/login?previousPageID=' . $pageId . '"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>';
                }
                ?>
            </ul>
        </nav>
        <div class="content">
