<div class="container-fluid full-screen">
<div class="row description margin-top-space col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-10">    
<a class="offset-5" href="?c=add_product"  title="Agregar Producto"><button class="btn btn-primary btn-sm"><i class="fa fa-plus"> Agregar Producto</i></button></a>
<div class="content-element col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-10">    
            <br><table id="data-table" class="table table-condensed table-hover table-striped">
            <thead>
                <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Estado</th>
                <th>Editar</th>
                <th>Eliminar</th>
                </tr>
            </thead>
            <?php foreach ($products as $product) { ?>       
                <tr>
                    <td><?php echo $product->product_id?></td>
                    <td><?php echo $product->product_name ?></td>
                    <td><?php echo $product->price ?></td>
                    <?php if($product->status) { ?>   
                    <td>Disponible</td>
                    <?php } else { ?>
                    <td>Agotado</td>
                    <?php } ?>
                    <td><a href="?c=update_product&id=<?php echo $product->product_id ?>" title="Editar"><button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button></a></td>
                    <td><a href="?c=delete_product&id=<?php echo $product->product_id ?>" title="Eliminar"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a></td>
                    </tr>
            <?php } ?>
            </table>
            </div>
        </div>
        </div>