<table class="table table-hover">
    <tr>                                
        <th style="width: 3px">Acc.</th>
        <th>Código</th>
        <th>Descripcion</th>
    </tr>
    <tbody>
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
                    </tr>
                    <?php
                endforeach;
                } 
            ?>           
    </tbody>                                    
</table>