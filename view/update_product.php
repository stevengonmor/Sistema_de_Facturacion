<div class="container-fluid full-screen row"> 
    <div class="description content-element col-xs-12 col-sm-12 col-md-12 col-lg-10 col-xl-4">                   
        <br>
        <h3>Actualizar Información de Producto</h3>
        <?php if (isset($msg)) { ?> 
            <h6 class ="mb-4"><?php echo $msg ?></p>
        <?php } ?>  
        <form method="POST" action="./?c=update_product&id=<?php echo $product->product_id ?>">
            <div class="form-group">    
            <div class="form-control soft-blue-background">
                <i class="icon-padding fa fa-archive"></i>
                <input class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-11" type="text" name="product_name" value="<?php echo $product->product_name ?>">
            </div>
            <div class="form-control soft-blue-background">
                <i class="icon-padding fa fa-tag"></i>
                <input class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-11" type="text" name="price" value="<?php echo $product->price ?>">
            </div>
            <div class="form-control soft-blue-background">
                <i class="icon-padding fa fa-toggle-off"></i>
                <select class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-11" name="status" id="status" value="<?php echo $product->status ?>" required>
                    <?php if($product->status){?>
                    <option selected value="1">Disponible</option>
                    <option value="0">Agotado</option>
                    <?php }else{?>
                    <option value="1">Disponible</option>
                    <option  selected value="0">Agotado</option>
                    <?php }?>
                    </select>
            </div>
            </div><br>
            <input class= "btn btn-primary" type="submit" value="Actualizar">
        </form>
    </div>
</div> 