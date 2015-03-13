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

$shopID = $_POST['shopID'];

//SANITIZING PRODUCT NAME AND DESCRIPTION INPUT//
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$manFName = filter_input(INPUT_POST, 'manFName', FILTER_SANITIZE_STRING);
$manLName = filter_input(INPUT_POST, 'manLName', FILTER_SANITIZE_STRING);
$phoneNo = filter_input(INPUT_POST, 'phoneNo', FILTER_SANITIZE_STRING);

$gateway->updateShop($shopID, $address, $manFName, $manLName, $phoneNo);

header('Location: viewShops.php');




