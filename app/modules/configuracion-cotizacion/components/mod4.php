
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h6 class="modal-title" id="myModalLabel"><b>DETALLE DE SERVICIO</b></h6>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div role="content">
				<div class="widget-body">
					<form class="form-horizontal" action="javascript: vAjax('configuracion-cotizacion','insert2','frm3'); " id="frm3">
						 <?php 
				            if($dt1){
				                foreach ($dt1 as $dta1): 
				                    ?>
							        <input type="hidden" name="id" id="zid" value="<?php echo $s02 ?>">
									<fieldset>
										<div class="col-md-6">
											<label><b></b>DESCRIPCIÓN</label>
											<input name="des" value="<?php echo utf8_encode($dta1[ca_descrip]) ?>" class="form-control" required="">
										</div>
										<div class="col-md-6">
											<label><b></b>ESTADO</label>
											<select class="form-control">
												<option value="1" <?php echo ($dta1[ca_estado])?'selected':'' ?>>ACTIVO</option>
												<option value="0" <?php echo (!$dta1[ca_estado])?'selected':'' ?>>INACTIVO</option>
											</select>
										</div>
										<div class="col-md-12"><br></div>
										<div class="col-md-12">
											<div class="table-responsive">
												<center><legend>SUB SERVICIOS</legend></center>
												<table class="table table-bordered">
													<thead>
														<tr>
															<th></th>
															<th>Descripción</th>
															<th style="width: 5px">Acciones</th>
														</tr>
													</thead>
													<tbody>
														<?php 
												            if($dt2){
												                foreach ($dt2 as $dta2): 
												                    ?>
																		<tr>
																			<td style="text-align: center;"><?php echo $dta2[ad_ver] ?></td>
																			<td><?php echo $dta2[ad_descrip] ?></td>
																			<td style="text-align: center;">
													                            <a class="btn btn-danger btn-xs" onclick="confir('Confirmación de eliminación!','<i class=\'fa fa-clock-o\'></i> <i>¿Deseas eliminar la descripcion con id: #000043 ?</i>','configuracion-cotizacion','del2',<?php echo $dta2[idadicionales] ?>,'times');" href="javascript:void(0);">&nbsp;&nbsp;<i class="fa fa-times">&nbsp;&nbsp;</i></a>
																			</td>
																		</tr>
																	 <?php 
																endforeach; 
															}
													    ?>
													    <tr>
													    	<td>
													    		<select class="form-control btn-xs" style="width: 90px" id="vin">
													    			<option value="0">(ninguno)</option>
																	<option value="•">•</option>
																	<option value="■">■</option>
																	<option value="✔">✔</option>
																</select>
													    	</td>
													    	<td><input type="text" id="zdes" class="form-control input-xs"></td>
													    	<td>
													    		<button type="button" class="btn btn-success btn-xs" onclick="vAjax('configuracion-cotizacion','insert2','<?php echo $s02 ?>-/'+$('#zdes').val()+'-/'+$('#vin').val());">
								                                    &nbsp;Guardar&nbsp;
								                                </button>
													    	</td>
													    </tr>
													</tbody>
												</table>
											</div>
										</div>
									</fieldset>
									<?php 
								endforeach; 
							}
					    ?>
						<button style="display: none;" id="sub_mitR" type="submit"></button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btn-default"  data-dismiss="modal">Cancel</button>
		<button class="btn btn-primary" type="button" onclick="$('#sub_mitR').click();">
			<i class="fa fa-save"></i>Guardar
		</button>
	</div>
</div>
