<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h6 >DATOS DE USUARIO</h6>
</div>
<?php session_start(); ?>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div role="content">
				<div class="jarviswidget-editbox">
				</div>
				<div class="widget-body">
					<?php 
						if($dt1){
							foreach ($dt1 as $dta1 ) {
								?>
									<form class="form-horizontal" action="javascript: vAjax('home','up1','mfrm3'); " id="mfrm3">
										<fieldset>
											<div class="col-md-12">
												<div class="form-group">
													<label class="col-md-4">Dni</label>
													<div class="col-md-8">
														<input  value="<?php echo $dta1[pe_dni] ?>"  class="form-control" disabled>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4">Nombre</label>
													<div class="col-md-8">
														<input value="<?php echo $dta1[nombre] ?>"  class="form-control" disabled>
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-4">Correo</label>
													<div class="col-md-8">
														<input name="pe_mail" value="<?php echo $dta1[pe_mail] ?>"  class="form-control" required>
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-4">Usuario</label>
													<div class="col-md-8">
														<input name="user" value="<?php echo $dta1[user] ?>"  class="form-control" required >
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-4">Cambiar Contraseña</label>
													<div class="col-md-8">
														<input name="pass1" id="pass1" value="<?php echo $dta1[pass] ?>"  class="form-control" type="password">
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-4">Confirmar Contraseña</label>
													<div class="col-md-8">
														<input name="pass2" id="pass2" value="<?php echo $dta1[pass] ?>"  class="form-control" type="password">
													</div>
												</div>

											</div>
											<button style="display: none;" id="sub_mitR" type="submit"></button>
										</fieldset>
									</form>								
								<?php 
							}
						}
					 ?>				
				</div>
			</div>
		</div>
	</div>
	
</div>
<div class="modal-footer">
	<button class="btn btn-default" data-dismiss="modal">Cancel</button>
	<button class="btn btn-primary" type="button" onclick="$('#sub_mitR').click();">
		<i class="fa fa-save"></i>
						Guardar
					</button>
	</div>
