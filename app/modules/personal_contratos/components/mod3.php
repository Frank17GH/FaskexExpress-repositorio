
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h6 class="modal-title" id="myModalLabel">NUEVO CONTRATO</h6>
</div>
<div class="modal-body">
	<div class="row">
		<div role="content">
			<div class="widget-body">
				<?php 
					foreach ($dt1 as $dta1):
						?>
							<form class="form-horizontal" id="vfrm1">
								<div class="col-md-12">
									<div class="form-group">
										<div class="col-md-4">
											<label><b>D.N.I.</b></label>
											<div class="input-group input-group">
											    <div class="icon-addon addon">
											        <input type="text" value="<?php echo $dta1[pe_dni] ?>" class="form-control" readonly>
											    </div>
											</div>
										</div>
										<div class="col-md-8">
											<label><b>NOMBRES</b></label>
											<input style="text-align: center;" type="text" class="form-control" id="idnom" value="<?php echo $dta1[pe_apellidos].', '.$dta1[pe_nombres] ?>" readonly>
											<input type="hidden" value="0" id="idid" name="id">
										</div>
										<div class="col-md-12"><br></div>
										<div class="col-md-3" style="margin-top: 10px; text-align: center;">
											<b>INICIO</b>
										</div>
										<div class="col-md-3">
											<input type="date" class="form-control" value="<?php echo date('Y-m-d',strtotime(' + 1 day '.$dta1[co_fin])) ?>">
										</div>
										<div class="col-md-3" style="margin-top: 10px; text-align: center;">
											<b>FIN</b>
										</div>	
										<div class="col-md-3">
											<input type="date" class="form-control" value="<?php echo date('Y-m-d',strtotime(' + 1 day + 1 month '.$dta1[co_fin])) ?>">
										</div>
									</div>
								</div>
							</form>
						<?php 
					endforeach; 
				?>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button class="btn btn-default"  data-dismiss="modal">CERRAR</button>
	<button class="btn btn-warning" onclick="vAjax('personal_contratos','mod1',<?php echo $s02 ?>,'modal5');">
		<i class="fa fa-rotate-left"></i> VOLVER
	</button>
	<button class="btn btn-primary" type="button" onclick="vAjax('personal_contratos','insert1','vfrm1');">
		<i class="fa fa-save"></i> GUARDAR
	</button>
</div>