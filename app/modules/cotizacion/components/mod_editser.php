<div class="modal-header" style="padding: 10px;">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        ×
    </button>
    <h4 class="modal-title" id="myModalLabel">Agregar Servicios</h4>
</div>
<?php $rol="" ; if($_SESSION[fasklog][rol] == 1){ $rol = "";} else {$rol= 'readonly=""' ; }  ?>

<?php $idcot = explode('-/', $s02)[1]; ?>

<?php if($dt1) {
      $iddet=$dt1 [0]['iddet'];
      $de_descripcion=$dt1 [0]['de_descripcion'];
      $de_precio=$dt1 [0]['de_precio'];
      $adc_local =$dt1 [0]['no_adlocal'];
      $adc_nacional =$dt1 [0]['no_adicional'];
      $no_periferico =$dt1 [0]['no_periferico'];
      $aereo_fa = $dt1 [0]['no_aereof'];
      $aereo_me = $dt1 [0]['no_aereom'];
      $no_extremo =$dt1 [0]['no_extremo'];
      $idnom =$dt1 [0]['idnom'];
      $idambito =$dt1 [0]['idambito'];
      $recojo = $dt1 [0]['recojo'];
      $entrega = $dt1 [0]['entrega'];
      $entrega_nacional = $dt1 [0]['entrega_nacional'];     
}else {$d='';} ?>




