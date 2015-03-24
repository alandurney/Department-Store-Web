<?php
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

$prodName = filter_input(INPUT_POST, 'prodName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
//$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT);
//$salePrice = filter_input(INPUT_POST, 'salePrice', FILTER_SANITIZE_NUMBER_FLOAT);
$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
$salePrice = filter_input(INPUT_POST, 'salePrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
$storeID = filter_input(INPUT_POST, 'storeID', FILTER_SANITIZE_NUMBER_INT);
//this will store anything that is empty to become null in the database//
if ($storeID == -1){
    $storeID = NULL;
}

//$prodName = $_POST['prodName'];
//$description = $_POST['description'];
//$price = $_POST['price'];
//$salePrice= $_POST['salePrice'];
//$storeID = $_POST['storeID'];

$id = $gateway->insertProduct($prodName, $description, $price, $salePrice, $storeID);

$message = "Product created successfully";

header('Location: viewProducts.php');






