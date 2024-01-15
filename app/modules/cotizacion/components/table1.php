<?php 
   
    if($dt1){ 
        foreach ($dt1 as $dta1):;
            ?>
                <tr  class="encabezado" > 
                    
                    <td style="text-align: center;">
                      <?php echo $dta1[de_descripcion]; ?>
                    </td>

                    <td>
                        <div class="icon-addon addon-md">
                            <input class="form-control input-xs" value="<?php echo number_format($dta1[de_precio],2) ?>" style="width: 70px;text-align: right;" readonly>
                            <label style="padding: 4px 0;" class="glyphicon  input-xs"><b class="mon">S/.</b></label>
                        </div>
                    </td>

                    <td>                       
                       <a class="btn btn-labeled btn-info"  onclick="vAjax('cotizacion','mod3', <?php echo $dta1[iddet]; ?>,'modal5');"> <span class="btn-label"></span><b>Agregar</b>&nbsp;&nbsp;</a>        
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