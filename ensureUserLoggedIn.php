<?php

$session_id = session_id();
if ($session_id == "") {
    session_start();
}

if (!isset($_SESSION['userName'])) {
    header("Location: login.php");
}
