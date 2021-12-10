<?php

include 'model/product.php';
$product = new product();
if ($product->delete($_GET['id'])) {
    $product = new product();
    $products = $product->selectAll();
    if (!$products) {
        $msg = "No hay productos";
    }
    include 'view/products.php';
} else {
    include 'view/error.php';
}