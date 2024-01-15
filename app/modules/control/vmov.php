<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h4 class="modal-title" id="myModalLabel"><center>NUEVO MOVIMIENTO</center></h4>
</div>
<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-2">
						</div>
						<div role="content">
							<div class="jarviswidget-editbox">
							</div>
							<div class="widget-body">
								<form class="form-horizontal" id="frm_mov_p">
									<fieldset>
										<div class="form-group" style="text-align: right;">
											<label class="col-md-3" style="margin-top: 6px"><b>FECHA</b></label>
											<div class="col-md-5">
												<div class="input-group input-group-md">
												    <div class="icon-addon addon-md">
												    	<input type="date" class="form-control" name="fecha">
												    </div>
												   
												</div>
											</div><div class="col-md-12"></div>
											<label class="col-md-3" style="margin-top: 6px"><b>TIPO</b></label>
											<div class="col-md-5">
												<div class="input-group input-group-md">
												    <div class="icon-addon addon-md">
												    	<select class="form-control" name="tip">
												    		<option value="1">Ingreso</option>
												    		<option value="2">Egreso</option>
												    	</select>
												    </div>
												    <span class="input-group-btn">
													    <button class="btn btn-default" type="button" disabled="">
													    	<b>S/.</b>
													    </button>
													</span>
												</div>
											</div><div class="col-md-12"></div>
											<label class="col-md-3" style="margin-top: 6px"><b>MONTO</b></label>
											<div class="col-md-5">
												<div class="input-group input-group-md">
												    <div class="icon-addon addon-md">
												    	<input type="text" class="form-control" name="mont">
												    </div>
												    <span class="input-group-btn">
													    <button class="btn btn-default" type="button" disabled="">
													    	<b>S/.</b>
													    </button>
													</span>
												</div>
											</div>
											<div class="col-md-12"></div><br><br><br><br>
											<div class="col-md-1"></div>
											<div class="col-md-8">
												<textarea class="form-control" placeholder="Motivo" name="motivo"></textarea>
											</div>
											  	
										</div>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<center>
							<button class="btn btn-default" onclick="
	                        $('#myModal').modal('hide');">
							Cancel
						</button>
						<button class="btn btn-primary" onclick="vAjax('caja_principal','nMov','frm_mov_p');">
							<i class="fa fa-save"></i>
							Guardar
						</button>
					</center>
					
				</div>
			</div>