<?php if($dt1) {  
          $idcotizacion =$dt1 [0]['idcotizacion'];
          $fecha=$dt1 [0]['co_fecha'];
          $serie=$dt1 [0]['co_serie'];
          $num =$dt1 [0]['num'];
          $servicio = $dt1 [0]['co_texto'];

          $dni = $dt1 [0]['cl_numdoc'];
          $cl_nombre = $dt1 [0]['cl_nombres']; 
          $cl_direccion  = $dt1 [0]['cl_direccion'];
          $cl_correo = $dt1 [0]['cl_correo'];
          $cl_telefono = $dt1 [0]['cl_telefono'];

          $idcliente =$dt1 [0]['idclientes'];

          $idarea = $dt1 [0]['idarea'];
          $narea =   $dt1 [0]['ar_nombre'];
          $ncontacto =  $dt1 [0]['co_nombres'];
          $idcontacto =$dt1 [0]['idcontacto'];

          $correo =$dt1 [0]['co_correo'];
          $telefono =$dt1 [0]['co_telefono'];

          $orden = $dt1 [0]['orden'];
          $prod = $dt1 [0]['prod'];

          $estado = $dt1 [0]['co_estado'];
          $co_obser = $dt1 [0]['co_obser'];


    }else {$d='';} 
?>

