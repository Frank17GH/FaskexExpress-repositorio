
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h6 class="modal-title" id="myModalLabel">APERTURA DE CAJA</h6>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div role="content">
				<div class="jarviswidget-editbox">
				</div>
				<div class="widget-body">
					<form class="form-horizontal" id="frm6">
						<input type="hidden" name="id" value="0">
						<fieldset>
							<div class="col-md-12">
								<div class="form-group">
									<label class="col-md-4"><b>MONTO INICIAL</b></label>
									<div class="col-md-8">
										<input name="des" type="number" autocomplete="off" placeholder="S/. 0.00" class="form-control" required="">
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
	<div class="modal-footer" style="text-align: center;">
		<button class="btn btn-default"  data-dismiss="modal">Cancel</button>
		<button class="btn btn-primary" type="button" onclick="vAjax('facturacion','insert2','frm6');">
			<i class="fa fa-save"></i>
			Guardar
		</button>
	</div>
</div>
