<?php 
    include '../../recursos/db.class.php';
    include '.Model.php';
    $class = new Mod();
    $exc = $class->serie();
?>
<div class="jarviswidget" id="btn_mas_orden" >  
    <div class="btn-group" style="padding-bottom: 15px;">
        <a class="btn btn-labeled btn-primary" onclick="mostrar('orden')"> <span class="btn-label"><i class="fa fa-plus"></i></span><b>Nuevo</b>&nbsp;&nbsp;</a>
    </div>
</div>
<!--  DATOS ORDEN -->
    <form class="form-horizontal" id="form_orden"  action="javascript: vAjax('orden','cre_orden','form_orden')" >
        <div id="div_orden"  style="display: none">
        <div class="col-md-12"><br></div>
        <div class="tabbable tabs-below" >
            <div class="col-md-12">            
                <div class="col-md-6"><h4 class="modal-title"><b>ORDEN DE SERVICIO</b></h4> </div>

                 <label class="col-md-1 control-label" style="text-align: right;"><b>Tipo</b></label>
                <div class="col-md-1">
                    <select name="tipo" id="vtip" class="form-control input-xs" onchange="javascript: aOrden(1);">
                       <option value="1">Automatico</option>
                       <option value="2">Manual</option>
                     </select> 
                </div>

                <div>
                     <div class="col-md-1">
                         <input name="serie" id="vserie" type="text" required="" class="form-control input-xs" readonly="" style="text-align: right;" readonly="">
                     </div>
                     <div class="col-md-1" id="a3">
                         <input name="numero" id="vnumero" type="number" required="" class="form-control input-xs" readonly="" style="text-align: right;">
                     </div>
                </div>
                 
                <div class="col-md-2">
                    <input name="fecha" class="form-control input-xs"  style="text-align: center" value="<?php echo date('Y-m-d h:i:s') ?>" type="datetime" readonly>
                </div>                       
            </div>
       
        <!--  DATOS DE COTIZACION -->
            <input type="text" name="idcotizacion" id="idCotizacion">
            <div class="col-md-12" style="padding-top: 10px;" >
                <div class="panel panel-default">
                    <legend class="col-md-12"  style="padding-bottom: 5px;">   
                        <div class="col-md-6"> <i class="fa fa-lg fa-fw fa-users"></i> Datos de Cotización  <a id="btn_menos_cotizacion" onclick="ocultar('cotizacion');" ><i class="fa fa-lg fa-fw fa-minus-square"></i></a> <a id="btn_mas_cotizacion" onclick="mostrar('cotizacion');" style="display:none "><i class="fa fa-lg fa-fw fa-plus-square"></i></a> </div> 

                        <div class="col-md-4">
                            <label class="col-md-2 control-label">Serie</label>
                            <div class="col-md-4">
                                <input id="cserie" type="text" class="form-control input-xs" style="text-align: right;" >
                            </div>
                            <label class="col-md-2 control-label"><b>N°</b></label>
                            <div class="col-md-4">
                                <input class="form-control input-xs" id="cnumero"  value="" style="text-align: right;" onkeydown=" if (event.keyCode === 13){var string = $('#cnumero').val(); res = string.padStart(6, '0');
                                 $('#cnumero').val(res); vAjax('orden','tabla_servicios',$('#cnumero').val()+'-/'+$('#cserie').val(),'tabla'); FCotizacion(0) ;cal();return false;} " >
                            </div>                     
                        </div>

                        <div class="col-md-2">
                             <div class="col-md-12">
                                <input class="form-control input-xs" id="cfecha"  value="" style="text-align: right;" type="datetime" readonly>
                            </div>
                        </div>                               
                    </legend>

                    <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px; padding: 0px" >
                        <div id="div_cotizacion" style="display:block">
                            <div class="col-md-3" style="padding: 0px">
                                <div class="panel-body" style="padding-bottom: 0px; padding-top: 5px;">
                                    <label class="col-md-3 control-label"><b>Cliente</b></label>
                                    <div class="col-md-9"  style="padding: 0px">
                                    <input name="cl_cliente" type="text" id="nomClient" class=" form-control input-xs" readonly="" >
                                    </div> 
                                </div>
                                                                                    
                                <div class="panel-body" style="padding-bottom: 0px; padding-top: 5px;">
                                    <label class="col-md-3 control-label"><b>Ruc/Dni</b></label>
                                    <div class="col-md-9"  style="padding: 0px">                              
                                    <input type="number" id="numDni" placeholder="Dni/Ruc" class="form-control input-xs"  readonly="">
                                    </div>
                                </div>
                                                            
                                <div class="panel-body" style="padding-bottom: 0px; padding-top: 5px;">
                                    <label class="col-md-3 control-label"><b>Dirección</b></label>
                                    <div class="col-md-9"  style="padding-right: 0px">
                                        <input type="text" id="nomDir" name="dir" class="form-control input-xs"  readonly="">
                                    </div>
                                </div>

                                <div class="panel-body" style="padding-bottom: 0px; padding-top: 5px;">
                                    <label class="col-md-3 control-label"><b>Correo</b></label>
                                    <div class="col-md-9"  style="padding: 0px">                                
                                        <input type="email" id="nomCorr"  class="form-control input-xs" readonly>
                                    </div>
                                </div>   

                                <div class="panel-body" style="padding-bottom: 0px; padding-top: 5px;">
                                    <label class="col-md-3 control-label"><b>Telefono</b></label>
                                    <div class="col-md-9"  style="padding: 0px">
                                        <input type="number"  id="nomTel"  class="form-control input-xs"  readonly>
                                    </div>
                                </div>                            
                            </div>

                            <div class="col-md-3" style="padding: 0px" >
                                <div class="panel-body" style="padding-bottom: 0px; padding-top: 5px;margin-left: 0px;margin-right: 0px;">
                                    <label class="col-md-3 control-label"><b>Contacto</b></label>
                                    <div class="col-md-9"  style="padding: 0px">
                                        <input name="co_contacto" type="text"  id="conNombre"  name="dir" class="form-control input-xs" readonly>
                                    </div>
                                </div>

                                <div class="panel-body" style="padding-bottom: 0px; padding-top: 5px;margin-left: 0px;margin-right: 0px;">
                                    <label class="col-md-3 control-label"><b>Area</b></label>
                                    <div class="col-md-9"  style="padding: 0px">                            
                                        <input type="text" id="conArea"  name="dir"  class="form-control input-xs" readonly>                                    
                                    </div>
                                </div>
                                
                                <div class="panel-body" style="padding-bottom: 0px; padding-top: 5px;margin-left: 0px;margin-right: 0px;">
                                    <label class="col-md-3 control-label"><b>Correo</b></label>
                                    <div class="col-md-9"  style="padding: 0px">
                                        <input type="email" id="conCorreo"  class="form-control input-xs" readonly>
                                    </div>
                                </div>

                                <div class="panel-body" style="padding-bottom: 0px; padding-top: 5px;margin-left: 0px;margin-right: 0px;">
                                    <label class="col-md-3 control-label"><b>Telefono</b></label>
                                    <div class="col-md-9"  style="padding: 0px">
                                        <input type="text" id="conTelefono" class="form-control input-xs" readonly>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="col-md-3" style="padding: 0px" >                           
                                <div class="panel panel-default">
                                <div class="panel-body" style="padding-bottom: 0px; padding-top: 5px;">
                                    <label class="col-md-4 control-label"><b>F.Ingreso</b></label>
                                    <div class="col-md-8">
                                        <div class="input-group" id="a6">
                                             <input name="fecha_ingreso"  type="date" style="text-align: center" value="<?php echo date("Y-m-d"); ?>"   class="form-control input-xs"  > 
                                        </div>
                                    </div>                                
                                </div>
                                <div class="panel-body" style="padding-bottom: 0px; padding-top: 5px;">
                                <label class="col-md-4 control-label"><b>F.Inicio</b></label>
                                    <div class="col-md-8">
                                        <div class="input-group" id="a6">
                                            <input name="fecha_inicio" id="finicio" type="date" value="<?php echo $dates[1]; ?>" style="text-align: center" class="form-control input-xs" required="" >
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;">
                                    <label class="col-md-4 control-label"><b>F.Vencimiento</b></label>
                                    <div class="col-md-8">
                                        <div class="input-group" id="a6">                               
                                              <input name="fecha_vencimiento" id="fvence" type="date"  style="text-align: center" class="form-control input-xs" >
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;">
                                <label class="col-md-4 control-label"><b>F.Devolucion</b></label>
                                    <div class="col-md-8">
                                        <div class="input-group" id="a6">
                                              <input type="date" id="fdevol" name="fecha_devolucion" style="text-align: center"  class="form-control input-xs"  >
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px; display: none;" >
                                <label class="col-md-4 control-label"><b>Servicio</b></label>
                                    <div class="col-md-8">
                                        <div class="input-group" id="a6">
                                              <input name="servi" id="servi" style="text-align: center"  class="form-control input-xs"  >
                                        </div>
                                    </div>
                                </div>
                                <!--
                                <div class="panel-body" style="padding-bottom: 5px; padding-top: 4px;">
                                    <label class="col-md-4 control-label"><b>Estado</b></label>
                                    <div class="col-md-4">
                                        <div class="input-group" id="a6">                               
                                            <a class="btn btn-success btn-xs" href="javascript:void(0);"><b>ACTIVO</b></a>
                                        </div>
                                    </div>                    
                                </div>
                                 -->
                                <div class="panel-body" style="padding-bottom: 5px; padding-top: 4px;">
                                    <label class="col-md-4 control-label"><b>Producto</b></label>
                                    <div class="col-md-8">                                       
                                        <select name="producto" class="form-control input-xs">              
                                          <option value="1">Documentos</option>
                                          <option value="2">Muestras</option>
                                        </select> <i></i>                                   
                                    </div>                    
                                </div>
                                

                                </div>                        
                            </div>                

                            <div class="col-md-3">
                                <div class="panel panel-default">
                                    <div class="panel-body" style="padding-bottom: 5px; padding-top: 4px;">
                                        <div class="col-md-12" style="margin-bottom: 8px; margin-top: 10px">
                                            <textarea name="detalle" class="form-control "  placeholder="Detalle" rows="6"></textarea>
                                        </div>
                                    </div> 
                                </div>
                            </div>

                            <div class="col-md-3">
                       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--  PRODUCTOS COTIZADOS -->        
            <input type="hidden" name="detcc" id="idet2">
            <input type="hidden" name="local" id="cant">
            <input type="hidden" name="ambito" id="ambito">
            <div  class="col-md-12">
                <div class="panel panel-default">
                    <legend class="col-md-12"  style="padding-bottom: 5px;"> 
                        <div class="col-md-12"> <i class="fa fa-lg fa-fw fa-users"></i> SERVICIOS COTIZADOS <a id="btn_menos_serviciosc" onclick="ocultar('serviciosc');" ><i class="fa fa-lg fa-fw fa-minus-square"></i></a> <a id="btn_mas_serviciosc" onclick="mostrar('serviciosc');" style="display:none "><i class="fa fa-lg fa-fw fa-plus-square"></i></a>
                        </div>
                    </legend>                    
                    <div id="div-tabla"></div>                  
                </div>
            </div>           
        <!--  DATOS DE ORDEN DE TRABAJO -->
            <div class="col-md-12" >
                <div class="panel panel-default">
                    <legend class="col-md-12"  style="padding-bottom: 5px;">   
                        <div class="col-md-6"> <i class="fa fa-lg fa-fw fa-users"></i> ORDEN DE TRABAJO <a id="btn_menos_ordent" onclick="ocultar('ordent');" ><i class="fa fa-lg fa-fw fa-minus-square"></i></a> <a id="btn_mas_ordent" onclick="mostrar('ordent');" style="display:none "><i class="fa fa-lg fa-fw fa-plus-square"></i></a></div>
                        <div class="col-md-4">
                            <label class="col-md-2 control-label">Serie</label>
                            <div class="col-md-4">
                                <input name="t_serie" class="form-control input-xs" value="OT01" style="text-align: right;"  readonly>
                            </div>
                            <label class="col-md-2 control-label"><b>N°</b></label>
                            <div class="col-md-4">
                                <input name="t_numero" class="form-control input-xs" value="<?php echo ($exc)?str_pad($exc[0][num], 8, "0", STR_PAD_LEFT):'00000001' ?>" style="text-align: right;"  readonly>
                            </div>
                        </div>                
                    </legend>

                    <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;" >
                        <div id="div_ordent" style="display:">
                            <div class="col-md-5">
                                <div class="form-group" style="margin-bottom: 3px;">
                                    <label class="col-md-3 control-label"><b>De</b></label>
                                    <div class="col-md-9">
                                        <input name="correo_de" type="text" class="form-control input-xs"  value="<?php echo ucwords(strtolower(explode(' ', $_SESSION['fasklog']['correo'])[0] )) ; ?>" title="<?php echo ucwords(strtolower(explode(' ', $_SESSION['fasklog']['pe_nombres'])[0].' '.explode(' ', $_SESSION['fasklog']['pe_apellidos'])[0] )) ; ?>"  readonly>
                                    </div>
                                </div>                                
                            </div>

                            <div class="col-md-7">
                               <div class="form-group">
                                <label class="control-label col-md-3"><strong>Para</strong></label>
                                    <div class="col-md-9">
                                       <select id="example" name="example" class="form-control input-xs" onchange="seleccion();"  multiple="multiple" style="display: none;" required="" >
                                            <?php 
                                                $class = new Mod();
                                                $dt5 = $class->list_correo();
                                            if($dt5){ foreach ($dt5 as $dta5): ?>
                                                <option  value="<?php echo $dta5[pe_mail]; ?>" title="<?php echo $dta5[pe_nombres]; ?>" ><?php echo $dta5[pe_mail]; ?></option>
                                            <?php endforeach; }   
                                             ?>
                                        </select>                                       
                                        <script type="text/javascript">sel2('example');
                                        </script>
                                    </div>
                                    <input type="hidden"  name="correo_para" id="correos" value="">
                                </div> 
                            </div> 
                                      
                            <div class="col-md-12" style="margin-top: 8px;margin-bottom: 8px;">
                            </div>
                        <!--DIVISION DE DIGITACION-->                     
                            <div class="col-md-3" >
                                <div class="panel panel-default" >
                                <a class="btn bg-color-blueLight txt-color-white col-md-10" style="margin-bottom: 8px;"><b>DIVISION DE DIGITACION</b></a>
                                <a class="btn bg-color-blueLight txt-color-white col-md-2" id="btn_menos_digit" onclick="ocultar('digit');" style="display:none " ><i class="fa fa-lg fa-fw fa-minus-square"></i></a> <a id="btn_mas_digit" class="btn bg-color-blueLight txt-color-white col-md-2" onclick="mostrar('digit');" ><i class="fa fa-lg fa-fw fa-plus-square"></i></a>
                               
                                <div id="div_digit" style="display: none"  class="panel-body" >
                                   <?php $class = new Mod();
                                    $dt4 = $class->list_glosa(4);       
                                    if($dt4){ foreach ($dt4 as $dta4): ?>
                                        <div class="col-md-6" style="padding: 0px">
                                            <div class="checkbox">
                                                <label>
                                                    <input name="check_4" id="check_4" type="checkbox" onclick="check(4,'digit')" value="<?php echo $dta4[idglosa] ?>" title="<?php echo $dta4[gl_nombre]; ?>" class="checkbox style-0" <?php echo (in_array($dta4[idglosa], $arr))?'checked="cheked"':'' ?>>
                                                    <span title="<?php echo $dta4[gl_nombre]; ?>" style="text-align: justify; width: 190%;"><?php echo substr($dta4[gl_nombre], 0, 10);  ?></span>
                                                </label>
                                            </div>
                                        </div>
                                    <?php endforeach; }else{ ?> <div class="col-md-12"><center><i>(No hay información)</i></center></div> <?php } ?> 
                                    <input type="hidden" name="digit_ids" id="val_digit">
                                    <input type="hidden" name="digit_nombre" id="nom_digit">

                                    <div class="col-md-12" style="margin-bottom: 10px;"></div>                                           
                                     <div class="form-group" style="margin-bottom: 8px;" >
                                        <label title="Segmentacion de Base de datos" class="col-md-4 control-label" style="padding: 0px"><b>Segmentaci...</b></label>
                                        <div class="col-md-8">                                
                                            <input name="digit_segment" type="text" class="form-control input-xs" >
                                        </div>
                                    </div>
                                     <div class="form-group" style="margin-bottom: 8px;" >
                                         <label class="col-md-4 control-label" style="padding: 0px"><b>Criterio</b></label>
                                        <div class="col-md-8">
                                            <input name="digit_criterio" type="text"   class="form-control input-xs" >
                                        </div>
                                     </div>

                                     <div class="form-group" style="margin-bottom: 8px;" >
                                        <label class="col-md-4 control-label" style="padding: 0px"><b>Cantidad</b></label>
                                        <div class="col-md-8">                                
                                            <input name="digit_cantidad" id="digit_cantidad" type="text" value="0"  class="form-control input-xs" >
                                        </div>
                                    </div>

                                    <div class="col-md-12" style="margin-bottom: 8px; margin-top: 10px">
                                       <textarea name="digit_observacion" placeholder="Observaciones" class="form-control "></textarea>
                                    </div> 
                                </div>
                                </div>
                            </div>
                        <!--DIVISION DE HABILITADO-->
                            <div class="col-md-3" style="padding: 0px">
                                <div class="panel panel-default" >
                                    <a class="btn bg-color-blueLight txt-color-white col-md-10" style="margin-bottom: 8px;">
                                        <b>DIVISION DE HABILITADO </b>
                                    </a>
                                    <a class="btn bg-color-blueLight txt-color-white col-md-2" id="btn_menos_habil" onclick="ocultar('habil');" style="display:none " ><i class="fa fa-lg fa-fw fa-minus-square"></i></a> 
                                    <a id="btn_mas_habil" class="btn bg-color-blueLight txt-color-white col-md-2" onclick="mostrar('habil');" ><i class="fa fa-lg fa-fw fa-plus-square"></i></a> 
                                    <div class="panel-body" style="padding: 0px">
                                        <div id="div_habil" style="display: none" class="panel-body">
                                            <?php $class = new Mod();
                                                $dt4 = $class->list_glosa(3);       
                                                if($dt4){ foreach ($dt4 as $dta4): ?>
                                                    <div class="col-md-6" >
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="check_3" id="check_3" onclick="check(3,'habil')" class="checkbox style-0" value="<?php echo $dta4[idglosa] ?>" title="<?php echo $dta4[gl_nombre] ?>" <?php echo (in_array($dta4[idglosa], $arr))?'checked="cheked"':'' ?>>
                                                                <span title="<?php echo $dta4[gl_nombre]; ?>" style="text-align: left; width: 130%;"><?php echo substr($dta4[gl_nombre], 0, 10);  ?></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                            <?php endforeach; }else{ ?> <div class="col-md-12"><center><i>(No hay información)</i></center></div> <?php } ?>  
                                        
                                                <input type="hidden" name="habil_ids " id="val_habil">
                                                <input type="hidden" name="habil_nombre" id="nom_habil">

                                                <div class="col-md-12" style="margin-bottom: 8px; margin-top: 10px">
                                                   <textarea class="form-control " name="habil_observacion" placeholder="Observaciones"></textarea>
                                                </div>                                                               
                                        </div>                                                      
                                    </div>
                                </div>
                            </div>            
                        <!--DIVISION DE OPERACIONES-->
                            <div class="col-md-3">
                                <div class="panel panel-default" >
                                 <a class="btn bg-color-blueLight txt-color-white col-md-10" title="DEPARTAMENTO DE OPERACIONES - CARACTERISTICAS DE DISTRIBUCION" style="margin-bottom: 8px;"><b>DEPARTAMENTO DE OPERAC...</b>
                                 </a>
                                 <a class="btn bg-color-blueLight txt-color-white col-md-2" id="btn_menos_opera" onclick="ocultar('opera');" style="display:none " ><i class="fa fa-lg fa-fw fa-minus-square"></i></a> <a id="btn_mas_opera" class="btn bg-color-blueLight txt-color-white col-md-2" onclick="mostrar('opera');" ><i class="fa fa-lg fa-fw fa-plus-square"></i></a>

                                    <div id="div_opera" style="display: none" class="panel-body">
                                       <?php $class = new Mod();
                                        $dt4 = $class->list_glosa(5);       
                                        if($dt4){ foreach ($dt4 as $dta4): ?>
                                            <div class="col-md-6" style="padding: 0px;" >
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="check_5" id="check_5" type="checkbox" onclick="check(5,'opera')" class="checkbox style-0" value="<?php echo $dta4[idglosa] ?>" title="<?php echo $dta4[gl_nombre];  ?>" <?php echo (in_array($dta3[idglosa], $arr))?'checked="cheked"':'' ?>>
                                                        <span title="<?php echo $dta4[gl_nombre];  ?>" style="text-align: justify; width: 190%;"><?php echo substr($dta4[gl_nombre], 0, 13);  ?></span>
                                                    </label>
                                                </div>
                                            </div>
                                        <?php endforeach; }else{ ?> <div class="col-md-12"><center><i>(No hay información)</i></center></div> <?php } ?>
                                         <input type="hidden" name="opera_ids" id="val_opera">
                                         <input type="hidden" name="opera_nombre" id="nom_opera">

                                        <div class="col-md-12" style="margin-bottom: 10px;"></div>
                                        <div class="form-group" style="margin-bottom: 8px;">
                                            <label class="col-md-4 control-label" style="padding: 0px"><b>N° de Visitas</b></label>
                                            <div class="col-md-8">                                
                                                  <input name="opera_nvisita" type="number"   class="form-control input-xs" >  
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 8px;">
                                            <label class="col-md-4 control-label" title="Tiempo de distirbucion" style="padding: 0px"><b>Tiempo de...</b></label>
                                            <div class="col-md-8">
                                                <input name="opera_tvisita" id="opera_tvisita" type="number" value=""  class="form-control input-xs" >
                                            </div> 
                                        </div>
                                        <div class="form-group" style="margin-bottom: 8px;" >
                                            <label class="col-md-4 control-label" style="padding: 0px"><b>Fecha Inicio</b></label>
                                            <div class="col-md-8">
                                               <input name="opera_inicio" id="finic" type="date" class="form-control input-xs"  style="text-align: center"  >
                                            </div>  
                                        </div>
                                        <div class="form-group" style="margin-bottom: 8px;" >
                                         <label class="col-md-4 control-label" style="padding: 0px"><b>Fecha Fin</b></label>
                                            <div class="col-md-8">
                                               <input  name="opera_fin" type="date" id="ffin" class="form-control input-xs"style="text-align: center">
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 8px;">
                                             <div class="col-md-12" >
                                               <textarea  name="opera_observacion" placeholder="Observaciones" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                       
                        <!-- SERVICIO AL CLIENTE-->   
                            <div class="col-md-3" style="padding: 0px">
                                <div class="panel panel-default" >
                                    <a class="btn bg-color-blueLight txt-color-white col-md-10" style="margin-bottom: 8px;">
                                        <b>SERVICIO AL CLIENTE</b>
                                    </a>
                                    <a class="btn bg-color-blueLight txt-color-white col-md-2" id="btn_menos_clien" onclick="ocultar('clien');" style="display:none " ><i class="fa fa-lg fa-fw fa-minus-square"></i></a> <a id="btn_mas_clien" class="btn bg-color-blueLight txt-color-white col-md-2" onclick="mostrar('clien');" ><i class="fa fa-lg fa-fw fa-plus-square"></i></a>
                                    <div id="div_clien" style="display: none" class="panel-body">
                                        <div class="form-group" >
                                            <label class="col-md-4 control-label"><b>FECHA DE LIQUIDACION</b></label>
                                            <div class="col-md-8">
                                                <input name="clien_fecha" id="fliqui" type="date"class="form-control input-xs" style="text-align: center;margin-top: 12px;"  >
                                            </div>                          
                                        </div>
                                         <div class="form-group" >
                                        <label class="col-md-4 control-label"><b>HORA</b></label>
                                            <div class="col-md-8">
                                                <input name="clien_hora" value="" type="time" class="form-control input-xs" style="text-align: center" value="" type="time" >    
                                            </div>  
                                        </div> 
                                        <div class="form-group" >
                                        <label class="col-md-4 control-label"><b>LIQUIDADOR</b></label>
                                            <div class="col-md-8">
                                                 <input name="clien_liqui" type="text" class="form-control input-xs">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>                
                    </div>

                </div>
            </div>
         <button style="display: none;" id="btn_orden" type="submit"></button>                         
    </form>
            
