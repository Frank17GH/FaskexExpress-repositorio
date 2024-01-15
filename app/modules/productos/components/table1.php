<!--<input type="button" value="nombre" onclick="tver(1,1)">-->
<table class="table table-striped table-bordered table-hover" id="dtable1" width="100%" style="font-size: 12px">
    <thead>
        <tr>
            <th data-hide="esconder" style="width:5px">Id.</th>
            <th data-hide="esconder">Marca</th>
            <th data-class="expand">Producto</th>
            <th data-hide="esconder">Categoría</th>
            <th data-hide="esconder" style="width: 5px">Stock</th>
            <th data-hide="esconder" style="width: 5px">Precio</th>
            <th data-hide="esconder" style="width: 5px">Imagen</th>
            <th data-class="expand" style="width:5px">Acc.</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            if($dt1){
                foreach ($dt1 as $dta): 
                    ?>
                        <tr class="font-sm">
                            <td><?php echo str_pad($dta['idproducto'], 6, "0", STR_PAD_LEFT) ?></td>
                            <td><?php echo mb_strtoupper(utf8_encode($dta['marca'])); ?></td>
                            <td><?php echo mb_strtoupper($dta['pr_nombre']); ?></td>
                            <td><?php echo ($dta[cat])?$dta[cat]:'<i>No especificado</i>'; ?></td>
                            <td class="<?php if($dta['pr_stock']>0){if($dta['pr_min']>$dta['pr_stock']){echo 'warning';}else{echo 'success';}}else{echo 'danger';} ?> " style="text-align: center;"><?php echo $dta['pr_stock']; ?></td>
                            <td style="text-align: right;"><?php echo number_format($dta[prec],2); ?></td>
                            <td style="text-align: center;">
                                <?php 
                                    if ($dta['pr_imagen']) {
                                        ?><img id="blah" style="width: 60px" src="app/modules/productos/components/images/<?php echo $dta['idproducto'].$dta['pr_imagen'] ?>" alt="Tu imagen" /><?php
                                    }else{
                                        ?><img id="blah" style="width: 60px" src="https://via.placeholder.com/150" alt="Tu imagen" /><?php
                                    }
                                ?>                                
                            </td>
                            <td style="width: 5px;">
                               <table>
                                   <tr>
                                       <td>
                                           <a class="btn btn-info btn-xs" href="javascript:void(0);" onclick="vAjax('productos','mod1',<?php echo $dta['idproducto'] ?>,'modal3');"><i class="fa fa-pencil"></i></a>
                                       </td>
                                       <td>
                                           <a class="btn btn-danger btn-xs" onclick="confir('Comprobante emitido correctamente!','<i class=\'fa fa-clock-o\'></i> <i>¿Deseas eliminar el producto con id: #<?php echo str_pad($dta['idproducto'], 6, "0", STR_PAD_LEFT) ?> ?</i>','productos','del2',<?php echo $dta['idproducto'] ?>,'times');" href="javascript:void(0);"><i class="fa fa-times"></i></a>
                                       </td>
                                   </tr>
                               </table>
                            </td>

                           
                        </tr>
                    <?php 
                endforeach; 
            }
        ?>
    </tbody>
</table>
<script type="text/javascript"> table(1,50,1); </script> 
