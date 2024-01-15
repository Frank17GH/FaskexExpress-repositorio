<?php 
    include '../../recursos/db.class.php';
    include '.Model.php';
    $class = new Mod();
    $exc = $class->serie();
?>
<form class="form-horizontal" id="vfrm1" action="javascript: vAjax('cotizacion','insert1','vfrm1');">   
<!--  COTIZACION -->
    <div class="panel panel-default">
        <div class="panel-body" style="padding-bottom: 0px; padding-top: 0px;">        
        <!-- SERIE -->     
            <legend class="col-md-12"  style="padding-bottom: 5px;">   
                <div class="col-md-6"> <i class="fa fa-lg fa-fw fa-users"></i>Cotización  <a style="margin-top: -6px;" href="javascript:void(0);"  class="btn btn-link"><a class="btn btn-primary btn-xs" onclick="mostrar('cotizacion');"><b>[+ Nuevo ]</b>&nbsp;&nbsp;</a> </a> </div> 
            
                <div class="col-md-6" id="div_cotizacion" style="display: none">
                    <div class="navbar navbar-default nota" style="display: block;margin-bottom: 0px;min-height: 0px;">                    
                        <div class="navbar-collapse" style="padding: 1px; ">
                            <div class="col-md-1"></div>
                            <label class="col-md-1 control-label"><b>Serie</b></label>
                            <div class="col-md-2">
                                <input name="serie" id="vserie" type="text" required="" class="form-control input-xs" readonly="" style="text-align: right;" readonly="" >
                            </div>
                            <label class="col-md-1 control-label"><b>Nº</b></label>
                            <div class="col-md-3" id="a3">                                
                                <input name="num" id="vnumero" type="text"  class="form-control input-xs" readonly="" style="text-align: right;" >
                            </div>
                            <div class="col-md-4">
                                <input class="form-control input-xs" name="fecha" style="text-align: center" value="<?php echo date('Y-m-d h:i A') ?>" type="datetime" readonly>
                            </div>                            
                        </div>
                    </div>
                </div>                               
            </legend>
<!-- CLIENTE -->
            
            <div id="div1_cotizacion" style="display: none">
                
                    <div class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable" style="padding: 0px;">       
                        <div class="panel panel-default" style="padding: 5px;">
                            <legend class="col-md-12"  style="padding-bottom: 5px;">   
                                <div class="col-md-2" style="padding: 0px;"> <i class="fa fa-lg fa-fw fa-users"></i> Datos de Cliente  <a style="    margin-top: -6px;" href="javascript:void(0);" onclick="FClient(1,'')" class="btn btn-link">[+ Nuevo]</a> </div> 
                                
                                <div class="col-md-4" style="padding: 0px;">
                                    <label class="col-md-3 control-label"><b>RUC/ DNI</b></label>
                                    <div class="col-md-4">
                                        <input type="number" placeholder="DNI/RUC Cliente" autocomplete="off" style="font-weight: bold;" class="form-control input-xs" required="" id="numDni" autofocus="" onkeydown=" if (event.keyCode === 13){FClient(0);FClient(2);return false;}">
                                    </div>
                                </div>                               
                            </legend>
                            <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px; padding: 0px" >
<!-- USUARIO -->
                                <div class="col-md-5" style="padding: 0px">
                                    <div class="panel-body" style="padding-bottom: 0px; padding-top: 5px;">
                                        <label class="col-md-3 control-label"><b>Cliente</b></label>
                                        <div class="col-md-9"  style="padding: 0px">
                                        <div class="input-group">
                                            <input class="form-control input-xs" id="nomClient" ondblclick="$(this).prop('readonly',false).select();" placeholder="Nombre Cliente" type="text" readonly="" >
                                            <span class="input-group-addon" style="padding: 0px 10px;">
                                                <span class="glyphicon glyphicon-user"></span>
                                            </span>
                                        </div>
                                        <input type="hidden" id="idClient" name="idclient" value="" required="">
                                        </div> 
                                    </div>
                                                                                        
                                    <div class="panel-body" style="padding-bottom: 0px; padding-top: 5px;">
                                        <label class="col-md-3 control-label"><b>Dirección</b></label>
                                        <div class="col-md-9"  style="padding-right: 0px">
                                            <div class="input-group">
                                            <input type="text" class="form-control input-xs" ondblclick="$(this).prop('readonly',false).select();" placeholder="Dirección Cliente" id="nomDir" readonly="" >
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
                                                <input type="text" class="form-control input-xs" placeholder="Correo Cliente" ondblclick="$(this).prop('readonly',false).select();" id="nomCorr" readonly="">
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
                                                <input type="text" class="form-control input-xs" placeholder="Teléfono Cliente" id="nomTel" readonly="" ondblclick="$(this).prop('readonly',false).select();"> 
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
                                                <option>Seleccione Área</option>
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
                                                <option value="0">Seleccione Responsable</option>
                                            </select>
                                        </div>
                                        </div>
                                    </div>                                
                                    <div class="panel-body" style="padding-bottom: 0px; padding-top: 5px;margin-left: 0px;margin-right: 0px;">
                                        <label class="col-md-3 control-label"><b>Correo</b></label>
                                        <div class="col-md-9"  style="padding: 0px">
                                            <div class="input-group">
                                                <input type="email" id="conCorreo"  class="form-control input-xs" readonly>
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
                                                <input type="text" id="conTelefono" class="form-control input-xs" readonly>
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
<!-- SERVICIOS -->   
            <div class="col-md-12"></div>
            <div id="div-temp" >
                <script>vAjax('cotizacion','tabla2',0,'temp');</script>
            </div>

            <button style="display: none;" id="subfrm1" type="submit"></button>
            </div>
        </form>       