<!-- GUARDAR -->
    <div class="page">
        <div class="panel panel-default">
            <div class="panel-body" style="padding-bottom: 0px; padding-top: 10px;">
               
                <label class="col-md-12 control-label"><br></label>
                <div class="form-group" style="    margin-bottom: 3px;">
                  
                    <label class="col-md-6 control-label"><br></label>
                    <label class="col-md-3 control-label" style="text-align: right;">                                
                         <button class="btn btn-default" type="button" onclick="ocultar('orden')">
                            <i class="fa fa-remove"></i>
                            Cerrar
                        </button>
                        <button class="btn btn-primary" type="button" onclick="$('#btn_orden').click()"   >
                            <i class="fa fa-save"></i>
                                Guardar
                        </button>                                
                    </label>
                </div>
            </div>
        </div>
    </div>

<!-- TABLA DE ORDEN DE SERVICIO  -->
</div>
</div>
    <div class="jarviswidget" data-widget-editbutton="false">
        <header>
            <span class="widget-icon"> <i class="fa fa-lg fa-fw fa-book"></i> </span>
            <h2>Orden de servicio </h2>
            <div class="widget-toolbar hidden-mobile" role="menu">
                <div id="buttons1">
                    <button type="button" class="dt-button buttons-copy buttons-html5 bttn_copy" tabindex="0" aria-controls="dtable1" type="button"><span>Importar</span></button>
                </div>
                
            </div>
        </header>
        <div>
            <div class="jarviswidget-editbox"></div>
            <div class="widget-body no-padding">
                <table class="table table-striped table-bordered table-hover" id="dtable2" width="100%">
                    <thead>
                        <tr>
                            <th data-hide="esconder" style="width:5px">Estado</th>
                            <th data-class="expand"  style="width:100px" ><center>Orden</center></th>
                            <th data-hide="esconder" style="width:100px">Cotizacion</th>
                            <th data-hide="esconder" style="width:100px">Fecha-Registro</th>
                            <th data-hide="esconder" style="width:100px">Fecha-Inicio</th>
                            <th data-hide="esconder" style="width:100px">Fecha-Vencimiento</th>
                            <th data-class="expand" > Cliente</th>
                            <th data-class="expand" > Orden de Recojo</th> 
                            <th data-hide="esconder" style="width:50px">Acc.</th>
                        </tr>
                    </thead>
                    <tbody><?php $dt3 = $class->lista_orden();
                        if($dt3){$cc=0; foreach ($dt3 as $dta3): $cc++; ?>
                        <tr>
                            <td> <?php if ($dta3[fecha_vencimiento] > date('Y-m-d h:i A') ) {  ?> <a title="APROBADO" class="btn btn-primary btn-xs" style="font-size: 80%"><i class="fa fa-check"></i> &nbsp;&nbsp;&nbsp;&nbsp;<b>ACTIVO</b>&nbsp;&nbsp;&nbsp;&nbsp;</a> <?php } else { ?> <a title="NO APROBADO" class="btn btn-danger btn-xs" style="font-size: 80%">
                            <i class="fa fa-remove"></i> <b>CONCLUIDO</b>
                        </a> <?php } ?> </td>                                              
                            <td><?php echo $dta3[or_serie],'-',$dta3[or_numero]; ?></td>
                            <td><?php echo $dta3[co_serie],'-',$dta3[num]; ?></td>
                            <td><?php echo $dta3[fecha_ingreso]; ?></td>
                            <td><?php echo $dta3[fecha_inicio]; ?></td>
                            <td><?php echo $dta3[fecha_vencimiento]; ?></td>
                             <td><?php echo $dta3[cl_nombres]; ?></td>
                             <td><a title="NO APROBADO" class="btn btn-warning btn-xs" style="font-size: 80%">
                            <i class="fa fa-remove"></i> <b>PENDIENTE</b>
                        </a></td>
                            <td style="vertical-align: middle;">
                                        <div class="btn-group display-inline pull-right text-align-left hidden-tablet">
                                            <button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-sort-down fa-lg"></i> Acciones
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-xs pull-right">
                                                <li>
                                                    <a href="javascript:void(0);" ><i class="fa fa-plus fa-lg fa-fw txt-color-darken"></i> 
                                                        <u>E</u>stado de Cuenta</a>
                                                </li>
                                                <li>
                                                    <a onclick="vAjax('despacho','mRut',0,'modal3')" ><i class="fa fa-plus fa-lg fa-fw txt-color-darken"></i> 
                                                        <u>O</u>rden de Recojo</a>
                                                </li>
                                               <!-- <li>
                                                    <a href="javascript:void(0);" onclick="vAjax('orde','mod_trabajo',0,'modal3')" ><i class="fa fa-plus fa-lg fa-fw txt-color-darken"></i> 
                                                        <u>O</u>rden de Trabajo</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" onclick="vAjax('orde','mod_recojo',0,'modal3')"><i class="fa fa-plus fa-lg fa-fw txt-color-darken"></i> 
                                                        <u>O</u>rden de Recojo</a>
                                                </li>  -->                                           

                                            </ul>
                                        </div>
                                    </td>                                                                                               
                                                    </tr>
                                                <?php 
                                            endforeach; 
                                        }
                                    ?>
                                </tbody>
                </table>
                <script type="text/javascript"> table(2,5,3); </script> 

            </div>
        </div>
    </div> 

