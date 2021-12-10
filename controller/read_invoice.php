<?php

$_SESSION['url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
include_once 'model/invoice.php';
include_once 'model/invoice_detail.php';
$invoice = new invoice();
$invoice_detail = new invoice_detail();
if(isset($_GET['order_id'])){
    $current_invoice = new invoice();
    $current_invoice = $invoice->select($_GET['order_id']);
    $invoices_details = $invoice_detail->selectDetail($_GET['order_id']);
    $or_id = $_GET['order_id'];
    if ($current_invoice) {
        $msg = "Detalles de la factura '$or_id'";
    } else {
        $msg = "No hay ninguna factura correspondiente a este id: '$or_id'";
    }
} else {
    $msg = "error";
}
include 'view/invoice.php';