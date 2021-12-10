<?php

include 'model/invoice.php';
$invoice = new invoice();
if ($invoice->delete($_GET['order_id'])) {
    $invoice = new invoice();
    $invoices = $invoice->selectAll();
    $msg="";
    include 'view/invoices.php';
} else {
    include 'view/error.php';
}