
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
					<form class="form-horizontal" action="javascript: vAjax('personal-cargos','insert2','frm3'); " id="frm3">
						 <?php 
				            if($dt1){
				                foreach ($dt1 as $dta1): 
				                    ?>
							        <input type="hidden" name="id" id="did" value="<?php echo $s02 ?>">
									<fieldset>
										<div class="col-md-8">
											<label><b></b>DESCRIPCIÓN</label>
											<input name="des" value="<?php echo $dta1[se_descripcion] ?>" class="form-control" required="">
										</div>
										<div class="col-md-4">
											<label><b></b>ESTADO</label>
											<select class="form-control">
												<option value="1" <?php echo ($dta1[se_estado])?'selected':'' ?>>ACTIVO</option>
												<option value="0" <?php echo (!$dta1[se_estado])?'selected':'' ?>>INACTIVO</option>
											</select>
										</div>
										<div class="col-md-12">
											<center><legend>NOMENCLATURA</legend></center>
										</div>

										<div class="col-md-12">
											<div class="table-responsive">
												<center><legend>SUB SERVICIOS</legend></center>
												<table class="table table-bordered">
													<thead>
														<tr>
															<th>Descripción</th>
															<th>Nomenclatura</th>
															<th>Ambito</th>
															<th style="width: 100px">Estado</th>
															<th style="width: 5px">Acciones</th>
														</tr>
													</thead>
													<tbody>
														<?php 
												            if($dt2){
												                foreach ($dt2 as $dta2): 
												                    ?>
																		<tr>
																			<td><?php echo $dta2[de_descripcion] ?></td>
																			<td><?php echo $dta2[no_nombre] ?></td>
																			<td><?php echo $dta2[am_nombre] ?></td>
																			<td><?php echo ($dta2[de_estado])?'Activo':'Inactivo' ?></td>
																			<td style="text-align: center;">
																				<table>
												                                   	<tbody>
												                                   		<tr>
													                                       	<td>
													                                           <a class="btn btn-info btn-xs" href="javascript:void(0);" onclick="vAjax('configuracion-cotizacion','mod3',<?php echo $dta2[iddet] ?>,'modal4');">&nbsp;<i class="fa fa-eye"></i>&nbsp;</a>
													                                       	</td>
													                                       	<td>
													                                           <a class="btn btn-danger btn-xs" onclick="confir('Confirmación de eliminación!','<i class=\'fa fa-clock-o\'></i> <i>¿Deseas eliminar el producto con id: #000043 ?</i>','configuracion-cotizacion','del1',<?php echo $dta2[iddet] ?>,'times');" href="javascript:void(0);">&nbsp;&nbsp;<i class="fa fa-times">&nbsp;&nbsp;</i></a>
													                                       	</td>
												                                   		</tr>
												                               		</tbody>
												                           		</table>
																			</td>
																		</tr>
																	 <?php 
																endforeach; 
															}
													    ?>
													    <tr>
													    	<td><input type="text" id="ddes" class="form-control input-xs"></td>
													    	<td>-Sel Nom</td>
													    	<td>-Sel Nac-</td>
													    	<td>
													    		<select class="form-control input-xs" id="dest">
													    			<option value="1">Activo</option>
													    			<option value="0">Inactivo</option>
													    		</select>
													    	</td>
													    	<td>
													    		<button type="button" class="btn btn-success btn-xs" onclick="vAjax('configuracion-cotizacion','insert1',$('#did').val()+'-/'+$('#ddes').val()+'-/'+$('#dest').val());">
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
		<button class="btn btn-danger" type="button" onclick="confir('Confirmación de eliminación!','<i class=\'fa fa-clock-o\'></i> <i>¿Deseas eliminar el servicio seleccionado ?</i>','configuracion-cotizacion','del3',<?php echo $s02 ?>,'times');">
			<i class="fa fa-save"></i> Eliminar
		</button>
		<button class="btn btn-primary" type="button" onclick="$('#sub_mitR').click();">
			<i class="fa fa-save"></i> Guardar
		</button>
		<button class="btn btn-default"  data-dismiss="modal"> Cancelar</button>
	</div>
</div>