<script>   
    aOrden(1);
</script>

<script type="text/javascript">
   
    function mostrar(id) {       
        $('#div_'+id).show();
        $('#btn_mas_'+id).hide();
        $('#btn_menos_'+id).show();
    }
    function ocultar(id) { 
        $('#div_'+id).hide();
        $('#btn_mas_'+id).show();
        $('#btn_menos_'+id).hide();
    }    

    function sele(id,a){
        
        precio = parseFloat($('#total_'+a).val());
        cantidad = parseFloat($('#ddcant_'+a).val());
        t = 0;
        c = 0;
        if ($('#ttrr'+id).hasClass("success")) {
            $('#ttrr'+id).removeClass('success');
            $('#chec'+id).prop('checked',false);
            t = parseFloat($('#or_sub').val())-precio;
            c = parseInt($('#digit_cantidad').val())-cantidad; 
            $('#or_sub').val(t.toFixed(2)); 
            $('#digit_cantidad').val(c);
            $('#btn_1_'+a).prop('disabled', true);
            $('#btn_2_'+a).prop('disabled', true);
            $('#ddcant_'+a).prop('disabled', true);                       
        }else{
            $('#ttrr'+id).addClass('success');
            $('#chec'+id).prop('checked',true);
             t = parseFloat($('#or_sub').val())+precio;
             c = parseInt($('#digit_cantidad').val())+cantidad;
            $('#or_sub').val(t.toFixed(2));
            $('#digit_cantidad').val(c);
            $('#btn_1_'+a).prop('disabled', false);
            $('#btn_2_'+a).prop('disabled', false);
            $('#ddcant_'+a).prop('disabled', false);
        }        
        cal_igv();
        
    }
    
    function cal(){
        var tot='';
        var can='';
        var ambito='';
        $('#div-tabla tr').each(function () {
            id=$(this).find("td").eq(2).html();
            ambito=$(this).find("td").eq(3).html();
            cant=$(this).find('input[type="number"]').val();
            if ($('#ttrr'+id).hasClass("success")) {
                tot+=id+',';
                can+=cant+',';
                ambito=id;
            }
            $('#idet2').val(tot);
            $('#cant').val(can);
            $('#ambito').val(ambito);
        });
    }
  
