<table class="table table-hover">
<tr>
    <th>Acc.</th>                                
    <th># SALIDA</th>
    <th>F.SALIDA</th>
    <th>F.CIERRE</th>
    <th>CARGO</th>
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
                        <button type="button" class="btn btn-xs btn-success" title="Seleccionar" onclick="vAjax('exp_descargop','tbl_descargop_pendientes',<?php echo $dta1[iddespacho] ?>,'tbl_temp_descargop_pendietnes');vAjax('exp_descargop','tbl_descargop',<?php echo $dta1[iddespacho] ?>,'tbl_temp_descargop');" ><i class="fa fa-eye"></i>
                        </button>
                    </td>
                    <td><?php echo $dta1[de_codigo] ?></td>
                    <td><?php echo $dta1[de_fecha] ?> </td>
                    <td><?php echo $dta1[de_fechacierre] ?> </td>
                    <td><?php echo $dta1[cargo] ?></td>
                    <td><?php echo $dta1[responsable] ?></td>
                    <td><?php echo $dta1[cantidad] ?></td>
                </tr>

                <?php
            endforeach;
        } 
        
        ?>  
         <?php 
        if ($dt2) {
            $cc=0;
            foreach ($dt2 as $dta2): $cc++;
                ?>
                <tr style="cursor: pointer;">
                    <td>
                        <button type="button" class="btn btn-xs btn-success" title="Seleccionar" onclick="vAjax('exp_descargop','tbl_descargop_pendientes',<?php echo $dta2[iddespacho] ?>,'tbl_temp_descargop_pendietnes');vAjax('exp_descargop','tbl_descargop',<?php echo $dta2[iddespacho] ?>,'tbl_temp_descargop');" ><i class="fa fa-eye"></i>
                        </button>
                    </td>
                    <td><?php echo $dta2[de_codigo] ?></td>
                    <td><?php echo $dta2[de_fecha] ?> </td>
                    <td><?php echo $dta2[de_fechacierre] ?> </td>
                    <td><?php echo $dta2[cargo] ?></td>
                    <td><?php echo $dta2[responsable] ?></td>
                    <td><?php echo $dta2[cantidad] ?></td>
                </tr>

                <?php
            endforeach;
        } 
        ?>         
</tbody>                                    
</table>