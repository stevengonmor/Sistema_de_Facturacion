<?php

$_SESSION['url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
include "model/customer.php";
$customer = new customer();
    $customers = $customer->selectAll();
    if (!$customers) {
        $msg = "No hay clientes";
    }
include 'view/customers.php';