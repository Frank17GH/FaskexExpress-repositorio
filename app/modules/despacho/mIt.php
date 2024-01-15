<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h4 class="modal-title" id="myModalLabel"><center><b><?php if($s02){echo 'DETALLE DE'; }else{echo 'NUEVO';} ?> DESPACHO</b></center></h4>
</div>
<?php foreach ($dt4 as $key => $data4): ?>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div role="content">
				<div class="jarviswidget-editbox">
				</div>
				<div class="well well-sm well-primary">
					<form class="smart-form" action="javascript: vAjax('viajes','upViaje','f_viaj'); " id="f_viaj">
						<input type="hidden" name="id" value="<?php echo $s02 ?>">
						<fieldset>
							<div class="col-md-5">
								<label class="label"><b>CONDUCTOR</b></label>
								<select class="input-sm" style="width: 100%;" required="" name="cond" <?php if ($data4[estado]==1): ?> disabled="" <?php endif ?>>
									<option value="">[Seleccione]</option>
											 <?php 
                                                if($dt2){ 
                                                    foreach ($dt2 as $dta2): ?>
                                                       <option value="<?php echo $dta2['ID'] ?>" <?php if ($data4[chofer]==$dta2['ID']): ?> selected="" <?php endif ?> ><?php echo $dta2['Nom'] ?></option>
                                                <?php   
                                            		endforeach; 
                                                }
                                            ?>
								</select>
							</div>
							<div class="col-md-2"></div>
							<div class="col-md-5">
								<label class="label"><b>VEHICULO</b></label>
								<select class="input-sm" style="width: 100%;" required="" name="veh" <?php if ($data4[estado]==1): ?> disabled="" <?php endif ?>>
									<option value="">[Seleccione]</option>
											 <?php 
                                                if($dt3){ 
                                                    foreach ($dt3 as $dta3): ?>
                                                       <option value="<?php echo $dta3['ID'] ?>" <?php if ($data4[vehiculo]==$dta3['ID']): ?> selected="" <?php endif ?> ><?php echo $dta3['placa'] ?></option>
                                                <?php   
                                            		endforeach; 
                                                }
                                            ?>
								</select>
							</div>
							<div class="col-md-12"><hr style="width: 100%"></div>
							<div class="col-md-12"><br></div>
						
							
							<div class="col-md-12"><hr style="width: 100%"></div>
							<div class="col-md-12"><br></div>
							<div class="col-md-5">
								<section>
									<label class="label"><b>FECHA DE SALIDA</b></label>
									<label class="input">
										<input type="date" class="input-sm" name="fec" placeholder="hh"  value="<?php echo $data4[fecha] ?>" required="" <?php if ($data4[estado]==1): ?> readonly <?php endif ?>>
										
									</label>
								</section>
							</div>
							
							<div class="col-md-2"></div>
							<div class="col-md-5">
								<section>
									<label class="label"><b>HORA DE SALIDA</b></label>
									<label class="input">
										<input type="time" class="input-sm" name="hor" placeholder="hh"  value="<?php echo $data4[hora] ?>" required="" <?php if ($data4[estado]==1): ?> readonly <?php endif ?>>
										
									</label>
								</section>
							</div>
							<div class="col-md-12"><hr style="width: 100%"></div>
							<div class="col-md-12"><br></div>
							<div class="col-md-12">
								<label class="label"><b>OBSERVACIONES</b></label>
								<textarea class="form-control" name="obs" rows="3" <?php if ($data4[estado]==1): ?> readonly <?php endif ?>><?php echo $data4[obs] ?></textarea>
							</div>
							<button style="display: none;" id="sub_mit" type="submit"></button>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<?php 
			if ($data4[estado]==0) {
				?>
					<?php if ($_SESSION['pan'][0]=='24' || $_SESSION['pan'][0]=='1'): ?>
						<button class="btn btn-danger" type="button" onclick="confir('Verificación!','Eliminar Viaje ¿Esta seguro de esta acción?','viajes','dRut',<?php echo $s02 ?>);return false;"><i class="fa fa-trash"></i> Eliminar</button>
					<?php endif ?>				

					<button class="btn btn-primary" onclick="$('#sub_mit').click();">
						<i class="fa fa-save"></i>
						Guardar
					</button>
				<?php
			}
		?>
		
		<button class="btn btn-default" onclick="$('#myModal').modal('hide');">Cerrar</button>
	</div>
</div>
<?php endforeach ?>