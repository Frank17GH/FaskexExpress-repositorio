<table class="table table-hover">
    <tr style="font-size: 11px">                                
        <th style="width: 3px">Acc.</th>
        <th>Código</th>
        <th>Destinatario</th>
        <th>Estado</th>
    </tr>
    <tbody style="font-size: 10px">
        <?php 
            if ($dt1) {
                $cc=0;
                foreach ($dt1 as $dta1): $cc++;
                    ?>
                    <tr style="cursor: pointer;">
                        <td>
                            <button type="button" class="btn btn-xs btn-danger" title="Quitar" onclick="confir('Confirmacion','Seguro que deseas quitar paquete seleccionado?','exp_salidaruta','del_temp',<?php echo  $dta1[idtemp] ?>+'-/'+<?php echo $dta1[idapoyo] ?>,'remove')">
                                <i class="glyphicon glyphicon-trash"></i>
                            </button>
                        </td>
                        <td><?php echo $dta1[etiqueta] ?></td>
                        <td><?php echo $dta1[persona] ?> </td>
                        <td>
                            <?php                            
                            switch ($dta1[estado]) {
                                case 2:
                                    ?><span class="label label-danger" style="font-size: 100%"><i class="fa fa-warning"></i> PENDIENTE</span><?php
                                    break;
                                case 4:
                                    ?><span class="label label-success" onclick="vAjax('exp_descargop','mod_Detalle',<?php echo $dta1['iddet'] ?>,'modal3');" style="font-size: 100%"><i class="fa fa-check"></i> ENTREGADO</span><?php
                                    break;
                                case 3:
                                    ?><span class="label label-warning" onclick="vAjax('exp_descargop','mod_Detalle',<?php echo $dta1['iddet'] ?>,'modal3');" style="font-size: 100%">&nbsp;&nbsp;<i class="fa fa-road"></i> MOTIVADO&nbsp;&nbsp;</span><?php
                                    break;                                        
                            }
                        ?>                                
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
                            <button type="button" class="btn btn-xs btn-danger" title="Quitar" onclick="confir('Confirmacion','Seguro que deseas quitar paquete seleccionado?','exp_salidaruta','del_temp_com',<?php echo  $dta2[idtemp] ?>+'-/'+<?php echo $dta2[idapoyo] ?>,'remove')">
                                <i class="glyphicon glyphicon-trash"></i>
                            </button>
                        </td>
                        <td><?php echo $dta2[etiqueta] ?></td>
                        <td><?php echo $dta2[persona] ?> </td>
                        <td><?php

                            
                                    switch ($dta2[estado]) {
                                        case 2:
                                            ?><span class="label label-danger" style="font-size: 100%"><i class="fa fa-warning"></i> PENDIENTE</span><?php
                                            break;
                                        case 3:
                                            ?><span class="label label-success" onclick="vAjax('exp_descargop','mod_Detalle',<?php echo $dta1['iddet'] ?>,'modal3');" style="font-size: 100%"><i class="fa fa-check"></i> ENTREGADO</span><?php
                                            break;
                                        case 4:
                                            ?><span class="label label-warning" onclick="vAjax('exp_descargop','mod_Detalle',<?php echo $dta1['iddet'] ?>,'modal3');" style="font-size: 100%">&nbsp;&nbsp;<i class="fa fa-road"></i> MOTIVADO&nbsp;&nbsp;</span><?php
                                            break;
                                        
                                    }
                                ?>                         
                    </tr>
                    <?php
                endforeach;
                } 
            ?>
            
    </tbody>                                    
</table>