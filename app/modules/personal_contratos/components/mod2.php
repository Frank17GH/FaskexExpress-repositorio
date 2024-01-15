
<div class="modal-content" id="div-modal"> 
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			×
		</button>
		<h6 class="modal-title" id="myModalLabel">DETALLE DE CONTRATO</h6>
	</div>
	<?php 
		if($dt1){
			$id=0;
            foreach ($dt1 as $dta1): 
                 ?>
					<div class="modal-body">
						<div class="row">
							<form id="frm6" class="form-horizontal">
								<input type="hidden" name="idpers" value="<?php echo $dta1[idpersonal] ?>">
								<input type="hidden" name="id" value="<?php echo $s02 ?>">
								<div class="row">
									<div class="col-md-4">
										<strong>D.N.I.</strong>
										<input type="text" class="form-control" style="text-align: center;" value="<?php echo $dta1[pe_dni] ?>" readonly>
									</div>
									<div class="col-md-8">
										<strong>NOMBRES</strong>
										<input type="text" class="form-control" style="text-align: center;" value="<?php echo $dta1[pe_apellidos].', '.$dta1[pe_nombres] ?>" readonly>
									</div>
									<div class="col-md-12"><br></div>
									<div class="col-md-6">
										<strong style="color: <?php echo (!$dta1[idtipocontrato])?'red':''; ?>">TIPO DE CONTRATO</strong>
										<select class="form-control edit" name="tcontrato" disabled>
											<option value="0">SELECCIONE UN ITEM --</option>
											<option value="1" <?php echo ($dta1[idtipocontrato]==1)?'selected':'' ?>>CONTRATO INDEFINIDO</option>
											<option value="2" <?php echo ($dta1[idtipocontrato]==2)?'selected':'' ?>>CONTRATO A PLAZO FIJO O DETERMINADO</option>
											<option value="3" <?php echo ($dta1[idtipocontrato]==3)?'selected':'' ?>>CONTRATO A TIEMPO PARCIAL</option>
											<option value="4" <?php echo ($dta1[idtipocontrato]==4)?'selected':'' ?>>LOCACION DE SERVICIO</option>
										</select>
									</div>
									<div class="col-md-6">
										<strong style="color: <?php echo (!$dta1[idpersonalcargo])?'red':''; ?>">CARGO</strong>
										<select class="form-control edit" name="cargo" disabled>
											<?php 
									            if($dt2){
									                foreach ($dt2 as $dta2): 
									                    ?>
									                    	<option value="<?php echo $dta2[idpersonalcargo] ?>" <?php echo ($dta2[idpersonalcargo]==$dta1[idpersonalcargo])?'selected':'' ?>><?php echo mb_strtoupper($dta2[ca_descripcion]) ?></option>
														<?php 
									                endforeach; 
									            }
						        			?>
										</select>
									</div>
									<div class="col-md-12"><br></div>
									<div class="col-md-3">
										<strong style="color: <?php echo (!$dta1[co_frec_pago])?'red':''; ?>">FREC. PAGO</strong>
										<select class="form-control edit" name="frec_pago" disabled>
											<option value="0">SELECCIONE UN ITEM</option>
											<option value="1" <?php echo ($dta1[co_frec_pago]==1)?'selected':'' ?>>SEMANAL</option>
											<option value="2" <?php echo ($dta1[co_frec_pago]==2)?'selected':'' ?>>QUINCENAL</option>
											<option value="3" <?php echo ($dta1[co_frec_pago]==3)?'selected':'' ?>>MENSUAL</option>
										</select>
									</div>
									<div class="col-md-3">
										<strong style="color: <?php echo (!$dta1[co_rem_bruto])?'red':''; ?>">REM. BRUTA</strong>
										<input type="text" class="form-control edit" name="rem_bruta" style="text-align: center;" value="<?php echo $dta1[co_rem_bruto] ?>" disabled>
									</div>
									<div class="col-md-3">
										<strong style="color: <?php echo (!$dta1[co_rem_liquido])?'red':''; ?>">REM. LIQUIDA</strong>
										<input type="text" class="form-control edit" name="rem_liqui" style="text-align: center;" value="<?php echo $dta1[co_rem_liquido] ?>" disabled>
									</div>
									<div class="col-md-3">
										<strong style="color: <?php echo (!$dta1[co_bono])?'red':''; ?>">BONO</strong>
										<input type="text" class="form-control edit" name="bono" style="text-align: center;" value="<?php echo $dta1[co_bono] ?>" disabled>
									</div>
									<div class="col-md-12"><br></div>
									<div class="col-md-3" style="color: <?php echo (!$dta1[co_inicio])?'red':''; ?>">
										<strong>FECHA INICIO</strong>
										<input type="date" class="form-control edit" name="inicio" style="text-align: center;" value="<?php echo $dta1[co_inicio] ?>" disabled>
									</div>
									<div class="col-md-3">
										<strong style="color: <?php echo (!$dta1[co_fin])?'red':''; ?>">FECHA FIN</strong>
										<input type="date" class="form-control edit" name="fin" style="text-align: center;" value="<?php echo $dta1[co_fin] ?>" disabled>
										<label class="checkbox" style="margin-left: 30px">
											<input type="checkbox" name="indefinido" <?php echo ($dta1[co_fin]=='0000-00-00')?'checked':'' ?>>
											<i></i> Indeterminado
										</label>
									</div>
									<div class="col-md-3">
										<?php 
											if ($dta1[co_liquidado]) {
												?>
													<strong style="color: <?php echo (!$dta1[co_liquidado])?'red':''; ?>">LIQUIDADO</strong>
													<select class="form-control edit" name="liquidado" disabled>
														<option value="1" <?php echo ($dta1[co_liquidado])?'selected':'' ?>>No</option>
														<option value="0" <?php echo (!$dta1[co_liquidado])?'selected':'' ?>>Si</option>
													</select>
												<?php
											}else{
												?><input type="hidden" name="liquidado" value="1"><?php
											}
										?>
										
									</div>

									<div class="col-md-3">
										<?php 
											if (!$dta1[co_estado]) {
												?>
													<strong style="color: <?php echo (!$dta1[co_estado])?'red':''; ?>">REGULARIZADO</strong>
													<select class="form-control edit" name="regula" disabled>
														<option value="1" <?php echo ($dta1[co_estado])?'selected':'' ?>>SI</option>
														<option value="0" <?php echo (!$dta1[co_estado])?'selected':'' ?>>NO</option>
													</select>
												<?php
											}else{
												?><input type="hidden" name="regula" value="1"><?php
											}
										?>
										
									</div>
								</div>
				        	</form>
				        	<div class="form-group">
								<div class="col-md-12"><hr style="width: 90%"></div>
							</div>
						</div><br><br>
					</div>
					<div class="modal-footer">
						<div class="view">
							<button class="btn btn-warning" onclick="vAjax('personal_contratos','mod1',<?php echo $dta1[idpersonal] ?>,'modal5');">
								<i class="fa fa-rotate-left"></i> VOLVER
							</button>
							<button class="btn btn-primary" onclick="$('.edit').show();$('.view').hide();$('.edit').prop('disabled', false)">
								<i class="fa fa-edit"></i> EDITAR
							</button>
							<button class="btn btn-default"  data-dismiss="modal">
								<i class="fa fa-remove"></i> CERRAR
							</button>
						</div>
						
						<div class="edit" style="display: none">
							<button class="btn btn-warning" onclick="vAjax('personal_contratos','mod1',<?php echo $dta1[idpersonal] ?>,'modal5');">
								<i class="fa fa-rotate-left"></i> VOLVER
							</button>
							<button class="btn btn-danger" type="button" onclick="confir('Confirmación','Seguro que deseas eliminar el contrato?','personal_contratos','del1',<?php echo $s02 ?>,'remove')">
								<i class="fa fa-trash"></i> ELIMINAR
							</button>
							<button class="btn btn-primary" onclick="vAjax('personal_contratos','up1','frm6')">
								<i class="fa fa-check"></i> GUARDAR
							</button>
							
							<button class="btn btn-default" onclick="$('.edit').hide();$('.view').show()">
								<i class="fa fa-remove"></i> CANCELAR
							</button>
						</div>
					</div>
				</div>
			<?php 
        endforeach; 
   }
?>