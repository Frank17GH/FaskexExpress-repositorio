<?php session_start();
    include '../../recursos/db.class.php';
    include '.Model.php';
    $class = new Mod();
    $exc = $class->verifica($dt);
    if ($exc[0]['can']==0) {
        ?><center><i>No Existe una caja creada, Click <a onclick="vAjax('caja','mod6',1,'modal1');">Aqui</a> para crear.</i></center>
        <?php
    }else{
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
                <div class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable" style="padding: 5px;">
                    <script>viewComps($('#idLocal').val());</script>
                    <div class="panel panel-default" style="padding: 5px;">
                        <input type="hidden" id="tpcomp" name="tpcomp">
                        <span id="optc" style="display:none;"></span>
                        <legend  style="margin-top: -6px;">&nbsp;&nbsp; <span class="glyphicon glyphicon-export"></span> CLIENTE <a style="    margin-top: -6px;" href="javascript:void(0);" onclick="FClient(1,'')" class="btn btn-link">[+ Nuevo]</a></legend>
                        <div class="form-group" style="margin-bottom: 3px;">
                            <div class="col-md-1"></div>
                            <div class="col-md-7">
                                <div class="input-group">
                                    <input class="form-control input-xs" id="nomClient" ondblclick="$(this).prop('readonly',false).select();" name="envia_nombre" placeholder="Nombre Cliente" type="text" readonly="">
                                    <span class="input-group-addon" style="padding: 0px 10px;">
                                        <span class="glyphicon glyphicon-user"></span>
                                    </span>
                                </div>
                                <input type="hidden" id="idClient" name="envia_id" value="0">
                            </div>
                            <div class="col-md-3">
                                <div class="icon-addon addon-md">
                                    <input type="number" placeholder="DNI/RUC Cliente" autocomplete="off" style="font-weight: bold;" class="form-control input-xs" id="numDni" autofocus="" name="envio_doc" onkeydown=" if (event.keyCode === 13){FClient(0);return false;}">
                                    <label for="email" style="padding: 4px 0;" class="glyphicon glyphicon-search input-xs" rel="tooltip" title="" data-original-title="email"></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-1"></div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="text" class="form-control input-xs" ondblclick="$(this).prop('readonly',false).select();" placeholder="Dirección Cliente" id="nomDir" name="envia_dir" readonly="" >
                                    <span class="input-group-addon" style="padding: 0px 10px;">
                                        <span class="glyphicon glyphicon-map-marker"></span>
                                    </span>
                                </div>
                                
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="text" class="form-control input-xs" placeholder="Correo Cliente" ondblclick="$(this).prop('readonly',false).select();" id="nomCorr" name="envia_corr" readonly="">
                                    <span class="input-group-addon" style="padding: 0px 10px;">
                                        <span class="glyphicon glyphicon-envelope"></span>
                                    </span>
                                </div>
                                
                            </div>
                            <div class="col-md-3">
                                <div class="input-group" id="a6">
                                    <input type="text" class="form-control input-xs" placeholder="Teléfono Cliente" id="nomTel" name="envia_tel" readonly="" ondblclick="$(this).prop('readonly',false).select();"> 
                                    <span class="input-group-addon" style="padding: 0px 10px;">
                                        <span class="glyphicon glyphicon-phone"></span>
                                    </span>
                                </div>
                            </div>
                            <br><br>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable" style="padding: 5px;">
                    <div class="well well-sm well-light col-sm-12">
                        <div class="col-md-6">
                            <legend>&nbsp;&nbsp;<span class="glyphicon glyphicon-shopping-cart"></span> DETALLE DE PRODUCTOS Y/O SERVICIOS</legend>
                        </div>
                        <div class="col-md-6" style="text-align: right;margin-top: 10px">
                            
                            <a class="btn btn-success btn-xs" href="javascript:void(0);" onclick="vAjax('facturacion','mod7',1,'modal3');"><i class="fa fa-shopping-cart"></i> Productos</a>
                            <a class="btn btn-primary btn-xs" href="javascript:void(0);" onclick="vAjax('facturacion','mod9',1,'modal3');"><i class="fa fa-file-text-o"></i> Servicios</a>
                            <a class="btn btn-danger btn-xs" href="javascript:void(0);" onclick="vAjax('facturacion','mod5',1,'modal3');"><i class="fa fa-lg fa-fw fa-truck"></i> Servicio de Cargo</a>
                            <a class="btn btn-info btn-xs" href="javascript:void(0);" onclick="vAjax('facturacion','mod8',1,'modal1');"><i class="fa fa-plus"></i> Otro&nbsp;&nbsp;&nbsp;</a>
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
                <div class="col-sm-12"></div>
                <div class="col-sm-8 col-md-8 col-lg-8 sortable-grid ui-sortable">
                    <div class="col-md-9">
                        <div class="panel-group smart-accordion-default" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title" style="background-color: #cbd2d5">
                                        <a data-toggle="collapse" data-parent="#accordion" onclick="return false;" href="#collapseOne" aria-expanded="false" class="collapsed"> <i class="fa fa-lg fa-angle-down pull-right"></i> <i class="fa fa-lg fa-angle-up pull-right"></i> <b>MAS OPCIONES </b></a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body no-padding">
                                        <div class="col-md-12"><br></div>
                                        <div class="col-md-12">
                                            <div class="col-md-6" style="display: <?php echo ($_SESSION[fasklog][tipo])?'none':''; ?>">
                                                <select class="form-control" name="envio">
                                                    <option value="1" selected="">Envio Produccion</option>
                                                    <option value="0">Envio BETA</option>
                                                </select><br>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-control" name="detraccion">
                                                    <option value="0">No Aplica</option>
                                                    <option value="4" selected="">4% - mayor a S/ 400.00 (Nacional)</option>
                                                    <option value="12">12% - mayor a S/ 700.00 (Local)</option>
                                                </select><br>
                                            </div>
                                            <div class="col-md-12"></div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="order" placeholder="ORDEN COMPRA">
                                            </div>
                                            <div class="col-md-6">
                                                <textarea class="form-control" name="obs" placeholder="OBSERVACIONES"></textarea>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" name="pago">
                            <option value="1">Efectivo</option>
                            <option value="2">Transferencia</option>
                            <option value="3">Izipay</option>
                            <option value="4">Destino</option>
                            <option value="10">Credito 7 días</option>
                            <option value="6">Credito 15 días</option>
                            <option value="7">Credito 30 días</option>
                            <option value="8">Credito 60 días</option>
                            <option value="9">Credito 90 días</option>
                        </select>
                    </div>
                    
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 sortable-grid ui-sortable">
                    <div class="vigv">
                        <label class="col-md-3 control-label" style="margin-top: 0px;text-align: right;font-size: 16px">
                            <b>SUBTOTAL</b>
                        </label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <span class="input-group-addon" style="padding: 0px 10px;"><b class="mon">S/.</b></span>
                                <input class="form-control" readonly="" style="text-align: right;" id="tsubt">
                                <span class="input-group-addon" style="padding: 0px 10px;"><i class="fa fa-check"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="vigv">
                        <label class="col-md-3 control-label" style="margin-top: 0px;text-align: right;font-size: 16px"><b>I.G.V.</b></label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <span class="input-group-addon" style="padding: 0px 10px;"><b class="mon">S/.</b></span>
                                <input class="form-control" readonly="" style="text-align: right;" id="tigv">
                                <span class="input-group-addon" style="padding: 0px 10px;"><i class="fa fa-check"></i></span>
                            </div>
                        </div>
                    </div>
                    <label class="col-md-3 control-label" style="margin-top: 0px;text-align: right;font-size: 20px"><b>TOTAL</b></label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <span class="input-group-addon" style="padding: 0px 10px;"><b class="mon">S/.</b></span>
                            <input class="form-control input-lg tot" id="vvtotal" onkeyup="$('#v_total').val($(this).val())" type="text" style="text-align: right;" readonly="">
                            <span class="input-group-addon" style="padding: 0px 10px;"><i class="fa fa-check"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12"><br></div>
                <div class="col-md-12">
                    <div class="page">
                        <div class="panel panel-default">
                            <div class="panel-body" style="padding-bottom: 0px; padding: 10px;">
                                <div class="form-group" style="    margin-bottom: 3px;">
                                    <label class="col-md-3 control-label" style="text-align: center;">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" class="checkbox style-0" checked="">
                                            <span>Descuento caja</span>
                                        </label>
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
                </div>
                
            </form>   
        </div>
        <script>
            $('#numDni').select();vAjax('facturacion','table2',1,'prods');
            
        </script> 
        <?php
    }
    
    
?>


