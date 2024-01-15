<table class="table table-hover">
    <tr style="font-size: 12px">                                
        <th style="width: 1px">#</th>
        <th style="width:130px">SERIE - NUM</th>
        <th>Detinatario</th>
        <th >Direccion</th>
        <th >Destino</th>
        <th style="width:60px">Peso</th>        
        <th style="width:60px">Estado</th>
        
    </tr>
    <tbody style="font-size: 11px" >
        <?php 
            if ($dt1) {
                $cc=0;
                foreach ($dt1 as $dta1): $cc++;
                    ?>
                    <tr class="<?php if($dta1[dd_estado]==3){echo 'warning';}elseif($dta1[dd_estado]==4){echo 'success';}else{echo 'danger';} ?>" >
                        <td><?php echo $cc; ?></td>
                        <td><?php echo $dta1[etiqueta] ?></td>
                        <td><?php echo $dta1[persona] ?> </td>
                        <td><?php echo $dta1[direccion] ?></td>                                 
                        <td style="width:200px;height: 10px; overflow: none;"><?php echo $dta1[distrito] ?></td>
                        <td>kg <?php echo $dta1[peso] ?></td>
                        <td>
                            <?php                        
                                switch ($dta1[dd_estado]) {
                                    case 2:
                                        ?><span class="label label-danger" style="font-size: 100%"><i class="fa fa-warning"></i>&nbsp;En ruta&nbsp;</span><?php
                                        break;                                    
                                    case 3:
                                        ?><span class="label label-warning" onclick="vAjax('exp_descargop','mod_Detalle',<?php echo $dta1['iddet'] ?>,'modal3');" style="font-size: 100%">&nbsp;<i class="fa fa-road"></i> Motivado &nbsp;</span><?php
                                        break;
                                    case 4:
                                        ?><span class="label label-success" onclick="vAjax('exp_descargop','mod_Detalle',<?php echo $dta1['iddet'] ?>,'modal3');" style="font-size: 100%"><i class="fa fa-check"></i>&nbsp;Entregado&nbsp;</span><?php
                                        break;                                   
                                    }
                                ?> 

                           </td>                        
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
                    <tr class="<?php if($dta2[dd_estado]==3){echo 'warning';}elseif($dta2[dd_estado]==4){echo 'success';}else{echo 'danger';} ?>">
                        <td><?php echo $cc; ?></td>
                        <td><?php echo $dta2[co_serie].'-'.str_pad($dta2[co_correlativo], 8, "0", STR_PAD_LEFT) ?></td>
                        <td><?php echo $dta2[de_nombre] ?> </td>
                        <td><?php echo $dta2[de_direccion] ?></td>                                 
                        <td style="width:200px;height: 10px; overflow: auto;"><?php echo $dta2[distrito] ?></td>
                        <td><?php echo $dta2[de_peso].'.'.$dta2[de_medida]; ?></td>
                        <td>
                            <?php                        
                                    switch ($dta2[dd_estado]) {
                                        case 2:
                                            ?><span class="label label-danger" style="font-size: 100%"><i class="fa fa-warning"></i>&nbsp;En ruta&nbsp;</span><?php
                                            break;
                                        case 3:
                                            ?><span class="label label-warning" onclick="vAjax('exp_descargop','mod_Detalle',<?php echo $dta1['iddet'] ?>,'modal3');" style="font-size: 100%"><i class="fa fa-road"></i>&nbsp;Motivado&nbsp;</span><?php
                                            break;
                                        case 4:
                                            ?><span class="label label-success" onclick="vAjax('exp_descargop','mod_Detalle',<?php echo $dta1['iddet'] ?>,'modal3');" style="font-size: 100%"><i class="fa fa-check"></i>&nbsp;Entregado&nbsp;</span><?php
                                            break;
                                        
                                        
                                    }
                                ?> 

                                
                        </td>
                        
                    </tr>

                    <?php
                endforeach;
            } 
        ?> 

    </tbody>                                    
</table>