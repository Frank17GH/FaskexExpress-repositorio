
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h4 class="modal-title" id="myModalLabel"><center><b>NUEVO PERSONAL</b></center></h4>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div role="content">
				<div class="jarviswidget-editbox">
				</div>
				<div class="widget-body">
					<form class="form-horizontal" action="javascript: vAjax('personal-listar','insert1','frm1'); " id="frm1">
						<fieldset>
							<div class="col-md-12">
								<div class="">
								    	<div class="form-group">
											<div class="col-md-6">
												<label><b>D.N.I.</b></label>
										        <input placeholder="#" name="doc" class="form-control" required=""  autocomplete="off">
											</div>
											<div class="col-md-6">
												<label><b>Creación</b></label>
										        <input value="<?php echo date('Y-m-d') ?>" style="text-align: center;" type="date" class="form-control" readonly >
											</div>
										</div>
										<div class="form-group">
											
											<div class="col-md-12">
												<label><b>Nombres</b></label>
												<input class="form-control" id="verNom" name="nom" autocomplete="off" required="">
											</div>
										</div>
										<div class="form-group">
											
											<div class="col-md-12">
												<label><b>Apellidos</b></label>
												<input class="form-control" id="verTell" name="apell" placeholder="" required="">
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-6">
												<label><b>Sexo</b></label>
										        <select class="form-control" name="sexo">
										        	<option value="1">Masculino</option>
										        	<option value="0">Femenino</option>
										        </select>
											</div>
											<div class="col-md-6">
												<label><b>F. Nacimiento</b></label>
										        <input  style="text-align: center;" name="nac" type="date" class="form-control"  >
											</div>
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
