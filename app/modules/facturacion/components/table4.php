<?php 
    if($dt1){
        foreach ($dt1 as $data): 
            ?>
                <tr>
                    <td>

                        <a href="javascript:void(0);" onclick="vAjax('facturacion','mod6','<?php echo $data[idproducto].'-/'.$data[pr_nombre].'-/'.$s02[tpp].'-/'.$data[pr_costo]?>','modal1');$('#myModal4').modal('hide')">
                            <?php echo str_pad($data[idproducto], 10, "0", STR_PAD_LEFT) ?>
                        </a>
                    </td>
                    <td><?php echo $data[pr_nombre] ?></td>
                    <td style="white-space:nowrap;"><?php echo $data[ca_nombre] ?></td>
                    <td><?php echo $data[lo_abreviatura] ?></td>
                    <td style="text-align: right;">s/.<?php echo number_format($data[pr_costo],2) ?></td>
                </tr>
            <?php 
        endforeach; 
    }
?>
