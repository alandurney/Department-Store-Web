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

$shopName = $_POST['shopName'];
$manFName = $_POST['manFName'];
$manLName = $_POST['manLName'];
$phoneNo= $_POST['phoneNo'];

$id = $gateway->insertShop($shopName, $manFName, $manLName, $phoneNo);

$message = "Shop created successfully";

header("Location: viewShops.php");
