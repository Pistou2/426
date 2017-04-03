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

/*Session vars possible :
userId : Id of the user in the database, or null if disconnected

*/

//TODO : Redirect to the login page if required

// To load the classes automaticaly
spl_autoload_register(function ($class) {
    include_once "classes/$class.php";
});

//Todo : Change that to the kind of user we are (student, teacher, aadmin, ...)
$isConnected = (isset($_SESSION["userID"]) && $_SESSION["userID"] != null);

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
        <link href="resources/image/book-256    .ico" rel="icon">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
        <header>
            <h1><?php echo GlobalValue::SITE_TITLE . " - " . GlobalValue::PAGES_ARRAY[$pageId][0] ?></h1>
        </header>

        <!--Bar de navigation-->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!--<a class="navbar-header" href="/"><?php echo GlobalValue::SITE_TITLE ?></a>-->
                <ul class="nav navbar-nav">

                    <?php
                    //Go through all the listed pages
                    for ($i = 0; $i < count(GlobalValue::PAGES_ARRAY); $i++) {
                        //TODO : Check permissions to display the link or no
                        //Echo a li set to active if the page is currently selected containing the link of the page and the title of the page as text
                        echo "<li " . ($pageId === $i ? 'class="active"' : '') . '><a href="' . GlobalValue::PAGES_ARRAY[$i][1] . '">' . GlobalValue::PAGES_ARRAY[$i][0] . "</a></li>";
                    }
                    ?>
                </ul>
            </div>

            <?php /*Todo : Logout button ?
            <li ><a href = "/logout" ><span class="glyphicon glyphicon-log-out" ></span > Déconnexion</a ></li >
             */
            ?>
        </nav>
        <div class="content">