</script>
<script>
    serie_Cotiza();

    function serie_Cotiza() {

      $("#cserie").empty();
      
        $.getJSON('app/modules/cotizacion/components/data.php?t=4',function(data){
        $.each(data, function(id,value){
            $("#cserie").val(this['value']);                
        });
    });
   
    
}

    function distrito(id,id2){
        $('#select2-iddistrito-container').html('Seleccione');
      
        det='';$('#'+id2).empty();
        $.ajax({
            url: "app/modules/orden/components/data.php?t=4&id="+id,
            dataType: 'json', //tipo de datos retornados
            type: 'post' //enviar variables como post
        }).done(function (data){
            $.each($.parseJSON(JSON.stringify(data)), function(){ 
                det+='<option  value="'+this['id']+'">'+this['value']+'</option>';
            });
            $('#'+id2).html(det);
        }).fail(function(){
            $('#'+id2).empty();
        });
    }


    function tipo(id,id2){
    $('#select2-idreen-container').html('Seleccione Tipo');
    det='';$('#'+id2).empty();
    ruta ="";
    if (id==0){
        ruta= "app/modules/orden/components/data.php?t=5&id=";
    }else if (id==1){
         ruta= "app/modules/orden/components/data.php?t=6&id=";
    }
    $.ajax({
        url: ruta+id,
        dataType: 'json', //tipo de datos retornados
        type: 'post' //enviar variables como post
    }).done(function (data){
        $.each($.parseJSON(JSON.stringify(data)), function(){ 
            det+='<option  value="'+this['id']+'">'+this['value']+'</option>';
        });
        $('#'+id2).html(det);
    }).fail(function(){
        $('#'+id2).empty();
    });
    }
</script>
<script>
    function check(id,name){
    val = '[name="check_';
    val2= '"]:checked';
    var arr = $(val+id+val2).map(function(){
      return this.value;
    }).get();

    var str = arr.join(',');
    $('#val_'+name).val(str);

    var arrm = $(val+id+val2).map(function(){
      return this.title;
    }).get();
    var str = arrm.join(',');
    $('#nom_'+name).val(str); 
  
    }

    function seleccion(){
        const selected = document.querySelectorAll('#example option:checked');
        const values = Array.from(selected).map(el => el.value);
            $('#correos').val(values);        
    };    
</script>