<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <div role="content">
                <div class="widget-body">
                   
                    <fieldset>
                    
                        
                        <div class="well well-sm well-light col-sm-12" style="    padding: 0px;">
                            <div class="col-md-12">
                                <legend style="    font-size: 14px;">
                                    <span class="glyphicon glyphicon-shopping-cart"></span> DETALLE
                                </legend>
                            </div>                              

                            <div class="col-md-12" >                             
                               <div role="content">
                <div class="widget-body no-padding">
                    <form class="form-horizontal" id="inspr">
                          
                    <fieldset>
                      
                    <input type="hidden" class="form-control" name="idprod" readonly="" value="<?php echo $iddet; ?>">
                    <input type="hidden" class="form-control" name="idcotizacion" readonly="" value="<?php echo $idcot; ?>">   
                    <!-- MUESTRAS FORMULARIO -->                    
                        <?php if ($idnom==3  || $idnom==5 ||  $idnom==9 || $idnom==10) { ?>
                            <div class="col-md-6" >
                                <div class="input-group input-group-sm" id="r_1" style="display:" onclick="javascript: $('#preal_1').focus();">
                                    <span class="input-group-addon" style="padding: 0px 19px;">
                                         Peso.Real 
                                    </span>
                                    <span class="input-group-addon" style="padding: 0px 19px;">
                                         Peso. Volumen
                                    </span>                
                                </div> 
                                <div class="input-group input-group-sm" id="r_1" onclick="javascript: $('#preal_1').focus();" style="display:">
                                    <span class="input-group-addon" style="padding: 0px 19px;">                    
                                        <div class="icon-addon addon-md">
                                             <input type="number" name="peso_real" id="preal_1" placeholder="0"  onkeyup="pvolumen(1);"  value="" class="form-control input-xs" onkeydown="if(event.keyCode === 13){
                                              $('#plargo_1').focus();}">
                                                <label style="padding: 2px ;" class="glyphicon  input-xs"><b class="mon">Kg.</b></label>
                                        </div>  
                                    </span>

                                    <span class="input-group-addon" style="padding: 0px 19px;">
                                        <div class="icon-addon addon-md"  >
                                            <input type="number" name="peso_volumen" id="pvol_1" style="background: white" class="form-control input-xs" placeholder="0"   value="0"  readonly="" >
                                            <label style="padding: 2px ;" class="glyphicon  input-xs"><b class="mon">Kg.</b></label>
                                        </div>  
                                    </span>                
                                </div>
                                <div class="input-group input-group-sm"  style="display:">
                                    <span class="input-group-addon" style="padding: 0px 19px;">
                                         <b class="mon">Adicional</b>
                                    </span>                         
                                    <span class="input-group-addon" style="padding: 0px 19px;">                                
                                        <div class="icon-addon addon-md"  >
                                            <input type="number" name="adicional" id="adicional" onkeyup="pvolumen(1);"   style="background: white" class="form-control input-xs" placeholder="0" value="<?php if ($iddet==55){echo $aereo_fa; }elseif ($iddet==56) {
                                                        echo $aereo_me;
                                                    }elseif ($idambito == 1){
                                                        echo $adc_local;
                                                    } else {
                                                        echo $adc_nacional;
                                                    } ?>" <?php echo $rol; ?> >

                                            <label style="padding: 2px ;" class="glyphicon  input-xs"><b class="mon">S/.</b></label>
                                        </div>  
                                    </span>
                                </div> 
                                <div class="input-group input-group-sm"  style="display:">
                                   <span class="input-group-addon" style="padding: 0px 19px;">
                                         <b class="mon">Total</b>
                                    </span>
                                    <span class="input-group-addon" style="padding: 0px 19px;">                    
                                        <div class="icon-addon addon-md"  >
                                           <input type="number" style="background: white" class="form-control input-xs"  id="ptotal_1"  value="0" name="total_volumen" readonly="" > 
                                            <label style="padding: 2px ;" class="glyphicon  input-xs"><b class="mon">S/.</b></label>
                                        </div>  
                                    </span>                                     
                                </div> 
                            </div>
                        <?php } ?>
                    
                    <!--SERVICIO DE TRANSPORTE -->                     
                        <?php if ($idnom==14) { ?>                        
                            <div class="col-md-6" >
                                <div class="input-group input-group-sm" style="display:">
                                    <span class="input-group-addon" style="padding: 0px 19px;">
                                         Peso.bruto 
                                    </span>
                                    <span class="input-group-addon" style="padding: 0px 19px;">
                                         Peso. Volumen
                                    </span>
                                    <span class="input-group-addon" style="padding: 0px 19px;">
                                        Volumen m3
                                    </span>                
                                </div>
                                <div class="input-group input-group-sm" id="r_1" style="display:">
                                    <span class="input-group-addon" style="padding: 0px 19px;">                    
                                        <div class="icon-addon addon-md">
                                             <input type="number" name="peso_real" id="preal_1" class="form-control input-xs" placeholder="0"  onkeyup="pvolumen(1);" value="0" >
                                                <label style="padding: 2px ;" class="glyphicon  input-xs"><b class="mon">Kg.</b></label>
                                        </div>  
                                    </span>

                                    <span class="input-group-addon" style="padding: 0px 19px;">                                
                                        <div class="icon-addon addon-md"  >
                                            <input type="number" name="peso_volumen" id="pvol_1" onkeyup="pvolumen(1);" style="background: white" class="form-control input-xs" placeholder="0"   value="0"  <?php echo $rol; ?>>
                                            <label style="padding: 2px ;" class="glyphicon  input-xs"><b class="mon">Kg.</b></label>
                                        </div>  
                                    </span>

                                    <span class="input-group-addon" style="padding: 0px 19px;">
                                        <div class="icon-addon addon-md"  >
                                            <input type="number" name="volumen_cubo" id="mvol_1" onkeyup="pvolumen(1);" style="background: white" class="form-control input-xs" placeholder="0"   value="0"  <?php echo $rol; ?>>
                                            <label style="padding: 2px ;" class="glyphicon  input-xs"><b class="mon">m3.</b></label>
                                        </div>  
                                    </span>              
                                </div>
                                <input type="hidden" id="adicional" value="0" > 
                                
                                <div class="input-group input-group-sm"  style="display:">
                                    <span class="input-group-addon" style="padding: 0px 19px;">
                                         <b class="mon">Total</b>
                                    </span>
                                    <span class="input-group-addon" style="padding: 0px 19px;">                    
                                        <div class="icon-addon addon-md"  >
                                           <input type="number" name="" id="total_tran" style="background: white" class="form-control input-xs" value="0"  onkeyup="javascript: $('#total_transporte').val($('#total_tran').val()); cot_total();" > 
                                            <label style="padding: 2px ;" class="glyphicon  input-xs"><b class="mon">S/.</b></label>
                                        </div>  
                                    </span>                                     
                                </div> 
                            </div>                               
                        <?php } ?>  

                    <!--IMAGEN MUESTRAS -->    
                        <?php if ($idnom==3 ||  $idnom==5 || $idnom==14  || $idnom==9 || $idnom==10) { ?>
                            <div class="col-md-6">
                               <div class="col-md-4" style="text-align: center;">
                                    <img style="width: 70px" src="app/recursos/img/caja_largo.png" >                         
                                    <div class="icon-addon addon-md"  >                            
                                        <input type="number" name="largo" id="plargo_1" class="form-control input-xs" placeholder="Largo (cm)"  onkeyup="pvolumen(1);" onkeydown="if(event.keyCode === 13){
                                              $('#pancho_1').focus();}" value="">
                                        <label style="padding: 2px 0;" class="glyphicon  input-xs"><b class="mon">Cm.</b></label>
                                    </div> 
                                </div>
                                <div class="col-md-4" style="text-align: center;">
                                    <img style="width: 70px" src="app/recursos/img/caja_ancho.png" >
                                    <div class="icon-addon addon-md"  >                            
                                        <input type="number" name="ancho" id="pancho_1" onkeydown="if(event.keyCode === 13){
                                              $('#palto_1').focus();}" class="form-control input-xs" placeholder="Ancho (cm)"  onkeyup="pvolumen(1);" value="">
                                        <label style="padding: 2px 0;" class="glyphicon  input-xs"><b class="mon">Cm.</b></label>
                                    </div>
                                </div>
                                <div class="col-md-4" style="text-align: center;">
                                    <img style="width: 70px" src="app/recursos/img/caja_alto.png">                        
                                    <div class="icon-addon addon-md"  >                            
                                        <input type="number" name="alto" id="palto_1" class="form-control input-xs" placeholder="Alto (cm)" onkeyup="pvolumen(1);" onkeydown="if(event.keyCode === 13){
                                              $('#sel_recojo').focus();}"  value="">
                                        <label style="padding: 2px 0;" class="glyphicon  input-xs"><b class="mon">Cm.</b></label>
                                    </div>
                                </div>
                            </div>                
                        <?php } ?>               
                  
                    <!-- SEGUROS FORMULARIO -->     
                        <?php if ($idnom==5 || $idnom==9 || $idnom==10 || $idnom==14) { ?>   

                         <div class="col-md-12"> </div>
                        <div class="col-md-3" >
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="c_seguro" onclick="mostrar('seguro'); $('#nom_pro').focus();"   class="checkbox style-0" >
                                    <span>Seguro</span>
                                </label>
                            </div>
                        </div>

                        <div id="div_seguro" style="display: none">
                            <div class="col-md-12" style="margin-top: 5px; margin-bottom: 10px;">                       
                                <label class="col-md-2 control-label"><b>Producto</b></label>
                                <div class="col-md-6">
                                    <input type="text" name="se_producto" id="nom_pro" placeholder="nombre de producto"  onkeydown="if(event.keyCode === 13){ $('#tipo_moneda').focus();}" class="form-control input-xs" >
                                </div>
                            </div>
                            <div class="col-md-8"  >
                                <div class="input-group input-group-sm" style="display:">
                                    <span class="input-group-addon" style="padding: 0px 19px;">
                                        Tipo de Moneda
                                    </span>
                                    <span class="input-group-addon" style="padding: 0px 19px;">
                                         Cambio
                                    </span>
                                    <span class="input-group-addon" style="padding: 0px 19px;">
                                        Valor de mercaderia                        
                                    </span>                
                                </div>
                                <div class="input-group input-group-sm" style="display:">
                                    <span class="input-group-addon" style="padding: 0px 19px;">                    
                                        <div class="icon-addon addon-md">
                                            <select class="form-control" id="tipo_moneda" onchange="if(this.value==0){ $('#cambio').val(1); } else { FCotizacion(4); }; cot_seguro(); $('#cambio').focus(); ">
                                                <option value="0">Soles</option>
                                                <option value="4">Dolares</option>
                                            </select>
                                        </div>  
                                    </span>

                                    <span class="input-group-addon" style="padding: 0px 19px;">                                
                                        <div class="icon-addon addon-md"  >
                                            <input type="number" name="se_cambio" id="cambio" value="1" onkeyup="cot_seguro();"  onkeydown="if(event.keyCode === 13){ $('#precio').focus();}" style="background: white" class="form-control input-xs" <?php echo $rol; ?>>
                                            <label style="padding: 2px ;" class="glyphicon  input-xs"><b class="mon">S/.</b></label>
                                        </div>  
                                    </span>

                                    <span class="input-group-addon" style="padding: 0px 19px;">
                                        <div class="icon-addon addon-md"  >
                                            <input type="number" name="se_valor" id="precio" onkeyup="cot_seguro();" value="0" onkeydown="if(event.keyCode === 13){ $('#porcentaje').focus();}" style="background: white" class="form-control input-xs"  >
                                            <label style="padding: 2px ;" class="glyphicon  input-xs"><b class="mon">S/.</b></label>
                                        </div>  
                                    </span>

                                </div>
                                
                                <div class="input-group input-group-sm"  style="display:">
                                    <span class="input-group-addon" style="padding: 0px 19px;">
                                         <b class="mon">Porcentaje</b>
                                    </span>
                                    <span class="input-group-addon" style="padding: 0px 19px;">
                                        <div class="icon-addon addon-md"  >
                                            <input type="number" name="se_porcentaje" id="porcentaje" value="3" onkeyup="cot_seguro();" onkeydown="if(event.keyCode === 13){ $('#descripcion').focus();}"  style="background: white" class="form-control input-xs" <?php echo $rol; ?>>
                                            <label style="padding: 2px ;" class="glyphicon  input-xs"><b class="mon">%/.</b></label>
                                        </div>  
                                    </span>
                                    <span class="input-group-addon" style="padding: 0px 19px;">
                                         <b class="mon">Total</b>
                                    </span>
                                    <span class="input-group-addon" style="padding: 0px 19px;">                    
                                        <div class="icon-addon addon-md"  >
                                           <input type="number" name="" id="seguro" style="background: white" class="form-control input-xs" value="0"   > 
                                            <label style="padding: 2px ;" class="glyphicon  input-xs"><b class="mon">S/.</b></label>
                                        </div>  
                                    </span>                                     
                                </div> 
                            </div>
                            <div class="col-md-4">                           
                                 <textarea class="form-control" name="se_detalle" id="descripcion" onkeydown="if(event.keyCode === 13){ $('#sel_recojo').focus();}" placeholder="Detalle" rows="4"></textarea>
                            </div>
                        </div>
                        <?php } ?>                                        

                    <!-- GESTIONES -->
                     <?php if ($idnom==4) { ?>
                        <div class="col-md-12"></div>            
                        <!-- SUB-SERVICIOS -->                       
                            <div class="col-md-3">
                                <label>Sub-Servicios</label>
                                <select class="form-control input-xs" id="sel_servicio" onchange="nombre=$('#sel_servicio option:selected').text();$('#nom_servicio').val(nombre); valor('servicio',this.value);cot_gestion();" >

                                <option>Seleccionar</option>
                                    <?php 
                                        $class = new Mod();
                                            $dt5 = $class->recojo_g($iddet);
                                        if($dt5){
                                        foreach ($dt5 as $dta5): 
                                    ?>
                                        <option value="<?php echo $dta5[re_costo]; ?>"><?php echo $dta5[re_nombre]; ?></option>
                                    <?php endforeach; } ?>
                                    <option  value="0">Otros</option>
                                </select>
                            </div>

                            <div class="col-md-3" style="display: none " id="div_servicio" >
                                <label>Sub-Servicio </label>
                                <input type="text" name="ge_nombre" id="nom_servicio"  onkeydown="if(event.keyCode === 13){
                                              $('#servicio').focus();}"  class="form-control input-xs" value="" placeholder="nombre">
                            </div>
                            <?php if ($iddet==65) { ?>
                            <div class="col-md-2" style="padding-bottom: 15px;" >
                                <label>Precio </label>
                                <div class="icon-addon addon-md" >
                                    <input type="text" name="ge_precio" id="servicio" onkeyup="cot_gestion();" value="0.00" onkeydown="if(event.keyCode === 13){
                                              $('#adicional').focus();}" class="form-control input-xs"  >
                                    <label style="padding: 2px 0;" class="glyphicon  input-xs"><b class="mon">S/.</b></label>
                                </div>                    
                            </div>
                            <?php } else {?>
                                <input type="hidden" id="servicio"  value="0.00" >
                            <?php } ?>

                        <!-- CALCULOS -->
                         <div class="col-md-12"> </div>
                        <div class="col-md-3" >
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="c_gestion" onclick="mostrar('gestion')" class="checkbox style-0" >
                                    <span>Adicional</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12" style="padding-bottom: 15px;"> </div>

                            <div id="div_gestion" style="display: none; " >                                                                       
                                <div class="col-md-8">
                                    <div class="input-group input-group-sm" id="r_1" style="display:">
                                        <?php  if($iddet==60) {  ?>
                                        <span class="input-group-addon" style="padding: 0px 19px;">
                                            Costo Fijo
                                        </span>  <?php }else if($iddet==67) {?>
                                            <span class="input-group-addon" style="padding: 0px 47px;">
                                                Valor
                                            </span>
                                            <span class="input-group-addon" style="padding: 0px 47px;">
                                                Interes
                                            </span> <?php } ?>

                                        <span class="input-group-addon" style="padding: 0px 19px;">
                                            Costo Adicional 
                                        </span>                                        
                                    </div> 
                                    <div class="input-group input-group-sm" id="r_1" style="display:">
                                     <?php  if($iddet==60) {?>                           
                                        <span class="input-group-addon" style="padding: 0px 4px;">                                    
                                            <div class="icon-addon addon-md"  >
                                                <input type="number" name="" id="fijo" value="<?php echo $de_precio ?>" onkeyup="cot_gestion();" style="background: white" class="form-control input-xs" >
                                                <label style="padding: 2px ;" class="glyphicon  input-xs"><b class="mon">S.</b></label>
                                            </div>  
                                        </span> <?php } else if($iddet==67) {?>
                                        <span class="input-group-addon" >                                    
                                            <div class="icon-addon addon-md"  >
                                                <input type="number" name="ge_valor" id="valor_precio" onkeydown="if(event.keyCode === 13){
                                              $('#interes').focus();}" value="0.00" style="background: white" class="form-control input-xs" onkeyup="cot_gestion();" >
                                                <label style="padding: 2px ;" class="glyphicon  input-xs"><b class="mon">S.</b></label>
                                            </div>  
                                        </span> 
                                        <span class="input-group-addon" >                                    
                                            <div class="icon-addon addon-md"  >
                                                <input type="number" name="ge_interes" id="interes" value="25" onkeyup="cot_gestion();"  onkeydown="if(event.keyCode === 13){ $('#adicional').focus();}" style="background: white" class="form-control input-xs"  >
                                                <label style="padding: 2px ;" class="glyphicon  input-xs"><b class="mon">%.</b></label>
                                            </div>  
                                        </span> 
                                        <?php } ?>
                                        <span class="input-group-addon">
                                            <div class="icon-addon addon-md">                                   
                                                 <input type="number" name="adicional" id="adicional" onkeyup="cot_gestion();" onkeydown="if(event.keyCode === 13){$('#fraccion').focus();}"  class="form-control input-xs"  value="<?php echo $adc_local; ?>">
                                                    <label style="padding: 2px ;" class="glyphicon  input-xs"><b class="mon">S/.</b></label>
                                            </div>  
                                        </span>                                          
                                    </div>

                                    <div class="input-group input-group-sm"  style="display:">
                                        <span class="input-group-addon" style="padding: 0px 4px;">
                                             <b class="mon">Fraccion de hora</b>
                                        </span>                            
                                        <span class="input-group-addon" style="padding: 0px 4px;">                                    
                                            <div class="icon-addon addon-md"  >
                                                <input type="number" name="ge_fraccion" onkeyup="cot_gestion();" id="fraccion" value="0"  onkeydown="if(event.keyCode === 13){
                                              $('#sel_recojo').focus();}" style="background: white" class="form-control input-xs"  >
                                                <label style="padding: 2px ;" class="glyphicon  input-xs"><b class="mon">S.</b></label>
                                            </div>  
                                        </span>
                                        <span class="input-group-addon" style="padding: 0px 4px;">
                                             <b class="mon">TOTAL GESTION</b>
                                        </span>                             
                                        <span class="input-group-addon" style="padding: 0px 4px;">                                    
                                            <div class="icon-addon addon-md"  >
                                                <input type="number" name="" id="total_gestion" style="background: white" class="form-control input-xs"readonly="">
                                                <label style="padding: 2px ;" class="glyphicon  input-xs"><b class="mon">S/.</b></label>
                                            </div>  
                                        </span>
                                    </div>
                                </div>                    
                            </div>
                        <?php } ?>   

                    <!-- SERVICIO EXPRESS--> 
                        <?php if ($idnom==13) {?>      
                        <div class="col-md-6" >                     
                            <div class="input-group input-group-sm" id="r_1" onclick="javascript: $('#preal').focus();" style="display:">
                                <span class="input-group-addon" style="padding: 0px 19px;">
                                     <b class="mon">Peso</b>
                                </span> 

                                <span class="input-group-addon" style="padding: 0px 19px;">
                                    <div class="icon-addon addon-md"  >
                                        <input type="number" name="peso_real" id="preal" onkeyup="express();" class="form-control input-xs" placeholder="0"   value="0"  >
                                        <label style="padding: 2px ;" class="glyphicon  input-xs"><b class="mon">Kg.</b></label>
                                    </div>  
                                </span>                
                            </div>
                            <div class="input-group input-group-sm"  style="display:">
                                <span class="input-group-addon" style="padding: 0px 19px;">
                                     <b class="mon">Adicional</b>
                                </span>                         
                                <span class="input-group-addon" style="padding: 0px 19px;">                                
                                    <div class="icon-addon addon-md"  >
                                        <input type="text" name="adicional" id="adicional" onkeyup="express();"   style="background: white" class="form-control input-xs" placeholder="0" value=" <?php echo $adc_local; ?> "
                                                 <?php echo $rol; ?> >

                                        <label style="padding: 2px ;" class="glyphicon  input-xs"><b class="mon">S/.</b></label>
                                    </div>  
                                </span>
                            </div> 
                            <div class="input-group input-group-sm"  style="display:">
                               <span class="input-group-addon" style="padding: 0px 19px;">
                                     <b class="mon">Total</b>
                                </span>
                                <span class="input-group-addon" style="padding: 0px 19px;">                    
                                    <div class="icon-addon addon-md"  >
                                       <input type="number" style="background: white" class="form-control input-xs"  id="ptotal_1"  value="0"  readonly="" > 
                                        <label style="padding: 2px ;" class="glyphicon  input-xs"><b class="mon">S/.</b></label>
                                    </div>  
                                </span>                                     
                            </div> 
                        </div>
                        <?php } ?>

                    <!-- TABLA DE PRECIOS -->      
                        
                        <div class="col-md-12"  style="margin-top: 7px;margin-bottom: 7px;"></div>
                       
                        <?php  if ($idnom==6 ) { ?> 

                        <!-- MOTORIZADOS -->
                            <div class="col-md-3">
                                <label>Kilometros adicionales </label>  
                                <div class="icon-addon addon-md"  >
                                     <input type="text" name="km_adicional" id="km_adicional" value="0" onkeyup="motorizado();"  class="form-control input-xs">
                                    <label style="padding: 2px 0;" class="glyphicon  input-xs"><b class="mon">Km.</b></label>
                                </div>              
                            </div>
                            <div class="col-md-2">
                                <label>Precio</label>
                                <div class="icon-addon addon-md"  >
                                     <input type="text" name="km_precio" id="km_precio" value="<?php echo $adc_local; ?>" onkeyup="motorizado();"  class="form-control input-xs"  <?php echo $rol; ?> >                     
                                    <label style="padding: 2px 0;" class="glyphicon  input-xs"><b class="mon">S/.</b></label>
                                </div>                    
                            </div> 
                            <input type="hidden" name="precio_recojo" id="km_total" value="0" >
                            <input type="hidden"  id="recojo" value="0" >
                            <input type="hidden" name="tipo_recojo" id="tipo_recojo" value="KM  adicional">

                        <?php }else{ ?>
                    <!-- RECOJOS -->
                        <input type="hidden"  id="km_adicional" value="0" >
                        <input type="hidden"  id="km_precio" value="0" >
                        <input type="hidden"  id="km_total" value="0" >
                            <div class="col-md-3">
                                <label>Recojo</label>
                                <select class="form-control input-xs" id="sel_recojo" onchange="valor('recojo',this.value); nombre = $('#sel_recojo option:selected').text();$('#tipo_recojo').val(nombre); reen(); " onkeydown="if(event.keyCode === 13){
                                              $('#sel_entrega').focus();}" >
                                        <option  value="0.00">SIN RECOJO</option>
                                            <?php 
                                                $class = new Mod();
                                                if($idnom==4){
                                                    $dt4 = $class->recojo_g(1);
                                                }else {
                                                     $dt4 = $class->recojo($recojo);
                                                }                                   
                                                if($dt4){
                                                foreach ($dt4 as $dta4): 
                                            ?>
                                                <option value="<?php echo $dta4[re_costo] ?>"><?php echo $dta4[re_nombre]; ?></option>
                                            <?php endforeach; } ?>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label>Precio</label>
                                <div class="icon-addon addon-md"  >
                                     <input type="text" name="precio_recojo" id="recojo" class="form-control input-xs" <?php if ($idnom==14) { echo '';} else {echo $rol;} ?> value="0.00" <?php echo $rol; ?> onkeyup="reen();" >
                                     <input type="hidden" name="tipo_recojo" id="tipo_recojo" class="form-control input-xs" readonly="" value="SIN RECOJO">
                                    <label style="padding: 2px 0;" class="glyphicon  input-xs"><b class="mon">S/.</b></label>
                                </div>                    
                            </div>
                        <?php } ?> 

                    <!-- ENTREGAS -->
                        <div class="col-md-3">
                            <label>Entrega</label>
                            <select class="form-control input-xs" id="sel_entrega" onchange="valor('entrega',this.value);  nombre = $('#sel_entrega option:selected').text();$('#tipo_entrega').val(nombre);reen(); " >
                                <option  value="0.00">SELECCIONAR</option>
                                 <?php 
                                    $class = new Mod();
                                    $p =  $no_periferico+$de_precio;
                                    $e =  $no_extremo+$de_precio;                                 
                                     $datos = "0,".$de_precio.",".number_format($p, 2, '.', '').",".number_format($e, 2, '.', '').","; 
                                     $array = explode(",", substr($datos, 0, -1));                         
                                    if ($idambito==1) {
                                        if($idnom==4){
                                            $dt5 = $class->recojo_g(1);
                                        }else {
                                            $dt5 = $class->recojo($entrega);
                                            }
                                        
                                    } else if ($idambito==2 ||$idambito==3||$idambito==4){
                                         $dt5 = $class-> entrega_nacional($entrega_nacional);                                
                                    }  

                                   $cc=0;
                                    if($dt5){
                                    foreach ( $dt5 as $dta5 ): $cc++;
                                ?>
                                    <option value="<?php if ($idambito==1){ if ($idnom==4){echo $dta5[re_costo] ;}else { echo $array[$cc];} } else if ( $idambito==2 ||$idambito==3 ||$idambito==4 ) {  echo $de_precio; }  ?>" > <?php if($idambito==2||$idambito==3 || $idambito==4 ) { echo  $de_descripcion;} else { echo $dta5[re_nombre]; echo $dta5[ren_nombre]; } ?></option>
                                <?php endforeach; } ?>
                            </select>                        
                        </div>
                        
                        <div class="col-md-2">
                            <label>Precio</label>
                                <div class="icon-addon addon-md"  >
                                    <input type="text" name="precio_entrega" id="entrega" class="form-control input-xs" <?php if ($idnom==14) { echo '';} else { echo $rol; } ?> value="0.00" onkeyup="reen();" >
                                    <input type="hidden" name="tipo_entrega" id="tipo_entrega" class="form-control input-xs" value="">
                                    <label style="padding: 4px 0;" class="glyphicon  input-xs"><b class="mon">S/.</b></label>
                                </div>                         
                        </div>
                        

                        <div class="col-md-2">
                            <label>Cantidad</label>
                            <div class="input-group input-group-sm">
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button" onclick="$('#ddcant').val($('#ddcant').val()-1); reen(); "><i class="glyphicon glyphicon-minus"></i></button>
                                </span>
                                <div class="icon-addon addon-sm">
                                    <input type="number" name="cantidad" id="ddcant" value="1"  class="form-control" style="text-align: center; padding: 0;" onkeyup="reen();">
                                </div>
                                <span class="input-group-btn">
                                    <button class="btn btn-success" onclick="$('#ddcant').val(parseInt($('#ddcant').val())+1) ; reen();" type="button"><i class="glyphicon glyphicon-plus"></i></button>
                                </span>
                            </div>
                        </div>
                    <!-- TOTAL GUARDAR --> 
                        <div class="col-md-12"><br></div>            
                        <div class="col-md-8" > 
                            <div style="display: none">
                             <input name="total_reen" id="total_reen"  value="0.00" placeholder="total_reen"  readonly=""class="form-control input ">
                                <input name="total_muestra" id="total_muestra"  value="0.00" placeholder="total_muestra"  readonly=""class="form-control input ">
                                <input name="total_seguro" id="total_seguro"  value="0.00" placeholder="total_seguro"  readonly=""class="form-control input ">
                                <input name="total_gestiones" id="total_gestiones"  value="0.00" placeholder="total_gestiones"  readonly=""class="form-control input ">
                                <input name="total_transporte" id="total_transporte"  value="0.00" placeholder="total_transporte"  readonly=""class="form-control input ">
                                </div>
                        </div>
                        <div class="col-md-1">
                            <label class="col-md-3 control-label" style="margin-top: 0px;text-align: right;font-size: 15px"><b>TOTAL</b></label>
                        </div>
                        <div class="col-md-3">
                             
                            <div class="input-group">
                                <span class="input-group-addon" style="padding: 0px 10px;"><b class="mon">S/.</b></span>
                                <input name="total" id="total" readonly="" value="0.00" class="form-control input " style="text-align: right;">
                            </div>
                        </div>


                             
                        <div class="col-md-12"><br></div>
                           
                        <div class="col-md-12" style=" padding: 0px 8px 5px; text-align: right;">                        
                           
                            
                                <button class="btn btn-primary" type="button" onclick="vAjax('cotizacion','insert3','inspr');">
                                <i class="fa fa-save"></i>
                                Agregar
                                </button>
                               
                          
                            
                        </div>
                    </fieldset>
                    </form>
                </div>
