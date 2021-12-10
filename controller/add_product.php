<?php

if ($_POST) {
    include "model/product.php";
        $new_product = new product(0, addslashes($_POST['product_name']),addslashes($_POST['price']), addslashes($_POST['status']));
        if ($new_product->insert()) {
            $product = new product();
            $products = $product->selectAll();
            if (!$products) {
                $msg = "No hay productos";
            }
            include "view/products.php";
        } else {
            $msg = "Error al guardar";
            include "view/add_product.php";
        }
} else {
    $msg = "";
    include "view/add_product.php";
}