<!-- OPCIONES -->  
            <div class="col-md-12"><br></div>
            <div class="modal-footer" id="div2_cotizacion" style="display: none">
                <div class="view">
                    <button class="btn btn-success"  onclick="confir('Eliminacion','¿Desea limpiar cotizador?','cotizacion','del_temp',0,'remove');">
                            <i class="fa fa-edit"></i>
                            Limpiar
                    </button>
                    
                    <button class="btn btn-primary" type="r" onclick="$('#subfrm1').click()">
                        <i class="fa fa-edit"></i>
                        Guardar
                    </button>

                     <button class="btn btn-default"  onclick="mostrar('cotizacio');">
                            <i class="fa fa-remove"></i>
                            Cerrar
                    </button>

                </div>
            </div>             
        </div>
    </div>      
<!-- LISTA DE COTIZACIONES -->
<div class="jarviswidget jarviswidget-color-blueDark" data-widget-editbutton="false">
    <header>
        <span class="widget-icon"> <i class="fa fa-lg fa-fw fa-book"></i> </span>
        <h2>Listado de Cotizaciones</h2>
        <div class="widget-toolbar hidden-mobile" role="menu">
            <div id="buttons1">
                <button class="dt-button buttons-copy buttons-html5 bttn_copy" tabindex="0" aria-controls="dtable1"  onclick="location.reload()" type="button"><span>Refrescar</span></button>
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
                        <th data-class="esconder"  style="width:100px" ><center>Serie</center></th>                        
                        <th data-class="esconder"> Servicio Detalle</th>
                        <th data-hide="esconder" style="width:100px">Fecha</th>
                        <th data-class="esconder">Cliente</th>
                        <th data-class="esconder">Contacto</th> 
                        <th data-hide="esconder" style="width:50px">Acc.</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $dt1 = $class->listar();
                        if($dt1){$cc=0; 
                        foreach ($dt1 as $dta1): $cc++;
                    ?>
                    <tr <?php if ($dta1[orden] and $dta1[co_estado]==1){echo "class='encabezado success'";}else if($dta1[orden]<1 and $dta1[co_estado]==1) {echo "class='encabezado warning'";} else {echo "class='encabezado danger'";} ?> >
                        <td><?php if ($dta1[co_estado]==1) { ?>
                            <a title="APROBADO" class="btn btn-primary btn-xs" style="font-size: 80%"><i class="fa fa-check"></i> &nbsp;&nbsp;&nbsp;&nbsp;<b>APROBADO</b>&nbsp;&nbsp;&nbsp;&nbsp;</a>
                        <?php } else if ($dta1[co_estado]==2){   ?>
                            <a title="ANULADO" class="btn btn-danger btn-xs" style="font-size: 80%"><i class="fa fa-remove"></i> <b>ANULADO</b>
                            </a>
                        <?php }else  { ?>
                            <a title="NO APROBADO" class="btn btn-danger btn-xs" style="font-size: 80%"><i class="fa fa-remove"></i> <b>SIN APROBACION</b>
                            </a>
                        <?php } ?>
                        </td>                                              
                        <td><?php echo $dta1[co_serie],' - ',$dta1[num]; ?></td>
                        <td><?php echo $dta1[co_texto]; ?></td>
                        <td><?php echo $dta1[co_fecha]; ?></td>
                        <td><?php echo $dta1[cl_nombres]; ?></td>
                        <td><?php echo $dta1[co_nombres]; ?></td>
                        <td style="vertical-align: middle;">
                            <div class="btn-group display-inline pull-right text-align-left hidden-tablet">                               
                                <button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-sort-down fa-lg"></i> Acciones
                                </button>
                           
                                <ul class="dropdown-menu dropdown-menu-xs pull-right">

                                <!--  
                                    <li>
                                        <a href="javascript:void(0);" onclick="vAjax('cotizacion','mod4',0,'modal5');"><i class="fa fa-plus fa-lg fa-fw txt-color-darken"></i> 
                                            <u>A</u>gregar cita</a>
                                    </li>
                                    <?php// $dta1[orden]<1  ?>
                                -->

                                     <?php if ($dta1[co_estado]==0 ) { ?>                                    
                                    <li>
                                        <a href="javascript:void(0);"  onclick="vAjax('cotizacion','mod1',<?php echo $dta1[idcotizacion] ?>,'modal2');"><i class="fa fa-pencil fa-lg fa-fw txt-color-darken"></i> 
                                             
                                        <?php echo ($dta1[orden]) ? 'Detalle    ':'Editar    '; ?>
                                        </a>
                                        <a href="javascript:void(0);" onclick="vAjax('cotizacion','aprobar',<?php echo $dta1[idcotizacion] ?>);"><i class="fa fa-plus fa-lg fa-fw txt-color-darken"></i> 
                                            Aprobar</a>
                                        <a href="javascript:void(0);" onclick="confir('Anular','¿Seguro que deseas anular cotizacion seleccionado?','cotizacion','anular',<?php echo $dta1[idcotizacion] ?>,'remove');"><i class="fa fa-plus fa-lg fa-fw txt-color-darken"></i> 
                                            <u>A</u>nular</a>
                                    </li>
                                    <?php } else if ($dta1[co_estado]==1 ) { ?>
                                        <li class="vdt3" style="display: ">
                                       <a href="javascript:void(0);"  onclick="vAjax('cotizacion','mod1',<?php echo $dta1[idcotizacion] ?>,'modal2');"><i class="fa fa-pencil fa-lg fa-fw txt-color-darken"></i> 
                                             
                                        <?php echo ($dta1[orden]) ? 'Detalle    ':'Editar    '; ?>
                                        </a>
                                        </li>
                                        <li class="divider"></li>                                    
                                        <li class="">
                                            <a class="btn btn-success btn-sm" style="width: 100%" href="http://sistemas.faskex.com/app/modules/cotizacion/components/print.php?id=<?php echo $dta1[idcotizacion]; ?>" target="_blank"><i class="fa  fa-eye fa-lg fa-fw txt-color-darken"></i> (PDF)</a>
                                        </li>
                                    <?php }else { ?>
                                        <li class="vdt3" style="display: ">
                                       <a href="javascript:void(0);"  onclick="vAjax('cotizacion','mod1',<?php echo $dta1[idcotizacion] ?>,'modal2');"><i class="fa fa-pencil fa-lg fa-fw txt-color-darken"></i>                                              
                                            Observacion
                                        </a>
                                        </li>
                                    <?php } ?>
       
                                </ul>
                            </div>
                        </td>                                                                                               
                    </tr>
                    <?php endforeach; } ?>
                </tbody>
            </table>
            <script type="text/javascript"> table(2,10,1); </script> 
        </div>
    </div>
</div>
<script >

    serie_Cotizacion();

function serie_Cotizacion() {

      $("#vserie").empty();
      $('#vnumero').prop('readonly',true);
        $.getJSON('app/modules/cotizacion/components/data.php?t=4',function(data){
        $.each(data, function(id,value){
            $("#vserie").val(this['value']);
                  $("#vnumero").empty();
                $.getJSON('app/modules/cotizacion/components/data.php?t=5&ser='+$('#vserie').val(),function(data){
                $.each(data, function(id,value){
                $("#vnumero").val(this['num']);
              });
            });
        });
    });
   
    
}


function mostrar (nom){
 var x = document.getElementById("div_"+nom);
    if (x.style.display === "none") {       
            $('#div_'+nom).css('display', 'block');
            $('#div1_'+nom).css('display', 'block');
            $('#div2_'+nom).css('display', 'block');       
        }else{
            $('#div_'+nom).css('display', 'none');
            $('#div1_'+nom).css('display', 'none');
            $('#div2_'+nom).css('display', 'none');
        }                           
    }
</script>