<div class="modal-header"> 
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> × </button>       
 <form id="frm_upd_cot">
    <div class="col-md-12">        
        <div class="navbar navbar-default nota" style="display: block;margin-bottom: 10px;">
            <div class="navbar-collapse" style="    padding: 12px; ">
               
                <div class="col-md-6">
                    <div class="col-md-8">
                        <h3 style="margin-bottom:0px;margin-top: 0px"><b>DETALLE COTIZACION</b></h3>
                    </div>
                  
                    <div class="col-md-4">
                                   
                    </div>
                    <input type="hidden" name="idcotizacion" value="<?php echo $idcotizacion; ?>">                   
                </div>

                <div class="col-md-4">
                    <div id="vauto" >
                     <label class="col-md-2 control-label"><b>Serie</b></label>
                     <div class="col-md-4">
                        <input value=" <?php echo $serie;  ?> " class="form-control input-xs" readonly=""  style="text-align: right;" >
                     </div>
                      <label class="col-md-2 control-label"><b>Nº</b></label>
                     <div class="col-md-4" >
                         <input value=" <?php echo $num;  ?> " class="form-control input-xs" readonly=""  style="text-align: right;" >
                     </div>
                    </div>
                </div>
                  

                <div class="col-md-2">
                    <div class="col-md-12">
                        <input class="form-control input-xs" name="fecha" style="text-align: center" value="<?php echo $fecha; ?>" type="datetime" readonly>
                    </div>       
                </div>
            </div>
        </div>
    </div>

    <div class="tabbable tabs-below">
        <div class="col-md-12">
            <div class="panel panel-default">
                <legend class="col-md-12">   
                    <div class="col-md-3"> <i class="fa fa-lg fa-fw fa-users"></i> Datos de Cotización </div>
                    <div class="col-md-8" style="padding: 0px;">
                        <label class="col-md-2 control-label"><b>RUC/ DNI</b></label>
                        <div class="col-md-2">
                            <input type="number" placeholder="DNI/RUC Cliente" autocomplete="off" value="<?php echo $dni; ?>" style="font-weight: bold;" class="form-control input-xs" required="" id="numDni" autofocus="" onkeydown=" if (event.keyCode === 13){FClient(0);FClient(2);return false;}">
                        </div>
                    </div>
                </legend>
                <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px; padding: 0px" >
    
                    <div class="col-md-5" style="padding: 0px">
                        <div class="panel-body" style="padding-bottom: 0px; padding-top: 5px;">
                            <label class="col-md-3 control-label"><b>Cliente</b></label>
                            <div class="col-md-9"  style="padding: 0px">
                            <div class="input-group">
                                <input type="text" value="<?php echo $cl_nombre; ?>" id="nomClient" ondblclick="$(this).prop('readonly',false).select();" placeholder="Nombre Cliente"  readonly="" class="form-control input-xs"  >
                                <span class="input-group-addon" style="padding: 0px 10px;">
                                    <span class="glyphicon glyphicon-user"></span>
                                </span>
                            </div>
                            <input type="hidden" id="idClient" name="idclient" value="<?php echo $idcliente; ?>" required="">
                            </div> 
                        </div>
                                                                            
                        <div class="panel-body" style="padding-bottom: 0px; padding-top: 5px;">
                            <label class="col-md-3 control-label"><b>Dirección</b></label>
                            <div class="col-md-9"  style="padding-right: 0px">
                                <div class="input-group">
                                <input type="text" value="<?php echo $cl_direccion; ?>" class="form-control input-xs" ondblclick="$(this).prop('readonly',false).select();" placeholder="Dirección Cliente" id="nomDir" readonly="" >
                                <span class="input-group-addon" style="padding: 0px 10px;">
                                <span class="glyphicon glyphicon-map-marker"></span>
                                </span>
                            </div>
                            </div>
                        </div>

                        <div class="panel-body" style="padding-bottom: 0px; padding-top: 5px;">
                            <label class="col-md-3 control-label"><b>Correo</b></label>
                            <div class="col-md-9"  style="padding: 0px">                                
                                <div class="input-group">
                                    <input type="text" value="<?php echo $cl_correo; ?>" class="form-control input-xs" placeholder="Correo Cliente" ondblclick="$(this).prop('readonly',false).select();" id="nomCorr" readonly="">
                                    <span class="input-group-addon" style="padding: 0px 10px;">
                                        <span class="glyphicon glyphicon-envelope"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="panel-body" style="padding-bottom: 0px; padding-top: 5px;">
                            <label class="col-md-3 control-label"><b>Telefono</b></label>
                            <div class="col-md-9"  style="padding: 0px">
                                <div class="input-group" id="a6">
                                    <input type="text" value="<?php echo $cl_telefono; ?>" class="form-control input-xs" placeholder="Teléfono Cliente" id="nomTel" readonly="" ondblclick="$(this).prop('readonly',false).select();"> 
                                    <span class="input-group-addon" style="padding: 0px 10px;">
                                    <span class="glyphicon glyphicon-phone"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>                                                        
                        <!-- CONTACTO -->
                    <div class="col-md-5" style="padding: 0px" >
                        <div class="panel-body" style="padding-bottom: 0px; padding-top: 5px;margin-left: 0px;margin-right: 0px;">
                            <label class="col-md-3 control-label"><b>Área</b></label>
                            <div class="col-md-9"  style="padding: 0px">
                                <div class="input-group" id="a6">
                                <span class="input-group-addon" style="padding: 0px 10px;">
                                <i class="icon-prepend fa fa-envelope-o"></i>
                                </span>
                             
                                <select class="form-control input-xs btnm" id="idarea" disabled onchange="FClient(3);" required>
                                    <option value="<?php echo $idarea ?>"><?php echo $narea ?></option>
                                </select>
                            </div>
                            </div>
                        </div>

                        <div class="panel-body" style="padding-bottom: 0px; padding-top: 5px;margin-left: 0px;margin-right: 0px;">
                            <label class="col-md-3 control-label"><b>Responsable</b></label>
                            <div class="col-md-9"  style="padding: 0px">                            
                                <div class="input-group" id="a6">
                                <span class="input-group-addon" style="padding: 0px 10px;">
                                    <span class="glyphicon glyphicon-user"></span>
                                </span>
                                <select class="form-control input-xs btnm" name="idcontacto" id="contacto" onchange="FClient(4);" disabled required >
                                    <option value="<?php echo $idcontacto ?>"><?php echo $ncontacto ?></option>
                                </select>
                            </div>
                            </div>
                        </div>                                
                        <div class="panel-body" style="padding-bottom: 0px; padding-top: 5px;margin-left: 0px;margin-right: 0px;">
                            <label class="col-md-3 control-label"><b>Correo</b></label>
                            <div class="col-md-9"  style="padding: 0px">
                                <div class="input-group">
                                    <input type="email" id="conCorreo" value="<?php echo $correo; ?>"  class="form-control input-xs"  readonly>
                                    <span class="input-group-addon" style="padding: 0px 10px;">
                                        <span class="glyphicon glyphicon-envelope"></span>
                                    </span>
                                </div>                                        
                            </div>
                        </div>
                        <div class="panel-body" style="padding-bottom: 0px; padding-top: 5px;margin-left: 0px;margin-right: 0px;">
                            <label class="col-md-3 control-label"><b>Telefono</b></label>
                            <div class="col-md-9"  style="padding: 0px">
                                <div class="input-group">
                                    <input type="text" id="conTelefono" value="<?php echo $telefono; ?>" class="form-control input-xs" readonly>
                                    <span class="input-group-addon" style="padding: 0px 10px;">
                                    <span class="glyphicon glyphicon-phone"></span>
                                    </span>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>             
            </div>
        </div>       
    </div>

