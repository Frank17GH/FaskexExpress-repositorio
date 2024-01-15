<table class="table table-striped table-bordered table-hover" id="dtable2" width="100%" style="font-size: 11px">
    <thead>
        <tr>
            <th style="width: 5px" data-hide="esconder">Cód.Caja</th>            
            <th data-hide="esconder">USUARIO</th>
            <th data-hide="esconder">SEDE</th>
            <th style="width: 5px"></th>
            <th style="width: 100px">TOTAL</th>
        </tr>
    </thead>
    <?php         
        if ($dt1) {
            foreach ($dt1 as $dta):                
                ?> <?php if($dta[efectivo]) { ?>
                    <tr id="tr1_<?php echo $dta[efectivo] ?>" class="<?php echo ($dta[mo_tipo]==1)?'danger':'success'; ?>">
                        <td><?php echo $dta[idcaja] ?>  </td>                                               
                        <td><?php echo $dta[pe_apellidos].', '.$dta[pe_nombres] ?></td>
                        <td><?php echo  $dta[lo_abreviatura] ?></td>
                        <td><b>S/.</b></td>
                        <td style="text-align: right;"><b><?php echo number_format($dta[efectivo],2) ?></b></td>
                    </tr>
                    <?php } ?>
                <?php
            endforeach; 
        }else{
            ?>
                <tr>
                    <td colspan="11"><i><center>No hay aperturadas Cajas</center></i></td>
                </tr>
            <?php
        }
    ?>
</table>
<script type="text/javascript"> table(2,50,0); </script> 