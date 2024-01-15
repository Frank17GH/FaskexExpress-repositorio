<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h6 class="modal-title" id="myModalLabel"><b>DETALLE DE USUARIO</b></h6>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div role="content">
				<div class="jarviswidget-editbox">
				</div>
				<div class="widget-body">
					<form class="form-horizontal" action="javascript: vAjax('configuracion-usuarios','up1','frm4');" id="frm4">
						<input type="hidden" value="<?php echo $s02 ?>" name="id">
						<?php 
							foreach ($dt1 as $data):
								?>
								<fieldset>
			
										<div class="form-group">
											<label class="col-md-4"><b>NOMBRES</b></label>
											<div class="col-md-8">
												<font class="vver"><?php echo $data[nom] ?></font>
												<input type="text" class="form-control input-xs vmodi" value="<?php echo $data[nom] ?>" style="display: none" disabled>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4"><b>USUARIO</b></label>
											<div class="col-md-8">
												<font class="vver"><?php echo $data[user] ?></font>
												<input type="text" class="form-control input-xs vmodi" value="<?php echo $data[user] ?>" style="display: none" required name="user">
											</div>
										</div>
										<div class="form-group vmodi" style="display: none">
											<label class="col-md-4"><b>CLAVE</b></label>
											<div class="col-md-8">
												<input type="password" required="" class="form-control input-xs" name="pass" value="<?php echo $data[pass] ?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4"><b>CORREO</b></label>
											<div class="col-md-8">
												<font class="vver"><?php echo ($data[us_correo])?$data[us_correo]:'No especificado' ?></font>
												<input type="text" class="form-control input-xs vmodi" disabled="" value="<?php echo $data[us_correo] ?>" style="display: none">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4"><b>VENTAS - CAJA</b></label>
											<div class="col-md-8">
												<font class="vver">
													<?php 
														if ($data[us_caja]) {
															?><b>DESCUENTA</b> las ventas realizadas en la caja aperturada.<?php
														}else{
															?><b>NO DESCUENTA</b> las ventas realizadas en la caja aperturada.<?php
														} 
													?>
												</font>
												<select class="form-control input-xs vmodi" name="cajas" style="display: none">
													<option value="1" <?php echo ($data[us_caja])?'selected':'' ?>>SI</option>
													<option value="0" <?php echo (!$data[us_caja])?'selected':'' ?>>NO</option>
												</select>
												<p class="note vmodi" style="display: none"><strong>NOTA:</strong> descuentas las ventas en la caja que se encuentre activa.</p>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4"><b>TODOS LOS USUARIOS</b></label>
											<div class="col-md-8">
												<font class="vver">
													<?php 
														if ($data[us_vtodo]) {
															?><b>VISUALIZA,</b> Visualiza reportes de todos los usuarios.<?php
														}else{
															?><b>NO VISUALIZA,</b> solo visualiza reportes propios del usuario.<?php
														} 
													?>
												</font>
												<select class="form-control input-xs vmodi" name="vrepo" style="display: none">
													<option value="1" <?php echo ($data[us_vtodo])?'selected':'' ?>>TODOS LOS USUARIOS</option>
													<option value="0" <?php echo (!$data[us_vtodo])?'selected':'' ?>>SOLO LOS PROPIOS</option>
												</select>
												<p class="note vmodi" style="display: none"><strong>NOTA:</strong> permite visualizar los reportes de todos los usuarios.</p>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4"><b>ESTADO</b></label>
											<div class="col-md-8">
												<font class="vver">
													<?php 
														$est='';
					                                    if ($data[estado]==1) {
					                                    	$est=1;
					                                        ?>
					                                            <span class="label label-success">Activo</span>
					                                        <?php
					                                     }else if($data[estado]==2){
					                                     	$est=2;
					                                        ?>
					                                            <span class="label label-danger">Eliminado</span>
					                                        <?php
					                                     }else{
					                                     	$est=3;
					                                        ?>
					                                            <span class="label label-warning">Inactivo</span>
					                                        <?php
					                                     }
					                                ?>
												</font>
												<select class="form-control input-xs vmodi" name="est" style="display: none">
													<option value="1" <?php echo ($est==1)?'selected':'' ?>>Activo</option>
													<option value="2" <?php echo ($est==2)?'selected':'' ?>>Eliminado</option>
													<option value="3" <?php echo ($est==3)?'selected':'' ?>>Inactivo</option>
												</select>
											</div>
										</div>
										<div class="form-group vmodi" style="display: none">
											<label class="col-md-4"><b></b></label>
											<div class="col-md-4">
												<button class="btn btn-danger btn-xs" type="button" onclick="$('.vver').show();$('.vmodi').hide();" style="width: 100%">
													<i class="fa fa-ban"></i>
													Cancelar
												</button>
											</div>
											<div class="col-md-4">
												<button class="btn btn-success btn-xs" onclick="$('#sub_mitR').click()" type="button" style="width: 100%">
													<i class="fa fa-edit"></i>
													Guardar Cambios
												</button>
											</div>
										</div>
										<div class="form-group vver">
											<label class="col-md-4"><b>CREACIÓN</b></label>
											<div class="col-md-8">
												<font style="font-size: 12px"><i><?php echo $data[crea].' ('.date('d/m/Y h:m a',strtotime($data[us_fecha_crea])).')'; ?></i></font>
											</div>
										</div>
										<div class="form-group vver">
											<label class="col-md-4"><b>MODIFICACIÓN</b></label>
											<div class="col-md-8">
												<font style="font-size: 12px"><i><?php echo $data[modi].' ('.date('d/m/Y h:m a',strtotime($data[us_fech_mod])).')'; ?></i></font>
											</div>
										</div>
										<div class="col-md-12" style="text-align: right;">
											<button class="btn btn-primary btn-xs vver" type="button" onclick="$('.vver').hide();$('.vmodi').show();" title="Acceso a los giros de negocio al que puede tener acceso el usuario seleccionado" style="width: 100%" >
													<i class="fa fa-edit"></i>
												Editar Información
											</button>
										<div class="form-group">
											<div class="col-md-12" style="text-align: right;">
												
											</div>
											
										</div>
										<div class="form-group">
											<h6><small>Lista de Giros de negocio a los que el usuario tiene acceso, puedes dar click en cada uno para poder visualizar los locales a los que puede acceder</small></h6>
											<div class="panel-group smart-accordion-default" id="accordion-2">
												<?php 
													$cc=1;
				                                    foreach ($dt2 as $dta):
				                                       ?>
															<div class="panel panel-default">
																<div class="panel-heading">
																	<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion-2" onclick="return false;" href="#collapseOne-<?php echo $cc; ?>" aria-expanded="false" class="collapsed"> <i class="fa fa-fw fa-plus-circle txt-color-green"></i> <i class="fa fa-fw fa-minus-circle txt-color-red"></i> <?php echo mb_strtoupper($dta[gi_nombre]) ?> </a></h4>
																</div>
																<div id="collapseOne-<?php echo $cc; ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
																	<div class="panel-body">
																		<table class="table ">
																			<tr>
																				<th style="width: 5px">#</th>
																				<th>Nombre</th>
																				<th>Ubicacion</th>
																				<th>Asignación</th>
																			</tr>
																			<?php 
																				$class = new Mod();
				                                    							$ts = $class->mod5_2($data[idpersonal].'-/'.$dta[idgiros]);$zz=1;			
				                                    							foreach ($ts as $ats):
				                                    								?>
																						<tr>
																							<td><?php echo $zz; ?></td>
																							<td><?php echo $ats[lo_abreviatura]; ?></td>
																							<td><?php echo $ats[dist]; ?></td>
																							<td><?php echo date('d/m/Y', strtotime($ats[fecha_asignacion])) ?></td>
																						</tr>
				                                    								<?php $zz++;
				                                    							endforeach; 		
				                                    						?>
																		</table>
																	</div>
																</div>
															</div>
				                                       <?php $cc++;
				                                    endforeach; 
												?>
											</div>

											<div class="col-md-12"><hr></div>
											<div class="col-md-12" style="text-align: right;">
												<button class="btn btn-info btn-xs" type="button" onclick="vAjax('configuracion-usuarios','mod4',<?php echo $data[idpersonal] ?>,'modal1');" title="Acceso a los giros de negocio al que puede tener acceso el usuario seleccionado" style="width: 100%" >
													<i class="fa fa-edit"></i>
													Editar Acceso a Giros
												</button>
												<div class="col-md-12"><br></div>
												<button class="btn btn-warning btn-xs" type="button" title="Acceso a los locales a los que puede tener acceso el usuario seleccionado" onclick="vAjax('configuracion-usuarios','mod5',<?php echo $data[idpersonal] ?>,'modal1');" style="width: 100%" >
													<i class="fa fa-edit"></i>
													Editar Acceso a Locales
												</button>
												<div class="col-md-12"><br></div>
												<button class="btn btn-success btn-xs" type="button" onclick="vAjax('configuracion-usuarios','mod2',<?php echo $data[idpersonal] ?>,'modal1');" title="Acceso a los menus y submenus a los que puede accede el usuario seleccionado" style="width: 100%" >
													<i class="fa fa-edit"></i>
													Editar Vistas
												</button>
												<div class="col-md-12"><br></div>
												<button class="btn btn-danger btn-xs" type="button" onclick="confir('Eliminacion','¿Seguro que deseas eliminar el usuario seleccionado?','configuracion-usuarios','del3',<?php echo $data[idpersonal] ?>,'remove');" title="Elimina permanentemente al usuario" style="width: 100%" >
													<i class="fa fa-remove"></i>
													Eliminar Usuario
												</button>
											</div>
										</div>
									<div class="col-md-12"><br></div>
									<button style="display: none;" id="sub_mitR" type="submit"></button>
								</fieldset>
								<?php 
							endforeach;
						?>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btn-default"  data-dismiss="modal">CERRAR</button>
	</div>
</div>
