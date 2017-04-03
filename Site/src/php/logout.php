<?php
//Reset the session and redirect to the login page
session_start();
$_SESSION = Array();

require_once("classes/GlobalValue.php");

header("Location: " . GlobalValue::PAGES_ARRAY[GlobalValue::LOGIN_PAGE][1]);