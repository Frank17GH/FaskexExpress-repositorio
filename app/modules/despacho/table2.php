<table class="table table-hover">
    <tr>                                
        <th style="width: 1px">#</th>
        <th>Código</th>
        <th>Persona</th>
        <th >Direccion</th>
        <th >Distrito</th>
        <th style="width: 3px">Acc.</th>
        
    </tr>
    <tbody id="idveri2">
        <?php 
            if ($dt1) {
                $cc=0;
                foreach ($dt1 as $dta1): $cc++;
                    ?>
                    <tr style="cursor: pointer;">
                        <td><?php echo $cc; ?></td>
                        <td><?php echo $dta1[etiqueta] ?></td>
                        <td><?php echo $dta1[persona] ?> </td>
                        <td><?php echo $dta1[direccion] ?></td>                                 
                        <td><?php echo $dta1[distrito] ?></td>
                        <td>
                            
                            <button type="button" class="btn btn-xs btn-danger" title="Quitar" onclick="confir('Confirmacion','Seguro que deseas quitar paquete seleccionado?','despacho','del1',<?php echo  $dta1[idtemp] ?>+'-/'+<?php echo $dta1[idapoyo] ?>,'remove')">
               <i class="glyphicon glyphicon-trash"></i>
               </button>

                        </td>
                        
                    </tr>

                    <?php
                endforeach;
            } 
            ?>           
    </tbody>                                    
</table>
