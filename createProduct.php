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

$prodName = $_POST['prodName'];
$description = $_POST['description'];
$price = $_POST['price'];
$salePrice= $_POST['salePrice'];

$id = $gateway->insertProduct($prodName, $description, $price, $salePrice);

$message = "Product created successfully";

header('Location: home.php');






