<?php
require_once 'shop.php';
require_once 'Connection.php';
require_once 'ShopTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new ShopTableGateway($connection);

$address = $_POST['address'];
$manFName = $_POST['manFName'];
$manLName = $_POST['manLName'];
$phoneNo= $_POST['phoneNo'];

$id = $gateway->insertShop($address, $manFName, $manLName, $phoneNo);

$message = "Shop created successfully";

header("Location: viewShops.php");
