<table class="table">
    <thead>
        <tr>
            <th colspan="6"><center>EGRESOS DE CAJA</center></th>
        </tr>
        <tr>
            <td style="width: 5px">FECHA</td>
            <td style="width: 80px">HORA</td>
            <td>DESCRIPCION</td>
            <td style="width: 5px"></td>
            <td style="width: 5px">Total</td>
            <td style="width: 5px">Acc.</td>
        </tr>
    </thead>
    <?php 
        if ($dt1) {
            foreach ($dt1 as $dta): 
                ?>
                    <tr id="tr2_<?php echo $dta[idmovimientos] ?>">
                        <td><?php echo date('d/m/Y',strtotime($dta[mo_fecha])) ?></td>
                        <td><?php echo date('h:m a',strtotime($dta[mo_fecha])) ?></td>
                        <td><?php echo $dta[mo_descrip] ?></td>
                        <td>S/.</td>
                        <td><?php echo number_format($dta[mo_total],2) ?></td>
                        <td><a class="btn btn-danger btn-xs" href="javascript:void(0);" onclick="confir('Confirmación','Seguro que deseas eliminar el Egreso seleccionado?','caja','del2',<?php echo $dta[idmovimientos] ?>,'remove')">Eliminar</a></td>
                    </tr>
                <?php
            endforeach; 
        }else{
            ?>
                <tr>
                    <td colspan="5"><i><center>No hay Egresos Registrados</center></i></td>
                </tr>
            <?php
        }
    ?>
</table>