 <div id="div_serviciosc" style="display:">
 <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;" >
    <table class="table">
        <thead>
            <tr class="encabezado">
                <th><center>Acc.</center></th>
                <th><center>Servicio</center></th>
                <th><center>Tipo</center></th>
                <th><center>Ambito</center></th>
                <th><center>Entrega</center></th>
                <th style="width:100%;"><center>Descripcion</center></th>
                <th style="width:100px;"><center>Precio</center></th>
                <th><center>Cantidad</center></th>
                <th ><center>Total</center></th>
            </tr>
        </thead>                                        
        <tbody >
        <?php  if($dt1){ $cc=0; foreach ($dt1 as $dta1): $cc++;$total+= $dta1[total];               ?>
            <tr class="encabezado" style="cursor: pointer;"  id="ttrr<?php echo $dta1[iddet] ?>">
                <td><input type="checkbox" id='chec<?php echo $dta1[iddet] ?>' onclick="sele(<?php echo $dta1[iddet] ?>, <?php echo $cc ?>);cal();fechas(<?php echo $dta1[v] ?>,<?php echo $dta1[d] ?>); $('#opera_tvisita').val(<?php echo $dta1[v] ?>) "></td>     
                <td>
                    <div class="input-group" style="width: 100px;">
                    <input  style="text-align: center;" class="form-control input-xs" placeholder="Servicio" value="<?php echo $dta1[se_descripcion]; ?>">
                    </div>
                </td>
                <td style="display:;"><?php echo $dta1[iddet] ?></td>
                <td style="display:;"><?php echo $dta1[am_nombre]; ?></td>
                <td>
                    <div class="input-group" style="width: 100px;">
                    <input  style="text-align: center;" class="form-control input-xs" placeholder="Tipo" value="<?php echo $dta1[no_nombre]; ?>">
                    </div>
                </td>
                <td>
                    <div class="input-group" style="width: 100px;">
                    <input  style="text-align: center;" class="form-control input-xs" placeholder="Ambito" value="<?php echo $dta1[am_nombre]; ?>">
                    </div>
                </td>
                <td>
                    <div class="input-group" style="width: 100px;">
                    <input  style="text-align: center;" class="form-control input-xs" placeholder="Ambito" value="<?php echo $dta1[tipo_entrega]; ?>">
                    </div>
                </td>
                <td>
                    <div class="input-group">
                        <textarea id="nomprod_0" type="text" name="descrip" class="form-control input-xs" style="resize:none; height: 24px"  rows="1" tabindex="-1"><?php echo $dta1[de_descripcion] ?></textarea>
                        <span style="vertical-align: top;" class="input-group-btn">                    
                            <a id="btn_mas_<?php echo$cc; ?>" style=" display: block" class="btn btn-info input-xs" title="Detalle" onclick="mostrar(<?php echo$cc; ?>)"><span style="position: initial;margin-top: 4px;"><i class="fa fa-plus-circle"></i></span></a> 
                            <a id="btn_menos_<?php echo$cc; ?>" style=" display: none" class="btn btn-danger input-xs" title="Detalle" onclick="ocultar(<?php echo$cc; ?>)"><span style="position: initial;margin-top: 4px;"><i class="fa fa-plus-circle"></i></span></a>
                        </span>
                    </div>

                    <div id="div_<?php echo$cc; ?>" style="padding-bottom: 0px; padding-top: 4px; display: none"> 

                     <div style="display: none">
                         <input type="text" id="recojo_<?php echo$cc; ?>" value="<?php echo $dta1[precio_recojo]; ?>">
                         <input type="text" id="entrega_<?php echo$cc; ?>" value="<?php echo $dta1[precio_entrega]; ?>">
                         <input type="text" id="muestra_<?php echo$cc; ?>" value="<?php echo $dta1[total_muestra]; ?>">
                         <input type="text" id="seguro_<?php echo$cc; ?>" value="<?php echo $dta1[total_seguro]; ?>">
                         <input type="text" id="gestion_<?php echo$cc; ?>" value="<?php echo $dta1[total_gestiones]; ?>">
                         <input type="text" id="transporte_<?php echo$cc; ?>" value="<?php echo $dta1[total_transporte]; ?>">
                         <input type="text" id="kma_<?php echo$cc; ?>" value="<?php echo $dta1[km_adicional]; ?>">
                         <input type="text" id="kmp_<?php echo$cc; ?>" value="<?php echo $dta1[km_precio]; ?>">
                     </div>    

                    <div class="col-md-8"  >
                        <div class="input-group input-group-sm" style="display:">
                            <span class="input-group-addon" style="padding: 0px 33px;">
                               <b class="mon"> Recojo </b>
                            </span>
                            <span class="input-group-addon" style="padding: 0px 19px;">
                              <?php echo $dta1[tipo_recojo]; ?>
                            </span>
                            <span class="input-group-addon" style="padding: 0px 19px;">
                                <div class="icon-addon addon-md"  >
                                        <input class="form-control input-xs" value="<?php echo $dta1[precio_recojo]; ?>" style="text-align: right;" readonly="">
                                        <label style="padding: 4px 0;" class="glyphicon  input-xs"><b class="mon">S/.</b></label>
                                    </div>
                            </span>                
                        </div>
                            <div class="input-group input-group-sm" style="display:">
                                <span class="input-group-addon" style="padding: 0px 33px;">
                                    <b class="mon">Volumen</b>                                                        
                                </span>

                                <span class="input-group-addon" style="padding: 0px 19px;">                                
                                     <div class="icon-addon addon-md"  >
                                        <input class="form-control input-xs"  value="<?php echo $dta1[total_muestra]; ?>" style="text-align: right;" readonly="">
                                        <label style="padding: 4px 0;" class="glyphicon  input-xs"><b class="mon">S/.</b></label>
                                    </div>
                                </span>

                                <span class="input-group-addon" style="padding: 0px 19px;">
                                     
                                </span>
                            </div>
                
                            <div class="input-group input-group-sm"  style="display:">
                                <span class="input-group-addon" style="padding: 0px 33px;">
                                    <b class="mon">Seguro</b>
                                </span>
                                <span class="input-group-addon" style="padding: 0px 19px;">
                                    <div class="icon-addon addon-md"  >
                                        <input class="form-control input-xs" value="<?php echo $dta1[total_seguro]; ?>" style="text-align: right;" readonly="">
                                        <label style="padding: 4px 0;" class="glyphicon  input-xs"><b class="mon">S/.</b></label>
                                    </div>
                                </span>
                                
                                <span class="input-group-addon" style="padding: 0px 19px;">                    
                                    
                                </span>                                     
                            </div>

                           

                        </div>
                                           
                    </div>        
                </td>
                <td>
                    <div class="input-group" style="width: 100px;">
                        <div class="icon-addon addon-md"  >
                            <input class="form-control input-xs" id="precio_<?php  echo $cc; ?>" value="<?php echo ($dta1[total_transporte] == 0)? number_format( $dta1[precio_entrega], 2, '.', '') : number_format( $dta1[total_transporte], 2, '.', '') ; ?>" style="text-align: right;" readonly="">
                            
                            <label style="padding: 4px 0;" class="glyphicon  input-xs"><b class="mon">S/.</b></label>
                        </div> 
                    </div>
                </td>

                <td>
                    <div class="input-group" style="width: 100px;">
                    <div class="input-group input-group-sm">
                            <span class="input-group-btn">
                                <button id="btn_1_<?php echo $cc; ?>" class="btn btn-danger" type="button" onclick=" $('#ddcant_'+<?php echo $cc; ?>).val(parseInt($('#ddcant_'+<?php echo $cc; ?>).val())-1);orden_total(<?php echo $cc; ?>);cal();" disabled><i class="glyphicon glyphicon-minus" ></i></button>
                            </span>
                            <div class="icon-addon addon-sm">
                                <input type="number" name="cant" id="ddcant_<?php  echo $cc; ?>" value="<?php echo $dta1[cantidad]; ?>" min="1"  class="form-control" style="text-align: center; padding: 0; width: 80px;" onkeyup="if($('#ddcant_'+<?php echo $cc; ?>).val()>0){ orden_total(<?php echo $cc; ?>);cal();} "  disabled>
                            </div>
                            <span class="input-group-btn">
                                <button id="btn_2_<?php echo $cc; ?>" class="btn btn-success" onclick="$('#ddcant_'+<?php echo $cc; ?>).val(parseInt($('#ddcant_'+<?php echo $cc; ?>).val())+1);orden_total(<?php echo $cc; ?>);cal(); " type="button" disabled><i class="glyphicon glyphicon-plus"></i></button>
                            </span>
                        </div>
                    </div>
                    <input type="hidden"  id="cant_<?php  echo $cc; ?>" value="<?php echo $dta1[cantidad]; ?>"  disabled>
                </td>

                <td>
                    <div class="input-group" style="width: 100px;">
                        <div class="icon-addon addon-md"  >
                            <input id="total_<?php  echo $cc; ?>" value="<?php echo number_format( $dta1[total], 2, '.', ''); ?>" style="text-align: right;" readonly="" class="form-control input-xs">
                            <label style="padding: 4px 0;" class="glyphicon  input-xs"><b class="mon">S/.</b></label>
                        </div> 
                    </div>
                </td>

            </tr>
        <?php endforeach; }  else{ ?>
            <tr>
                <td colspan="12"><center><i>No hay servicios cargados</i></center></td>
            </tr>
        <?php }?>                   
        </tbody>    
    </table>
  
    <div class="col-md-8" style="vertical-align: middle;">
        <div id="view1" style="vertical-align: middle;text-align: right;"></div>
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4 sortable-grid ui-sortable" style="padding-bottom: 15px">
            <div class="vigv">
                <label class="col-md-3 control-label" style="margin-top: 0px;text-align: right;font-size: 16px">
                    <b>SUBTOTAL</b>
                </label>
                <div class="col-md-9">
                    <div class="input-group">
                        <span class="input-group-addon" style="padding: 0px 10px;"><b class="mon">S/.</b></span>
                        <input id="or_sub" class="form-control" readonly="" style="text-align: right;" value="0">
                        <span class="input-group-addon" style="padding: 0px 10px;"><i class="fa fa-check"></i></span>
                    </div>
                </div>
            </div>
            <div class="vigv">
                <label class="col-md-3 control-label" style="margin-top: 0px;text-align: right;font-size: 16px"><b>I.G.V.</b></label>
                <div class="col-md-9">
                    <div class="input-group">
                        <span class="input-group-addon" style="padding: 0px 10px;"><b class="mon">S/.</b></span>
                        <input id="or_igv" value="0" class="form-control" readonly="" style="text-align: right;">
                        <span class="input-group-addon" style="padding: 0px 10px;"><i class="fa fa-check"></i></span>
                    </div>
                </div>
            </div>
          
            
            <label class="col-md-3 control-label" style="margin-top: 0px;text-align: right;font-size: 20px"><b>TOTAL</b></label>
            <div class="col-md-9">
                <div class="input-group">
                    <span class="input-group-addon" style="padding: 0px 10px;"><b class="mon">S/.</b></span>
                    <input name="total_cot" id="total_or"   type="text" value="0" class="form-control input-lg tot" style="text-align: right;"  readonly="">
                    <span class="input-group-addon" style="padding: 0px 10px;"><i class="fa fa-check"></i></span>
                </div>
            </div>
    </div>  
