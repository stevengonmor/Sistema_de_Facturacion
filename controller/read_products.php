<?php

$_SESSION['url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
include "model/product.php";
$product = new product();
    $products = $product->selectAll();
    if (!$products) {
        $msg = "No hay productos";
    }
include 'view/products.php';