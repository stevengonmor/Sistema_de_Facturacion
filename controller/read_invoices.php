<?php

$_SESSION['url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
include "model/invoice.php";
$invoice = new invoice();
if ($_POST) {
    if (isset($_POST['date1']) && isset($_POST['date2'])) {
        $date1 = date("Y-m-d", strtotime($_POST['date1']));
        $date2 = date("Y-m-d", strtotime($_POST['date2'])); 
        $invoices = $invoice->selectReportByDate($date1, $date2);
        if ($invoices) {
            $msg = "Facturas entre '$date1' y '$date2'";
        } else {
            $msg = "No hay facturas entre estas fechas";
        }
    } else if(isset($_POST['search'])) {
        $invoices = $invoice->selectReportByClient($_POST['search']);
        if ($invoices) {
            $msg = "Facturas del cliente:";
        } else {
            $msg = "No hay facturas asociadas a ese id de cliente";
        }
    }
} else {
    $invoices = $invoice->selectAll();
    $msg = "";
    if(!$invoices) {
        $msg = "No hay facturas";
    }
}
include 'view/invoices.php';