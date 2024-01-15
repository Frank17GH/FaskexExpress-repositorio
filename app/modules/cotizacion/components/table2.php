 <?php // TABLA PRINCIPAL TEMPORAL 
    include '../../recursos/db.class.php';
    include '.Model.php';
    $class = new Mod();
 ?>
<div class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable" style="padding: 0px;">
    <div class="panel panel-default" style="padding: 5px;">
        <legend  style="margin-top: -6px;">&nbsp;&nbsp; <span class="glyphicon glyphicon-export"></span> <b>DETALLE DE SERVICIOS</b> <a style="    margin-top: -6px;" onclick="vAjax('cotizacion','mod2',0,'modal3');" class="btn btn-link">[+ Servicios]</a>
        </legend>
        <div class="panel-body" style="padding-bottom: 0px; padding-top: 1px; padding: 0px">
            <table class="table table-striped table-bordered table-hover" id="dtable1" width="100%">
                <thead>
                    <tr>
                        <th data-hide="esconder" style="width:5px">Item</th>
                        <th data-class="expand" ><center>Servicio</center></th>
                        <th data-hide="esconder" >Detalle </th>
                        <th data-hide="esconder" >Tipo de recojo </th>            
                        <th data-hide="esconder" >Tipo de Entrega</th>
                        <th data-hide="esconder" >Precio + recojo </th>
                        <th data-hide="esconder" >Cantidad</th>
                        <th data-hide="esconder" >Total sin IGV</th>
                        <th data-hide="esconder" >Acc.</th>
                    </tr>
                </thead>
                <tbody>
            <?php 
             $dt1 = $class->ser();
                if($dt1){$cc=0; $total = 0; $texto=""; 
                    foreach ($dt1 as $dta1): $cc++;
                        $total+= $dta1[total];  
                        $texto = "$dta1[se_descripcion] - $dta1[no_nombre] - $dta1[am_nombre]";          
                        ?>
                            <tr>
                                <td><?php echo$cc; ?></td>

                                <td><?php echo $dta1[se_descripcion]," - ", $dta1[am_nombre]; ?></td>
                                <td><?php echo $dta1[no_nombre]," - ",$dta1[de_descripcion]; ?></td>
                                <td> <?php echo $dta1[tipo_recojo] ?> </td>                            
                                <td> <?php echo $dta1[tipo_entrega] ?> </td>                            
                                <td> <?php echo $dta1[precio_entrega] ," +  ", $dta1[precio_recojo]; ?> </td>                            
                                <td> <?php echo $dta1[cantidad] ?> </td>                            
                                <td><b class="mon">S/.</b><?php echo  number_format($dta1[total],2,'.','') ; ?></td>                                             
                                <td>                                        
                                    <button type="button" class="btn btn-xs btn-default" onclick="confir('Eliminacion','¿Seguro que deseas quitar el item seleccionado?','cotizacion','del1',<?php echo $dta1[idtemp] ?>,'remove');"><i class="fa fa-times"></i></button>
                                </td> 

                            </tr>
                        <?php 
                    endforeach; 
                }
                else{
            ?>
                <tr>
                    <td colspan="12"><center><i>No hay servicios asignados a esta Cotizacion</i></center></td>
                </tr>
            <?php
                    }?>
                </tbody>
            </table>
             <input type="hidden" name="co_texto" value="<?php echo $texto; ?>" > 
        </div> 
    </div>
</div>

<script type="text/javascript"> table(1,50,1); </script>             

   <div class="col-md-8" style="vertical-align: middle;">
        <div id="view1" style="vertical-align: middle;text-align: right;"></div>
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4 sortable-grid ui-sortable">
            <div class="vigv">
                <label class="col-md-3 control-label" style="margin-top: 0px;text-align: right;font-size: 16px">
                    <b>SUBTOTAL</b>
                </label>
                <div class="col-md-9">
                    <div class="input-group">
                        <span class="input-group-addon" style="padding: 0px 10px;"><b class="mon">S/.</b></span>
                        <input class="form-control" readonly="" style="text-align: right;" id="tsubt" value="<?php echo $total; ?>">
                        <span class="input-group-addon" style="padding: 0px 10px;"><i class="fa fa-check"></i></span>
                    </div>
                </div>
            </div>
            <div class="vigv">
                <label class="col-md-3 control-label" style="margin-top: 0px;text-align: right;font-size: 16px"><b>I.G.V.</b></label>
                <div class="col-md-9">
                    <div class="input-group">
                        <span class="input-group-addon" style="padding: 0px 10px;"><b class="mon">S/.</b></span>
                        <input class="form-control" readonly="" style="text-align: right;" value="<?php echo $igv=$total*0.18; ?>">
                        <span class="input-group-addon" style="padding: 0px 10px;"><i class="fa fa-check"></i></span>
                    </div>
                </div>
            </div>
          
            
            <label class="col-md-3 control-label" style="margin-top: 0px;text-align: right;font-size: 20px"><b>TOTAL</b></label>
            <div class="col-md-9">
                <div class="input-group">
                    <span class="input-group-addon" style="padding: 0px 10px;"><b class="mon">S/.</b></span>
                    <input class="form-control input-lg tot" name="total_cot" type="text" style="text-align: right;" value="<?php echo $total+$igv; ?>" readonly="">
                    <span class="input-group-addon" style="padding: 0px 10px;"><i class="fa fa-check"></i></span>
                </div>
            </div>
    </div>       