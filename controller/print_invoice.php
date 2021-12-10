<?php
include_once 'model/invoice.php';
include_once 'model/invoice_detail.php';
$invoice = new Invoice();
$invoice_detail = new Invoice_detail();
if(!empty($_GET['order_id']) && $_GET['order_id']) {
	$invoiceValues = $invoice->select($_GET['order_id']);	
    $invoices_details = $invoice_detail->selectDetail($_GET['order_id']);	
}
$invoiceDate = date("d/M/Y", strtotime($invoiceValues->date));
$output = '';
$output .= '<table width="100%" border="1" cellpadding="5" cellspacing="0">
	<tr>
	<td colspan="2" align="center" style="font-size:18px"><b>Factura_'.$invoiceValues->order_id.'</b></td>
	</tr>
	<tr>
	<td colspan="2">
	<table width="100%" cellpadding="5">
	<tr>
	<td width="65%">
	Para,<br />
	<b>Cliente</b><br />
	Nombre : '.$invoiceValues->customer_name.'<br /> 
	Cedula : '.$invoiceValues->get_customer_cedula().'<br />
	</td>
	<td width="35%">         
	Numero de factura: '.$invoiceValues->order_id.'<br />
	Fecha de emision: '.$invoiceDate.'<br />
	</td>
	</tr>
	</table>
	<br />
	<table width="100%" border="1" cellpadding="5" cellspacing="0">
	<tr>
	<th align="left">Cod. Producto</th>
	<th align="left">Producto</th>
	<th align="left">Cantidad</th>
	<th align="left">Precio</th>
	<th align="left">Total del Producto</th> 
	</tr>';  
foreach($invoices_details as $invoices_detail){
	$output .= '
	<tr>
	<td align="left">'.$invoices_detail->product_id.'</td>
	<td align="left">'.$invoices_detail->product_name.'</td>
	<td align="left">'.$invoices_detail->quantity.'</td>
	<td align="left">'.$invoices_detail->single_price.'</td>
	<td align="left">'.$invoices_detail->total_price.'</td>   
	</tr>';
}
$output .= '
	<tr>
	<td align="right" colspan="5"><b>Sub Total</b></td>
	<td align="left"><b>'.$invoiceValues->sub_total.'</b></td>
	</tr>
	<tr>
	<td align="right" colspan="5"><b>Impuesto % :</b></td>
	<td align="left">13%</td>
	</tr>
	<tr>
	<td align="right" colspan="5">Impuesto: </td>
	<td align="left">'.$invoiceValues->tax.'</td>
	</tr>
	<tr>
	<td align="right" colspan="5">Total: </td>
	<td align="left">'.$invoiceValues->total.'</td>
	</tr>';
$output .= '
	</table>
	</td>
	</tr>
	</table>';
// create pdf of invoice	
$invoiceFileName = 'Factura_'.$invoiceValues->order_id.'.pdf';
require_once './dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml(html_entity_decode($output));
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
ob_end_clean();
$dompdf->stream($invoiceFileName, array("Attachment" => false));
?>   
   