</form>    
    <?php if ($estado==2) { ?>
    <div class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable" style="padding: 5px;">
        <div class="well well-sm well-light col-sm-12">
            <div class="col-md-12">
                
                <legend class="col-md-12">   
                    <div class="col-md-3"><span class="glyphicon glyphicon-shopping-cart"></span>COTIZACIÓN ANULADA</div>
                    <div class="col-md-2">
                   
                    </div>
                    <div class="col-md-7" style="padding: 0px;">
                        <label ><b><?php echo $servicio; ?></b></label>
                    </div>
                </legend>

                <label ><b><?php echo  mb_strtoupper($co_obser, 'UTF-8');  ?></b></label>


            </div>                          
        </div>
    </div>
    
    <?php }else { ?>
    <div class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable" style="padding: 5px;">
        <div class="well well-sm well-light col-sm-12">
            <div class="col-md-12">
                
                <legend class="col-md-12">   
                    <div class="col-md-3"><span class="glyphicon glyphicon-shopping-cart"></span>SERVICIOS COTIZADOS</div>
                    <div class="col-md-2">
                    <a style="    margin-top: -6px;" onclick="vAjax('cotizacion','mod_editser',<?php echo $prod;?>+'-/'+<?php echo $idcotizacion;?>,'modal3');" class="btn btn-link">[+ Servicios]</a>
                    </div>
                    <div class="col-md-7" style="padding: 0px;">
                        <label ><b><?php echo $servicio; ?></b></label>
                    </div>
                </legend>
            </div>          
                <div id="div-tabla"></div>  
                <script>vAjax('cotizacion','tabla_uservicios',<?php echo $idcotizacion; ?> ,'tabla') </script>                 

        </div>
    </div>
    <?php } ?>
  
<!--GUARDAR  -->
    <div class="tabbable tabs-below">
        <div class="panel panel-default">
            <div class="panel-body" style="padding-bottom: 0px; padding-top: 10px;">
                
                <div class="form-group" style="    margin-bottom: 3px;">                          
                    <label class="col-md-9 control-label"><br></label>
                    <label class="col-md-3 control-label" style="text-align: right;">
                    <button class="btn btn-default" type="button" onclick="">
                        Cerrar
                    </button>

                    <?php if ($orden<1 and $estado<=1) { ?>
                    <button class="btn btn-primary" onclick="confir('Actualizar Cliente','¿Seguro que deseas actualizar cliente?','cotizacion','update_cot','frm_upd_cot','remove');">
                        <i class="fa fa-save"></i>
                            Actualizar
                    </button>
                    <?php } ?>

                    </label>
                </div>
            </div>
        </div>
    </div>
 
</div>

<script>
    $('#numDni').select();       
    aOrden(3);
</script> 

<script type="text/javascript">
    $('[name="checks[]"]').click(function() {
    var arr = $('[name="checks[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str = arr.join(',');
    $('#val_sel').val(str);
  });
</script>

<script type="text/javascript">
    $('[name="checks1[]"]').click(function() {
    var arr = $('[name="checks1[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str = arr.join(',');
    $('#val_sel1').val(str);
  });
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
        
        t = 0;
        
        if ($('#ttrr'+id).hasClass("success")) {
            $('#ttrr'+id).removeClass('success');
            $('#chec'+id).prop('checked',false);
            t = parseFloat($('#or_sub').val())-precio;
             
            $('#or_sub').val(t.toFixed(2)); 
          
            $('#btn_1_'+a).prop('disabled', true);
            $('#btn_2_'+a).prop('disabled', true);
            $('#ddcant_'+a).prop('disabled', true);
            $('#precio_'+a).prop('disabled', true);
            $('#btn_guardar_'+a).prop('disabled', true);
            $('#btn_del_'+a).prop('disabled', true);
                        
           
        }else{
            $('#ttrr'+id).addClass('success');
            $('#chec'+id).prop('checked',true);
             t = parseFloat($('#or_sub').val())+precio;
             
            $('#or_sub').val(t.toFixed(2));
            
            $('#btn_1_'+a).prop('disabled', false);
            $('#btn_2_'+a).prop('disabled', false);
            $('#ddcant_'+a).prop('disabled', false);
            $('#precio_'+a).prop('disabled', false);
            $('#btn_guardar_'+a).prop('disabled', false);
            $('#btn_del_'+a).prop('disabled', false);
        }        
        cal_igv();
        cal();
    }

    function cal(){
        var tot='';
        var can='';
        $('#div-tabla tr').each(function () {
            id=$(this).find("td").eq(1).html();
            cant=$(this).find('input[type="number"]').val();
            if ($('#ttrr'+id).hasClass("success")) {
                tot+=id+',';
                can+=cant+',';
            }
            $('#idet2').val(tot);
            $('#cant').val(can);
        });
    }
    
</script>
        
  