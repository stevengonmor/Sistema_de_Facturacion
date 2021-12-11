<?php

$_SESSION['url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
include "model/invoice.php";
$output = '';
$validator=0;
$invoice = new invoice();
    if (isset($_GET['date1']) && isset($_GET['date2'])) {
        $invoices = $invoice->selectReportByDate($_GET['date1'], $_GET['date2']);
        if ($invoices) {
            $validator=1;
            $tittle="Reporte de Facturas de ". $_GET['date1']. " a ". $_GET['date2'];
            $file_name="por_fechas";
        } else {
            $output = "No hay facturas entre estas fechas";
        }
    } else if(isset($_GET['cus_id'])) {
        $invoices = $invoice->selectReportByClient($_GET['cus_id']);
        if ($invoices) {
            $validator=1;
            $file_name="por_id";
            $tittle="Reporte de Facturas del cliente ". $_GET['cus_id'];
        } else {
            $output = "No hay facturas asociadas a ese id de cliente";
        }
    }else {
        $invoices = $invoice->selectAll();
        if($invoices) {
            $validator=1;
            $file_name="todas";
        }else{
            $output = "No hay facturas";
        }
}
if($validator){
    $output = '
                <table class="table" bordered="1">
                    <tr>
                        <th>Numero de Factura</th>
                        <th>Nombre del cliente</th>
                        <th>Fecha</th>
                        <th>Total</th>
                    </tr>
                ';
    foreach($invoices as $invoice){
        $invoiceDate = date("d/M/Y", strtotime($invoice->date));
        $output .= '
                    <tr>
                        <td align="center">'.$invoice->order_id.'</td>
                        <td align="center">'.$invoice->customer_name.'</td>
                        <td align="center">'.$invoiceDate.'</td>
                        <td align="center">'.$invoice->total.'</td> 
                        </tr>
                    ';
    }     
    $output .='</table>';
    ob_end_clean();
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=reporte_facturas_".$file_name.".xls");
    header('Cache-Control: max-age=0');
    echo $output;
    }