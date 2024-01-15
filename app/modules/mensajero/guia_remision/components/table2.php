<?php 
    if($dt1){ $cc=0;$tp=0;
        foreach ($dt1 as $dta): 
            ?>
                <tr id="tr_<?php echo $dta[idtemp] ?>" class="encabezado">
                    <td style="display: none">
                        <?php echo $dta[te_total]; ?>
                    </td>
                    <td>
                        <div class="input-group" style="width: 100px;text-align: center;">
                            <?php 
                                if ($dta[te_tipo]==1) { $tp++;
                                    ?><span class="label label-primary">SERVICIO</span><?php
                                }else{
                                    ?><span class="label label-success">PRODUCTO</span><?php
                                }
                            ?>
                        </div>
                    </td>
                    
                    <td>
                        <div class="input-group" style="width: 100%">
                            <input type="text" value="<?php 
                                if ($dta[te_tipo]==1) {
                                    $class = new Mod();
                                    $exc = $class->sel4($dta[idlocales]);
                                    ?>ENVIO DE <?php echo ($dta[te_tipo_encomienda]==1)?'SOBRE':'PAQUETE'; echo ' - [ '.mb_strtoupper($exc[0][ub]).' ] - DESTINATARIO: '.$dta[te_nombre] ?><?php
                                }else{
                                    echo $dta[te_descrip] ;
                                }
                            ?> " class="form-control input-xs" readonly> 
                            
                        </div>
                    </td>
                    <td style="text-align: center;">
                        <font>( <?php echo $dta[te_cant]; ?> )</font>
                    </td>
                    <td>
                        <div class="icon-addon addon-md">
                            <input class="form-control input-xs" value="<?php echo number_format($dta[te_unit],2) ?>" style="width: 70px;text-align: right;" readonly>
                            <label style="padding: 4px 0;" class="glyphicon  input-xs"><b class="mon">S/.</b></label>
                        </div>
                    </td>
                    <td>
                        <div class="icon-addon addon-md">
                            <input readonly="" class="form-control input-xs" value="<?php $cc+=$dta[te_total]; echo number_format($dta[te_total],2) ?>" style="width: 90px;text-align: right;" >
                            <label style="padding: 4px 0;" class="glyphicon  input-xs"><b class="mon">S/.</b></label>
                         </div>
                    </td>
                    <td id="add0" class="acciones" style="padding: 8px 1px;">
                        <ul class="demo-btns text-center">
                            <li style="width: 100%">
                                <a class="btn btn-default input-xs" onclick="confir('Eliminacion','¿Seguro que deseas eliminar el item seleccionado?','facturacion','del1',<?php echo $dta[idtemp] ?>,'remove');;" style="width:100%">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
            <?php
        endforeach; 
    }else{
        ?>
            <tr>
                <td colspan="6"><center><i>No hay productos/servicios asignados a esta venta</i></center></td>
            </tr>
        <?php
    }
?>
<script>
    $('#idcarg').val('<?php echo $tp ?>');
    actTot();
</script>