<div class="container-fluid full-screen row"> 
    <div class="description content-element col-xs-12 col-sm-12 col-md-12 col-lg-10 col-xl-4">                   
        <br>
        <h3>Registro de Producto</h3>
        <?php if ($msg) { ?> 
            <h6 class =" mb-4 "><?php echo $msg ?></h6>
        <?php } ?>  
        <form method="POST" action="./?c=add_product">
        <div class="form-group">
            <div class="form-control soft-blue-background">
                <i class="icon-padding fa fa-archive"></i>
                <input class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-11" type="text" name="product_name" placeholder="Nombre" required>
            </div>
            <div class="form-control soft-blue-background">
                <i class="icon-padding fa fa-tag"></i>
                <input class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-11" type="text" name="price" placeholder="Precio" required>
            </div>
            <div class="form-control soft-blue-background">
                <i class="icon-padding fa fa-toggle-off"></i>
                <select class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-11" name="status" id="status" required>
                    <option value="1">Disponible</option>
                    <option value="0">Agotado</option>
                    </select>
            </div><br>
            <input class= "btn btn-primary" type="submit" value="Agregar">
        </div>
        </form>
    </div>
</div> 