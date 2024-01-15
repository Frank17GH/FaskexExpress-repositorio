<table class="table table-hover">
<tr>
    <th>Acc.</th>                                
    <th>CODIGO</th>
    <th>F.EMISION</th>
    <th>F.CIERRE</th>
    <th>DISTRITO</th>
    <th>RESPONSABLE</th>
    <th>CANTIDAD</th>
</tr>    
<tbody>
    <?php 
        if ($dt1) {
            $cc=0;
            foreach ($dt1 as $dta1): $cc++;
                ?>
                <tr style="cursor: pointer;">
                    <td>
                        <button type="button" class="btn btn-xs btn-success" title="Seleccionar" onclick="vAjax('exp_salidaruta','frm_update',<?php echo $dta1[iddespacho] ?>);" ><i class="fa fa-eye"></i>
                        </button>
                    </td>
                    <td><?php echo $dta1[codigo] ?></td>
                    <td><?php echo $dta1[emision] ?> </td>
                    <td><?php echo $dta1[emision] ?> </td>
                    <td><?php echo $dta1[cantidad] ?></td>                                 
                    <td><?php echo $dta1[responsable] ?></td>
                    <td><?php echo $dta1[cantidad] ?></td>
                </tr>

                <?php
            endforeach;
        } 
        ?>           
</tbody>                                    
</table>