<?php

include_once "model/product.php";
if ($_POST) {
    $new_product = new product();
    $product = $new_product->select($_GET['id']); //enviar la variable desde la vista
    if ($product->update(addslashes($_POST['product_name']), addslashes($_POST['price']), addslashes($_POST['status']))) {
        $product = new product();
        $products = $product->selectAll();
        if (!$products) {
            $msg = "No hay productos";
        }
        include "view/products.php";
        //header('Location:' . $_SESSION['url']);
        //include "controller/read_product.php";
    } else {
        $msg = "Eror al actualizar";
        include "view/update_product.php";
    }
} else {
    $current_product = new product();
    $product = $current_product->select($_GET['id']); //enviar la variable desde la vista
    include "view/update_product.php";
}