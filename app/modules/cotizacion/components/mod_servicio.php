
<?php $cc=0; foreach ($dt1 as $dta1): $cc++; ?>

    <tr class="encabezado">
        <td>
            <a href="javascript:void(0);" onclick="vAjax('cotizacion','mod_detservicio','<?php echo $dta1[iddet]?>'+'-/'+'<?php echo $dta1[am_nombre];?>'+'-/'+'<?php echo $dta1[no_nombre];?>','modal5')">
            <?php echo str_pad($dta1[iddet], 10, "0", STR_PAD_LEFT) ?>
            </a>
        </td>                     
        <td>
            <div class="input-group" style="width: 100px;">
            <input id="codprod_0" name="cod" style="text-align: center;" class="form-control input-xs" placeholder="Servicio" value="<?php echo $dta1[se_descripcion]; ?>">
            </div>
        </td>
        <td>
            <div class="input-group" style="width: 100px;">
            <input id="codprod_0" name="cod" style="text-align: center;" class="form-control input-xs" placeholder="Tipo" value="<?php echo $dta1[no_nombre]; ?>">
            </div>
        </td>
        <td>
            <div class="input-group" style="width: 100px;">
            <input id="codprod_0" name="cod" style="text-align: center;" class="form-control input-xs" placeholder="Ambito" value="<?php echo $dta1[am_nombre]; ?>">
            </div>
        </td>
        <td>
            <div class="input-group">
                <textarea id="nomprod_0" type="text" name="descrip" class="form-control input-xs" style="resize:none; height: 24px"  rows="1" tabindex="-1"><?php echo $dta1[de_descripcion] ?></textarea>
                <span style="vertical-align: top;" class="input-group-btn">                    
                    <a id="mostrar_<?php echo$cc; ?>" style=" display: block" class="btn btn-info input-xs" title="Detalle" onclick="mostrar(<?php echo$cc; ?>)"><span style="position: initial;margin-top: 4px;"><i class="fa fa-plus-circle"></i></span></a> 
                    <a id="ocultar_<?php echo$cc; ?>" style=" display: none" class="btn btn-danger input-xs" title="Detalle" onclick="ocultar(<?php echo$cc; ?>)"><span style="position: initial;margin-top: 4px;"><i class="fa fa-plus-circle"></i></span></a>
                </span>
            </div>

            <div id="detalle_<?php echo$cc; ?>" style="padding-bottom: 0px; padding-top: 4px; display: none">                <?php if ($dta1[idambito]==1) {?>
                <fieldset style="padding-bottom: 0px; padding-top: 4px;">
                    <label class="col-lg-2 control-label">Recojo  </label>
                    <div class="col-lg-2">
                        <div class="icon-addon addon-md"  >
                            <input class="form-control input-xs" value="<?php echo $dta1[recojo_lo]; ?>" style="text-align: right;" readonly="">
                            <label style="padding: 4px 0;" class="glyphicon  input-xs"><b class="mon">S/.</b></label>
                        </div>                  
                    </div>
                    <div class="col-lg-3">
                        <input style="text-align: center;" class="form-control input-xs" value="Local" readonly="">
                    </div>
                    <div class="col-lg-3">
                        <div class="icon-addon addon-md"  >
                            <input id="lo_<?php echo$cc; ?>" class="form-control input-xs" value="<?php echo $dta1[cant_lo]; ?>" style="text-align: right;"  onchange="suma(<?php echo$cc; ?>,this.value)">
                            <label style="padding: 4px 0;" class="glyphicon  input-xs"><b class="mon">Cant.</b></label>
                        </div>                       
                    </div>                    
                </fieldset>
                <fieldset style="padding-bottom: 0px; padding-top: 4px;">
                   <label class="col-lg-2 control-label">Recojo  </label>
                    <div class="col-lg-2">
                        <div class="icon-addon addon-md"  >
                            <input class="form-control input-xs" value="<?php echo $dta1[recojo_pe]; ?>" style="text-align: right;" readonly="">
                            <label style="padding: 4px 0;" class="glyphicon  input-xs"><b class="mon">S/.</b></label>
                        </div>                  
                    </div>
                    <div class="col-lg-3">
                        <input style="text-align: center;" class="form-control input-xs" value="Periferico" readonly="">
                    </div>
                    <div class="col-lg-3">
                        <div class="icon-addon addon-md"  >
                            <input id="pe_<?php echo$cc; ?>" class="form-control input-xs" value="<?php echo $dta1[cant_pe]; ?>" style="text-align: right;"  onchange="suma(<?php echo$cc; ?>,this.value)" >
                            <label style="padding: 4px 0;" class="glyphicon  input-xs"><b class="mon">Cant.</b></label>
                        </div>                       
                    </div> 
                </fieldset>
                <fieldset style="padding-bottom: 0px; padding-top: 4px;">
                    <label class="col-lg-2 control-label">Recojo  </label>
                    <div class="col-lg-2">
                        <div class="icon-addon addon-md"  >
                            <input class="form-control input-xs" value="<?php echo $dta1[recojo_ex]; ?>" style="text-align: right;" readonly="">
                            <label style="padding: 4px 0;" class="glyphicon  input-xs"><b class="mon">S/.</b></label>
                        </div>                  
                    </div>
                    <div class="col-lg-3">
                        <input style="text-align: center;" class="form-control input-xs" value="Extremo" readonly="">
                    </div>
                    <div class="col-lg-3">
                        <div class="icon-addon addon-md"  >
                            <input id="ex_<?php echo$cc; ?>" class="form-control input-xs" value="<?php echo $dta1[cant_ex]; ?>" style="text-align: right;"  onchange="suma(<?php echo$cc; ?>,this.value)">
                            <label style="padding: 4px 0;" class="glyphicon  input-xs"><b class="mon">Cant.</b></label>
                        </div>                       
                    </div>                    
                </fieldset>
            <?php } else if ( $dta1[idambito]==2) { ?>
            <?php $nacional==""; if($dta1[entrega_nacional]==1){$nacional="Facil Acceso";}elseif ($dta1[entrega_nacional]==2){$nacional="Mediano Acceso";} elseif ($dta1[entrega_nacional]==1) {$nacional = "Difil Acceso";} ?>               
                <fieldset style="padding-bottom: 0px; padding-top: 4px;">
                    <label class="col-lg-2 control-label">Recojo  </label>
                    <div class="col-lg-2">
                        <div class="icon-addon addon-md"  >
                            <input class="form-control input-xs" value="<?php echo $dta1[recojo_lo]; ?>" style="text-align: right;" readonly="">
                            <label style="padding: 4px 0;" class="glyphicon  input-xs"><b class="mon">S/.</b></label>
                        </div>                  
                    </div>
                    <div class="col-lg-3">
                        <input style="text-align: center;" class="form-control input-xs" value="<?php echo $nacional; ?>" readonly="">
                    </div>
                    <div class="col-lg-3">
                        <div class="icon-addon addon-md"  >
                            <input id="lo_<?php echo$cc; ?>" class="form-control input-xs" value="<?php echo $dta1[cant_lo]; ?>" style="text-align: right;" onchange="suma(<?php echo$cc; ?>,this.value)">
                            <label style="padding: 4px 0;" class="glyphicon  input-xs"><b class="mon">Cant.</b></label>
                        </div>                       
                    </div>                    
                </fieldset>
                <fieldset style="padding-bottom: 0px; padding-top: 4px;">
                   <label class="col-lg-2 control-label">Recojo  </label>
                    <div class="col-lg-2">
                        <div class="icon-addon addon-md"  >
                            <input class="form-control input-xs" value="<?php echo $dta1[recojo_pe]; ?>" style="text-align: right;" readonly="">
                            <label style="padding: 4px 0;" class="glyphicon  input-xs"><b class="mon">S/.</b></label>
                        </div>                  
                    </div>
                    <div class="col-lg-3">
                        <input style="text-align: center;" class="form-control input-xs" value="<?php echo $nacional; ?>" readonly="">
                    </div>
                    <div class="col-lg-3">
                        <div class="icon-addon addon-md"  >
                            <input id="pe_<?php echo$cc; ?>" class="form-control input-xs" value="<?php echo $dta1[cant_pe]; ?>" style="text-align: right;" onchange="suma(<?php echo$cc; ?>,this.value)">
                            <label style="padding: 4px 0;" class="glyphicon  input-xs"><b class="mon">Cant.</b></label>
                        </div>                       
                    </div> 
                </fieldset>
                <fieldset style="padding-bottom: 0px; padding-top: 4px;">
                    <label class="col-lg-2 control-label">Recojo  </label>
                    <div class="col-lg-2">
                        <div class="icon-addon addon-md"  >
                            <input class="form-control input-xs" value="<?php echo $dta1[recojo_ex]; ?>" style="text-align: right;" readonly="">
                            <label style="padding: 4px 0;" class="glyphicon  input-xs"><b class="mon">S/.</b></label>
                        </div>                  
                    </div>
                    <div class="col-lg-3">
                        <input style="text-align: center;" class="form-control input-xs" value="<?php echo $nacional; ?>" readonly="">
                    </div>
                    <div class="col-lg-3">
                        <div class="icon-addon addon-md"  >
                            <input id="ex_<?php echo$cc; ?>" class="form-control input-xs" value="<?php echo $dta1[cant_ex]; ?>" style="text-align: right;" onchange="suma(<?php echo$cc; ?>,this.value)">
                            <label style="padding: 4px 0;" class="glyphicon  input-xs"><b class="mon">Cant.</b></label>
                        </div>                       
                    </div>                    
                </fieldset>
            <?php } ?>
            </div>        
        </td>
        <td>
            <div class="input-group" style="width: 50px;">
            <input id="total_<?php echo$cc; ?>" style="text-align: center;" class="form-control input-xs" placeholder="Cantidad" value="<?php echo $dta1[cant_lo]+$dta1[cant_pe]+$dta1[cant_ex]; ?>">
            </div>
        </td>
        <td>
            <div class="input-group" style="width: 50px;">
            <input style="text-align: center;" class="form-control input-xs" placeholder="Cantidad" value="">
            </div>
        </td>
    </tr>
<?php endforeach; ?>

<script type="text/javascript">
    function mostrar(id) {       
        $('#detalle_'+id).show();
        $('#mostrar_'+id).hide();
        $('#ocultar_'+id).show();
    }
    function ocultar(id) { 
        $('#detalle_'+id).hide();
        $('#mostrar_'+id).show();
        $('#ocultar_'+id).hide();
    }

 function suma(id,valor){
    
    var total = 0;        
    
    total = parseInt($('#lo_'+id).val() )+ parseInt($('#pe_'+id).val()) + parseInt($('#ex_'+id).val());
    
    // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
    total = (total == null || total == undefined || total == "") ? 0 : total;

    // Colocar el resultado de la suma en el control "span".
    $('#total_'+id).val(total);       
    }

</script>
           