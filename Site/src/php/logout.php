<?php
//Reset the session and redirect to the index page
session_start();
$_SESSION = Array();
$_SESSION["mustShowPopup"] = true;

header("location: /");
