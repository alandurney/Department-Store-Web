<?php
//USED TO LOGOUT
$id = session_id();
if ($id == "") {
    session_start();
}

$_SESSION['userName'] = NULL;
unset($_SESSION['userName']);

header("Location: login.php");

