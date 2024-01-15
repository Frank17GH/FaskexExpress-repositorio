<?php session_start();
    include '../../recursos/db.class.php';
    include '.Model.php';
?>
       <div class="tabbable tabs-below">
            <div class="col-md-12" style="margin-top: 8px"></div>
            <div class="col-md-8" style="vertical-align: middle;">
                <div id="view1" style="vertical-align: middle;text-align: right;"></div>
            </div>
            <form class="form-horizontal" id="frm_sVent">
                <div class="col-md-4">
                    <div class="navbar navbar-default nota" style="display: block;margin-bottom: 0px;">
                        <div class="navbar-collapse" style="    padding: 12px; ">
                            <label class="col-md-2 control-label"><b>Serie</b></label>
                            <div class="col-md-4">
                                <select name="serie" id="view2" class="form-control input-xs" onchange="avent($(this).val())"></select> <i></i> 
                            </div>
                            <label class="col-md-2 control-label"><b>Nº</b></label>
                            <div class="col-md-4" id="a3">
                                <input class="form-control input-xs" readonly="" name="correlativo" id="vcorr" placeholder="" style="text-align: right;">
                            </div>
                            <div style="display: none">
                                <label class="col-md-1 control-label"><b>Fecha</b></label>
                                <div class="col-md-4">
                                    <input class="form-control input-xs" name="fecha" id="fecha" style="text-align: center" value="<?php date_default_timezone_set('America/Lima'); echo date('Y-m-d h:i A') ?>" type="datetime" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12"></div>
                <div class="col-sm-12 col-md-6 col-lg-6 sortable-grid ui-sortable" style="padding: 5px;">
                    <script>viewComps($('#idLocal').val());</script>
                    <div class="panel panel-default" style="padding: 5px;">
                        <input type="hidden" id="tpcomp" name="tpcomp">
                        <span id="optc" style="display:none;"></span>
                        <legend  style="margin-top: -6px;">&nbsp;&nbsp; <span class="glyphicon glyphicon-export"></span> CLIENTE <a style="    margin-top: -6px;" href="javascript:void(0);" onclick="FClient(1,'')" class="btn btn-link">[+ Nuevo]</a></legend>
                        <div class="form-group" style="margin-bottom: 3px;">
                            <div class="col-md-8">
                                    <input class="form-control input-xs" id="nomClient" ondblclick="$(this).prop('readonly',false).select();" name="envia_nombre" placeholder="Nombre Remitente" type="text" readonly="">
                                    <input type="hidden" id="idClient" name="envia_id" value="0">
                            </div>
                            <div class="col-md-4">
                                <div class="icon-addon addon-md">
                                    <input type="number" placeholder="DNI/RUC Remitente" autocomplete="off" style="font-weight: bold;" class="form-control input-xs" id="numDni" autofocus="" name="envio_doc" onkeydown=" if (event.keyCode === 13){FClient(0);return false;}">
                                    <label for="email" style="padding: 4px 0;" class="glyphicon glyphicon-search input-xs" rel="tooltip" title="" data-original-title="email"></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 3px;">
                            <div class="col-md-4">
                                    <input type="text" class="form-control input-xs" ondblclick="$(this).prop('readonly',false).select();" placeholder="Dirección Remitente" id="nomDir" name="envia_dir" readonly="" >
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-xs" placeholder="Correo Remitente" ondblclick="$(this).prop('readonly',false).select();" id="nomCorr" name="envia_corr" readonly="">
                            </div>
                            <div class="col-md-4">
                                <div class="input-group" id="a6">
                                    <span class="input-group-addon" style="padding: 0px 10px;">
                                        <span class="glyphicon glyphicon-phone"></span>
                                    </span>
                                    <input type="text" class="form-control input-xs" placeholder="Teléfono Remitente" id="nomTel" name="envia_tel" readonly="" ondblclick="$(this).prop('readonly',false).select();"> 
                                   
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 3px;">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon" style="padding: 0px 10px;">
                                        <span class="glyphicon glyphicon-phone"></span>
                                    </span>
                                    <select class="form-control input-xs">
                                    	<option>-- modo de traslado</option>
                                    </select> 
                                   
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon" style="padding: 0px 10px;">
                                        <span class="glyphicon glyphicon-phone"></span>
                                    </span>
                                    <select class="form-control input-xs">
                                    	<option>-- motivo de traslado</option>
                                    </select> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon" style="padding: 0px 10px;">
                                        <span class="glyphicon glyphicon-phone"></span>
                                    </span>
                                    <input type="date" class="form-control input-xs" style="text-align: center;"  value="<?php echo date('Y-m-d') ?>">
                                </div>
                            </div>
                            
                            <br><br>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 sortable-grid ui-sortable" style="padding: 5px;">
                    <script>viewComps($('#idLocal').val());</script>
                    <div class="panel panel-default" style="padding: 5px;">
                        <span id="optc" style="display:none;"></span>
                        <legend style="margin-top: -6px;">&nbsp;&nbsp;<span class="glyphicon glyphicon-import"></span> <i>DATOS DE ENVIO</i> <a style="    margin-top: -6px;" href="javascript:void(0);" onclick="FClient(1,2)" class="btn btn-link">[+ Nuevo]</a></legend>
                        <div class="form-group" style="margin-bottom: 3px;">
                            <div class="col-md-8">
                                <input class="form-control input-xs" placeholder="Nombre Destino" id="nomClient2" ondblclick="$(this).prop('readonly',false).select();" name="recibe_nombre" type="text" readonly="">
                                <input type="hidden" id="idClient2" name="recibe_id" value="0">
                            </div>
                            <div class="col-md-4">
                                <div class="icon-addon addon-md">
                                    <input type="number" placeholder="RUC/DNI Destino" autocomplete="off" style="font-weight: bold;" class="form-control input-xs" id="numDni2" autofocus="" name="recibe_doc" onkeydown=" if (event.keyCode === 13){FClient(0,2);return false}">
                                    <label for="email" style="padding: 4px 0;" class="glyphicon glyphicon-search input-xs" rel="tooltip" title="" data-original-title="email"></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                           <div class="col-md-6">
                                <input type="text" placeholder="Correo Destino" ondblclick="$(this).prop('readonly',false).select();" class="form-control input-xs" id="nomCorr2" name="recibe_corr" readonly="">
                            </div>
                            <div class="col-md-6" style="    margin-bottom: 3px;">
                                <div class="input-group" id="a6">
                                    <span class="input-group-addon" style="padding: 0px 10px;">
                                        <span class="glyphicon glyphicon-phone"></span>
                                    </span>
                                    <input type="text" placeholder="Teléfono Destino" ondblclick="$(this).prop('readonly',false).select();" class="form-control input-xs" id="nomTel2" name="recibe_tel" readonly=""> 
                                    
                                </div>
                            </div>
                            <br><br>
                            <input type="hidden" class="tcamb" name="tcambio" id="v_tcambio">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable" style="padding: 5px;">
                    <div class="well well-sm well-light col-sm-12">
                        <div class="col-md-6">
                            <legend>&nbsp;&nbsp;<span class="glyphicon glyphicon-shopping-cart"></span> DETALLE DE PRODUCTOS Y/O SERVICIOS</legend>
                        </div>
                        <div class="col-md-6" style="text-align: right;margin-top: 10px">
                            <a class="btn btn-success btn-xs" href="javascript:void(0);" onclick="vAjax('facturacion','mod6',1,'modal1');"><i class="fa fa-shopping-cart"></i> Productos / Servicio</a>
                            <a class="btn btn-danger btn-xs" href="javascript:void(0);" onclick="vAjax('facturacion','mod5',1,'modal3');"><i class="fa fa-lg fa-fw fa-truck"></i> Servicio de Cargo</a>
                        </div>
                        <div class="col-md-12">
                            <input type="hidden" name="cargo" id="idcarg" value="0">
                            <table class="table" id="tabprod" style="margin-bottom: 0px;">
                                <thead>
                                    <tr class="encabezado">
                                        <th><center>Tipo</center></th>
                                        <th style="width:100%;"><center>Descripción</center></th>
                                        <th><center>Cantidad</center></th>
                                        <th><center>Unitario</center></th>
                                        <th><center>Total</center></th>
                                        <th><center>Acciones</center></th>
                                    </tr>
                                </thead>
                                <tbody id="div-prods"></tbody>
                               
                            </table>
                         
                        </div>
                    </div>
                </div>
                <div class="page">
                    <div class="panel panel-default">
                        <div class="panel-body" style="padding-bottom: 0px; padding-top: 10px;">
                            <div class="vigv">
                                <label class="col-md-10 control-label" style="margin-top: 0px;text-align: right;font-size: 16px">
                                    <b>SUBTOTAL</b>
                                </label>
                                <div class="col-md-2">
                                     <div class="input-group">
                                        <span class="input-group-addon" style="padding: 0px 10px;"><b class="mon">S/.</b></span>
                                        <input class="form-control" readonly="" style="text-align: right;" id="tsubt">
                                        <span class="input-group-addon" style="padding: 0px 10px;"><i class="fa fa-check"></i></span>
                                    </div>
                                </div>
                            </div>
                            <label class="col-md-12"></label>
                            <div class="vigv">
                                <label class="col-md-10 control-label" style="margin-top: 0px;text-align: right;font-size: 16px">
                                    <b>I.G.V.</b>
                                </label>
                                <div class="col-md-2">
                                     <div class="input-group">
                                        <span class="input-group-addon" style="padding: 0px 10px;"><b class="mon">S/.</b></span>
                                        <input class="form-control" readonly="" style="text-align: right;" id="tigv">
                                        <span class="input-group-addon" style="padding: 0px 10px;"><i class="fa fa-check"></i></span>
                                    </div>
                                </div>
                            </div>
                            <label class="col-md-12 control-label"><b></b></label>
                            <div class="col-md-3">
                                <select class="form-control input-lg" name="pago">
                                    <option value="1">Efectivo</option>
                                    <option value="2">Transferencia</option>
                                    <option value="3">Izipay</option>
                                    <option value="4">Destino</option>
                                </select>
                            </div>
                            <label class="col-md-7 control-label" style="margin-top: 0px;text-align: right;font-size: 20px"><b>TOTAL</b></label>
                            <div class="col-md-2">
                                 <div class="input-group">
                                    <span class="input-group-addon" style="padding: 0px 10px;"><b class="mon">S/.</b></span>
                                    <input class="form-control input-lg tot" id="vvtotal" onkeyup="$('#v_total').val($(this).val())" type="text" style="text-align: right;" readonly="">
                                    <span class="input-group-addon" style="padding: 0px 10px;"><i class="fa fa-check"></i></span>
                                </div>
                            </div>
                            <label class="col-md-12 control-label"></label>


                            
                            <label class="col-md-12 control-label"><br></label>
                            <div class="form-group" style="    margin-bottom: 3px;">
                                <label class="col-md-3 control-label" style="text-align: left;">
                                </label>
                                <label class="col-md-6 control-label"><br></label>
                                <label class="col-md-3 control-label" style="text-align: right;">
                                    <button class="btn btn-default" type="button" onclick="gh()">
                                        Limpiar
                                    </button>
                                    <button class="btn btn-primary" onclick="FVent()">
                                        <i class="fa fa-save"></i>
                                            Guardar
                                    </button>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>   
        </div>