</div>
</div>

<script>

    function orden_total(cc){
        total=0;
        subtotal =0;        
        cant = 0;

        t = $('#cant_'+cc).val() - $('#ddcant_'+cc).val() ;
        cant = $('#digit_cantidad').val() - t;
        $('#digit_cantidad').val(cant);
        $('#cant_'+cc).val( $('#ddcant_'+cc).val());             

        if ($('#muestra_'+cc).val()>0){
            total = ((parseFloat($('#precio_'+cc).val()) + parseFloat($('#muestra_'+cc).val())) * parseInt($('#ddcant_'+cc).val())) + parseFloat($('#recojo_'+cc).val());
            subtotal = $('#or_sub').val()-($('#total_'+cc).val()-total);
           
           

            $('#or_sub').val(subtotal.toFixed(2));           
            $('#total_'+cc).val(total.toFixed(2));

           

              
        } else if ($('#transporte_'+cc).val()>0 || $('#gestion_'+cc).val()>0 || $('#kma_'+cc).val()>0 ) {

             total =  (parseFloat($('#recojo_'+cc).val()) + parseFloat($('#entrega_'+cc).val()) +  parseFloat($('#seguro_'+cc).val())+  parseFloat($('#gestion_'+cc).val())+  parseFloat($('#transporte_'+cc).val()) + (parseFloat($('#kma_'+cc).val()) * parseFloat($('#kmp_'+cc).val()))  )  * parseInt($('#ddcant_'+cc).val());
            subtotal = $('#or_sub').val()-($('#total_'+cc).val()-total);
            $('#or_sub').val(subtotal.toFixed(2));      
            $('#total_'+cc).val(total.toFixed(2));          
        }
        else {
            total = (parseFloat($('#precio_'+cc).val()) * parseInt($('#ddcant_'+cc).val())) + parseFloat($('#recojo_'+cc).val());
            subtotal = $('#or_sub').val()-($('#total_'+cc).val()-total);
                      
            $('#or_sub').val(subtotal.toFixed(2));           
            $('#total_'+cc).val(total.toFixed(2));             

        } 
      cal_igv();
    }




    function cal_igv(){
         igv = parseFloat($('#or_sub').val())*0.18;
         or_total= parseFloat($('#or_sub').val())+igv ;        
        $('#or_igv').val(igv.toFixed(2)); 
        $('#total_or').val(or_total.toFixed(2)); 
    }
</script>
 