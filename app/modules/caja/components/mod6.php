
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
					<form class="form-horizontal">
						<fieldset>
							<div class="col-md-12">
								<div class="form-group">
									<label class="col-md-4"><b>USUARIO ACTUAL</b></label>
									<div class="col-md-8">
										<input id="idusu" class="form-control" readonly="">
									</div>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer" style="text-align: center;">
		<button class="btn btn-default"  data-dismiss="modal">Cancel</button>
		<button class="btn btn-primary" type="button" onclick="vAjax('caja','apCaja',<?php echo $s02 ?>);">
			<i class="fa fa-archive"></i>
			Aperturar
		</button>
	</div>
</div>
<script>$('#idusu').val('<?php echo $_SESSION['fasklog']['pe_apellidos'].', '.$_SESSION['fasklog']['pe_nombres'] ?>')</script>