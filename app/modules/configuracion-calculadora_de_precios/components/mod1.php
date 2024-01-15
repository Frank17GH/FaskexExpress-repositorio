
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h4 class="modal-title" id="myModalLabel"><center><b>NUEVO CLIENTE</b></center></h4>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div role="content">
				<div class="jarviswidget-editbox">
				</div>
				<div class="widget-body">
					<form class="form-horizontal" action="javascript: vAjax('personal-cargos','insert2','frm3'); " id="frm3">
						<input type="hidden" name="id" value="0">
						<fieldset>
							<div class="col-md-12">
								<div class="form-group">
									<label class="col-md-4">Descripción</label>
									<div class="col-md-8">
										<input name="des" placeholder="Coloque el nombre del nuevo cargo" class="form-control" required="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4">Estado</label>
									<div class="col-md-8">
										<select name="estado" style="" class="form-control edit">
											<option value="1">Activo</option>
											<option value="0">Inactivo</option>
										</select>
									</div>
								</div>
							</div>
							<button style="display: none;" id="sub_mitR" type="submit"></button>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btn-default"  data-dismiss="modal">Cancel</button>
		<button class="btn btn-primary" type="button" onclick="$('#sub_mitR').click();">
						<i class="fa fa-save"></i>
						Guardar
					</button>
	</div>
</div>