</div>                                                                 
                            </div>
                        </div>  

                        </fieldset>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="view">
    
        <button class="btn btn-default"  data-dismiss="modal">
            <i class="fa fa-remove"></i>
            Cerrar
        </button>
    </div>
</div>  





<script type="text/javascript">
    function mostrar (nom){        
        if ($('#c_'+nom).is(':checked')) {
            $('#div_'+nom).css('display', 'block');       
        }else{
            $('#div_'+nom).css('display', 'none');
        }                           
    }

    function motorizado (){ 
        var total = 0 ; 
        total = parseFloat($('#km_adicional').val()) * parseFloat( $('#km_precio').val());
        $('#km_total').val(total.toFixed(2));
        reen();      
    }
    
    function reen(){
        var total = 0 ;

         if (parseFloat($('#total_muestra').val())>0){
             total =( (parseFloat($('#entrega').val())+parseFloat($('#total_muestra').val())) * parseFloat( $('#ddcant').val()) ) +parseFloat($('#recojo').val()) +parseFloat($('#km_total').val());
        }else{
            total =  (parseFloat($('#entrega').val()) * parseFloat( $('#ddcant').val()))+parseFloat($('#recojo').val())+parseFloat($('#km_total').val());
        }
        
        $('#total_reen').val(total.toFixed(2));
        cot_total();
    }

     function cot_total(){
        var total = 0 ;

        if (parseFloat($('#total_gestiones').val()>0)){
            total = $('#total').val() *  $('#ddcant').val() ;
        }  else {
            total = parseFloat($('#total_reen').val())+parseFloat($('#total_seguro').val())+parseFloat($('#total_gestiones').val())+parseFloat($('#total_transporte').val()) ;
        }          

            $('#total').val(total.toFixed(2));
    }

    function cot_seguro(){        
         var seguro = 0 ;var porcentaje = 0 ;
         porcentaje = parseFloat($('#porcentaje').val())/100;
         seguro = parseFloat($('#precio').val())*porcentaje* parseFloat($('#cambio').val());                
        $('#seguro').val(seguro.toFixed(2));
        $('#total_seguro').val(seguro.toFixed(2));
        cot_total();
    }

    function cot_gestion(){
        var gestion = 0 ;var porcentaje = 0 ;
        porcentaje = parseFloat($('#interes').val())/100;
        if ($('#valor_precio').val()>0){
            gestion = parseFloat($('#valor_precio').val())*porcentaje+ parseFloat($('#adicional').val())*parseFloat($('#fraccion').val())+ parseFloat($('#servicio').val())+ parseFloat($('#valor_precio').val()); 
        }else if ($('#fijo').val()>0){
            gestion = parseFloat($('#servicio').val())+ parseFloat($('#fijo').val()) + parseFloat($('#adicional').val())*parseFloat($('#fraccion').val()); 
        }else {
             gestion = parseFloat($('#servicio').val()) + parseFloat($('#adicional').val())*parseFloat($('#fraccion').val()); 
        }
        $('#total_gestion').val(gestion.toFixed(2));
        $('#total_gestiones').val(gestion.toFixed(2));
        cot_total();
    }

   
 
    function valor(nom,val){
        if (val==0){
            $('#div_'+ nom).css('display', 'block');                        
            $('#nom_'+nom).val("");
            $('#nom_'+nom).focus();
            $("#c_gestion").prop('checked', true);
            mostrar('gestion');
            $('#'+nom).val(0);                    
        }else{
          //  $('#'+nom).attr('readonly', true);
            $('#'+nom).val(val);
            $('#div_'+ nom).css('display', 'none');           
        }     
    }

    function express(){
        var total = 0 ;
        if (parseFloat($('#preal').val()) > 25) {
            total = parseFloat(($('#preal').val()-25 ) * $('#adicional').val()) ;  
            $('#ptotal_1').val(total.toFixed(2));
            $('#ptotal_muestra').val(total.toFixed(2));
            $('#total_muestra').val(total.toFixed(2));
        }else {
            
            $('#ptotal_1').val(total.toFixed(2));
            $('#total_muestra').val(total.toFixed(2));
        }
        reen();
        cot_total();

    }

    function pvolumen(id){       
        var volumen = 0;
        var total = 0 ; 
        var mvol = 0;

        volumen = ($('#palto_'+id).val() * $('#pancho_'+id).val() * $('#plargo_'+id).val())/6000 ;
        mvol = ($('#palto_'+id).val() * $('#pancho_'+id).val() * $('#plargo_'+id).val())/1000000 ;
        
        volumen = (volumen == null || volumen == undefined || volumen == "") ? 0 : volumen;           
        
        $('#pvol_'+id).val(volumen.toFixed(2));
        $ ('#mvol_'+id).val(mvol.toFixed(2));
        if (parseFloat($('#preal_'+id).val()) > parseFloat(volumen)) {
            total = parseFloat(($('#preal_'+id).val()-1 ) * $('#adicional').val()) ;  
            $('#ptotal_'+id).val(total.toFixed(2));
            $('#ptotal_muestra').val(total.toFixed(2));
            $('#total_muestra').val(total.toFixed(2));
        }else {
            total = parseFloat((volumen.toFixed(2)-1 ) * $('#adicional').val());  
            $('#ptotal_'+id).val(total.toFixed(2));
            $('#total_muestra').val(total.toFixed(2));
        }
        reen();
        cot_total();
    }
</script>
