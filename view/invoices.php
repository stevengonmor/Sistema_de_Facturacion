<div class="container-fluid full-screen"> 
    <title>Lista de Facturas</title>
    <!-- <script src="js/invoice.js"></script> -->
    <script src="./calender.js" type="text/javascript"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <div class="content-element row description margin-top-space col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-10">
            <div class="contenedor-search col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 offset-xs-3 offset-sm-3 offset-md-3 offset-lg-3 offset-xl-3">
            <h3>Generar Reporte</h3><hr>  
            <form id="bycustomerid" method="POST" action='./?c=read_invoices'> 
                    <input id="search" type="text" name="search" class="form-control rounded" value="" placeholder="por codigo cliente" aria-label="Search" aria-describedby="search-addon" />
                    <br><input class="btn btn-primary" type="submit" value="Buscar"><br>
                </form>
            </div>	
            <div class="contenedorReportes col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 offset-xs-2 offset-sm-2 offset-md-2 offset-lg-2 offset-xl-2"> 
<br>
                <form id="dates" method="POST" action="./?c=read_invoices" enctype="multipart/form-data">
                    <input id="date1" type="text" name="date1" value="" />
                    <input id="date2" type="text" name="date2" value=""/>

                    <script type="text/javascript"> 
                        $(function(){
                            $('input[name=date1]').daterangepicker({
                            "singleDatePicker": true,
                            "showDropdowns": true,
                            "startDate": "12/02/2021",
                            "endDate": "12/08/2021"
                        }, function(start, end, label) {
                            var date1= start.format('YYYY/MM/DD');
                            document.getElementById("date1").value = date1;
                        });
                        }
                        )
                        
                    </script>
                    
                    <script type="text/javascript"> 
                        $(function(){
                            $('input[name=date2]').daterangepicker({
                            "singleDatePicker": true,
                            "showDropdowns": true,
                            "startDate": "12/02/2021",
                            "endDate": "12/08/2021"
                        }, function(start, end, label) {
                            var date2= start.format('YYYY/MM/DD');
                            document.getElementById("date2").value = date2;
                        });
                        }
                        )
                        
                    </script>
                    <input class="btn btn-primary" type="submit" value="Buscar">
                </form><br>
            </div>	 
            <h3> <?php if($msg){ echo $msg; } else {?> </h3>
                <h1 class="title mt-5">Lista de Facturas <a href="?c=create_invoice" title="Crear Factura"><button class="btn btn-primary btn-sm"><i class="fas fa-plus-square"></i></button></a></i> </h1>
            <table id="data-table" class="table table-condensed table-hover table-striped">
                <thead>
                <tr>
                    <th>Numero de Factura</th>
                    <th>Nombre del cliente</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Ver</th>
                    <th>Imprimir</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
                <?php		
                    foreach($invoices as $invoice){ ?>
                        <?php $date = date("d/M/Y", strtotime($invoice->date)); ?>
                        <tr>
                            <td> <?php echo $invoice->order_id ?> </td>
                            <td> <?php echo $invoice->customer_name ?> </td>
                            <td><?php echo $date ?> </td>
                            <td>₡ <?php echo $invoice->total ?></td>
                            <td><a href="?c=read_invoice&order_id=<?php echo $invoice->order_id ?>" title="View Invoice"><button class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></button></a></td>
                            <td><a href="?c=print_invoice&order_id=<?php echo $invoice->order_id ?>" title="Print Invoice"><button class="btn btn-primary btn-sm"><i class="fa fa-print"></i></button></a></td>
                            <td><a href="?c=delete_invoice&order_id=<?php echo $invoice->order_id ?>" title="Delete Invoice"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a></td>
                        </tr>
                        
                    <?php } ?>
            </table>
            <br><a class="btn btn-success">Exportar a excel</a><br>
            <?php } ?>
        </div>		
</div>   