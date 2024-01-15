
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h6 class="modal-title">ORDEN DE RECOJO</h6>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div role="content">
				<div class="jarviswidget-editbox">
				</div>
				<div class="widget-body">
					<form class="form-horizontal" id="frm2">
					<div class="col-md-12">
            			<div class="panel panel-default">
            	<legend><i class="fa fa-lg fa-fw fa-users"></i> Datos del cliente</legend>
                    <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;">
                        <div class="form-group" style="margin-bottom: 3px;">
                            <label class="col-md-1 control-label"><b>Cliente</b></label>
                            <div class="col-md-7">
                                <div class="input-group">
                                    <input class="form-control input-xs" id="nomClient" name="cliente" type="text" readonly="">
                                    <input type="hidden" id="idClient" name="idclient" value="0">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default input-xs" onclick="vAjax('clientes_listar','mNewClient',0,'modal');" type="button">
                                            <i class="glyphicon glyphicon-plus"></i>
                                        </button>
                                        <button class="btn btn-default input-xs" type="button" onclick="vAjax('orden','viewClient',0,'modal');">
                                            <i class="glyphicon glyphicon-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <label class="col-md-1 control-label"><b>RUC/ DNI</b></label>
                            <div class="col-md-3">
                                <div class="icon-addon addon-md">
                                    <input type="number" placeholder="#" autocomplete="off" style="font-weight: bold;" class="form-control input-xs" id="numDni" autofocus="" name="doc" onkeydown=" if (event.keyCode === 13){FClient(0); FClient(2);}">
                                    <label for="email" style="padding: 4px 0;" class="glyphicon glyphicon-search input-xs" rel="tooltip" title="" data-original-title="email"></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="    margin-bottom: 3px;">
                            <label class="col-md-1 control-label"><b>Dirección</b></label>
                            <div class="col-md-3">
                                <div class="input-group" id="a5">
                                    <input type="text"   class="form-control input-xs" id="nomDir"  name="dir" readonly>
                                    <div class="input-group-btn">
                                        <button class="btn btn-default input-xs btnm" disabled="" onclick="$('#nomDir').prop('readonly',false);">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                        
                                    </div>
                                </div>
                            </div>
                            <label class="col-md-1 control-label"><b>Área</b></label>
                            <div class="col-md-3">
                                <div class="input-group" id="a6">
                                    <span class="input-group-addon" style="padding: 0px 10px;">
                                        <i class="icon-prepend fa fa-envelope-o"></i>
                                    </span>
                                    <select class="form-control input-xs btnm" id="idarea" disabled onchange="FClient(3);">
                                    	<option>Seleccione un Cliente</option>

                                    </select>

                                    <div class="input-group-btn">
                                        <button class="btn btn-default input-xs btnm" disabled onclick="FClient(3);">
                                            <span class="glyphicon glyphicon-refresh"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="input-group" id="a6">
                                    <span class="input-group-addon" style="padding: 0px 10px;" title="Contacto de Recojo">
                                        <i class="icon-prepend fa fa-user"></i>
                                    </span>
                                    <input type="text" class="form-control input-xs" id="nomCont" name="contacto" readonly="">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default input-xs btnm" type="button" onclick="$('#nomCont').prop('readonly',false);">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>
            			</div>
       				</div>

       				<div class="col-md-12">
            			<div class="panel panel-default">
            		<legend><i class="fa fa-lg fa-fw fa-th-list"></i> Datos de Recojo</legend>
                    <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;">
                        <div class="form-group" style="margin-bottom: 4px;">
                            <label class="col-md-2 control-label"><b>Distrito</b></label>
                            <div class="col-md-4">
                                <select class="form-control input-xs btnm" id="idarea"  onchange="FClient(3);">
                                    <option>Seleccione Distrito</option>
                                </select>
                            </div>
                            <label class="col-md-2 control-label"><b>Dirección</b></label>
                            <div class="col-md-4">
                                <div class="input-group" id="a5">
                                    <input type="text"   class="form-control input-xs" id="nomDir"  name="dir" >                                   
                                </div>
                            </div>
                        </div>

                        <div class="form-group" style="    margin-bottom: 4px;">
                            <label class="col-md-2 control-label"><b>Tipo doc</b></label>
                            <div class="col-md-4">
                                <div class="input-group" id="a5">
                                    <input type="text"   class="form-control input-xs" id="nomDir"  name="dir" >
                                    
                                </div>
                            </div>
                            
                            <label class="col-md-2 control-label"><b>Cantidad</b></label>
                            <div class="col-md-3">
                                <div class="icon-addon addon-md">
                                    <input type="number" placeholder="#" autocomplete="off" style="font-weight: bold;" class="form-control input-xs" id="numDni" autofocus="" >
                                   
                                </div>
                            </div>
                        </div>

                        <div class="form-group" style="    margin-bottom: 4px;">
                            <label class="col-md-2 control-label"><b>Dia</b></label>
                            <div class="col-md-3">
                                <div class="input-group" id="a5">
                                    <input type="date"  placeholder="Seleccione Fecha" class="form-control datepicker hasDatepicker" data-dateformat="dd/mm/yy" id="dp1619463159069">
                                    
                                </div>
                            </div>
                            
                            <label class="col-md-1 control-label"><b>Hora</b></label>
                            <div class="col-md-2">
                                <div class="form-group">
													
													<div class="input-group">
														<input class="form-control" id="clockpicker" type="text" placeholder="Select time" data-autoclose="true">
														<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
													</div>
												</div>
                            </div>
                             <label class="col-md-2 control-label"><b>Movilidad</b></label>
                            <div class="col-md-2">
                                <div class="icon-addon addon-md">
                                    <select class="form-control input-xs btnm" id="idarea"  onchange="FClient(3);">
                                    <option>Seleccione</option>
                               		</select>
                                   
                                </div>
                            </div>
                        </div>

                        </div>
                    </div><br>
            			</div>
        			</div>

        			<div class="col-md-12">
                		<label><b>OBSERVACION</b></label>
                		<textarea class="form-control" name="paq_descrip" style="width: 100%"></textarea>
            		</div>

					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btn-default"  data-dismiss="modal">Cancel</button>
		<button class="btn btn-primary" type="button" onclick="vAjax('orden','inser','frm2');">
			<i class="fa fa-save"></i>
			Guardar
		</button>
	</div>
</div>