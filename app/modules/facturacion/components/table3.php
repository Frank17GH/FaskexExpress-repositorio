<?php 
    if($dt1){
        foreach ($dt1 as $data): 
            ?>
                <tr>
                    <td>

                        <a href="javascript:void(0);" onclick="vAjax('facturacion','mod6','<?php echo $data[idproducto].'-/'.$data[pr_nombre].'-/'.$s02[tpp]?>','modal1');$('#myModal4').modal('hide')">
                            <?php echo str_pad($data[idproducto], 10, "0", STR_PAD_LEFT) ?>
                        </a>
                    </td>
                    <td><?php echo $data[pr_nombre] ?></td>
                    <td><span class="label label-info"><?php echo utf8_encode($data[marca]) ?></span></td>
                    <td><?php echo $data[ca_nombre] ?></td>
                    <td><?php echo $data[lo_abreviatura] ?></td>
                    <td style="text-align: right;">s/.<?php echo number_format($data[prec],2) ?></td>
                    <td style="text-align: center;background-color: <?php echo ($data[pr_stock]<$data[pr_min])?'#f00;color: white;':''; ?>"><label id="stock_007078"><?php echo $data[pr_stock] ?></label></td>
                </tr>
            <?php 
        endforeach; 
    }
?>
