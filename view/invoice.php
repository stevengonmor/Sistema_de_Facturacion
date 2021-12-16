<div class="container-fluid full-screen"> 
    <title>Factura</title>

    <div class="container">
      <div class="row">
          <div class="col-xs-4"><img src="img/logo.jpg"></div>
      </div>
        <hr>
        <div class="row">
            <div class="col-xs-2">
                <div class="titulo">Número Factura: <?php echo $current_invoice->order_id ?></div>
            </div>
            <div class="col-xs-2">
                <div class="titulo">Cajero: <?php echo $current_invoice->get_cashier_id() ?></div>
            </div>
        </div>   
        <div class="row">
            <div class="col-xs-2">
                <div class="titulo">Fecha Emisión: <?php echo $current_invoice->date ?></div>
            </div>
            <hr>
            <div class="col-xs-2">
                <div class="titulo">Información del cliente:   </div>
            </div>
            <div class="col-xs-2">
                <div class="titulo">Nombre: <?php echo $current_invoice->customer_name ?></div>
            </div>
            <div class="col-xs-2">
                <div class="titulo">Cédula: <?php echo $current_invoice->get_customer_id() ?></div>
            </div>
            <div class="col-xs-2">
                <div class="titulo">Número: <?php echo $current_invoice->customer_phone ?></div>
            </div>
            <div class="col-xs-2">
                <div class="titulo">Correo Electrónico: <?php echo $current_invoice->customer_email ?></div>
            </div>
        </div> 
        <hr> 
        <div class="col-xs-2">
                <div class="titulo">Productos: </div>
        </div> 
        <hr>          
        <table class="table table-bordered">
        <thead>
          <tr>
              <th><h4 class="titulo">&nbsp;&nbsp;&nbsp;Código&nbsp;&nbsp;&nbsp;</h4></th>
        <th><h4 class="titulo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4></th>
        <th><h4 class="titulo">&nbsp;&nbsp;&nbsp;&nbsp;Cantidad&nbsp;&nbsp;&nbsp;&nbsp;</h4></th>
        <th><h4 class="titulo">&nbsp;&nbsp;&nbsp;&nbsp;Precio Unitario&nbsp;&nbsp;&nbsp;&nbsp;</h4></th>
        <th><h4 class="titulo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Subtotal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4></th>
          </tr>
        </thead>
        <tbody>
            <?php		
                foreach($invoices_details as $invoice_detail){ ?>
                    <tr>
                        <td class="product_id"> <?php echo $invoice_detail->product_id ?></td>
                        <td class="product_name"><?php echo $invoice_detail->product_name ?></td>
                        <td class="quantity"><?php echo $invoice_detail->quantity ?></td>
                        <td class="single_price"><?php echo $invoice_detail->single_price ?></td>
                        <td class="total_price"><?php echo $invoice_detail->total_price ?></td>
                    </tr>
                <?php } ?>
        </tbody>
      </table>
        <div class="row sinespacio">
            <div class="col-xs-3">
                <div>Sub Total: ₡ <?php echo $current_invoice->sub_total ?></div>
            </div>
            <div class="col-xs-3">
                <div>IVA: 13% </div>
            </div>
            <div class="col-xs-3">
                <div>Total con impuesto: ₡ <?php echo $current_invoice->total ?></div>
            </div>
            <div class="col-xs-3">
                <div>Total Impuestos: ₡ <?php echo $current_invoice->tax ?></div>
            </div>
        </div>
    </div>
</div>