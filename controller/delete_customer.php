<?php

include 'model/customer.php';
$customer = new customer();
if ($customer->delete($_GET['id'])) {
    $customer = new customer();
    $customers = $customer->selectAll();
    include 'view/customers.php';
} else {
    include 'view/error.php';
}