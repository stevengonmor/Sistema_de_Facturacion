<div class="contaimer-fluid full-screen">
    <div class="row description all-height justify-content-center col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-10">
        <form method="POST" action='./?c=read_customer&current_id=<?php echo $current_id ?>'>
            <div class="form-group">
            <div class="form-control soft-blue-background row">
            <input class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" type="text" name="email" placeholder="Buscar un cliente (e-mail)" required>
                </div>
                <input class= "icon-padding btn btn-primary btn-sm col-xs-12 col-sm-12 col-md-10 col-lg-2 col-xl-2" type="submit" value="Buscar">
            </div><br>
        </form>
        <?php if (isset($msg)) { ?> 
            <h3 class="mb-4 "><?php echo $msg ?></h3>
        <?php } else { ?>  
            <div class="profile-pic-back user-profile col-xs-12 col-sm-12 col-md-12 col-lg-3 col-xl-4">
                <div class="card-block text-center">
                    <h3><?php echo $customer->name ?></h6>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 col-xl-8">
                <div class="card-block">
                    <div class="padd-bottom col-sm-12">
                        <h3 class="f-w-600">Cédula</h3>
                        <h6 ><?php echo $customer->get_ced() ?></h6><br>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <h3 class=" f-w-600">E-mail</h3>
                            <h6><?php echo $customer->email ?></h6>
                            <br>
                        </div>
                        <div class="padd-bottom col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <h3 class="f-w-600">Teléfono</h3>
                            <h6><?php echo $customer->phone ?></h6>
                        </div>
                                <a href ='?c=update_customer&id=<?php echo $customer->get_id() ?>'  class="btn btn-primary col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-5">Modificar</a>
                                <a href ='?c=delete_customer&id=<?php echo $customer->get_id() ?>'  class="btn btn-danger offset-2 col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-5">Dar de Baja</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-element row description margin-top-space col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-10">   
            <h3><?php echo $invoices_validation ?></h3>  
            <?php if($invoices) { ?> 
            <div class= "col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <table id="data-table" class="table table-condensed table-hover table-striped">
            <thead>
                <tr>
                <th>Número</th>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Ver</th>
                <th>Imprimir</th>
                <th>Borrar</th>
                </tr>
            </thead>
            <?php foreach ($invoices as $invoice) { ?>       
            <?php $invoice_date = date("d/M/Y", strtotime($invoice->date));  ?> 
                <tr>
                    <td><?php echo $invoice->order_id?></td>
                    <td><?php echo $invoice->customer_name?></td>
                    <td><?php echo $invoice_date?></td>
                    <td><?php echo $invoice->total?></td>
                    <td><a href="?c=read_invoice&order_id=<?php echo $invoice->order_id ?>" title="View Invoice"><button class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></button></a></td>
                    <td><a href="?c=print_invoice&order_id=<?php echo $invoice->order_id ?>" title="Print Invoice"><button class="btn btn-primary btn-sm"><i class="fa fa-print"></i></button></a></td>
                    <td><a href="?c=delete_invoice&order_id=<?php echo $invoice->order_id ?>" title="Delete Invoice"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a></td>
                    </tr>
            <?php } ?>
            </table>
            </div>
            <?php } ?>
        </div> 
    <?php } ?> 
</div>