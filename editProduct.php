<?php
//TAKES IN EDIT PRODUCT INFORMATION, SANITIZES AND FILTERS//
require_once 'Product.php';
require_once 'Connection.php';
require_once 'ProductTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new ProductTableGateway($connection);

$productID = $_POST['productID'];
$storeID = $_POST['storeID'];

//SANITIZING PRODUCT NAME AND DESCRIPTION INPUT//
$prodName = filter_input(INPUT_POST, 'prodName', FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
$salePrice = filter_input(INPUT_POST, 'salePrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
$storeID = filter_input(INPUT_POST, 'storeID', FILTER_SANITIZE_NUMBER_INT);
if($storeID == -1){
    $storeID = NULL;
}

$gateway->updateProduct($productID, $prodName, $description, $price, $salePrice, $storeID);

header('Location: viewProducts.php');






