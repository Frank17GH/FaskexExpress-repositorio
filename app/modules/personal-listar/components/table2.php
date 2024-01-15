        <?php 
            if($dt1){
                foreach ($dt1 as $dta1): 
                    ?>
                        <tr style="font-size: 12px" id="tr1_<?php echo $dta1[idderechohabiente] ?>">
                            <td>
                             <?php echo $dta1[de_dni] ?>
                            </td>
                          
                            <td style="text-align: center;">
                               <?php echo $dta1[de_nombres] ?>
                            </td>

                               <td style="text-align: center;">
                               <?php echo $dta1[de_parentezco] ?>
                            </td>

                            <td>
                                <button class="btn btn-danger btn-xs" type="button" onclick="confir('Confirmación','Seguro que deseas eliminar el personal seleccionado?','personal-listar','del2',<?php echo $dta1[idderechohabiente] ?>,'remove')">
                                <i class="fa fa-trash "></i> ELIMINAR
                                </button>
                            </td>
                        </tr>
                    <?php 
                endforeach; 
            }
        ?>    
