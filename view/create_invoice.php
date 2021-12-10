<title>Factura</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="./invoice.js"></script>

<div class="container-fluid full-screen"> 
    
<!-- Tabla de agregar productos -->
    <div class="row content-element row description margin-top-space col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
        <form id="createinvoice" method="POST" action='./?c=create_invoice'>
            <div> 
                <div class="col-xs-2">
                    <input type="hidden" name="cashier_id" id="cashier_id" value="<?php echo $_SESSION['id']; ?>">
                </div>
            </div>
            <h3> Informacion del cliente </h3>
            <hr>
            <div class="row-xs-12 row-sm-12 row-md-12 row-lg-12 row-xl-10">
                    <div class="titulo col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-10">Codigo del cliente: <input type="text" name="customer_id" id="customer_id" value=""> 
                    </div>

            </div>
            <hr>
            <div class="row-xs-12 row-sm-12 row-md-12 row-lg-12 row-xl-10">
                    <div class="titulo col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-10">Nombre del cliente: <input type="text" name="customer_name" id="customer_name" value="">
                    </div> 

            </div>
            <hr>
            <div class="row-xs-12 row-sm-12 row-md-12 row-lg-12 row-xl-10">
                    <div class="titulo col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-10">Cedula del cliente: <input type="text" name="customer_ced" id="customer_ced" value="">
                    </div> 

            </div>
            <hr>
            <div class="row-xs-12 row-sm-12 row-md-12 row-lg-12 row-xl-10">
                    <div class="titulo col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-10">Numero de telefono: <input type="text" name="customer_phone" id="customer_phone" value="">
                    </div>
        
            </div>
            <hr>
            <div class="row-xs-12 row-sm-12 row-md-12 row-lg-12 row-xl-10">
                    <div class="titulo col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-10">Correo electronico: <input type="text" name="customer_email" id="customer_email" value=""></div>
                    
            </div>
        <hr>
        <h2> Agregar productos</h2>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <table class="table table-condensed table-striped" id="invoiceItem">
                    <tr>
                        <th width="2%">
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="checkAll" name="checkAll">
                            <label class="custom-control-label" for="checkAll"></label>
                            </div>
                        </th>
                        <th width="15%">Codigo de producto</th>
                        <th width="38%">Nombre del producto</th>
                        <th width="15%">Cantidad</th>
                        <th width="15%">Precio Unitario</th>
                        <th width="15%">Total</th>
                    </tr>
                    <tr>
                        <td><div class="custom-control custom-checkbox">
                            <input type="checkbox" class="itemRow custom-control-input" id="itemRow_1">
                            <label class="custom-control-label" for="itemRow_1"></label>
                            </div></td>
                        <td><input type="text" name="productid_1" id="productid_1" class="form-control" autocomplete="off"></td>
                        <td><input type="text" name="productname_1" id="productname_1" class="form-control" autocomplete="off"></td>
                        <td><input type="number" name="quantity_1" id="quantity_1" class="form-control quantity" autocomplete="off"></td>
                        <td><input type="number" name="price_1" id="price_1" class="form-control price" autocomplete="off"></td>
                        <td><input type="number" name="total_1" id="total_1" class="form-control total" autocomplete="off"></td>
                    </tr>
                </table>
            </div>  
            <div class="row">
                <div class="col-xs-12">
                <button class="btn btn-danger delete" id="removeRows" type="button">-   Eliminar</button>
                <button class="btn btn-success" id="addRows" type="button">+ Agregar</button>
                </div>
            </div>
            <!-- Seccion de montos -->
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group mt-3 mb-3 ">
                        <label>Subtotal: &nbsp;</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text currency">₡</span>
                        </div>
                        <input value="" type="number" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal">
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="form-group mt-3 mb-3 ">
                    <label>Porcentaje de impuestos: &nbsp;</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text currency">%</span>
                        </div>
                        <input value="" type="number" class="form-control" name="taxRate" id="taxRate" placeholder="% de impuesto">                 
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="form-group mt-3 mb-3 ">
                    <label>Total Impuestos: &nbsp;</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text currency">₡</span>
                        </div>
                        <input value="" type="number" class="form-control" name="taxAmount" id="taxAmount" placeholder="Impuesto">
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="form-group mt-3 mb-3 ">
                    <label>Total: &nbsp;</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text currency">₡</span>
                        </div>
                        <input value="" type="number" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total">
                    </div>
                </div>
            </div>
            <div> 
                <input type="hidden" name="numDetail" id="numDetail" value="<?php echo $_SESSION['id']; ?>">
                <input class="btn btn-primary" type="submit" value="Crear">
            </div>
        </form>
    </div>        
</div>